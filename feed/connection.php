<?php
define('HOST', 'localhost'); 

define('USERNAME', 'root'); 

define('PASSWORD', ''); 

define('DATABASE_NAME', 'crm');

//Connect and select the database 

$db = new mysqli(HOST, USERNAME, PASSWORD, DATABASE_NAME); 

if ($db->connect_error) { 

    die("Connection failed: " . $db->connect_error); 

}
?>