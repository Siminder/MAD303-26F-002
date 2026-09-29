<?php

require_once('BankAccount.php');

$sallysSavingsAccount = new BankAccount();

$sallysSavingsAccount->setName("Sally Smith");
$sallysSavingsAccount->type = "Savings";
$sallysSavingsAccount->balance = 0;
$sallysSavingsAccount->number = 100123;



?>