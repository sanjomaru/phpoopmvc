<?php

class User{
    public $name;

    public function statement(){
        return $this->name.' Says Hi';
    }
}

$user = new User();
echo $user->name = 'Sanjo';
echo "<br>";
echo $user->statement();