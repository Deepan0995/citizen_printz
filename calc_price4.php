 <?php  
	include "connect_db.php"; 
	$pId=$_GET["pId"];
	$paperType=$_GET["paperType"];	 
	$qty=$_GET["qty"];
	$size=$_GET["size"];	
	$orientation=$_GET["orientation"];	
	$folding=$_GET["folding"];	
	$customerType=$_GET["customerType"];	
	$result="0";
	$sql="";
	if($pId == 37 || $pId == 39 || $pId == 40 || $pId == 42 || $pId == 43)
	{
		$sql="SELECT * FROM  product_prcing_master  
	where product_id='".$pId."'  and quantity='".$qty."' and paper_size_id='".$size."'";
	}
	else
	{	
		$sql="SELECT * FROM  product_prcing_master  
	where product_id='".$pId."'  and quantity='".$qty."' and paper_size_id='".$size."' and customer_type='".$customerType."'";
	}
	 //   echo $sql;
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