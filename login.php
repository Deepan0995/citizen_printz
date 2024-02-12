<?php 
	include "header.php";
?>
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
 </style>
<div id="banner-area" class="banner-area"   >
  <div class="banner-text">
    <div class="container">
        <div class="row" style="">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">LOGIN</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="index.php">Home</a></li> 
                      <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 

<section id="main-container" class="main-container" style="padding-top:30px;">
  <div class="container">
    <div class="row">
        <div class="col-lg-12">
          <h3 class="column-title">Login</h3>
		 
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="images/login.png"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form>  

          <!-- Email input -->
          <div class="form-outline mb-4">
			<label class="form-label" for="form3Example3">Email address</label>
            <input type="email" id="user_name" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
            
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
			<label class="form-label" for="form3Example4">Password</label>
            <input type="password" id="pass_word" class="form-control form-control-lg"
              placeholder="Enter password" />
            
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
			<div class="form-check mb-0">
				<a href="#!" class="text-body"> 
                Forgot password?
              </a>
			 </div>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="button" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;" onclick="fnLogin()">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
                class="link-danger">Register</a></p>
          </div>
			<span id="errMsg" style="color:red; "></span>
        </form>
      </div>
    </div>
  </div>
		  
		</div>
	</div>
  </div>
<section>
<script>
function fnLogin()
{ 
    var uname = $('#user_name').val();
    var pword = $('#pass_word').val();
    $.ajax({
        type: "POST",
        url: "checklogin.php",
        data:{uname:uname,pword:pword},
        success: function (response) {
            if(response=="Failed")
            {
                 $('#errMsg').text("Invalid Credentials.");
                 $('#errMsg').css('color','red');
            } 
            else
            {
                $('#errMsg').text("Login Successful...");
                $('#errMsg').css('color','green'); 
                localStorage.setItem("CartItems",[]);
                sessionStorage.setItem('logined',true);                
                window.location.href ="index.php";
                 
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