function fnAddToCart()
{
	var totalPrice = $('#total_price').text();	
	var product_details = $('#product_details').val();
	var arrProductDetails = product_details.split('~');
	var qty = $('#quantitytxt').val();
	var paperType = $('#paperTypetxt').val();
	var size = $('#sizetxt :selected').text();
	var dimension = $('input[name="dimensiontxt"]:checked').val();
	var cutting = $('input[name="cuttingtxt"]:checked').val();
	var front_back = $('input[name="front_backtxt"]:checked').val();
	var orientation = $('input[name="orientationTxt"]:checked').val();
	var folding = $('input[name="foldingTxt"]:checked').val();
	if (typeof cutting === "undefined") {
		cutting = "";
	}
	if (typeof front_back === "undefined") {
		front_back = "";
	} 
	if (typeof orientation === "undefined") {
		orientation = "";
	} 
	if (typeof dimension === "undefined") {
		dimension = "";
	}  
	if (typeof folding === "undefined") {
		folding = "";
	} 	
	if (typeof qty === "undefined") {
		qty = "";
	} 	
	totalPrice = totalPrice.replace("Rs.","");
	totalPrice = totalPrice.replace("Rs","");
	totalPrice = totalPrice.replace("/-","");
//alert(totalPrice + "-" + parseInt(totalPrice));
	if(parseInt(totalPrice) < 1)
	{
		alert('Select filters');
		return false;
	}
	storeCartItems(arrProductDetails[0],arrProductDetails[3],totalPrice,qty,dimension,cutting,front_back,orientation,folding,paperType,size,arrProductDetails[1],arrProductDetails[2],arrProductDetails[4]);
    show_added_2_cart();
	alert("Product Added to Cart");
}
function storeCartItems(product_id,pr_name,pr_price,qty,dimension,cutting,front_back,orientation,folding,paperType,size,product_category,product_sub_category,product_code)
{ 
    var total_qty= 0 ;      
    var arrCartItems = JSON.parse(localStorage.getItem("CartItems") || "[]");
    var chkProduct = "";

		chkProduct = arrCartItems.findIndex(o => o.product_id ==  product_id);
    if(typeof(chkProduct) !== "undefined" && chkProduct !== null && chkProduct >= 0)
    { 
        arrCartItems[chkProduct]["product_price"] = pr_price;
        arrCartItems[chkProduct]["product_qty"] = qty; 
        arrCartItems[chkProduct]["product_dimensions"] = dimension;
        arrCartItems[chkProduct]["product_cutting"] = cutting;
        arrCartItems[chkProduct]["product_front_back"] = front_back;
        arrCartItems[chkProduct]["product_orientation"] = orientation;
        arrCartItems[chkProduct]["product_folding"] = folding;
        arrCartItems[chkProduct]["product_paperType"] = paperType;
        arrCartItems[chkProduct]["product_size"] = size; 
        arrCartItems[chkProduct]["product_category"] = product_category; 
        arrCartItems[chkProduct]["product_sub_category"] = product_sub_category; 
        arrCartItems[chkProduct]["product_code"] = product_code; 
    }
    else
    {
        var obj = {};
        obj["product_id"] = product_id;
        obj["product_name"] = pr_name;
        obj["product_price"] = pr_price;
        obj["product_qty"] = qty; 
        obj["product_dimensions"] = dimension;
        obj["product_cutting"] = cutting;
        obj["product_front_back"] = front_back;
        obj["product_orientation"] = orientation;
        obj["product_folding"] = folding;
        obj["product_paperType"] = paperType;
        obj["product_size"] = size; 
        obj["product_category"] = product_category; 
        obj["product_sub_category"] = product_sub_category; 
        obj["product_code"] = product_code; 
        arrCartItems.push(obj);
    }
    for(var j=0;j<arrCartItems.length;j++)
    {
        total_qty=parseInt(total_qty) + 1;
    }
    
    $('.cart_qty').text(total_qty);
    localStorage.setItem("CartItems", JSON.stringify(arrCartItems)); 
}

