 <?php  
	include "connect_db.php"; 
	$pId=$_GET["pId"];
	$papersize=$_GET["papersize"];
	$cutting=$_GET["cutting"];
	$frontback=$_GET["frontback"];
	$qty=$_GET["qty"]; 
	$customerType=$_GET["customerType"]; 
	$result="0";
	if($pId == 19 || $pId == 20 )
	{
	$sql="SELECT * FROM  product_prcing_master  
	where product_id='".$pId."' and paper_size_id='".$papersize."' and cutting_type_id='".$cutting."'   and front_back_flag='".$frontback."' and quantity='".$qty."'  and customer_type='".$customerType."'";
	}
	else
	{
		$sql="SELECT * FROM  product_prcing_master  
	where product_id='".$pId."' and paper_size_id='".$papersize."' and cutting_type_id='".$cutting."' and quantity='".$qty."'  and customer_type='".$customerType."'";
	}
	//echo $sql;
    $query=mysqli_query($connection,$sql);
    if($row=mysqli_fetch_array($query))
    {
		$result=$row["price"];
	}
echo $result;	
?> 