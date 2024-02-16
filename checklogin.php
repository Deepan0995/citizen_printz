<?php
session_start();
include 'connect_db.php';

$result = "Failed";
if(isset($_POST["uname"]) && isset($_POST["pword"]))
{	 
	if($row=mysqli_query($connection,"select *  from user_master   where user_name='".$_POST["uname"]."' and pass_word='".$_POST["pword"]."'"))		
    { 
        if($data=mysqli_fetch_array($row))
        {
            $result="Success";
            $_SESSION['user_name'] = $data["full_name"];             
            $_SESSION['user_id'] = $data["id"];             
            $_SESSION['email_id'] = $data["user_name"];             
            $_SESSION['logged_in'] = true;    
			$_SESSION['customer_type']	= $data["customer_type"]; 		
        }
    } 
} 
echo    $result;   

?>