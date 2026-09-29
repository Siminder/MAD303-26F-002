<?php

require_once('BankAccount.php');

$johnsSavingsAccount = new BankAccount("Savings", "John Smith");

echo $johnsSavingsAccount->number;
echo "<br>";

$sallysSavingsAccount = new BankAccount("Savings", "Sally Smith");

echo $sallysSavingsAccount->number;

?>