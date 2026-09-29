<?php

abstract class Employee {
    private $name;
    private $hireDate;
    private $wage;

    public function __construct($name, $hireDate, $wage) {
        $this->name = $name;
        $this->hireDate = $hireDate;
        $this->wage = $wage;
    }

    public function getWage(){
        return $this->wage;
    }

    public function setWage($wage){
        $this->wage = $wage;
    }

    abstract public function calculateWage();

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getHireDate() {
        return $this->hireDate;
    }

    public function setHireDate($hireDate) {
        $this->hireDate = $hireDate;
    }

} //End of Employee Class