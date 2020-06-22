<?php
ob_start();
session_start();

//database credentials
define('db_host','localhost');
define('db_user','root');
define('db_pass','root');
define('db_name','secure_blog');

$db = new PDO("mysql:host=".db_host.";port=8888;dbname=".db_name, db_user, db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//set timezone
//date_default_timezone_set('America/Los_Angeles');

//load classes as needed
function __autoload($class) {

   $class = strtolower($class);

   //if call from within assets adjust the path
   $classpath = 'sa_core/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }

   //if call from within admin adjust the path
   $classpath = '../sa_core/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }

   //if call from within admin adjust the path
   $classpath = '../../sa_core/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
   }

}

$user = new User($db);

include('functions.php');
?>
