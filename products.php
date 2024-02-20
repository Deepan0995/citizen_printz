 <?php
	$Page = "business";
	include "header.php";
	$product_id = $_GET["id"];
	$category_display_name = "";
	$product_category_name = "";
	$sub_category_display_name = "";
	$product_sub_category_name = "";
	$product_name = "";
	$product_code = "";
	$product_desc = "";
	$product_details = "";
	$sql = "SELECT a.product_name,a.product_code,product_description,b.category_display_name,b.product_category_name,c.sub_category_display_name,c.product_sub_category_name FROM product_master a 
	join product_category b on a.product_category_name=b.product_category_name
	join product_sub_category c on a.product_sub_category_name=c.product_sub_category_name
	where a.id=" . $product_id;
	$query = mysqli_query($connection, $sql);
	if ($row = mysqli_fetch_array($query)) {
		$category_display_name = $row["category_display_name"];
		$product_category_name = $row["product_category_name"];
		$sub_category_display_name = $row["sub_category_display_name"];
		$product_sub_category_name = $row["product_sub_category_name"];
		$product_name = $row["product_name"];
		$product_code = $row["product_code"];
		$product_desc = $row["product_description"];
		$product_details = $product_id . "~" . $product_category_name . "~" . $product_sub_category_name . "~" . $product_name . "~" . $product_code;
	}
	?>

 <link rel='stylesheet' href='css/lightslider.css'>

 <style>
 	.form-check-input {
 		margin-left: 5px;
 		margin-right: 5px;
 		border-color: #aaa;
 	}

 	@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");


 	#productsDiv {


 		font-family: "Poppins", sans-serif
 	}

 	#productsDiv .card {
 		background-color: #fff;
 		padding: 14px;
 		border: none
 	}

 	#productsDiv .demo {
 		width: 100%
 	}

 	#productsDiv ul {
 		list-style: none outside none;
 		padding-left: 0;
 		margin-bottom: 0
 	}

 	#productsDiv li {
 		display: block;
 		float: left;
 		margin-right: 6px;
 		cursor: pointer
 	}

 	#desc li {
 		display: block;
 		float: none !important;
 		margin-right: 6px;
 		cursor: pointer
 	}

 	#productsDiv img {
 		display: block;
 		height: auto;
 		width: 100%
 	}

 	#productsDiv .stars i {
 		color: #f6d151
 	}

 	#productsDiv .stars span {
 		font-size: 13px
 	}

 	#productsDiv hr {
 		color: #d4d4d4
 	}

 	#productsDiv .badge {
 		padding: 5px !important;
 		padding-bottom: 6px !important
 	}

 	#productsDiv .badge i {
 		font-size: 10px
 	}

 	#productsDiv .profile-image {
 		width: 35px
 	}

 	#productsDiv .comment-ratings i {
 		font-size: 13px
 	}

 	#productsDiv .username {
 		font-size: 12px
 	}

 	#productsDiv .comment-profile {
 		line-height: 17px
 	}

 	#productsDiv .date span {
 		font-size: 12px
 	}

 	#productsDiv .p-ratings i {
 		color: #f6d151;
 		font-size: 12px
 	}

 	#productsDiv .btn-long {
 		padding-left: 35px;
 		padding-right: 35px
 	}

 	#productsDiv .buttons {
 		margin-top: 15px
 	}

 	#productsDiv .buttons .btn {
 		height: 46px
 	}

 	#productsDiv .buttons .cart {
 		border-color: #ff7676;
 		color: #ff7676
 	}

 	#productsDiv .buttons .cart:hover {
 		background-color: #e86464 !important;
 		color: #fff
 	}

 	#productsDiv .buttons .buy {
 		color: #fff;
 		background-color: #ff7676;
 		border-color: #ff7676
 	}

 	#productsDiv .buttons .buy:focus,
 	#productsDiv .buy:active {
 		color: #fff;
 		background-color: #ff7676;
 		border-color: #ff7676;
 		box-shadow: none
 	}

 	#productsDiv .buttons .buy:hover {
 		color: #fff;
 		background-color: #e86464;
 		border-color: #e86464
 	}

 	#productsDiv .buttons .wishlist {
 		background-color: #fff;
 		border-color: #ff7676
 	}

 	#productsDiv .buttons .wishlist:hover {
 		background-color: #e86464;
 		border-color: #e86464;
 		color: #fff
 	}

 	#productsDiv .buttons .wishlist:hover i {
 		color: #fff
 	}

 	#productsDiv .buttons .wishlist i {
 		color: #ff7676
 	}

 	#productsDiv .comment-ratings i {
 		color: #f6d151
 	}

 	#productsDiv .followers {
 		font-size: 9px;
 		color: #d6d4d4
 	}

 	#productsDiv .store-image {
 		width: 42px
 	}

 	#productsDiv .dot {
 		height: 10px;
 		width: 10px;
 		background-color: #bbb;
 		border-radius: 50%;
 		display: inline-block;
 		margin-right: 5px
 	}

 	#productsDiv .bullet-text {
 		font-size: 12px
 	}

 	#productsDiv .my-color {
 		margin-top: 10px;
 		margin-bottom: 10px
 	}

 	#productsDiv label.radio {
 		cursor: pointer
 	}

 	#productsDiv label.radio input {
 		position: absolute;
 		top: 0;
 		left: 0;
 		visibility: hidden;
 		pointer-events: none
 	}

 	#productsDiv label.radio span {
 		border: 2px solid #8f37aa;
 		display: inline-block;
 		color: #8f37aa;
 		border-radius: 50%;
 		width: 25px;
 		height: 25px;
 		text-transform: uppercase;
 		transition: 0.5s all
 	}

 	#productsDiv label.radio .red {
 		background-color: red;
 		border-color: red
 	}

 	#productsDiv label.radio .blue {
 		background-color: blue;
 		border-color: blue
 	}

 	#productsDiv label.radio .green {
 		background-color: green;
 		border-color: green
 	}

 	#productsDiv label.radio .orange {
 		background-color: orange;
 		border-color: orange
 	}

 	#productsDiv label.radio input:checked+span {
 		color: #fff;
 		position: relative
 	}

 	#productsDiv label.radio input:checked+span::before {
 		opacity: 1;
 		content: '\2713';
 		position: absolute;
 		font-size: 13px;
 		font-weight: bold;
 		left: 4px
 	}

 	#productsDiv .card-body {
 		padding: 0.3rem 0.3rem 0.2rem
 	}

 	.breadcrumb-item a {
 		font-size: 14px;
 		color: #1976d2;
 		font-family: "Open Sans", Arial, serif;
 		padding-left: 5px;
 	}

 	.breadcrumb-item a:hover {
 		text-decoration: underline;
 	}

 	#productsDiv h2 {
 		font-size: 2rem;
 		line-height: normal;
 		text-transform: capitalize;
 		letter-spacing: 0px;
 		font-family: "Open Sans", Arial, serif;
 	}

 	.card-headerDiv {
 		background: #ebeef3;
 		height: 64px;
 		padding: 16px;
 	}

 	.calculator-heading {
 		font-weight: 700;
 		clear: both;
 		color: #333;
 		color: #f04f36;
 		align-items: center;
 		display: flex;
 		justify-content: space-between;
 	}

 	.calc-heading-text {
 		font-size: 22px;
 		line-height: 30px;
 		color: #333;
 	}

 	.total-price {
 		font-size: 32px;
 		line-height: 28px;
 	}

 	.calc-total-price {
 		float: right;
 	}

 	p {
 		margin-bottom: 1px;
 	}
 </style>
 <section id="main-container" class="main-container" style="padding-top:30px;">
 	<div class="container">
 		<div class="container-fluid mb-3" id="productsDiv">
 			<div class="row">
 				<div class="col-12">
 					<div class="heading-breadcrumbs-container clearfix">
 						<div class="comp-breadcrumbs-container">
 							<ul class="breadcrumbs-list clearfix">
 								<li class="breadcrumb-item breadcrumb1">
 									<a href="index.php">Home </a>
 								</li>
 								<li class="breadcrumb-item breadcrumb2">
 									<?php echo '<a href="products_list_details.php?pc_name=' . $product_category_name . '">' . $category_display_name . '</a>'; ?>
 								</li>
 								<li class="breadcrumb-item active breadcrumb3">
 									<?php echo '<a href="products_list.php?pc_name=' . $product_sub_category_name . '">' . $sub_category_display_name . '</a>'; ?>
 								</li>
 							</ul>
 						</div>
 					</div>
 				</div>
 				<div class="col-12">
 					<h2 class="page-title" data-qaid="h2"><?php echo $product_name; ?></h2>
 					<input type="hidden" id="product_codetxt" value="<?php echo $product_code; ?>" />
 					<input type="hidden" name="product_id" id="product_id" value="<?php echo $product_id; ?>" />
 				</div>
 			</div>
 			<div class="row no-gutters">
 				<div class="col-md-5 pr-2">
 					<div class="card">
 						<div class="demo">
 							<ul id="lightSlider">
 								<?php
									$path = "products/" . $product_category_name . "/" . $product_sub_category_name . "/" . $product_code . "/";

									$fileSystemIterator = new FilesystemIterator($path);

									$entries = array();
									foreach ($fileSystemIterator as $fileInfo) {
										$filename = $fileInfo->getFilename();
										$ext = $fileInfo->getExtension();
										echo '<li data-thumb="' . $path . $filename . '"> <img src="' . $path . $filename . '" /> </li>';
									}

									?>

 							</ul>
 						</div>
 					</div>
 					<div class="card mt-2">


 					</div>
 				</div>
 				<div class="col-md-7">
 					<div class="card">
 						<?php
							if (
								$product_sub_category_name == 'standard_bc'
								|| $product_sub_category_name == 'premium_bc'
								|| $product_sub_category_name == 'other_bc'
								|| $product_sub_category_name == 'other_bp'

							) {
							?>

 							<div>
 								<h4 class="font-weight-bold mt-0" style="float:left;width:100px;">Details</h4>
 								<input type="hidden" name="product_details" id="product_details" value="<?php echo $product_details; ?>" />
 								<input type="button" class="btn btn-dark" name="addtocart" id="addtocart" value="Add to Cart" onClick="fnAddToCart()" style="float:right;width:150px;background:#f04f36;color:#fff;cursor:pointer;" />
 							</div>
 							<?php
								if ($product_code != 'letter_heads' && $product_code != 'posters' && $product_code != 'flyers' && $product_code != 'lanyards' && $product_code != 'certificates' && $product_code != 'envelope_printing' && $product_code != 'menu_cards' && $product_code != 'id_cards' && $product_code != 'bookmarks'   && $product_code != 'booklets'  && $product_code != 'brochures' && $product_code != 'catalogs' && $product_code != "danglers") {
								?>
 								<div class="form-group row mt-1" style="display:none;">
 									<label class="col-sm-3 col-form-label">Customer Type</label>
 									<div class="col-sm-3">
 										<?php
											if (isset($_SESSION['customer_type']) && $_SESSION['customer_type'] == 1) {
												echo '<input type="radio" class="form-check-input" name="customerTypetxt" checked=true value="1" onchange="fnCalcPrice();"  />B2B';
											} else if (!isset($_SESSION['customer_type'])) {
												echo '<input type="radio" class="form-check-input" name="customerTypetxt" value="1" checked=true  onchange="fnCalcPrice();"  />B2B';
											} else {
												echo '<input type="radio" class="form-check-input" name="customerTypetxt" value="1"  onchange="fnCalcPrice();"  />B2B';
											}
											?>

 									</div>
 									<div class="col-sm-4">
 										<?php
											if (isset($_SESSION['customer_type']) && $_SESSION['customer_type'] == 2) {
												echo '<input type="radio" class="form-check-input" name="customerTypetxt"  checked=true value="2" onchange="fnCalcPrice();"  />B2C';
											} else {
												echo '<input type="radio" class="form-check-input" name="customerTypetxt"  value="2" onchange="fnCalcPrice();"/>B2C';
											}
											?>

 									</div>
 								</div>
 								<div class="form-group row mt-1">
 									<label class="col-sm-3 col-form-label">Type</label>
 									<div class="col-sm-3">
 										<input type="radio" class="form-check-input" name="card_typetxt" checked=true value="1" onchange="fnCardType();">Normal
 									</div>
 									<div class="col-sm-3">
 										<input type="radio" class="form-check-input" name="card_typetxt" value="2" onchange="fnCardType();">Square
 									</div>
 									<!-- commented Custom Type Functionality -->
 									<!-- <div class="col-sm-3">
 										<input type="radio" class="form-check-input" name="card_typetxt" value="3" onchange="fnCardType();">Custom
 									</div> -->
 								</div>
 								<div class="form-group row mt-1">
 									<label class="col-sm-3 col-form-label">Dimension</label>
 									<div class="col-sm-3 normalCls">
 										<input type="radio" class="form-check-input" name="dimensiontxt" id="dimensiontxt1" checked=true value="1" onchange="fnChangeDimension();">90X50
 									</div>
 									<div class="col-sm-3 normalCls">
 										<input type="radio" class="form-check-input" name="dimensiontxt" id="dimensiontxt2" value="2" onchange="fnChangeDimension();">92X52
 									</div>
 									<!-- commented Custom Type Functionality -->
 									<div class="col-sm-3 squareCls">
 										<input type="radio" class="form-check-input" name="dimensiontxt" id="dimensiontxt2" value="31" onchange="fnChangeDimension();">69X69
 									</div>
 								</div>
 								<div class="form-group row mt-1">
 									<label class="col-sm-3 col-form-label">Cutting</label>
 									<div class="col-sm-3">
 										<input type="radio" class="form-check-input" name="cuttingtxt" checked=true value="1" onchange="fnCalcPrice();">Standard
 									</div>
 									<div class="col-sm-4">

 										<input type="radio" class="form-check-input" name="cuttingtxt" value="2" onchange="fnCalcPrice();">Rounded
 										<!--<select class="form-control" id="cuttingtxt" onchange="fnCalcPrice()">
					  <option value="1">Standard</option>
					  <option value="2">Rounded</option>
					</select>-->
 									</div>
 								</div>
 								<div class="form-group row mt-1">
 									<label class="col-sm-3 col-form-label">Print On</label>
 									<div class="col-sm-3">
 										<input type="radio" class="form-check-input" name="front_backtxt" checked=true value="1" onchange="fnCalcPrice();">Front
 									</div>
 									<div class="col-sm-4">
 										<input type="radio" class="form-check-input" name="front_backtxt" value="2" onchange="fnCalcPrice();">Front & Back
 									</div>
 								</div>

 								<div class="form-group row mt-1">
 									<label class="col-sm-3 col-form-label">Quantity</label>
 									<div class="col-sm-7">
 										<select class="form-select" id="quantitytxt" onchange="fnCalcPrice()">

 										</select>
 									</div>
 								</div>
 								<div class="form-group row mt-1">
 									<label class="col-sm-3 col-form-label">Upload Image/PDF</label>
 									<div class="col-sm-7 mt-1">
 										<input type="file" class="form-control-file" id="fileUpload" name="fileUpload" accept=".jpg, .phd, .png, .pdf">
 										<progress id="progressBar" value="0" max="100" style="display: none;"></progress>
 										<div id="uploadStatus"></div>
 									</div>
 								</div>

 					</div>
 				<?php
								}
								if ($product_code == 'letter_heads' || $product_code == 'posters' || $product_code == 'flyers'  || $product_code == 'lanyards'  || $product_code == 'certificates' || $product_code == 'id_cards' || $product_code == "bookmarks" || $product_code == "envelope_printing" || $product_code == "booklets" || $product_code == "brochures" || $product_code == "catalogs" || $product_code == "danglers") {
					?>
 					<div class="form-group row mt-1">
 						<label class="col-sm-3 col-form-label">Customer Type</label>
 						<div class="col-sm-3">
 							<input type="radio" class="form-check-input" name="customerTypetxt" value="1" onchange="fnCalcPrice();" />B2B
 						</div>
 						<div class="col-sm-4">
 							<input type="radio" class="form-check-input" name="customerTypetxt" value="2" onchange="fnCalcPrice();" checked=true />B2C
 						</div>
 					</div>

 					<?php
									if ($product_code == 'posters') {
						?>
 						<div class="form-group row mt-1">
 							<label class="col-sm-3 col-form-label">Size</label>
 							<div class="col-sm-7">
 								<select class="form-select" id="paperTypetxt" onchange="fnPostersQuantity()">
 									<option value="0">Select</option>
 									<option value="4" Selected>A3</option>
 									<option value="5">A4</option>
 									<option value="6">A5</option>
 								</select>
 							</div>
 						</div>
 					<?php

									} else if ($product_code == 'flyers') {
						?>
 						<div class="form-group row mt-1">
 							<label class="col-sm-3 col-form-label">Size</label>
 							<div class="col-sm-7">
 								<select class="form-select" id="paperTypetxt" onchange="fnFlyersQuantity()">
 									<option value="0">Select</option>
 									<option value="5" Selected>A4</option>
 									<option value="6">A5</option>
 								</select>
 							</div>
 						</div>

 					<?php
									} else if ($product_code == 'id_cards') {
						?>
 						<div class="form-group row mt-1">
 							<label class="col-sm-3 col-form-label">Print On</label>
 							<div class="col-sm-3">
 								<input type="radio" class="form-check-input" name="front_backtxt" checked=true value="1" onchange="fnCalcPrice2();">Front
 							</div>
 							<div class="col-sm-4">
 								<input type="radio" class="form-check-input" name="front_backtxt" value="2" onchange="fnCalcPrice2();">Front & Back
 							</div>
 						</div>

 					<?php
									} else if ($product_code == 'bookmarks') {
						?>
 						<div class="form-group row mt-1">
 							<label class="col-sm-3 col-form-label">Size</label>
 							<div class="col-sm-7">
 								<select class="form-select" id="paperTypetxt" onchange="fnBookmarksQuantity()">
 									<option value="0">Select</option>
 									<option value="13" Selected>2 x 6 inches</option>
 									<option value="14">2 x 7 inches</option>
 									<option value="15">2 x 8 inches</option>
 								</select>
 							</div>
 						</div>
 						<div class="form-group row mt-1">
 							<label class="col-sm-3 col-form-label">Print On</label>
 							<div class="col-sm-3">
 								<input type="radio" class="form-check-input" name="front_backtxt" checked=true value="1" onchange="fnCalcPrice1();">Front
 							</div>
 							<div class="col-sm-4">
 								<input type="radio" class="form-check-input" name="front_backtxt" value="2" onchange="fnCalcPrice1();">Front & Back
 							</div>
 						</div>
 					<?php
									} else if ($product_code == 'lanyards') {
						?>
 						<div class="form-group row mt-1">
 							<label class="col-sm-3 col-form-label">Size</label>
 							<div class="col-sm-7">
 								<select class="form-select" id="paperTypetxt" onchange="fnLanyardsQuantity()">
 									<option value="0">Select</option>
 									<option value="7" Selected>12 mm</option>
 									<option value="8">16 mm</option>
 									<option value="9">20 mm</option>
 								</select>
 							</div>
 						</div>

 					<?php
									} else if ($product_code == 'brochures' || $product_code == 'catalogs') {
						?>
 						<div class="form-group row mt-1">
 							<label class="col-sm-3 col-form-label">Size</label>
 							<div class="col-sm-7">
 								<select class="form-select" id="sizetxt" onchange="fnBrouchersQuantity()">
 									<option value="0">Select</option>
 									<option value="5" Selected>A4</option>
 									<?php
										if ($product_code == 'brochures') {
											echo ' <option value="6">A5</option>';
										}
										?>
 								</select>
 							</div>
 						</div>
 						<div class="form-group row mt-1">
 							<label class="col-sm-3 col-form-label">Print On</label>
 							<div class="col-sm-3">
 								<input type="radio" class="form-check-input" name="front_backtxt" checked=true value="1" onchange="fnCalcPrice();">Front
 							</div>
 							<div class="col-sm-4">
 								<input type="radio" class="form-check-input" name="front_backtxt" value="2" onchange="fnCalcPrice();">Front & Back
 							</div>
 						</div>
 						<div class="form-group row mt-1">
 							<label class="col-sm-3 col-form-label">Orientation</label>
 							<div class="col-sm-3">
 								<input type="radio" class="form-check-input" name="orientationTxt" checked=true value="1" onchange="fnCalcPrice4();">Portrait
 							</div>
 							<div class="col-sm-4">
 								<input type="radio" class="form-check-input" name="orientationTxt" value="2" onchange="fnCalcPrice4();">Lanscape
 							</div>
 						</div>

 						<div class="form-group row mt-1">
 							<label class="col-sm-3 col-form-label">Paper Type</label>
 							<div class="col-sm-7">
 								<select class="form-select" id="paperTypetxt" onchange="fnCalcPrice4()">
 									<option value="0">Select</option>
 									<option value="130" Selected>130 GSM</option>
 									<option value="170">170 GSM</option>
 								</select>
 							</div>
 						</div>
 						<div class="form-group row mt-1">
 							<label class="col-sm-3 col-form-label">Folding</label>
 							<div class="col-sm-3">
 								<input type="radio" class="form-check-input" name="foldingTxt" value="1" onchange="fnCalcPrice4();">None
 							</div>
 							<div class="col-sm-3">
 								<input type="radio" class="form-check-input" name="foldingTxt" checked=true value="2" onchange="fnCalcPrice4();">Half
 							</div>
 							<div class="col-sm-3">
 								<input type="radio" class="form-check-input" name="foldingTxt" value="3" onchange="fnCalcPrice4();">Trifold
 							</div>
 						</div>
 					<?php
									} else if ($product_code == 'booklets') {
						?>
 						<div class="form-group row mt-1">
 							<label class="col-sm-3 col-form-label">Size</label>
 							<div class="col-sm-7">
 								<select class="form-select" id="sizetxt" onchange="fnBooklets()">
 									<option value="0">Select</option>
 									<option value="A4" Selected>A4</option>
 									<option value="A5">A5</option>
 									<option value="Custom">Custom</option>
 								</select>
 							</div>
 						</div>
 						<div class="form-group row mt-1">
 							<label class="col-sm-3 col-form-label">Paper Type</label>
 							<div class="col-sm-7">
 								<select class="form-select" id="paperTypetxt" onchange="fnBooklets()">
 									<option value="0">Select</option>
 									<option value="170" Selected>170 GSM</option>
 									<option value="130">130 GSM</option>
 								</select>
 							</div>
 						</div>
 						<div class="form-group row mt-1">
 							<label class="col-sm-3 col-form-label">Pages</label>
 							<div class="col-sm-7">
 								<input type="text" class="form-control" id="pagestxt" onchange="fnBooklets()" />
 							</div>
 						</div>
 						<div class="form-group row mt-1">
 							<label class="col-sm-3 col-form-label">Quantity</label>
 							<div class="col-sm-7">
 								<input type="text" class="form-control" id="qtytxt" onchange="fnBooklets()" />
 							</div>
 						</div>
 					<?php
									}
									if ($product_code != 'booklets') {
						?>
 						<div class="form-group row mt-1">
 							<label class="col-sm-3 col-form-label">Quantity</label>
 							<div class="col-sm-7">
 								<select class="form-select" id="quantity1txt" onchange="fnCalcPrice1()">

 								</select>
 							</div>
 						</div>
 				<?php
									}
								}
					?>
 				<div class="card-headerDiv mt-1">


 					<span class="calculator-heading">
 						<span class="calc-heading-text">Get Started</span>
 						<span class="calc-total-price ">
 							<span class="total-price" id="total_price">Rs 0.00/-</span>
 						</span>
 					</span>
 				</div>
 			<?php
							} else if ($product_sub_category_name == 'bindings') {
				?>
 				<h4 class="font-weight-bold mt-0">Details</h4>
 				<div class="form-group row mt-1">
 					<label class="col-sm-3 col-form-label">Document Size</label>
 					<div class="col-sm-7">
 						<select class="form-select" id="paperTypetxt" onchange="fnBindingQuantity()">
 							<option value="0">Select</option>
 							<option value="5" Selected>A4</option>
 							<option value="6">A5</option>
 							<option value="7">A6</option>
 							<option value="custom">Custom</option>
 						</select>
 					</div>
 				</div>
 				<div class="form-group row mt-1">
 					<label class="col-sm-3 col-form-label">No. of Pages</label>
 					<div class="col-sm-7">
 						<input type="text" class="form-control" id="qtytxt" onchange="fnBindingQuantity()" /> (maximum 50 pages)
 					</div>
 				</div>
 				<div class="form-group row mt-1">
 					<label class="col-sm-3 col-form-label">Binding Location</label>
 					<div class="col-sm-3">
 						<input type="radio" class="form-check-input" name="bindlocTxt" checked=true value="1" onchange="fnBindingQuantity();">Side
 					</div>
 					<div class="col-sm-3">
 						<input type="radio" class="form-check-input" name="bindlocTxt" value="2" onchange="fnBindingQuantity();">Head
 					</div>
 				</div>
 				<div class="form-group row mt-1">
 					<label class="col-sm-3 col-form-label">Quantity</label>
 					<div class="col-sm-7">
 						<input type="text" class="form-control" id="qtytxt" onchange="fnBindingQuantity()" />
 					</div>
 				</div>
 				<div class="card-headerDiv mt-4">


 					<span class="calculator-heading">
 						<span class="calc-heading-text">Get Started</span>
 						<span class="calc-total-price ">
 							<span class="total-price" id="total_price">Rs 0.00/-</span>
 						</span>
 					</span>
 				</div>
 			<?php
							} else if ($product_code == 'danglers') {
				?>
 				<h4 class="font-weight-bold mt-0">Details</h4>
 				<div class="form-group row mt-1">
 					<label class="col-sm-3 col-form-label">Shape</label>
 					<div class="col-sm-7">
 						<select class="form-select" id="cuttingtxt" onchange="fnDanglersSize()">
 							<option value="0">Select</option>
 							<option value="3" Selected>Rectangle</option>
 							<option value="4">Square</option>
 							<option value="5">Circle</option>
 							<option value="-1">Custom</option>
 						</select>
 					</div>
 				</div>

 				<div class="form-group row mt-1">
 					<label class="col-sm-3 col-form-label">Size</label>
 					<div class="col-sm-7">
 						<select class="form-select" id="papersize" onchange="fnDanglersQuantity()">
 							<option value="0">Select</option>

 						</select>
 					</div>
 				</div>
 				<div class="form-group row mt-1">
 					<label class="col-sm-3 col-form-label">Print On</label>
 					<div class="col-sm-3">
 						<input type="radio" class="form-check-input" name="front_backtxt" checked=true value="1" onchange="fnCalcPrice3()">Front
 					</div>
 					<div class="col-sm-4">
 						<input type="radio" class="form-check-input" name="front_backtxt" value="2" onchange="fnCalcPrice3()">Front & Back
 					</div>
 				</div>
 				<div class="form-group row mt-1">
 					<label class="col-sm-3 col-form-label">Orientation</label>
 					<div class="col-sm-3">
 						<input type="radio" class="form-check-input" name="orientationTxt" checked=true value="1">Portrait
 					</div>
 					<div class="col-sm-4">
 						<input type="radio" class="form-check-input" name="orientationTxt" value="2">Landscape
 					</div>
 				</div>
 				<div class="form-group row mt-1">
 					<label class="col-sm-3 col-form-label">Quantity</label>
 					<div class="col-sm-7">
 						<select class="form-select" id="quantity1txt" onchange="fnCalcPrice3()">

 						</select>
 					</div>
 				</div>
 				<div class="card-headerDiv mt-4">


 					<span class="calculator-heading">
 						<span class="calc-heading-text">Get Started</span>
 						<span class="calc-total-price ">
 							<span class="total-price" id="total_price">Rs 0.00/-</span>
 						</span>
 					</span>
 				</div>
 			<?php

							} else if ($product_code == 'tabletents') {
				?>
 				<h4 class="font-weight-bold mt-0">Details</h4>
 				<div class="form-group row mt-1">
 					<label class="col-sm-3 col-form-label">Size</label>
 					<div class="col-sm-7">
 						<select class="form-select" id="papersize" onchange="fnTabletentsQuantity()">
 							<option value="0">Select</option>
 							<option value="5" Selected>A4</option>
 							<option value="6">A5</option>
 							<option value="16">A6</option>
 						</select>
 					</div>
 				</div>
 				<div class="form-group row mt-1">
 					<label class="col-sm-3 col-form-label">Orientation</label>
 					<div class="col-sm-3">
 						<input type="radio" class="form-check-input" name="orientationTxt" checked=true value="1">Portrait
 					</div>
 					<div class="col-sm-4">
 						<input type="radio" class="form-check-input" name="orientationTxt" value="2">Landscape
 					</div>
 				</div>
 				<div class="form-group row mt-1">
 					<label class="col-sm-3 col-form-label">Quantity</label>
 					<div class="col-sm-7">
 						<select class="form-select" id="quantity1txt" onchange="fnCalcPrice4()">

 						</select>
 					</div>
 				</div>
 				<div class="card-headerDiv mt-4">


 					<span class="calculator-heading">
 						<span class="calc-heading-text">Get Started</span>
 						<span class="calc-total-price ">
 							<span class="total-price" id="total_price">Rs 0.00/-</span>
 						</span>
 					</span>
 				</div>
 			<?php

							} else if ($product_code == 'black_and_white' || $product_code == 'colour') {
				?>
 				<h4 class="font-weight-bold mt-0">Details</h4>
 				<div class="form-group row mt-1">
 					<label class="col-sm-3 col-form-label">Size</label>
 					<div class="col-sm-7">
 						<select class="form-select" id="papersize">
 							<option value="0">Select</option>
 							<option value="5" Selected>A4</option>
 							<option value="6">A3</option>
 						</select>
 					</div>
 				</div>
 				<div class="form-group row mt-1">
 					<label class="col-sm-3 col-form-label">Print Location</label>
 					<div class="col-sm-3">
 						<input type="radio" class="form-check-input" name="front_backtxt" checked=true value="1">Front
 					</div>
 					<div class="col-sm-4">
 						<input type="radio" class="form-check-input" name="front_backtxt" value="2">Front & Back
 					</div>
 				</div>
 				<div class="form-group row mt-1">
 					<label class="col-sm-3 col-form-label">Orientation</label>
 					<div class="col-sm-3">
 						<input type="radio" class="form-check-input" name="orientationTxt" checked=true value="1">Portrait
 					</div>
 					<div class="col-sm-4">
 						<input type="radio" class="form-check-input" name="orientationTxt" value="2">Landscape
 					</div>
 				</div>
 				<div class="form-group row mt-1">
 					<label class="col-sm-3 col-form-label">Quantity</label>
 					<div class="col-sm-7">
 						<input type="text" class="form-control" id="quantity1txt" onchange="fnCalcPrice5()" />

 						</select>
 					</div>
 				</div>
 				<div class="card-headerDiv mt-4">


 					<span class="calculator-heading">
 						<span class="calc-heading-text">Get Started</span>
 						<span class="calc-total-price ">
 							<span class="total-price" id="total_price">Rs 0.00/-</span>
 						</span>
 					</span>
 				</div>
 			<?php
							} else if ($product_code == 'door_hangers' || $product_code == 'greeting_cards' || $product_code == 'thank_you_cards' || $product_code == 'tickets') {
				?>
 				<h4 class="font-weight-bold mt-0">Details</h4>
 				<div class="form-group row mt-1">
 					<label class="col-sm-3 col-form-label">Size</label>
 					<div class="col-sm-7">

 						<?php
								if ($product_code == 'door_hangers') {
							?>
 							<select class="form-select" id="papersize" onchange="fnDoorHangersQuantity()">
 								<option value="0">Select</option>
 								<option value="23" Selected>3.5x8.5 inches</option>
 								<option value="24">4.5x11 inches</option>
 							</select>
 					</div>
 				<?php
								} else if ($product_code == 'greeting_cards') {
					?>
 					<select class="form-select" id="papersize" onchange="fnGreetingCardsQuantity()">
 						<option value="0">Select</option>
 						<option value="5" Selected>A4</option>
 						<option value="6">A5</option>
 						<option value="16">A6</option>
 						<option value="25">A4 Folded</option>
 						<option value="26">A5 Folded</option>
 						<option value="27">A6 Folded</option>
 					</select>
 				</div>
 			<?php
								} else if ($product_code == 'thank_you_cards') {
				?>
 				<select class="form-select" id="papersize" onchange="fnThankyouCardsQuantity()">
 					<option value="0">Select</option>
 					<option value="6" Selected>A5</option>
 					<option value="16">A6</option>
 				</select>
 				</div>
 			<?php
								} else if ($product_code == 'tickets') {
				?>
 				<select class="form-select" id="papersize" onchange="fnTicketsQuantity()">
 					<option value="0">Select</option>
 					<option value="28" Selected>10x6 inches</option>
 					<option value="29">9x4 inches</option>
 					<option value="30">8x3 inches</option>
 				</select>
 			</div>
 		<?php
								}
			?>
 		</div>
 		<?php
								if ($product_code == 'tickets') {
			?>
 			<div class="form-group row mt-1">
 				<label class="col-sm-3 col-form-label">Print Material</label>
 				<div class="col-sm-3">
 					<input type="radio" class="form-check-input" name="print_materialtxt" checked=true value="130">130 GSM
 				</div>
 				<div class="col-sm-3">
 					<input type="radio" class="form-check-input" name="print_materialtxt" value="170">170 GSM
 				</div>
 				<div class="col-sm-3">
 					<input type="radio" class="form-check-input" name="print_materialtxt" value="300">300 GSM
 				</div>
 			</div>
 		<?php
								}
			?>
 		<div class="form-group row mt-1">
 			<label class="col-sm-3 col-form-label">Print Location</label>
 			<div class="col-sm-3">
 				<input type="radio" class="form-check-input" name="front_backtxt" checked=true value="1" onchange="fnCalcPrice4()">Front
 			</div>
 			<div class="col-sm-4">
 				<input type="radio" class="form-check-input" name="front_backtxt" value="2" onchange="fnCalcPrice4()">Front & Back
 			</div>
 		</div>
 		<?php
								if ($product_code == 'greeting_cards' || $product_code == 'thank_you_cards' || $product_code == 'tickets') {
			?>
 			<div class="form-group row mt-1">
 				<label class="col-sm-3 col-form-label">Orientation</label>
 				<div class="col-sm-3">
 					<input type="radio" class="form-check-input" name="orientationTxt" checked=true value="1">Portrait
 				</div>
 				<div class="col-sm-4">
 					<input type="radio" class="form-check-input" name="orientationTxt" value="2">Landscape
 				</div>
 			</div>
 		<?php
								}
			?>
 		<div class="form-group row mt-1">
 			<label class="col-sm-3 col-form-label">Quantity</label>
 			<div class="col-sm-7">
 				<select class="form-select" id="quantity1txt" onchange="fnCalcPrice4()">

 				</select>
 			</div>
 		</div>
 		<div class="card-headerDiv mt-4">


 			<span class="calculator-heading">
 				<span class="calc-heading-text">Get Started</span>
 				<span class="calc-total-price ">
 					<span class="total-price" id="total_price">Rs 0.00/-</span>
 				</span>
 			</span>
 		</div>
 	<?php

							}
		?>
 	<div class="product-description">
 		<div class="mt-4">
 			<h4 class="font-weight-bold">Description</h4>
 			<?php
				echo $product_desc;
				?>
 		</div>
 	</div>
 	</div>
 	<div class="card mt-2">

 	</div>
 	</div>

 	</div>
 	</div>
 	</div>
 </section>




 <script src='js/jquery_1_11_0.min.js'></script>
 <script src='js/lightslider.js'></script>
 <script>
 	$(document).ready(function() {
 		$('#fileUpload').on('change', function() {
 			var file = $(this)[0].files[0];
 			var formData = new FormData();
 			formData.append('fileUpload', file);

 			$.ajax({
 				url: 'file_upload.php',
 				type: 'POST',
 				data: formData,
 				contentType: false,
 				processData: false,
 				xhr: function() {
 					var xhr = new window.XMLHttpRequest();
 					xhr.upload.addEventListener('progress', function(event) {
 						if (event.lengthComputable) {
 							var percent = (event.loaded / event.total) * 100;
 							$('#progressBar').show().val(percent);
 							$('#uploadStatus').html(percent + '% uploaded');
 						}
 					}, false);
 					return xhr;
 				},
 				success: function(response) {
 					$('#uploadStatus').html(response);
 				},
 				error: function(xhr, status, error) {
 					$('#uploadStatus').html('Error occurred: ' + error);
 				}
 			});
 		});
 	});
 	$('#lightSlider').lightSlider({
 		gallery: true,
 		item: 1,
 		loop: true,
 		slideMargin: 0,
 		thumbItem: 9
 	});
 	var prod_code = "";
 	var arrQuantity = [];

 	$(document).ready(function() {
 		prod_code = $('#product_codetxt').val();
 		if (prod_code == "letter_heads") {
 			arrQuantity = [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 2000, 3000, 4000, 5000];
 		} else if (prod_code == "certificates") {
 			arrQuantity = [25, 50, 75, 100, 140, 200, 300, 400, 500, 1000, 2000];
 		} else if (prod_code == "id_cards") {
 			arrQuantity = ['50', '100', '200', 'Others'];
 		} else if (prod_code == "envelope_printing") {
 			arrQuantity = [25, 75, 100, 200, 300, 500, 750, 1000];
 		}
 		if (prod_code == "letter_heads" || prod_code == "certificates" || prod_code == "id_cards" || prod_code == "envelope_printing") {
 			$('#quantity1txt').empty();
 			$('#quantity1txt').append('<option value="0">Select</option>');
 			var selQty = 0;
 			for (var i = 0; i < arrQuantity.length; i++) {
 				$('#quantity1txt').append('<option value="' + arrQuantity[i] + '">' + arrQuantity[i] + '</option>');
 			}
 			$('#quantity1txt').val(selQty);
 		}
 		fnCardType();
 		fnChangeDimension();

 	});

 	function fnCardType() {
 		var selCardType = $('input[name="card_typetxt"]:checked').val();
 		if (selCardType == 1) {
 			$('.squareCls').hide();
 			$('.normalCls').show();
 		} else if (selCardType == 2) {
 			$('.squareCls').show();
 			$('.normalCls').hide();
 		} else if (selCardType == 3) {
 			$('.squareCls').show();
 			$('.normalCls').show();
 		}
 	}

 	function fnPostersQuantity() {
 		var selPaperType = $('#paperTypetxt').val();
 		switch (selPaperType) {
 			case '4':
 				arrQuantity = [2, 5, 10, 15, 20, 50, 100];
 				break;

 			case '5':
 				arrQuantity = [4, 10, 20, 30, 40, 100, 200];
 				break;

 			case '6':
 				arrQuantity = [8, 20, 40, 60, 80, 200, 400];
 				break;
 		}
 		loadQuantity();
 	}

 	function fnTabletentsQuantity() {
 		var selSize = $('#papersize').val();
 		if (selSize == '5' || selSize == '6' || selSize == '16') {
 			arrQuantity = [10, 20, 30, 50, 75, 100, 150, 200, 300, 400, 500, 1000];
 		}
 		loadQuantity();
 	}

 	function fnDoorHangersQuantity() {
 		var selSize = $('#papersize').val();
 		if (selSize == '23' || selSize == '24') {
 			arrQuantity = [24, 48, 72, 96, 120, 144, 168, 192, 216, 240, 264, 288];
 		}
 		loadQuantity();
 	}

 	function fnGreetingCardsQuantity() {
 		var selSize = $('#papersize').val();
 		arrQuantity = [10, 20, 30, 50, 75, 100, 150, 200, 300, 400, 500, 1000];
 		loadQuantity();
 	}

 	function fnThankyouCardsQuantity() {
 		var selSize = $('#papersize').val();
 		arrQuantity = [10, 20, 30, 50, 75, 100, 150, 200, 300, 400, 500, 1000];
 		loadQuantity();
 	}

 	function fnTicketsQuantity() {
 		var selSize = $('#papersize').val();
 		arrQuantity = [24, 48, 72, 96, 120, 144, 168, 192, 216, 240, 264, 288];
 		loadQuantity();
 	}

 	function fnDanglersQuantity() {
 		var selSize = $('#papersize').val();
 		if (selSize == '5' || selSize == '6' || selSize == '16') {
 			arrQuantity = [24, 32, 40, 48, 56, 64, 72, 80, 88];
 		} else if (selSize == '17' || selSize == '18' || selSize == '19' || selSize == '20') {
 			arrQuantity = [6, 18, 36, 54, 60, 78, 96, 128, 150, 180, 280];
 		} else if (selSize == '21') {
 			arrQuantity = [12, 36, 72, 108, 128, 156, 192, 280, 250, 360, 480];
 		} else if (selSize == '22') {
 			arrQuantity = [28, 72, 144, 216, 280, 312, 384, 480, 600, 728, 960];
 		}
 		loadQuantity();
 	}

 	function fnFlyersQuantity() {
 		var selPaperType = $('#paperTypetxt').val();
 		switch (selPaperType) {
 			case '5':
 				arrQuantity = [250, 500, 750, 1000, 1500, 2000, 3000, 4000, 5000];
 				break;

 			case '6':
 				arrQuantity = [250, 500, 750, 1000, 1500, 2000, 3000, 4000, 5000];
 				break;
 		}
 		loadQuantity();
 	}

 	function fnBrouchersQuantity() {
 		var selSize = $('#sizetxt').val();
 		switch (selSize) {
 			case '5':
 				arrQuantity = [100, 250, 500, 750, 1000, 1500, 2000, 3000, 4000, 5000];
 				break;

 			case '6':
 				arrQuantity = [100, 300, 500, 600, 1000, 1500, 2000, 3000, 4000, 5000];
 				break;
 		}
 		loadQuantity();
 	}

 	function fnBookmarksQuantity() {
 		var selPaperType = $('#paperTypetxt').val();
 		switch (selPaperType) {
 			case '13':
 				arrQuantity = [5, 10, 20, 50, 75, 100, -1];
 				break;

 			case '14':
 				arrQuantity = [5, 10, 20, 50, 75, 100, -1];
 				break;

 			case '15':
 				arrQuantity = [5, 10, 20, 50, 75, 100, -1];
 				break;
 		}
 		loadQuantity();
 	}

 	function fnLanyardsQuantity() {
 		var selPaperType = $('#paperTypetxt').val();
 		switch (selPaperType) {
 			case '7':
 				arrQuantity = [40, 60, 80, 100, 120, 140, 160, 180, 200, 240, 280, 320, 360, 400];
 				break;

 			case '8':
 				arrQuantity = [32, 48, 64, 80, 96, 112, 128, 144, 176, 208, 240, 272, 304, 336, 368, 400];
 				break;

 			case '9':
 				arrQuantity = [26, 52, 78, 104, 130, 156, 182, 208, 234, 260, 286, 312, 338, 364, 390, 416];
 				break;
 		}
 		loadQuantity();
 	}

 	function loadQuantity() {
 		$('#quantity1txt').empty();
 		$('#quantity1txt').append('<option value="0">Select</option>');
 		var selQty = 0;
 		for (var i = 0; i < arrQuantity.length; i++) {
 			if (arrQuantity[i] == -1) {
 				$('#quantity1txt').append('<option value="' + arrQuantity[i] + '">Others</option>');
 			} else {
 				$('#quantity1txt').append('<option value="' + arrQuantity[i] + '">' + arrQuantity[i] + '</option>');
 			}

 		}
 		$('#quantity1txt').val(0);
 	}

 	function fnBooklets() {
 		$('#total_price').text("Get Quote");
 	}

 	function fnBindingQuantity() {
 		$('#total_price').text("Get Quote");
 	}

 	function fnDanglersSize() {
 		var selCuttingType = $('#cuttingtxt').val();
 		var arrSize = [];
 		$('#papersize').empty();
 		$('#papersize').append('<option value="0">Select</option>');
 		switch (selCuttingType) {
 			case '3':
 				$('#papersize').append('<option value="5">A4</option>');
 				$('#papersize').append('<option value="6">A5</option>');
 				$('#papersize').append('<option value="16">A6</option>');
 				break;

 			case '4':
 				$('#papersize').append('<option value="17">6x6 inch</option>');
 				$('#papersize').append('<option value="18">4x4 inch</option>');
 				$('#papersize').append('<option value="19">3x3 inch</option>');
 				break;

 			case '5':
 				$('#papersize').append('<option value="20">6 inch dia</option>');
 				$('#papersize').append('<option value="21">4 inch dia</option>');
 				$('#papersize').append('<option value="22">3 inch dia</option>');
 				break;
 		}
 	}

 	function fnCalcPrice4() {
 		var qty = $('#quantity1txt').val();
 		var pId = $('#product_id').val();
 		var pCode = $('#product_codetxt').val();
 		var paperType = $('#paperTypetxt').val();
 		var size = $('#sizetxt').val();
 		var orientation = $('input[name="orientationTxt"]:checked').val(); //$('#orientationTxt').val();	
 		var folding = $('input[name="foldingTxt"]:checked').val(); //$('#foldingTxt').val();	
 		var customerType = $('input[name="customerTypetxt"]:checked').val();
 		var frontback = $('input[name="front_backtxt"]:checked').val();
 		if (pCode == 'tabletents') {
 			folding = -1;
 			paperType = -1;
 			size = $('#papersize').val();
 			customerType = 1;
 		} else if (pCode == 'door_hangers') {
 			folding = -1;
 			paperType = -1;
 			size = $('#papersize').val();
 			customerType = 1;
 			if (frontback == 2) {
 				$('#total_price').text("Get Quote");
 				return;
 			}
 			if (frontback == undefined || frontback == 0) {
 				//alert('Select Print On');
 				return false;
 			}
 		} else if (pCode == 'greeting_cards' || pCode == 'thank_you_cards' || pCode == 'tickets') {
 			folding = -1;
 			paperType = -1;
 			size = $('#papersize').val();
 			customerType = 1;
 			orientation = 0;
 			if (frontback == 2) {
 				$('#total_price').text("Get Quote");
 				return;
 			}
 			if (frontback == undefined || frontback == 0) {
 				//alert('Select Print On');
 				return false;
 			}
 			if (orientation == undefined || orientation == 0) {
 				orientation = 0;
 			}
 		}
 		if (orientation == undefined || orientation == 0) {
 			orientation = 0;
 		}
 		if (folding == undefined || folding == 0) {
 			//alert('Select Folding');
 			return false;
 		}
 		if (folding != 1 && folding != -1) {
 			$('#total_price').text("Get Quote");
 			return;
 		}
 		if (qty == undefined || qty == 0) {
 			//alert('Select Quantity');
 			return false;
 		}

 		$.ajax({
 			type: "GET",
 			url: "calc_price4.php",
 			data: {
 				pId: pId,
 				qty: qty,
 				paperType: paperType,
 				size: size,
 				orientation: orientation,
 				folding: folding,
 				customerType: customerType
 			},
 			success: function(response) {
 				if (response != "0") {
 					$('#total_price').text("Rs. " + response + "/-");
 				} else {
 					$('#total_price').text("Rs. 0.00/-");
 				}
 			}
 		});
 	}

 	function fnCalcPrice5() {
 		var pId = $('#product_id').val();
 		var pCode = $('#product_codetxt').val();
 		var qty = $('#quantity1txt').val();
 		var frontback = $('input[name="front_backtxt"]:checked').val();
 		var papersize = $('#papersize').val();
 		if (qty == undefined || qty == 0) {
 			//alert('Select Quantity');
 			return false;
 		}
 		if (frontback == undefined || frontback == 0) {
 			//alert('Select Print on');
 			return false;
 		}
 		if (frontback == undefined || frontback == 0) {
 			//alert('Select Print on');
 			return false;
 		}
 		var amt = 0;
 		if (pId == 86) {
 			if (qty < 25) {
 				//alert('Quantity minimum value is 25/-');
 				return false;
 			} else if (qty >= 25 && qty <= 200) {
 				if (papersize == 5 && frontback == 1) {
 					amt = parseFloat(qty) * 1.5;
 				} else if (papersize == 5 && frontback == 2) {
 					amt = parseFloat(qty) * 2;
 				}

 				if (papersize == 3 && frontback == 1) {
 					amt = parseFloat(qty) * 3;
 				} else if (papersize == 3 && frontback == 2) {
 					amt = parseFloat(qty) * 4;
 				}
 			} else if (qty > 201 && qty <= 500) {
 				if (papersize == 5 && frontback == 1) {
 					amt = parseFloat(qty) * 1;
 				} else if (papersize == 5 && frontback == 2) {
 					amt = parseFloat(qty) * 1.5;
 				}

 				if (papersize == 3 && frontback == 1) {
 					amt = parseFloat(qty) * 2;
 				} else if (papersize == 3 && frontback == 2) {
 					amt = parseFloat(qty) * 3;
 				}
 			} else if (qty > 500) {
 				$('#total_price').text("Get Quote");
 				return;
 			}
 		} else if (pId == 88) {
 			if (qty < 25) {
 				//alert('Quantity minimum value is 25/-');
 				return false;
 			} else if (qty >= 25 && qty <= 200) {
 				if (papersize == 5 && frontback == 1) {
 					amt = parseFloat(qty) * 7;
 				} else if (papersize == 5 && frontback == 2) {
 					amt = parseFloat(qty) * 10;
 				}

 				if (papersize == 3 && frontback == 1) {
 					amt = parseFloat(qty) * 10;
 				} else if (papersize == 3 && frontback == 2) {
 					amt = parseFloat(qty) * 15;
 				}
 			} else if (qty > 201 && qty <= 500) {
 				if (papersize == 5 && frontback == 1) {
 					amt = parseFloat(qty) * 5;
 				} else if (papersize == 5 && frontback == 2) {
 					amt = parseFloat(qty) * 8;
 				}

 				if (papersize == 3 && frontback == 1) {
 					amt = parseFloat(qty) * 9;
 				} else if (papersize == 3 && frontback == 2) {
 					amt = parseFloat(qty) * 13;
 				}
 			} else if (qty > 500) {
 				$('#total_price').text("Get Quote");
 				return;
 			}
 		}
 		if (amt != "0") {
 			$('#total_price').text("Rs. " + amt + "/-");
 		} else {
 			$('#total_price').text("Rs. 0.00/-");
 		}

 	}

 	function fnCalcPrice3() {
 		var qty = $('#quantity1txt').val();
 		var pId = $('#product_id').val();
 		var pCode = $('#product_codetxt').val();
 		var cutting = $('#cuttingtxt').val();
 		var papersize = $('#papersize').val();
 		var frontback = $('input[name="front_backtxt"]:checked').val();
 		//var customerType = $('input[name="customerTypetxt"]:checked').val();
 		if (cutting == -1) {
 			$('#total_price').text("Get Quote");

 			return;
 		}
 		if (qty == undefined || qty == 0) {
 			//alert('Select Quantity');
 			return false;
 		}
 		if (frontback == undefined || frontback == 0) {
 			//alert('Select Print on');
 			return false;
 		}
 		if (frontback == 2 || cutting == -1) {
 			$('#total_price').text("Get Quote");
 			return;
 		}
 		$.ajax({
 			type: "GET",
 			url: "calc_price3.php",
 			data: {
 				pId: pId,
 				qty: qty,
 				cutting: cutting,
 				papersize: papersize,
 				frontback: frontback
 			},
 			//,customerType:customerType
 			success: function(response) {
 				if (response != "0") {
 					$('#total_price').text("Rs. " + response + "/-");
 				} else {
 					$('#total_price').text("Rs. 0.00/-");
 				}
 			}
 		});
 	}

 	function fnCalcPrice2() {
 		var qty = $('#quantity1txt').val();
 		var pId = $('#product_id').val();
 		var pCode = $('#product_codetxt').val();
 		var paperType = $('#paperTypetxt').val();
 		var arrAmt = [850, 1600, 3000, 0];
 		var front_backtxt = $('input[name="front_backtxt"]:checked').val();
 		var customerType = $('input[name="customerTypetxt"]:checked').val();
 		if (qty == undefined || qty == 0) {
 			//alert('Select Quantity');
 			return false;
 		}
 		if (front_backtxt == undefined || front_backtxt == 0) {
 			//alert('Select Print on');
 			return false;
 		}
 		var selQtyIndex = arrQuantity.indexOf(qty);
 		var amount = arrAmt[selQtyIndex];
 		if (amount != "0" && front_backtxt == 1) {
 			$('#total_price').text("Rs. " + amount + "/-");
 		} else {
 			$('#total_price').text("Get Quote");
 		}
 	}

 	function fnCalcPrice1() {
 		var qty = $('#quantity1txt').val();
 		var pId = $('#product_id').val();
 		var pCode = $('#product_codetxt').val();
 		var paperType = "";
 		var customerType = $('input[name="customerTypetxt"]:checked').val();
 		var front_backtxt = $('input[name="front_backtxt"]:checked').val();
 		if (qty == undefined || qty == 0) {
 			//alert('Select Quantity');
 			return false;
 		}

 		if (pCode == "posters" || pCode == "flyers" || pCode == "lanyards") {
 			paperType = $('#paperTypetxt').val();
 		} else if (pCode == "id_cards") {
 			fnCalcPrice2();
 			return;
 		} else if (pCode == "brochures" || pCode == "catalogs") {
 			fnCalcPrice4();
 			return;
 		} else if (pCode == "envelope_printing") {
 			$('#total_price').text("Get Quote");
 			return;
 		}
 		if (pCode == "bookmarks") {
 			if (front_backtxt == undefined || qty == 0) {
 				//alert('Select Print On');
 				return false;
 			}

 			if (front_backtxt == 2 || qty == "-1") {
 				$('#total_price').text("Get Quote");
 				return;
 			}

 		}
 		$.ajax({
 			type: "GET",
 			url: "calc_price1.php",
 			data: {
 				pId: pId,
 				qty: qty,
 				paperType: paperType,
 				customerType: customerType
 			},
 			success: function(response) {
 				if (response != "0") {
 					$('#total_price').text("Rs. " + response + "/-");
 				} else {
 					$('#total_price').text("Rs. 0.00/-");
 				}
 			}
 		});
 	}

 	function fnChangeDimension() {
 		var selId = $('input[name="dimensiontxt"]:checked').val(); //$('#dimensiontxt').val();
 		var arr = [];
 		if (selId == 1) {
 			arr = [90, 210, 300, 390, 510, 990, 1980, 3000, 3990, 4980];
 		} else if (selId == 2) {
 			arr = [100, 200, 300, 400, 500, 1000, 2000, 3000, 4000, 5000];
 		} else if (selId == 31) {
 			arr = [96, 192, 288, 384, 504, 1968, 3000, 3984, 4968];
 		}
 		$('#quantitytxt').empty();
 		$('#quantitytxt').append('<option value="0">Select</option>');
 		var selQty = 0;
 		for (var i = 0; i < arr.length; i++) {
 			if (i == 0)
 				selQty = arr[i];

 			$('#quantitytxt').append('<option value="' + arr[i] + '">' + arr[i] + '</option>');
 		}
 		$('#quantitytxt').val(selQty);
 		fnCalcPrice();
 	}

 	function fnCalcPrice() {
 		var pId = $('#product_id').val();
 		var customerType = $('input[name="customerTypetxt"]:checked').val(); //$('#dimensiontxt').val();
 		var papersize = $('input[name="dimensiontxt"]:checked').val(); //$('#dimensiontxt').val();
 		var cardType = $('input[name="card_typetxt"]:checked').val(); //$('#dimensiontxt').val();
 		var cutting = $('input[name="cuttingtxt"]:checked').val(); //$('#cuttingtxt').val();
 		var frontback = $('input[name="front_backtxt"]:checked').val(); //$('#front_backtxt').val();
 		var qty = $('#quantitytxt').val();
 		if (papersize == undefined || papersize == 0) {
 			//alert('Select Dimension');
 			return false;
 		}
 		if (qty == undefined || qty == 0) {
 			//alert('Select Quantity');
 			return false;
 		}
 		if (cutting == undefined || cutting == 0) {
 			//alert('Select Cutting');
 			return false;
 		}
 		/*if(pId == 19 || pId == 20)
 		{
 			if(frontback==undefined || frontback==0)
 			{
 				alert('Select Front/Black');
 				return false;
 			}
 		}
 		else
 		{
 			frontback=0;
 		}*/
 		if (pId == 19 || pId == 20) {
 			cardType = 0;
 		}
 		if (frontback == undefined || frontback == 0) {
 			//alert('Select Front/Black');
 			return false;
 		}
 		$.ajax({
 			type: "GET",
 			url: "calc_price.php",
 			data: {
 				pId: pId,
 				papersize: papersize,
 				cutting: cutting,
 				frontback: frontback,
 				qty: qty,
 				cardType: cardType,
 				customerType: customerType
 			},
 			success: function(response) {
 				if (response != "0") {
 					$('#total_price').text("Rs. " + response + "/-");
 				} else {
 					$('#total_price').text("Rs. 0.00/-");
 				}
 			}
 		});
 	}
 </script>

 <?php
	include "footer.php";
	?>