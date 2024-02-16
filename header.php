<?php 
	session_start(); 
	include "connect_db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>Citizen Prints</title>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Citizen Prints">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name=author content="Citizen Prints">
  <meta name=generator content="Citizen Prints">

  <!-- Favicon
================================================== -->
  <link rel="icon" type="image/png" href="images/favicon.png">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">
  <!-- Animation -->
  <link rel="stylesheet" href="plugins/animate-css/animate.css">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  <!-- Colorbox -->
  <link rel="stylesheet" href="plugins/colorbox/colorbox.css">
  <!-- Template styles-->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
 .head_a:hover{
	 color: #f04f36;
 }
.navbar .megamenu{ padding: 1rem; }
/* ============ desktop view ============ */
@media all and (min-width: 992px) {
	
	.navbar .has-megamenu{position:static!important;}
	.navbar .megamenu{left:0; right:0; width:100%; margin-top:0;  }
	
}	
/* ============ desktop view .end// ============ */


/* ============ mobile view ============ */
@media(max-width: 991px)
{
	.navbar.fixed-top .navbar-collapse, .navbar.sticky-top .navbar-collapse
  {
		overflow-y: auto;
	    max-height: 90vh;
	    margin-top:10px;
	}

}
	</style
</head>
<body>
  <div class="body-inner">


    <div id="top-bar" class="top-bar">
        <div class="container">
          <div class="row">
              
              <!--/ Top info end -->
			 <div class="col-lg-4 col-md-4">
                <ul class="top-info text-left">
                    <li><i class="fas fa-map-marker-alt"></i> <p class="info-text">Digital Printing Service in Vadapalani</p>
                    </li>
                </ul>
              </div>
			  <div class="col-lg-2 col-md-4">
                <ul class="top-info  text-left">
                    <li><i class="fa fa-mobile"></i> <p class="info-text">+91-70940 06001</p>
                    </li> 
                </ul>
              </div>
			  <div class="col-lg-3 col-md-4">
                <ul class="top-info  text-left"> 
					<li><i class="fa fa-envelope"></i> <p class="info-text">citizenprintpro@gmail.com</p>
                    </li>
                </ul>
              </div>
              <div class="col-lg-3 col-md-4 top-social text-center text-md-right">
                <ul class="list-unstyled">
                    <li>
                      <a title="Facebook" href="#">
                          <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                      </a>
                      <a title="Twitter" href="#">
                          <span class="social-icon"><i class="fab fa-twitter"></i></span>
                      </a>
                      <a title="Instagram" href="#">
                          <span class="social-icon"><i class="fab fa-instagram"></i></span>
                      </a>
                      <a title="Linkdin" href="#">
                          <span class="social-icon"><i class="fab fa-github"></i></span>
                      </a>
                    </li>
                </ul>
              </div>
              <!--/ Top social end -->
          </div>
          <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </div>
    <!--/ Topbar end -->
