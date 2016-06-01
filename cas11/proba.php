<?php
$mixed_array=array(2, 'sun', array(1,2,3));
if(isset($mixed_array)) {
    shuffle($mixed_array);
}
var_dump($mixed_array);
?>