function loadProductsInViewCart()
{ 
    var arrCartItems = JSON.parse(localStorage.getItem("CartItems") || "[]");
    $result="";
    $result= $result+ '<table id="cart" class="table table-hover table-condensed">';
    $result= $result+ '<thead>';
    $result= $result+ '<tr>';
    $result= $result+ '<th style="width:60%">Product</th>'; 
    $result= $result+ '<th style="width:10%">Quantity</th>';
    $result= $result+ '<th style="width:15%" class="text-center">Price(Rs.)</th>';
    $result= $result+ '<th style="width:15%"></th>';
    $result= $result+ '</tr>';
    $result= $result+ '</thead>';
    $result= $result+ '<tbody> ';
    var total=0;    
    if (typeof arrCartItems !== 'undefined' && arrCartItems.length > 0) 
    {
        //debugger;
        for(var i=0;i< arrCartItems.length;i++)
        {
            $result= $result+ '<tr>';
            $result= $result+ '<td data-th="Product" >';
            $result= $result+ '<div class="row">';
            var product_id = arrCartItems[i]['product_id'];
            if(product_id<10)
            {
                product_id='0'+ product_id;
            } 
            $result= $result+ '<div class="col-sm-2 hidden-xs"><img src="products/'+arrCartItems[i]['product_category']+'/'+ arrCartItems[i]['product_sub_category']+'/'+arrCartItems[i]['product_code']+'/1.jpg" alt="..." class="img-responsive" style="width:50px;"/></div>';
            $result= $result+ '<div class="col-sm-10">';
            $result= $result+ '<h4 class="nomargin" id="'+arrCartItems[i]['product_id']+'_ItemName">'+arrCartItems[i]['product_name']+'</h4>';
            
            $result= $result+ '</div>';
            $result= $result+ '</div>';
            $result= $result+ '</td>';
            //$result= $result+ '<td data-th="Price" id="'+arrCartItems[i]['product_id']+'_ItemPrice">'+arrCartItems[i]['product_price']+'/-</td>';
            $result= $result+ '<td data-th="Quantity" >';
            $result= $result  +arrCartItems[i]['product_qty']+'</td>';
            var subTotal=0;
            var qty = arrCartItems[i]['product_qty'];
            var price = arrCartItems[i]['product_price'];
            price = price.replace("Rs.", "");
            price = price.replace("/-", "");
             
			subTotal = parseInt(price); //parseInt(qty)*parseInt(price);
            total=total + subTotal;
            $result= $result+ '<td data-th="Subtotal" class="text-center"  id="'+arrCartItems[i]['product_id']+'_ItemSubtotal">'+subTotal+'/-</td>';
            $result= $result+ '<td class="actions" data-th="" >';
            //$result= $result+ '<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>';
            $result= $result+ '<button onclick="fnDelCartItem('+arrCartItems[i]['product_id']+')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>';
            $result= $result+ '</td>';
            $result= $result+ '</tr>';
        }
    }
      
    $result= $result+ '</tbody>';
    /*$result= $result+ '<tfoot>';
    $result= $result+ '<tr class="visible-xs">';
    $result= $result+ '<td class="text-center"><strong>Total <span class="totVal">'+total+'</span></strong></td>';
    $result= $result+ '</tr>';*/
    $result= $result+ '<tr>';
    $result= $result+ '<td><a href="products_list_details.php?pc_name=business" class="btn btn-warning"  ><i class="fa fa-angle-left"></i> Continue Shopping</a></td>';
    $result= $result+ '<td class="hidden-xs"></td>';
    $result= $result+ '<td class="hidden-xs text-center"><strong>Total <span class="totVal">'+total+'</span></strong></td>';
    $result= $result+ '<td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>';
    $result= $result+ '</tr>';
    $result= $result+ '</tfoot>';
    $result= $result+ '<table>';
    
    $('#viewCartDiv').html($result);
    $('.ItemQtyCls').change(function(){
          
          var selId =$(this).attr('id');
          var product_id = selId.replace("_ItemQty", "");
          var qty = $('#' +selId).val();
          var itemPrice = $('#' +product_id + '_ItemPrice').html();
          var pr_price = itemPrice;
          var pr_name = $('#' +product_id + '_ItemName').html();
          itemPrice = itemPrice.replace("Rs.", "");
          itemPrice = itemPrice.replace("/-", "");
          var subTot = parseInt(qty)*parseInt(itemPrice);
          $('#' + product_id + '_ItemSubtotal').text(subTot);
          storeCartItems(product_id,pr_name,pr_price,qty);
          var arrCartItems = JSON.parse(localStorage.getItem("CartItems") || "[]");
          var total_price =0;
          for(var j=0;j<arrCartItems.length;j++)
          {
            var tempPrice = arrCartItems[j]["product_price"];
            tempPrice = tempPrice.replace("Rs.", "");
            tempPrice = tempPrice.replace("/-", "");
            total_price= parseInt(total_price) + (parseInt(tempPrice) * parseInt(arrCartItems[j]["product_qty"]));
          }
          $('.totVal').text(total_price);
    });
}

