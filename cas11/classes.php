<?php
/**
 * Created by PhpStorm.
 * User: Code
 * Date: 25.05.2016
 * Time: 18:33
 */

class Student{
    var $first_name;
    var $last_name;

    function __construct($fname, $lname){
        $this->first_name = $fname;
        $this-> last_name = $lname;
        $this-> sayHello();
        echo "Constructor called"  . "<br>";
    }

    function sayHello(){
        echo "Hello everyone";
    }
    function __destruct(){
        echo "Destructor called " . "<br>";
    }
}

$student1 = new Student("jovan", "Jalevski");
//$student1->first_name = "Jovan";
echo $student1->first_name;

echo "<br>";
$student1->sayHello();

echo"<br>";

$student2 = new Student("Joe", "Doe");
//$student2->first_name = "John1";
//$student2->last_name = "Doe";
echo $student2->first_name . " " .$student2->last_name;

echo "<br>";
echo "<br>";
class Name{
    var $first_name;
    var $last_name;

    function __construct($fname, $lname){
        $this->first_name = $fname;
        $this-> last_name = $lname;
    }

    function sayName(){
        echo $this->first_name . ":" . $this->last_name;
    }
    function sayName2($fname, $lname){
        echo $fname . " " . $lname;
    }
    function getFName(){
        return $this->first_name;
    }
}
$Student1 = new Name("Jovan", "Jaulevski");
$Student1->sayName();

$Student1->sayName2($Student1->first_name, $Student1->last_name);
echo $Student1->first_name . " " . $Student1->last_name;

class S extends Name{
    var $godini;
    var $index;

    function __construct(){

    }

    function sayName(){
        echo $this->last_name . ":" . $this->godini . "<br>";
    }
}

$obj = new S();
$obj->godini  = 20;
$obj->index = "abc2008";
$obj->last_name = "Prezime";
echo "F Name <br>";
$obj->sayName();


abstract class Book{
    var $price;
    var $title;
    abstract function getPrice();
    function getTitle(){
        return $this->title;
    }
}

class FictionBook extends Book{
    function getPrice()
    {
        return $this->price + 100;
    }
}

class ComicBook extends Book{
    function getPrice(){
        return $this->price +100;
    }
}

$book1 = new FictionBook();
$book1->price = 30;
echo $book1->getPrice(). "<br>";

$book2 = new ComicBook();
echo $book2->getPrice(). "<br>";

