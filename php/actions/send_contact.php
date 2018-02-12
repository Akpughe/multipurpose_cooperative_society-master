<?php
require('db_config.php');

if($_SERVER["REQUEST_METHOD"] == "POST" )
{
  extract($_POST);
  echo $_POST['full_name'];
  echo $_POST['email'];
  echo $_POST['message'];
$link->query("INSERT INTO contact_us VALUES
('', '$full_name', '$email', '$message', '')");

if($link->affected_rows > 0){
	
echo "<div class='alert alert-dismissible alert-success'>Sent Successfully</div>";

}
else{
	
	echo "<div class='alert alert-dismissible alert-danger'>Something is Wrong. Try Again Later</div>";
}

}

?>