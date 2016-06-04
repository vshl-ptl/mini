<?php 

//import Model class
runkit_import(dirname(__DIR__).'/model/model.php', RUNKIT_IMPORT_CLASS_METHODS);

//Extend it to wrap methods
class Record extends Model{

  function __construct($db)
  {

         //Make sure db is connected 
         parent::__construct($db);

         //get info about Model class
         $reflClass = new ReflectionClass('Model');

         //retrieve methods
         $methods=$reflClass->getMethods();

         //loop through methods to get arguments ,start from 1 to skip constructor
         for ($i=1; $i <count($methods) ; $i++) 
         { 
        
                $refmethod = new ReflectionMethod('Model', $methods[$i]->name);
                
                $params=$refmethod->getParameters() ;
                
                $paramlist=array();

                //count no of arguments and store in an array
                for ($j=0; $j < count($params); $j++) 
                { 
                
                      array_push($paramlist, "$".$params[$j]->name);


                }

                //prepare method name
                $methodname=$methods[$i]->name;

                //prepare argument string 
                $args=implode(',', $paramlist);

                //log method call and ensure orginial code is added by calling parent method
                 $code="file_put_contents(dirname(__FILE__) .'/log.txt', '$methodname'.PHP_EOL,FILE_APPEND);
                  return parent::$methodname($args);";

                //redefine with the $code at runtime
                runkit_method_redefine('Record',"$methodname",$args,"$code");


          }
  }
}