function loadCheckOutDetails()
{
    var arrCartItems = JSON.parse(localStorage.getItem("CartItems") || "[]");
	var no_of_products =0;
	if(arrCartItems.length>0)
		no_of_products = (arrCartItems.length)-1;
    $result="";
    $result= $result+ '<h4 class="d-flex justify-content-between align-items-center mb-3">';
    $result= $result+ '<span class="text-muted">Your cart</span>';
    $result= $result+ '<span class="badge badge-secondary badge-pill" id="no_of_productstxt">'+arrCartItems.length+'</span>';
    $result= $result+ '</h4>';
    $result= $result+ '<ul class="list-group mb-3" id="productLst">';
    if (typeof arrCartItems !== 'undefined' && arrCartItems.length > 0) 
    {
        var total=0;
        for(var i=0;i< arrCartItems.length;i++)
        {
            $result= $result+ '<li class="list-group-item d-flex justify-content-between lh-condensed">';
            $result= $result+ '<div>';
            $result= $result+ '<h6 class="my-0">'+arrCartItems[i]['product_name']+'</h6>';
             $result= $result+ '<small class="text-muted">Quantity : '+arrCartItems[i]['product_qty']+'</small>';
             
            $result= $result+ '</div>';
            var subTotal=0;
            var qty = arrCartItems[i]['product_qty'];
            var price = arrCartItems[i]['product_price'];
            price = price.replace("Rs.", "");
            price = price.replace("/-", "");            
            subTotal = 1*parseInt(price);
            total=total + subTotal;
            $result= $result+ '<span class="text-muted">'+subTotal+'</span>';
            $result= $result+ '</li>';
        }   
     
    }
    $result= $result+ '<li class="list-group-item d-flex justify-content-between">';
    $result= $result+ '<h6 class="my-0">Total (Rs.)</h6>';
    $result= $result+ '<strong><span id="net_amounttxt">'+total+'</span></strong>';
    $result= $result+ '</li>';
    $result= $result+ '</ul>';
    $('#checkoutDiv').html($result);    
}