<!-- Header start -->
<header id="header" class="header-one">
  <div class="bg-white">
    <div class="container">
      <div class="logo-area">
          <div class="row align-items-center">
            <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                <a class="d-block" href="index.php">
                  <img loading="lazy" src="images/logo.png" alt="Constra">
                </a>
            </div><!-- logo end -->
			<div class="col-lg-5 ">
				<form role="search">
    <div class="input-group">
        <div class="input-group-btn btnGroupCls">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <span id="srch-category">Category</span> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" id="mnu-category">
                <li><a href="#">BUSINESS CARDS</a></li>
				<li><a href="#">LETTER HEADS</a></li>
				<li><a href="#">CERTIFICATE</a></li>
				<li><a href="#">ENVELOPE PRINTING</a></li>
				<li><a href="#">INVITATION</a></li>
				<li><a href="#">BOOKLETS</a></li>
				<li><a href="#">BOOKMARK</a></li>
				<li><a href="#">CATALOGS</a></li>
				<li><a href="#">BROCHURE</a></li>
				<li><a href="#">POSTERS</a></li>
				<li><a href="#">FLYERS</a></li>
				<li><a href="#">LABELS</a></li>
				<li><a href="#">Table Tent</a></li>
				<li><a href="#">STICKERS</a></li>
				<li><a href="#">ID CARDS</a></li>
				<li><a href="#">POST CARDS</a></li>
				<li><a href="#">MENU CARDS</a></li>
				<li><a href="#">DOOR HANGER</a></li>
				<li><a href="#">EVENT TICKETS</a></li>
				<li><a href="#">A4 B&W PRINTING</a></li>
				<li><a href="#">A4 COLOUR PRINTING</a></li>
				<li><a href="#">A3 B&W PRINTING</a></li>
				<li><a href="#">A3 COLOUR PRINTING</a></li>
				<li><a href="#">HANGING DANGLERS</a></li>
				<li><a href="#">Temporary id card</a></li>
            </ul>
        </div>
        <input type="hidden" id="txt-category">
        <input type="text" id="txt-search" class="form-control" placeholder="Search for...">
        <span class="input-group-btn">
            <button id="btn-search" type="submit" class="btn btn-default">
                <span class="fa fa-search"></span>
            </button>
        </span>
    </div>
    </form>
			</div>
            <div class="col-lg-4 mt-1 header-right">
                <ul class="top-info-box"> 
				  <?php
				  
					if(isset($_SESSION['logged_in']))
					{	 
				  ?>
				  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                          <a> <i class="fas fa-user-circle loginCls" ></i> <?php echo $_SESSION['user_name'];?>  </a>
                      </div>
                    </div>
                  </li>
				  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                          <a  href="logout.php" ><i class="fas fa-sign-out-alt loginCls" ></i>Logout</a>
                      </div>
                    </div>
                  </li>
                
				  <?php
					}
					else 
					{
					 
				  ?>
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                          <a  href="login.php" ><i class="fas fa-sign-in-alt loginCls" ></i>Login</a>
                      </div>
                    </div>
                  </li>
				  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                          <a  href="register.php" > Sign Up</a>
                      </div>
                    </div>
                  </li>
				  <?php
					}
					?>
                  <li>
                    <div class="info-box">
                      <div class="info-box-content">
                          <a href="view_cart.php"><i class="fa fa-shopping-cart cartCls" ></i>
                          Cart (<span class="cart_qty"></span>) 
                          </a>
                      </div>
                    </div>
                  </li>
                  <?php
              if(isset($_SESSION['logged_in']))
              {   
              ?>
                  <li>
                    <div class="info-box ">
                      <div class="info-box-content">
                      <a href="my_account.php"><i class="fa  fa-user-circle cartCls"></i> My Account</a>
                      </div>
                    </div>
                  </li>
                  <?php
              }
              ?>
                </ul><!-- Ul end -->
            </div><!-- header right end -->
          </div><!-- logo area end -->
  
      </div><!-- Row end -->
    </div><!-- Container end -->
  </div>

  <div class="site-navigation">
    <div class="container"> 
        <div class="row">
          <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg navbar-dark p-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div id="navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav mr-auto">
						<li class="nav-item <?php if($Page=='home') echo 'active'; ?>"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item <?php if($Page=='about') echo 'active'; ?>"><a class="nav-link" href="aboutus.php">About Us</a></li>
						<li class="nav-item dropdown has-megamenu <?php if($Page=='all') echo 'active'; ?>">
							<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> ALL PRODUCTS </a>
							<div class="dropdown-menu megamenu" role="menu">
								<div class="row g-3"  style="width: 100%;">
								<?php
						$sql="SELECT * FROM `product_category` ";
						$row=mysqli_query($connection,$sql);
						 
						while($data=mysqli_fetch_array($row))
						{
							?>
									<div class="col-lg-3 col-6">
										<div class="col-megamenu">
											<h6 class="menu_title"><?php echo '<a href="products_list_details.php?pc_name='.$data["product_category_name"].'" class="head_a">'.$data["category_display_name"].'</a>';?></h6>
											<ul class="list-unstyled">
												<?php
												$sql1="SELECT * FROM `product_sub_category` where product_category_name='".$data["product_category_name"]."'";
												$row1=mysqli_query($connection,$sql1);
												while($data1=mysqli_fetch_array($row1))
												{
													echo '<li><a href="products_list.php?pc_name='.$data1["product_sub_category_name"].'">'.$data1["sub_category_display_name"].'</a></li>';
												}
												?> 
											</ul>
										</div>  <!-- col-megamenu.// -->
									</div><!-- end col-3 -->
									<?php
						}
									?>
									 
								</div><!-- end row --> 
							</div> <!-- dropdown-mega-menu.// -->
						</li>
						<?php
						$sql="SELECT * FROM `product_category` ";
						$row=mysqli_query($connection,$sql);
						 
						while($data=mysqli_fetch_array($row))
						{
							?>
							<li class="nav-item dropdown has-megamenu <?php if($Page==$data["category_display_name"]) echo 'active'; ?>">
							<?php
							echo '<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">'.$data["category_display_name"].'</a>';
							?>
							<div class="dropdown-menu megamenu" role="menu">
								<div class="row g-3"  style="width: 100%;">
									
							<?php
							$sql1="SELECT * FROM `product_sub_category` where product_category_name='".$data["product_category_name"]."'";
							$row1=mysqli_query($connection,$sql1);
							while($data1=mysqli_fetch_array($row1))
							{
								echo '<div class="col-lg-3 col-6">';
								echo '		<div class="col-megamenu">';
								echo '<h6 class="menu_title">'.'<a href="products_list.php?pc_name='.$data1["product_sub_category_name"].'" class="head_a">'.$data1["sub_category_display_name"].'</a>'.'</h6>';
								echo '<ul class="list-unstyled">';
								$sql2="SELECT * FROM `product_master` where product_category_name='".$data["product_category_name"]."' and product_sub_category_name='".$data1["product_sub_category_name"]."' and available=1";
								$row2=mysqli_query($connection,$sql2);
								while($data2=mysqli_fetch_array($row2))
								{
								  echo '<li><a href="products.php?id='.$data2["id"].'">'.$data2["product_name"].'</a></li>';
								}
								echo '</ul><br>';
								echo '</div></div>'; 
							}
							?>
							</div>
							</div>
							</li>
							<?php
						}
						?>
						 
											
									  
						<li class="nav-item <?php if($Page=='contact') echo 'active'; ?>"><a class="nav-link" href="contact.php">Contact</a></li>
          
                    </ul>
                </div>
              </nav>
          </div>
          <!--/ Col end -->
        </div>
        <!--/ Row end -->

         

        <div class="search-block" style="display: none;">
          <label for="search-field" class="w-100 mb-0">
            <input type="text" class="form-control" id="search-field" placeholder="Type what you want and enter">
          </label>
          <span class="search-close">&times;</span>
        </div><!-- Site search end -->
    </div>
    <!--/ Container end -->

  </div>
  <!--/ Navigation end -->
</header>
<!--/ Header end -->

