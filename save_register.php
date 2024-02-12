<?php
session_start();
include("connect_db.php");
$result="Failed";
if(isset($_POST['uname']))
{ 
   $dt = date("Y-m-d");
   $dt_tm = date("Y-m-d H:i:s");
   $sql="Insert Into user_master(user_name,pass_word,full_name,email_id,mobile_no,address,city,state,pincode,created_dt_tm) values('".$_POST['uname']."','".$_POST['pword']."','".$_POST['fullname']."','".$_POST['uname']."','".$_POST['mobileno']."','".$_POST['addr']."','".$_POST['city']."','".$_POST['state']."','".$_POST['pincode']."','".$dt_tm."')";
   //echo $sql;
    executed_sql($sql); 
   $result="Success";
}
echo $result;
?>