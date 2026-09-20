<?php

class BankAccount {

	private $type;
	private $number;
	private $name;
	private $balance;
	
	private static $totalAccounts = 0;
	
	public static function numberOfAccounts() {
		return self::$totalAccounts;
	}
	
	public function __construct($type, $name) {
		$this->type = $type;
		$this->name = $name;
		$this->balance = 0;
		
		$this->number = ++self::$totalAccounts;
	}
	
	public function deposit($amount) {
		$this->balance += $amount;
	}
	
	public function withdrawal($amount) {
		if ($this->balance >= $amount) {
			$this->balance -= $amount;
		} else {
			echo "Insufficient funds <br>";
		}
	}	
	
	public function setName($fullName) {
		$this->name = $fullName;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function setNumber($number) {
		$this->name = $number;
	}
	
	public function getNumber() {
		return $this->getNumber;
	}

	public function setType($type) {
		$this->type = $type;
	}
	
	public function getType() {
		return $this->type;
	}
	
	public function getBalance() {
		return $this->balance;
	}
	

}

?>