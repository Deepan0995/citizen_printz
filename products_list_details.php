 <?php
	$Page="all"; 
	include "header.php"; 
	$product_category_name=$_GET["pc_name"];
		$category_display_name = "";
	$sub_category_display_name = "";
 $sql="SELECT  b.category_display_name,b.product_category_name,c.sub_category_display_name,c.product_sub_category_name FROM  product_category b  
	join product_sub_category c on b.product_category_name=c.product_category_name
	where c.product_category_name='".$product_category_name."'";
    $query=mysqli_query($connection,$sql);
    if($row=mysqli_fetch_array($query))
    {
		$category_display_name = $row["category_display_name"]; 
		$sub_category_display_name = $row["sub_category_display_name"];
		$product_sub_category_name = $row["product_sub_category_name"];
	
	}
 
?> 
<style>
 .h4Div a:hover{
	 color: #f04f36;
 }
 .banner-title
 {
	 font-size: 2rem;
	 padding-top: 15px;
 }
 .banner-area
 {
	 background:Brown;
	 min-height:150px;
 }
</style>
<div id="banner-area" class="banner-area"  >
  <div class="banner-text">
    <div class="container">
        <div class="row" style="">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title" ><?php echo $sub_category_display_name;?> </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">All Products</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Business Products</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 

<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">
        <div class="col-lg-12">
           <h3 class="column-title" style="margin-bottom:10px;"><?php echo $category_display_name ; ?></h3> 
		  <?php
		  $sql="SELECT * FROM `product_sub_category`  where  product_category_name='".$product_category_name."'";
			$query1=mysqli_query($connection,$sql);
			 
			while($row1=mysqli_fetch_array($query1))
			{
				 
				echo '<div class="row">';
				echo '<div class="col-md-12 mt-4">';
				echo '<h6 class="menu_title bg-secondary text-white p-2">'.$row1["sub_category_display_name"].'</h6>';
				$sql="SELECT a.id,a.product_name,a.product_code,product_description,b.category_display_name,b.product_category_name,c.sub_category_display_name,c.product_sub_category_name FROM product_master a 
	join product_category b on a.product_category_name=b.product_category_name
	join product_sub_category c on a.product_sub_category_name=c.product_sub_category_name
	where  c.product_sub_category_name='".$row1["product_sub_category_name"]."'";
	 
    $query=mysqli_query($connection,$sql);
     
				echo '<div class="row">';
				while($row=mysqli_fetch_array($query))
				{  
					echo '<div class="col-md-3" style="text-align:center;margin-top:10px;">';
					$category_display_name = $row["category_display_name"];
					$product_category_name = $row["product_category_name"];
					$sub_category_display_name = $row["sub_category_display_name"];
					$product_sub_category_name = $row["product_sub_category_name"];
					$product_name = $row["product_name"];
					$product_code = $row["product_code"]; 
					$path = "products/".$product_category_name."/".$product_sub_category_name."/".$product_code."/";
					 
					$fileSystemIterator = new FilesystemIterator($path);
					$path_name="";
					$entries = array();
					foreach ($fileSystemIterator as $fileInfo){ 
						$filename = $fileInfo->getFilename();
						$ext = $fileInfo->getExtension(); 
						$path_name= $path.$filename;
						break;
					}
						 
					 
					echo '<h4 class="h4Div">';
					echo '<a href="products.php?id='.$row["id"].'">';
					echo ' <img src="'.$path_name.'" style="width:250px;height:250px;margin-bottom:10px;" />  ';
					echo $product_name.'</a> </h4>';
					echo '</div>';	
					
				}
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
		  
	 
		  ?>
          
		</div>
    </div><!-- Content row end -->

  </div><!-- Container end -->
</section><!-- Main container end -->

 <div class="gap-20"></div>
 
 
  
<?php	 
	include "footer.php";
?>