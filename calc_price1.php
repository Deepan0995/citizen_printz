 <?php  
	include "connect_db.php"; 
	$pId=$_GET["pId"];
	$paperType=$_GET["paperType"];	 
	$qty=$_GET["qty"];
	$customerType=$_GET["customerType"];	
	$result="0";
	$sql="";
	if($pId == 18 || $pId == 21 || $pId == 28)
	{
		$sql="SELECT * FROM  product_prcing_master  
	where product_id='".$pId."'  and quantity='".$qty."'  and paper_size_id='".$paperType."'  and customer_type='".$customerType."'";
	} 
	else
	{
		$sql="SELECT * FROM  product_prcing_master  
	where product_id='".$pId."'  and quantity='".$qty."'  and customer_type='".$customerType."'";
	}
	
	
	  // echo $sql;
	if($sql != "")
	{
		$query=mysqli_query($connection,$sql);
		if($row=mysqli_fetch_array($query))
		{
			$result=$row["price"];
		}
	}
    
echo $result;	
?> 