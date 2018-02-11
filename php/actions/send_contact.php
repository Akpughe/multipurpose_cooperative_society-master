<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
	
require('db_config.php');

extract($_POST);
$date = date("Y-m-d h:i:sa");

$link->query("INSERT INTO contact_us VALUES
('', '$name', '$email', '$company', '$website', '$message', '$date')");

if($link->affected_rows>0){
	
echo "<h2>Data Sent Successfully</h2>";

}
else{
	
	echo "<h2>Data submit not successfull</h2>";
}

}

?>