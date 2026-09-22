<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Inventory</title>
</head>
<body style="background-color: rgb(229, 243, 247)">
<?php
    require_once('includes/bootstrap.php');

    $title = trim($_POST['Title']);
    $productionCompany = trim($_POST['ProductionCompany']);
    $yearReleased = trim($_POST['YearReleased']);
    $director = trim($_POST['Director']);

    $newMovie = new Movies(0, $title, $productionCompany, $yearReleased, $director);

    $result = $newMovie->create($dbc);
    if($result) {
        echo "The query was succesfully executed!";
    } else {
        echo "the query could not be executed";
    }
?>
</body>
</html>

