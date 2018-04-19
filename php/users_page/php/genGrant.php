<?php
require '../../actions/conn.php';
session_start();
extract($_SESSION);
if($_SERVER["REQUEST_METHOD"]=="POST"){
    extract($_POST);
    $query = "INSERT INTO `guarantors`(`account_holder_id`, `full_name`, `fathers_name`, `mothers_name`, `birth_date`, `relation`, `file_reference`, `mobile`, `permanent_address`, `email`) VALUES ('$account_holder_id','$full_name','$fathers_name','$mothers_name','$birth_date','$relation','$file_reference','$mobile','$permanent_address','$email')";
    if(mysqli_query($link,$query)){
        echo "Guarantor Registered Successfully";
    }else{
        echo "Something Went Wrong. Try Again";
    }
}
mysqli_close($link);
?>