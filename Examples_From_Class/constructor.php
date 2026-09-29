<?php

require_once('BankAccount.php');

$sallysSavingsAccount = new BankAccount("Savings", 100123, "Sally Smith");

echo "<pre>";
var_dump($sallysSavingsAccount);
echo "</pre>";

?>