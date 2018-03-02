<?php
include './conn.php';
if($_SERVER["REQUEST_METHOD"] == "POST" ){

    extract($_POST);
    

    $rFileID = 'Reg/'.(date('d:M:Y')).'/'.$branch_id.'/'.$full_name;

    $query1 = "INSERT INTO `account_holders`( `full_name`, `father_name`, `mother_name`, `birthdate`, `gender`, `telephone`, `email`, `password`, `file_reference`, `amount`, `present_address`, `permanent__address`, `branch_id`) VALUES ('$full_name','$father_name','$mother_name','$birthdate','$gender','$telephone','$email','$password','$rFileID','0','$present_address','$permanent_address','$branch_id')";

    $query2 = "INSERT INTO `incoming_file`( `file_reference`, `file_subject`, `dept_from`, `dept_to`, `employee`, `date`, `start_page`, `stop_page`, `file_remarks`, `status`, `branch_id`) VALUES ('$rFileID','New Registration','','Registration','','".date('d:M:Y')."','0','1','A newly registered Member to your branch','Active','$branch_id')";

    $query3 = "INSERT INTO `history`( `file_reference`, `file_subject`, `date`, `action`, `dept_from`, `dept_to`, `employee`, `start_page`, `stop_page`, `file_remarks`, `status`, `folio_out`, `branch_id`) VALUES ('$rFileID','New Registration','".date('d:M:Y')."','Creation','','Registration','','0','1','A newly registered member to your branch','Active','','$branch_id')";

    if(mysqli_query($link,$query2) && mysqli_query($link,$query3)){
        if(mysqli_query($link,$query1)){
            echo '<div class="alert alert-success alert-dismissible">Registered Successfully. You can now login at the login Page</div>';

        }else{
            echo '<div class="alert alert-danger alert-dismissible">Something went wrong. Try again</div>';
        }
    }else{
        echo '<div class="alert alert-danger alert-dismissible">Sorry, something went wrong.</div>';
    }
}
 ?>
