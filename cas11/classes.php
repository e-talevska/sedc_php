<?php

//$fname = "EDUC";
//echo $fname

class Student {
    var $first_name;
    var $last_name;

    function  __construct($fname, $lname){
        $this->setFName($fname);
        $this->last_name = $lname;
        $this->sayHello();
        echo "Constructor called " . "<br>";
    }


    function sayHello(){
        echo "Hello everyone!";

    }

    function sayName(){
        echo $this->first_name . " " . $this->last_name . "<br>";
    }

    function sayName2($fname, $lname){
        echo $fname . " " . $lname . "<br>";
    }

    function getFName(){
        return $this->first_name;
    }

    function setFName($fname){
        if(strlen($fname) >3)
            $this->first_name = $fname . ":)";
    }

    function  __destruct()
    {
        echo "Denstructor called " . "<br>";
    }
}


$student1 = new Student("Emilija", "Talevska");
//$student1->first_name = "Emilija";
//echo $student1->first_name;
//echo "<br>";
$student1->setFName("E");
$student1->sayName();
$student1->sayName2($student1->first_name,$student1->last_name);
    echo "<br>";
$student1->sayHello();
    echo "<br>";


$student2 = new Student("John", "Doe");
//$student2->first_name = "John";
//$student2->last_name = "Doe";
echo $student2->first_name . " " .$student2->last_name;

class S extends  Student {
    var $godini;
    var $index;

    function __construct(){

    }

    function sayName(){
        echo $this->last_name . ": " . $this->index . "<br>";

    }

}


$obj = new S();
$obj->godini = 20;
$obj->index = 'abc2008';
$obj->last_name = "Prezime";
echo "F Name <br>";
$obj->getFName();


abstract class Book{
    var $price;
    var $title;
    abstract function getPrice();
    function getTitle();{
        return $this->title;
    }
}

class FictionBook extends Book {
    function getPrice(){
        return $this->price + 100;
    }
}
class ComicBook extends Book {
    function getPrice(){
        return $this->price + 200;
    }
}
$book1 = new ComicBook();
$book1->price = 30;
echo $book1->getPrice() . "<br>";

$book2 = new ComicBook();
echo $book2->getPrice() . "<br>";

