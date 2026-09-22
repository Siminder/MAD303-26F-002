<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display Inventory</title>
</head>
<body>
<h2 style='text-align: center'>Display Movies Reconds</h2>
<table border="1" width="75%" cellspacing="2" cellpadding="2" align="center"
    <tr>
        <td align="center" valign="top"><b>TITLE</b></td>
        <td align="center" valign="top"><b>DIRECTOR</b></td>
        <td align="center" valign="top"><b>PRODUCTION COMPANY</b></td>
        <td align="center" valign="top"><b>YEAR RELEASED</b></td>
    </tr>


<?php
require_once('includes/bootstrap.php');
$movies = Movies::all($dbc);

if($movies) {
    foreach ($movies as $movie){
        echo "<tr align='center'>";
        echo "<td align='center'>{$movie['title']}</td>";
        echo "<td align='center'>{$movie['director']}</td>";
        echo "<td align='center'>{$movie['production_company']}</td>";
        echo "<td align='center'>{$movie['year_relesed']}</td>";
        echo "</tr>";
        };

        } else {
        echo "<tr align='center'>";
        echo "<td colspan='4'>No Results</td>";
        echo "</tr>";
    }



?>




</table>
</body>
</html>


