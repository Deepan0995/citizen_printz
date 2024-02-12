<?php
	$Page="myaccount"; 
	include "header.php"; 
?>
<style>
 #prDiv h3,#prDiv h4{
	text-transform: unset; 
 }
</style>
<section id="main-container" class="main-container" style="padding-top:30px;">
	<div class="container">
		<div class="container-fluid mb-3"  >
			<div class="row" id="prDiv">
				<div class="col-12" >
					<h4 class="mtext-111 cl2 p-b-26 p-t-26 ">
						 Your purchase request submitted successfully.
					</h4> 
					<h3>Your Purchase Request No : <span style="color:#f04f36;font-size: 2.5rem;">
					<?php
						echo $_SESSION['Purchase_Request_No'];
					?></span>
					</h3>
					<h4 class="mtext-111 cl2 p-b-26 p-t-26 ">
						Please send amount(<span style="color:#8b32d9;font-size: 1.6rem;">Rs.<?php
						echo $_SESSION['net_amount'];
					?>/-</span>) to this <span style="color:#30a24a;font-size: 1.6rem;">1234567890</span> number by <b>GPAY</b>
					</h4>
				</div>
				<div class="col-12 mb-3">
					<label for="state">Transaction Details <span class="starCls">*</span></label>
					<input type="text" class="form-control" id="transaction_detailsTxt" name="transaction_detailsTxt"  required=""  value=""> 
					<input type="hidden" class="form-control" id="prtxt" name="prtxt"   value="<?php echo $_SESSION['Purchase_Request_No'];?>"><hr class="mb-1"  style="margin-top:10px;">
					<button class="btn btn-primary btn-lg btn-block" type="button" onclick="fnSaveGPayDetails()">Submit</button>					
				  </div>
				
			</div>
			<div class="row" id="pr_success_Div">
				<div class="col-12" >
					<h4 class="mtext-111 cl2 p-b-26 p-t-26 ">
						 Thanks for purchasing. Soon Admin will contact you.
					</h4>
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
	$('#pr_success_Div').hide();
				$('#prDiv').show(); 	
});
</script> 