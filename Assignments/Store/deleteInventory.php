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
<h3>Deleting records Using Php</h3>
<h4>Programmed by {Siminder Bansal}</h4>
<?php
    require_once('includes/bootstrap.php');

    $title = trim($_POST['Title']);
    $result = Movies::delete($dbc, $title);

    if($result){
        echo "The Delete query was succesfully executed!";
    } else {
        echo "The Delete query could not be executed!";
    }



?>
</body>
</html>
