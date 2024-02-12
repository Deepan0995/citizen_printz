<?php
session_start();
include("connect_db.php");
 
$result="Failed";
if(isset($_POST['trans_details']))
{
	$dt_tm = date("Y-m-d H:i:s");
	$sql="update purchase_request_master set payment_details='".$_POST['trans_details']."' , payment_dt_tm='".$dt_tm."' where purchase_request_no = ".$_POST['pr_id'];
	executed_sql($sql); 
    $result="Success";
	unset($_SESSION['Purchase_Request_No']); 
	unset($_SESSION['net_amount']); 
	unset($_SESSION['mobile_no']); 
}
echo $result;
?>