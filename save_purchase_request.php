<?php
session_start();
include("connect_db.php");
 

if(isset($_POST['email_idtxt']))
{  
         
        if(isset($_SESSION['email_id']))
        {
            $p_r_type=1;
        }
        else
        {
            $p_r_type=0;
        }
         $p_r_type=$_POST["purchase_request_type"];
        $dt = date("Y-m-d");
        $dt_tm = date("Y-m-d H:i:s");
        $purchase_request_no = 0;
		if($_POST["no_of_productstxt"]=="") 
		{
			
			$arrProductDetails= explode ("^", $_POST["product_details"]);
            $_POST["no_of_productstxt"] = count($arrProductDetails);				
		}
             
            $sql="Insert Into purchase_request_master (purchase_request_type,dt,dt_tm, customer_name,address_details,city,state,pincode,mobile_no,email_id,payment_details,net_amount,no_of_products,delivery_name,delivery_address,delivery_city,delivery_state,delivery_pincode) Values('".$p_r_type."','".$dt."','".$dt_tm."','".$_POST["customer_nametxt"]."','".$_POST["address_detailstxt"]."','".$_POST["citytxt"]."','".$_POST["statetxt"]."','".$_POST["pincodetxt"]."','".$_POST["mobile_notxt"]."','".$_POST["email_idtxt"]."','".$_POST["payment_detailstxt"]."','".$_POST["net_amounttxt"]."','".$_POST["no_of_productstxt"]."','".$_POST["delivery_customer_nametxt"]."','".$_POST["delivery_address_detailstxt"]."','".$_POST["delivery_citytxt"]."','".$_POST["delivery_statetxt"]."','".$_POST["delivery_pincodetxt"]."')";
         
        if(executed_sql($sql))
        {
            $max_sql="select max(purchase_request_no) as mx from purchase_request_master";
            $max_result=mysqli_query($connection,$max_sql);
            $max_row=mysqli_fetch_array($max_result);
            
            $purchase_request_no= $max_row["mx"];//mysql_insert_id();
            echo "success|".$purchase_request_no;
            $_SESSION['Purchase_Request_No'] = $purchase_request_no;
            $_SESSION['net_amount'] = $_POST["net_amounttxt"];
            $_SESSION['mobile_no'] = $_POST["mobile_notxt"];
            $arrProductDetails= explode ("^", $_POST["product_details"]);
			 
            for ($i = 0; $i < count($arrProductDetails); $i++) 
			{
				if(strlen($arrProductDetails[$i])>0)
				{
					  $arrProduct= explode ("~", $arrProductDetails[$i]); 
					  $sql="Insert Into purchase_request_details (purchase_request_no,product_id,qty,product_amount) Values(".$purchase_request_no.",".$arrProduct[0].",".$arrProduct[1].",".$arrProduct[3].")";
					  echo $sql;
					   executed_sql($sql);
					  
					} 
			} 
        }
        else
        {
            echo "Not submitted. Please try again.<br>";
        }
     
}
else
{
    echo "Not submitted. Please try again... ";
}

   
        

?>