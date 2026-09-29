<?php

class BankAccount {

	public $type;
	public $number;
	public $name;
	public $balance;
	
	public function deposit($amount) {
		$this->balance += $amount;
	}
	
	public function withdrawal($amount) {
		if ($this->balance >= $amount) {
			$this->balance -= $amount;
		} else {
			echo "Insufficient funds <br />";
		}
	}
	
	public function accountQuery() {
		return $this->balance;
	}
	
	public function setName($fullName) {
		$this->name = $fullName;
	}

}

$johnsSavingsAccount = new BankAccount();

$johnsSavingsAccount->setName("John Smith");
$johnsSavingsAccount->deposit(100);
echo $johnsSavingsAccount->accountQuery() . "<br />";
$johnsSavingsAccount->withdrawal(25);
$johnsSavingsAccount->withdrawal(100);
echo $johnsSavingsAccount->accountQuery() . "<br />";;


?>