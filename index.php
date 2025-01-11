
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP MVC</title>
</head>
<body>
    
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
echo "<br>";
echo "<br>";
echo "<br>";

?>

<h1>Getters and Setters</h1>

<?php
//GETTERS AND SETTERS 
class newUser{
    private $name;
    private $age;

    public function __construct($name = '', $age = ''){
        $this->name = $name;
        $this->age = $age;
    }

    //For the getter just create a new method to access the private property
    public function getName(){
        return $this->name;
    }

    public function getAge(){
        return $this->age;
    }

    //Same consept with setter, just add a property requirement on the method
    public function setName($name){
        return $this->name = $name;
    }

    public function setAge($age){
        return $this->age = $age;
    }

    //There is a magic method called __get , use this so that you dont need to create multiple method for each property
    public function __get($property){
        if(property_exists($this, $property)){
            return $this->$property;
        }
    }
    
    //This is the same concept with __set
    public function __set($property, $value){
        if(property_exists($this, $property)){
            $this->$property = $value;
        }
        return $this;
    }
}

$newUser = new newUser('Sanjo', 100);
$newUser->setName('kirito');
$newUser->setAge(1200);
echo $newUser->getAge();
echo "<br>";
echo $newUser->getName();
echo "<br>";
?>
<h3>This is a magic property __get()</h3>
<?php

$newUser->__set('name','Zorro');
$newUser->__set('age','1123');
echo $newUser->__get('name');
echo "<br>";
echo $newUser->__get('age');
?>

</body>
</html>