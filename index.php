<?php

class User{
    public $name;
    public $age;

    //This will run if object is instantiated
    public function __construct($name = '', $age = ''){

        // __Class__ is a magic constant
        echo __CLASS__.' has been instantiated.<br>';

        $this->name = $name;
        $this->age = $age;
    }

    public function statement($name){
        return $this->$name.' Says Hi';
    }
    
    //This will run after the object is used, or object is not referenced
    // Used for cleanup, closing connections etc
    public function __destruct(){
        echo "<br>";
        echo "Destructor Ran..";
    }
}

// $user = new User();
// echo $user->name = 'Sanjo';
// echo "<br>";
// echo $user->statement();

//FOR CONSTRUCTION PRACTICE
$user1 = new User('Sanjo', 10);
echo $user1->name.' is '.$user1->age.' yrs old.';
echo "<br>";

$user2 = new User('Mary');
echo $user2->name;