function fnSaveCheckoutDetails()
{ 
        var purchase_request_type = $('#purchase_request_type').val();
        var customer_name = $('#customer_nametxt').val();
        var address_details = $('#address_detailstxt').val();
        var city = $('#citytxt').val();
        var state = $('#statetxt').val();
        var pincode = $('#pincodetxt').val();
        var mobile_no = $('#mobile_notxt').val();
        var email_id = $('#email_idtxt').val();
        var pass_word = $('#pass_wordtxt').val();
        var payment_details = "gpay";
        var net_amount = $('#net_amounttxt').text();
        var no_of_products = $('#no_of_productstxt').val();
        var delivery_customer_name = $('#delivery_customer_nametxt').val();
        var delivery_address_details = $('#delivery_address_detailstxt').val();
        var delivery_city = $('#delivery_citytxt').val();
        var delivery_state = $('#delivery_statetxt').val();
        var delivery_pincode = $('#delivery_pincodetxt').val();         
        
        if(customer_name == "" || customer_name == null)
        {    
            $('#errMsg').text('Enter Customer Name');  
            return;
        }
        if(address_details == "" || address_details == null)
        {    
            $('#errMsg').text('Enter Address');  
            return;
        }
        if(city == "" || city == null)
        {    
            $('#errMsg').text('Enter City');  
            return;
        }
        if(state == "" || state == null)
        {    
            $('#errMsg').text('Enter State');  
            return;
        }
        if(pincode == "" || pincode == null)
        {    
            $('#errMsg').text('Enter Pincode');  
            return;
        }
        if(delivery_customer_name == "" || delivery_customer_name == null)
        {    
            $('#errMsg').text('Enter Delivery Customer Name');  
            return;
        }
        if(delivery_address_details == "" || delivery_address_details == null)
        {    
            $('#errMsg').text('Enter Delivery Address');  
            return;
        }
        if(delivery_city == "" || delivery_city == null)
        {    
            $('#errMsg').text('Enter Delivery City');  
            return;
        }
        if(delivery_state == "" || delivery_state == null)
        {    
            $('#errMsg').text('Enter Delivery State');  
            return;
        }
        if(delivery_pincode == "" || delivery_pincode == null)
        {    
            $('#errMsg').text('Enter Delivery Pincode');  
            return;
        }
        if(mobile_no == "" || mobile_no == null)
        {    
            $('#errMsg').text('Enter Mobile No');  
            return;
        } 
        if(!$('#termsChk').is(":checked"))
        {
            $('#errMsg').text('Accept Terms & Conditions');  
            return;
        }
    
    var product_details="";
    var arrCartItems = JSON.parse(localStorage.getItem("CartItems") || "[]");
    if (typeof arrCartItems !== 'undefined' && arrCartItems.length > 0) 
    {
        var total=0;
        for(var i=0;i< arrCartItems.length;i++)
        {
            var subTotal=0;
            var qty = arrCartItems[i]['product_qty'];
            var price = arrCartItems[i]['product_price'];
            var desc = "";
            
            price = price.replace("Rs.", "");
            price = price.replace("/-", "");   
            subTotal = 1*parseInt(price);
            
            product_details =product_details + arrCartItems[i]['product_id'] + '~' + qty + '~' + price + '~' + subTotal + '~' + desc +  '^' ;
        }        
    }
    
    $.ajax({
        type: 'POST',
        url: 'save_purchase_request.php',
        data:{ purchase_request_type:purchase_request_type,customer_nametxt: customer_name,address_detailstxt:address_details,citytxt:city,statetxt:state,pincodetxt:pincode,mobile_notxt:mobile_no,email_idtxt:email_id,pass_wordtxt:pass_word,payment_detailstxt:payment_details,net_amounttxt:net_amount,no_of_productstxt:no_of_products, product_details : product_details 
            ,delivery_customer_nametxt: delivery_customer_name,delivery_address_detailstxt:delivery_address_details,delivery_citytxt:delivery_city,delivery_statetxt:delivery_state,delivery_pincodetxt:delivery_pincode
        },
        async:false, 
        success: function(response) { 
            if(response.includes("success"))
            { 			
                alert('Successfully Updated. ');  
                localStorage.removeItem("CartItems");
                $('.cart_qty').text("0");
				window.location.href = 'purchase_request.php';
            }
            else
            {
                $('#errMsg').text(response);
            }
        },
    });
}

function fnSaveGPayDetails()
{
	var pr_id= $('#prtxt').val();
	var trans_details = $('#transaction_detailsTxt').val();
	if(trans_details =="" || trans_details==null)
	{
		alert("Enter Transaction Details!!!");
		return false;
	}
	$.ajax({
        type: 'POST',
        url: 'save_pr_transaction_details.php',
        data:{ pr_id: pr_id,trans_details:trans_details },
        async:false, 
        success: function(response) { 
            if(response == "Success" )
            { 			
                alert('Successfully Updated. ');  
                $('#prDiv').hide(); 
                $('#pr_success_Div').show(); 
            }
            else
            {
                $('#errMsg').text(response);
				$('#pr_success_Div').hide();
				$('#prDiv').show();
            }
        },
    });
}