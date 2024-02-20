<?php
$Page = "myaccount";
include "header.php";
?>
<style>
	.table {
		width: 100%;
		max-width: 100%;
		margin-bottom: 22px;
	}

	.visible-xs {
		display: none !important;
	}
</style>
<section id="main-container" class="main-container" style="padding-top:30px;">
	<div class="container">
		<div class="container-fluid mb-3">
			<div class="row">
				<div class="col-12" id="viewCartDiv">

				</div>
			</div>
		</div>
		<button><a href="purchase_request_list.php">purchase list</button>
	</div>
</section>
<?php
include "footer.php";
?>
<script src='js/jquery_1_11_0.min.js'></script>
<script>
	$(document).ready(function() {
		loadProductsInViewCart();
	});
	
</script>