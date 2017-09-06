<?php

interface ILogger {
    public function log($data);
}

class Logger implements ILogger {
    public function log($data) {
        echo $data;
    }
}

echo (new Logger())->log("Hello");

class Animal {

    public $name;
    private $age;

    function getAge() {
        return $this->age;
    }

    function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    function print() {
        echo "Hi, my name is " . $this->name . " and I am " . $this->age . " years old.";
    }
}

$dog = new Animal("Doggy", 10);

$dog->print();

echo $dog->getAge();

?>