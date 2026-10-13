
<?php

require_once("config.php");

spl_autoload_register(function ($class) {

    $class = ucfirst($class);

    $ext = ".php";

    $file = __DIR__ . "/" . $class . $ext;

    if (is_readable($file)) {
        require_once($file);
    }

});

$session = new Session();
$database = new Database();

?>
