<?php
$Page="myaccount"; 
include "header.php"; 
$session_email_Id = "";
$purchase_request_type = "0";
if(isset($_SESSION['email_id']))
{
    $session_email_Id= $_SESSION['email_id'];
	$purchase_request_type = "1";
}
$customer_name="";
$address_details="";
$city="";
$state="";
$pincode="";
$mobile_no="";
$email_id="";
$pass_word="";
if($row=mysqli_query($connection,"select *  from member_master where email='".$session_email_Id."'"))
    {
        if($data=mysqli_fetch_array($row))
        {
            $customer_name=$data["member_name"];
            $address_details=$data["address"];
            $city=$data["city"];
            $state=$data["state"];
            $pincode=$data["pincode"];
            $mobile_no=$data["mobile_no"];
            $email_id=$data["email"];
            $pass_word=$data["password"]; 
        }
    }
?>
<style>
 .disclaimer
{
    font-size:0.7vw;
}
.bg-light {
    background-color: #f8f9fa!important;
} 
.chkCls
{
    float: left; 
    width: 15px;
    height: 20px;
    margin: 0px !important;
    margin-right: 10px !important;
    margin-top: 6px !important;
}
#errMsg
{
    color:#f00;
    text-align : center;
}
.starCls
{
    color:#f00;
}
.form-control
{
	color: #717172;
	font-weight: 600;
}
</style>
<section id="main-container" class="main-container" style="padding-top:30px;">
	<div class="container">
		<div class="container-fluid mb-3" >
			<div class="row">
				<div class="col-12"  >
					<h4 class="mtext-111 cl2 p-b-26 p-t-26 menu_title ">
         Checkout
    </h4>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4" id="checkoutDiv">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted  ">Your cart</span>
            <span class="badge badge-secondary badge-pill" id="cartItemsCnt"> </span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Product name</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Second product</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Third item</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">$5</span>
            </li>
             
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$20</strong>
            </li>
          </ul>
 
        </div> 
        <div class="col-md-8 order-md-1"  id="billingAddressDiv">
          <h4 class="mb-3">Billing address</h4>
          <form  novalidate="">
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="firstName">Customer name <span class="starCls">*</span></label>
                <input type="text" class="form-control" id="customer_nametxt" name="customer_nametxt" value="<?php echo $customer_name;?>" required="">
                <input type="hidden" class="form-control" id="purchase_request_type" name="purchase_request_type" value="<?php echo $purchase_request_type;?>" > 
              </div> 
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="address">Address <span class="starCls">*</span></label>
                  <input type="text" class="form-control" name="address_detailstxt" id="address_detailstxt" value="<?php echo $address_details;?>" required="">               
                </div>
            </div>
            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">City <span class="starCls">*</span></label>
                 <input type="text" class="form-control" id="citytxt" name="citytxt" placeholder="City"  required=""  value="<?php echo $city;?>">
                 
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State <span class="starCls">*</span></label>
                <input type="text" class="form-control" id="statetxt" name="statetxt" placeholder="State" required=""  value="<?php echo $state;?>">                
              </div>
              
              <div class="col-md-3 mb-3">
                <label for="zip">Zip <span class="starCls">*</span></label>
                <input type="text" class="form-control" id="pincodetxt" name="pincodetxt"required=""  value="<?php echo $pincode;?>">                 
              </div> 
            </div>
            <div class="row"> 
                <div class="col-md-12" style="height:20px;font-weight:bold;margin-top:10px;margin-bottom:10px;">
                  <input type="checkbox" class=" chkCls" id="sameAddrChk" name="sameAddrChk" onclick="fnSameAsBillingAddress()">
                  <label   for="same-address">Same as Billing Address</label><br>
                </div>
            </div> 
            <h4 class="mb-3">Delivery address</h4> 
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="firstName">Customer name <span class="starCls">*</span></label>
                <input type="text" class="form-control" id="delivery_customer_nametxt" name="delivery_customer_nametxt" placeholder="" value="" required="">
                 
              </div> 
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="address">Address <span class="starCls">*</span></label>
                  <input type="text" class="form-control" name="delivery_address_detailstxt" id="delivery_address_detailstxt" value="" required="">               
                </div>
            </div>
            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">City <span class="starCls">*</span></label>
                 <input type="text" class="form-control" id="delivery_citytxt" name="delivery_citytxt" placeholder="City"  required=""  value="">
                 
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State <span class="starCls">*</span></label>
                <input type="text" class="form-control" id="delivery_statetxt" name="delivery_statetxt" placeholder="State"  required=""  value="">                
              </div>
              
              <div class="col-md-3 mb-3">
                <label for="zip">Zip <span class="starCls">*</span></label>
                <input type="text" class="form-control" id="delivery_pincodetxt" name="delivery_pincodetxt" placeholder="" required=""  value="">                 
              </div> 
            </div>
            <div class="row">              
            <div class="col-md-12 mb-3">
              <label for="address">Mobile No <span class="starCls">*</span></label>
              <input type="text" class="form-control" name="mobile_notxt" id="mobile_notxt" placeholder="" required=""  value="<?php echo $mobile_no;?>">               
            </div>
            </div>
            <div class="row"> 
            <div class="col-md-12 mb-3">
              <label for="email">Email  <span class="starCls">*</span></label>
              <input type="email" class="form-control" id="email_idtxt" name="email_idtxt" placeholder="you@example.com"  value="<?php echo $email_id;?>">               
            </div>
            </div>
              
            <hr class="mb-1" style="margin-top:10px;">
            <div class="row"> 
                <div class="col-md-12 mb-3">
                  <input type="checkbox" class=" chkCls" id="termsChk" name="termsChk">
                  <label   for="same-address">I accept Terms & Conditions</label><br>
                   
                </div>
            </div> 
            
            <hr class="mb-1"  style="margin-top:10px;">
            <button class="btn btn-primary btn-lg btn-block" type="button" onclick="fnSaveCheckoutDetails()">Continue to checkout</button>
            <hr class="mb-1">
            <div id="errMsg"></div>
          </form>
          
        </div>
      </div>
 <br><br>
				</div>
			</div>
		</div>
	</div>
</section>
<?php	 
	include "footer.php";
?>
<script src='js/jquery_1_11_0.min.js'></script>
<script>
$(document).ready(function(){
	loadCheckOutDetails(); 
}); 
function fnSameAsBillingAddress()
{
 $('#delivery_customer_nametxt').val($('#customer_nametxt').val()); 
 $('#delivery_address_detailstxt').val($('#address_detailstxt').val()); 
 $('#delivery_citytxt').val($('#citytxt').val()); 
 $('#delivery_statetxt').val($('#statetxt').val()); 
 $('#delivery_pincodetxt').val($('#pincodetxt').val()); 
 
}
</script>