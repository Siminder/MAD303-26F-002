<?php

require_once(__DIR__ . '/../app/bootstrap.php');

echo "Hello World";

// Part 4 test: triggers a logged CRITICAL when DB_PASSWORD is wrong
App\Lib\Database::getConnection();
