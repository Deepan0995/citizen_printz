<?php 
	include "header.php";
?>
<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
 <link rel="stylesheet" href="css/style1.css">
  <script src="plugins/jQuery/jquery.min.js"></script>
<style>
.banner-title
 {
	 font-size: 2rem;
	 padding-top: 15px;
 }
.banner-area
 {
	 background:lightseagreen;
	 min-height:150px;
 }
 .form-label
 {
	 font-weight:bold;
 }
 .signup
{
	padding-top:10px;
	background:white;
}
.signup-content
{
	padding-top:10px;
}
.signup input,.signup a
{
	font-size:15px;
	font-family : "Open Sans", sans-serif;
}
.signup-image-link:hover
{
	color:#f04f36;
}
.form-submit
{
	background:#f04f36;
	padding: 10px 30px;
	margin-top:5px;
}
.signup label
{
	font-size:14px;
	font-family : "Open Sans", sans-serif;
}
.form-title {
    margin-bottom: 10px;
}
#err,#errLbl
{
	color:red;
	font-size:14px;
	font-family : "Open Sans", sans-serif;
} 
input[type=checkbox]:not(old)
{
	display:inline;
}
 </style>
<div id="banner-area" class="banner-area"   >
  <div class="banner-text">
    <div class="container">
        <div class="row" style="">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Sign Up</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li> 
                      <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end -->  
<section class="signup">
	<div class="container">
		<div class="signup-content">
			<div class="signup-form">
				<h2 class="form-title">Sign up</h2>
				<form method="POST" class="register-form" id="register-form">
					
					<div class="form-group">
						<label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
						<input type="text" name="full_name" id="full_name" placeholder="Your Name"   />
					</div>
					<div class="form-group">
						<label for="email"><i class="zmdi zmdi-email"></i></label>
						<input type="email" name="email" id="email" placeholder="Your Email" />
					</div>
					<div class="form-group">
						<label for="pass"><i class="zmdi zmdi-lock"></i></label>
						<input type="password" name="pass" id="pass" placeholder="Password" />
					</div>
					<div class="form-group">
						<label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
						<input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" />
					</div>
					<div class="form-group">
						<label ><i class="zmdi zmdi-phone"></i></label>
						<input type="text" name="mobileno" id="mobileno" placeholder="Mobile no" />
					</div>
					<div class="form-group">
						<label ><i class="zmdi zmdi-gps-dot"></i></label>
						<input type="text" name="addr" id="addr" placeholder="Address" />
					</div>
					<div class="form-group">
						<label ><i class="zmdi zmdi-gps-dot"></i></label>
						<input type="text" name="city" id="city" placeholder="City" />
					</div>
					<div class="form-group">
						<label ><i class="zmdi zmdi-gps-dot"></i></label>
						<input type="text" name="state" id="state" placeholder="State" />
					</div>
					<div class="form-group">
						<label ><i class="zmdi zmdi-pin"></i></label>
						<input type="text" name="pincode" id="pincode" placeholder="Pincode" />
					</div>
					
					<div class="form-group">
						<input type="checkbox" name="agree_term" id="agree_term" class="agree-term" />
						<label for="agree-term" class="label-agree-term"> I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
					</div>
					<div class="form-group form-button">
						<input type="button" name="signup" id="signup" class="form-submit" value="Register" onClick="fnRegister()" />
					</div> 
					<div class="form-group" id="errDiv" style="overflow: visible;margin-bottom:35px;">
						<label id="errLbl"><i class="zmdi zmdi-alert-circle material-icons-name"></i> </label> 
						<span id="err" style="margin-left: 25px "></span>
					</div>
				</form>
			</div>
			<div class="signup-image">
				<figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
				<a href="login.php" class="signup-image-link">I am already member</a>
			</div>
		</div>
	</div>
</section>
 
<script>
$(document).ready(function() {
    $('#errDiv').css("display","none");
	$('#err').text("");
});
function fnRegister()
{ 
	$('#errDiv').hide();
	$('#err').text("");
    var fullname = $('#full_name').val();
    var email = $('#email').val();
    var pword = $('#pass').val();
    var re_pass = $('#re_pass').val();
    var addr = $('#addr').val();
    var city = $('#city').val();
    var state = $('#state').val();
    var pincode = $('#pincode').val();
    var mobileno = $('#mobileno').val();
    var agree_term = $('#agree_term').val();
	if(fullname == null || fullname == "")
	{
		$('#errDiv').show();
		$('#err').text('Enter Name!!!');
		return false;
	}
	if(email == null || email == "")
	{
		$('#errDiv').show();
		$('#err').text("Enter Email!!!");
		return false;
	}
	if(pword == null || pword == "")
	{
		$('#errDiv').show();
		$('#err').text("Enter Password!!!");
		return false;
	}
	if(pword != re_pass)
	{
		$('#errDiv').show();
		$('#err').text("Password and Confirm Password is different!!!");
		return false;
	}
	if(mobileno == null || mobileno == "")
	{
		$('#errDiv').show();
		$('#err').text("Enter mobileno!!!");
		return false;
	}
	if(!$("#agree_term").is(':checked'))
	{
		$('#errDiv').show();
		$('#err').text("Check the terms and conditions!!!");
		return false;
	}
	
    $.ajax({
        type: "POST",
        url: "save_register.php",
        data:{uname:email,pword:pword,fullname:fullname,mobileno:mobileno,addr:addr,city:city,state:state,pincode:pincode},
        success: function (response) {
            if(response=="Failed")
            {
                 $('#errMsg').text("Failed to SIgn Up."); 
            } 
            else
            {
                $('#errMsg').text("Registered Successful...");
                $('#errMsg').css('color','green'); 
                localStorage.setItem("CartItems",[]);
                sessionStorage.setItem('logined',true);
				//alert(response);
                window.location.href ="login.php";
                 
            }
        },
        failure: function (response) {
            //alert(response.d);
        }
    });	
    return false;
 
}
</script>		  
		  
		  
<?php	 
	include "footer.php";
?>