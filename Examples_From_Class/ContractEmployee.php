<?php

require_once('Employee.php');

class ContractEmployee extends Employee {

    public function __construct($name, $hireDate, $wageRate) {
        parent::__construct($name, $hireDate, $wageRate);

    }

}

$sally = new ContractEmployee("Sally", "05/01/2014", 200);
?>