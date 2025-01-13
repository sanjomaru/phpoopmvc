
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

    // To access private property, you need to use getters and setters
    // you can create a manual function with returning $this->propertyname;
    // or you can use magic methods __get and __set

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
<h3>This is a magic property __get() and __set()</h3>
<?php

$newUser->__set('name','Zorro');
$newUser->__set('age','1123');
echo $newUser->__get('name');
echo "<br>";
echo $newUser->__get('age');
?>

<h3>Class Inheritance</h3>
<h4>For class inheritance use ::parent_construct()</h4>
<?php

class protectedUser{
    protected $name;
    protected $age;
    
    public function __construct($name = '', $age = ''){
        $this->name = $name;
        $this->age = $age;
    }
}

class protectedUser2 extends protectedUser{
    private $secondUserName;
    private $secondUserAge;

    public function __construct($name = '', $age = '', $sUname = '', $suAge = ''){
        parent::__construct($name, $age);
        $this->secondUserAge = $suAge;
        $this->secondUsername = $sUname;
    }
    
    public function showName(){
        return 'The First user name is : '.$this->name.'. The Second user name is : '.$this->secondUsername;
    }

    public function showAge(){
        return $this->age;
    }

    public function secondShowAge($psuAge = null){
        if($psuAge != null){
            return $this->secondUserAge = $psuAge;
        }
        return $this->secondUserAge;
    }
}

$puser = new protectedUser2('sd', 100, 'suname', 11232);

echo $puser->showName();
echo "<br>";
echo $puser->showAge();
echo "<br>";
echo $puser->secondShowAge();

?>

<h3>Static Methods and Properties</h3>
<h4>You can access static properties and methods by using classname::property or clasname::methodname() for property dont forget to use $ sign, classname::$property</h4>
<?php
class smp{
    public $name;
    public $age;
    public static $minPass = 5;

    public static function verifyPass($password){
        if(strlen($password) >= self::$minPass){
            return true;
        }else{
            return false;
        }
    }
}

$passwords = 112321312;
if(smp::verifyPass($passwords)){
    echo "Password Valid.";
}else{
    echo "Password too short.";
}

?>

</body>
</html>