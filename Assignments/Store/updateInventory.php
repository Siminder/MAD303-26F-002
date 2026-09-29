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
    require_once("includes/bootstrap.php");

    $title = trim($_POST['Title']);
    $director = trim($_POST['Director']);

    $movie = Movies::find($dbc, $title);
    $movie->setDirector($director);
    $result = $movie->update($dbc);

    if($result){
        echo "The UPDATE query was succesfully";
    } else {
        echo "The UPDATE query was unsuccesfull";
    }





?>
</body>
</html>