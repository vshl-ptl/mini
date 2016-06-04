<?php 
//runkit_import('parent.php', RUNKIT_IMPORT_CLASS_METHODS | RUNKIT_IMPORT_OVERRIDE);
class ChildClass{
  function foo() {
    echo "Child::foo\n";
  }
}
 echo ChildClass::foo();