<?php

namespace App\Models;

use App\Lib\Helper;

/**
 * Class User
 * @package App\Models
 */
class User {
    use Helper;

    protected static $table_name = "users";

    protected $id = 0;
    protected $username;
    protected $password;
    protected $email;
    protected $verify = "";
    protected $active = 0;

    /**
     * User constructor.
     * @param $username
     * @param $password
     * @param $email
     */
    public function __construct($username, $password, $email) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

} //End of User Class
