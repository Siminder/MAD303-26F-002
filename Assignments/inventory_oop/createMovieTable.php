<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    require_once('includes/bootstrap.php');

    $dbc = new PDO("mysql:host=".DB_HOST. ";dbname=".DB_NAME,DB_USER,DB_PASS);

    $query = "CREATE TABLE `movies` (`id` INT UNSIGNED NOT NULL
    AUTO_INCREMENT PRIMARY KEY, `title` varchar(255),
    `production_company` varchar(255), `year_relesed` INT, `director` varchar(255))";

    $result = $dbc->query($query);

    if($result){
        echo "The query was successfully executed";
    } else {
        echo "The query could not be executed!" . $dbc->errorInfo()[2];
    }



?>
</body>
</html>