<?php

class student
{
    private $first_name;
    public $last_name;

    function __construct($fname,$lname)
    {
        $this->setFname($fname);
        $this->last_name=$lname;
        $this->sayHello();
        echo "Constructor called" . "<br>";
    }

    function sayHello()
    {
        echo "Hello everyone!";
    }

    function first_last(){

        echo "<br>" . $this->first_name . "" . $this->last_name . "<br>";
    }
    function getFname(){
        return $this->first_name;
    }

    function setFname($fname){
        if(strlen($fname)>3){
        return $this->first_name=$fname;
    }}

    function __destruct()
    {
        echo "<br>Destructor called" . "<br>";
    }
}
$student1=new student("Teodora", " Chakovska");

//echo $student1->first_name;
$student1->setFname("T");
echo $student1->getFname();
$student1->first_last();


echo "<br>";
$student1->sayHello();
echo "<br>";

$student2=new student(" John", " Snow");
echo "<br>";

//echo $student2->first_name . "" . $student2->last_name;
echo "<br>";
$student2->first_last();



class S extends student {
    var $god;
    var $index;

    function __construct()
    //mora da se definira oti ako ne ke javi greska t.e. ke se povika const.od gornata klasa
    {


    }

    function first_last()
    {
        echo $this->last_name . ":" . $this->god . "<br>";
    }
}
$objekt=new S();
$objekt->god=20;
$objekt->index="abc2011";
$objekt->last_name="Prezime";
echo "F name <br>";
$objekt->first_last();

class S1 extends student{
    var $godini;
    function __construct()
        //mora da se definira oti ako ne ke javi greska t.e. ke se povika const.od gornata klasa
    {


    }
    function first_last(){
        echo $this->last_name . ":" . $this->godini . "<br>";
    }
}
$o=new S1();
$o->last_name="S1 Objekt";
$o->godini=20;
$o->first_last();


abstract class book{
    var $price;
    var $title;
    abstract function getPrice();//potpis na f-ta
     function getTitle(){
        return $this->title;
    }
}
class Fictionbook extends book{
    function getPrice(){
        return $this->price + 100;
    }
}
class Comicbook extends book{
    function getPrice(){
        return $this->price + 200;
    }
}
$book1=new Fictionbook();
echo $book1->getPrice() . "<br>";

$book2=new Comicbook();
echo $book2->getPrice() . "<br>";
?>