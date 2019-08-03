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

use vendor\Fm;

$app = new Fm();
$app->__run();
