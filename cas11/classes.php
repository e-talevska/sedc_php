<?php
/**
 * Created by PhpStorm.
 * User: emilija.talevska
 * Date: 25.05.2016
 * Time: 18:33
 */
$fname = "SEDC";
//
//$fname = "EDUC";
//echo $fname;
//function a($f) {
//    echo $f;
//}
//
//a($fname);

class Student {
    private $first_name;
    public $last_name;

    function __construct($fname, $lname){
        $this->setFName($fname);
        $this->last_name = $lname;
        $this->sayHello();
        echo "Constructor called "  . "<br>";
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

    function getFName() {
        var_dump($this->first_name);
        return $this->first_name;
    }

    function setFName($fname) {
        if(strlen($fname) > 3) {
            $this->first_name = $fname . ":)";
        }
    }

    function __destruct(){
        echo "<br>Destructor called "  . "<br>";
    }
}

$student1 = new Student("Emilija", "Talevska");
//$student1->first_name = "Emilija";
$student1->setFName("E");
//echo $student1->first_name;
echo $student1->getFName();
$student1->sayName();
$student1->sayName2("Name","LastName");
echo "<br>";
$student1->sayHello();
echo "<br>";

$student2 = new Student("John", "Doe");
//$student2->first_name = "John1";
$student2->last_name = "Doe";
//echo $student2->first_name . " " .$student2->last_name;
$student2->sayName();

class S extends Student {
    var $godini;
    var $index;

    function __construct(){

    }

    function sayName() {
        echo $this->last_name . ": " . $this->index . "<br>";
    }
}

$obj = new S();
$obj->godini = 20;
$obj->index = 'abc2008';
$obj->last_name = "Prezime";
echo "F Name <br>";
$obj->sayName();

class S1 extends Student {
    var $godini;

    function __construct(){

    }

    function sayName() {
        echo $this->last_name . ": " . $this->godini . "<br>";
    }
}

$o = new S1();
$o->last_name = "S1 Objekt";
$o->godini=20;
$o->sayName();

abstract class Book{
    var $price;
    var $title;
    abstract function getPrice();
    function getTitle() {
        return $this->title;
    }
}

class FictionBook extends Book{
    function getPrice(){
        return $this->price + 100;
    }
}

class ComicBook extends Book{
    function getPrice(){
        return $this->price + 200;
    }
}

$book1 = new FictionBook();
$book1->price = 30;
echo $book1->getPrice() . "<br>";

$book2 = new ComicBook();
echo $book2->getPrice() . "<br>";