<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class RunkitClass {
	function runkitMethod(RunkitClass $param) {
		echo "Runkit Method\n";
	}
}

$code='echo "refection effect";';
$obj = new RunkitClass();
$reflClass = new ReflectionClass('RunkitClass');
$reflObject = new ReflectionObject($obj);
$reflMethod = $reflClass->getmethod('runkitMethod');
echo "<pre>";
var_dump($reflMethod);
echo "</pre>";
runkit_method_redefine('RunkitClass','runkitMethod','','');
echo "<pre>";
var_dump($reflMethod);
echo "</pre>";
$reflMethod->invoke($obj,$obj);
$obj->runkitMethod();
?>