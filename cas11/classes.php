<?php
class Student{
    private $first_name;
    var $last_name;

    function __construct($fname,$lname){
        $this->first_name=$fname;
        $this->last_name=$lname;
        $this->sayHello();
        echo "Constructor called"."<br>";
    }

    function sayHello(){
        echo "Hello everyone";
    }

    function new_func($first,$last){
        $this->first_name=$first;
        $this->last_name=$last;
        echo "<br>"."My first name is ".$first."."."My last name is ".$last;
    }

    function sayName(){
        echo "<br>".$this->first_name." ".$this->last_name;
    }

    function getFName(){
        return $this->first_name;
    }

    function setFName($fname){
        if (strlen($fname)>3){
            $this->first_name=$fname;
        }

    }

    function __destruct(){
        echo "<br>Destructor called"."<br>";
    }
}

$student1=new Student("emilija","talevska");
$student1->setFName("e");
//$student1->first_name="Emilija";
//echo $student1->first_name;
echo $student1->getFName();
echo "<br>";
$student1->sayHello();
echo "<br>";

$student2=new Student("john","doe");
//$student2->first_name="John";
//$student2->last_name="Doe";
//echo $student2->first_name." ".$student2->last_name;

$student1->new_func("Sofija","Shutarova");
$student2->sayName();

class S extends Student {
    var $godini;
    var $index;

    function __construct(){

    }
    function sayName(){
        echo $this->last_name.":".$this->index."<br>";
    }
}

$obj = new S();
$obj->godini=20;
$obj->index="82/11";
$obj->last_name="prezime";
echo "<br>F Name <br>";

$obj->sayName();

abstract class book{
    var $price;
    var $title;
    abstract function getPrice();
    function getTitle(){
        return $this->title;
    }

}

class fiction_book extends book{
    function getPrice(){
        return $this->price+100;
    }
}

class comic_book extends book{
    function getPrice(){
        return $this->price+200;
    }
}
$book1=new fiction_book();
$book1->price=30;
echo $book1->getPrice()."<br>";

$book2=new comic_book();
echo $book2->getPrice()."<br>";
?>