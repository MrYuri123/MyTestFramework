<?php
//Add autoload to classes
function autoload_func($className) {
      if (file_exists($className . '.php')) {
          require_once $className . '.php';
          return true;
      }
      return false;
}
spl_autoload_register('autoload_func');
require_once "/vendor/autoload.php";

use vendor\Fm;
use vendor\DB;

//boot Eloquent ORM
$db = new DB();

//boot framework
$app = new Fm();
$app->__run();
