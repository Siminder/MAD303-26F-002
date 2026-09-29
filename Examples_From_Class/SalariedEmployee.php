<?php

require_once('Employee.php');

class SalariedEmployee extends Employee {

    public function __construct($name, $hireDate, $wageRate) {
        parent::__construct($name, $hireDate, $wageRate);

    }

    public function calculateWage() {
        return $this->getWage();
    }

}

$bob = new SalariedEmployee("Bob", "08/01/2010", 2400);

echo "Bob's wage is " . $bob->calculateWage();

?>