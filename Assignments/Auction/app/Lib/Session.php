<?php
namespace App\Lib;

use App\Models\User;
use PDO;
use PDOException;
use SessionHandlerInterface;

/**
 * Session class
 * @package App\Lib
 */
class Session implements SessionHandlerInterface {

    /**
     * @var PDO|null
     */
    private static $dbConnection;

    /**
     * @var bool|User
     */
    private $user = false;

    /**
     * Session constructor.
     */
    public function __construct() {
        try {
            $this->checkSessionExists();
        } catch (\Exception $e) {
            Logger::getLogger()->critical("Session creation error: ", ['exception' => $e]);
            die();
        }

        session_set_save_handler($this, true);
        session_start();
        if (isset($_SESSION['user'])) {
            $this->user = $_SESSION['user'];
        }
    }

    /**
     * Session destructor - writes and closes the session.
     */
    public function __destruct() {
        session_write_close();
    }

    /**
     * Throws an exception if a session has already been started
     * @throws \Exception
     */
    public function checkSessionExists() {
        if (session_status() === PHP_SESSION_ACTIVE)
            throw new \Exception("Session already active");
    }

    /**
     * Returns the status of the current session
     * @return bool|User
     */
    public function isLoggedIn() {
        return $this->user;
    }

    /**
     * Returns the currently logged in user
     * @return bool|User
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Registers a logged in user object
     * @param User $userObj
     * @return bool
     */
    public function login(User $userObj): bool {
        $this->user = $userObj;
        $_SESSION['user'] = $userObj;
        return true;
    }

    /**
     * Destroys the session & logs out user
     * @return bool
     */
    public function logout(): bool {
        $this->user = false;
        $_SESSION = [];
        session_destroy();
        return true;
    }

    /**
     * Opens a DB connection for the Session Handler
     * @param string $path
     * @param string $name
     * @return bool
     */
    public function open(string $path, string $name): bool {
        try {
            self::$dbConnection = new PDO("mysql:host=" . DB_HOST .
                ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            Logger::getLogger()->critical("could not create DB connection: ", ['exception' => $e]);
            die();
        }

        if (isset(self::$dbConnection)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Closes the DB connection for the Session Handler
     * @return bool
     */
    public function close(): bool {
        self::$dbConnection = null;
        return true;
    }

    /**
     * Reads the Session ID from the DB for the Session Handler
     * @param string $id
     * @return string|false
     */
    public function read(string $id): string|false {
        try {
            $sql = "SELECT data FROM `sessions` WHERE id = :id";
            $statement = self::$dbConnection->prepare($sql);
            $statement->execute(compact("id"));
            if ($statement->rowCount() == 1) {
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                return $result['data'];
            } else {
                return "";
            }
        } catch (PDOException $e) {
            Logger::getLogger()->critical("could not execute query: ", ['exception' => $e]);
            die();
        }
    }

    /**
     * Writes the Sess. ID/Data to the DB for the Handler
     * @param string $id
     * @param string $data
     * @return bool
     */
    public function write(string $id, string $data): bool {
        try {
            $sql = "REPLACE INTO `sessions` (id, data)
                    VALUES ( :id , :data )";
            $statement = self::$dbConnection->prepare($sql);
            $result = $statement->execute(compact("id", "data"));
            return $result;
        } catch (PDOException $e) {
            Logger::getLogger()->critical("could not execute query: ", ['exception' => $e]);
            die();
        }
    }

    /**
     * Destroys the Session record in the DB for the Session Handler
     * @param string $id
     * @return bool
     */
    public function destroy(string $id): bool {
        try {
            $sql = "DELETE FROM `sessions` WHERE id = :id";
            $statement = self::$dbConnection->prepare($sql);
            $result = $statement->execute(compact("id"));
            return $result;
        } catch (PDOException $e) {
            Logger::getLogger()->critical("could not execute query: ", ['exception' => $e]);
            die();
        }
    }

    /**
     * Run garbage collection on old records for the Session Handler
     * @param int $max_lifetime
     * @return int|false
     */
    public function gc(int $max_lifetime): int|false {
        try {
            $sql = "DELETE FROM `sessions` WHERE
                    DATE_ADD(last_accessed, INTERVAL $max_lifetime SECOND)
                    < NOW()";
            $statement = self::$dbConnection->prepare($sql);
            $result = $statement->execute();
            return $result ? $statement->rowCount() : false;
        } catch (PDOException $e) {
            Logger::getLogger()->error("could not execute query: ", ['exception' => $e]);
            die();
        }
    }
}
