<?php
require '../../actions/conn.php';
session_start();
extract($_SESSION);
$date= date('d:m:y');
$file_reference = "Loan/".$account_holder_id."/".$date;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    extract($_POST);
    switch ($loan_amount) {
        case 'a':
            $loan_amount = 500000;
            $loan_start = $date;
            $loan_stop = date_add($date,'6 MONTH');
            $interest = 0.5;
            break;
        case 'b':
            $loan_amount = 2000000;
            $loan_start = $date;
            $loan_stop = date_add($date,'24 MONTH');
            $interest = 1.5;
            break;
        case 'c':
        $loan_amount = 10000000;
        $loan_start = $date;
        $loan_stop = date_add($date,'60 MONTH');
        $interest = 3.5;
            break;
        case 'd':
        $loan_amount = 45000000;
        $loan_start = $date;
        $loan_stop = date_add($date,'120 MONTH');
        $interest = 5.0;
            break;   
        default:
            # code...
            break;
    }
    $query = "INSERT INTO `loan`(`account_holder_id`, `loan_amount`, `loan_description`, `interest`, `loan_start`, `loan_stop`, `guarantor_id`, `branch_id`, `file_reference`) VALUES ('$account_holder_id','$loan_amount','$loan_description','$interest','$loan_start','$loan_stop','$guarantor_id','$branch_id','$file_reference')";
    if(mysqli_query($link,$query)){
        echo "Loan Registered Successfully";
    }else{
        echo "Something Went Wrong. Try Again";
    }
}
mysqli_close($link);
?>