<?php

require_once('Employee.php');

class HourlyEmployee extends Employee {
    private $hours;
	
	public function __construct($name, $hireDate, $wageRate, $hours) {
		parent::__construct($name, $hireDate, $wageRate);

		$this->hours = $hours;
	}

    public function calculateWage() {
        return $this->getWage() * $this->hours;
    }

    public function getHours() {
        return $this->hours;
    }

    public function setHours($hours) {
        $this->hours = $hours;
    }
}	//End of HourlyEmployee Class

$joe = new HourlyEmployee("Joe", "07/01/2011", 40, 40);

echo "Joe's wage is " . $joe->calculateWage();

?>