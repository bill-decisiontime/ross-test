//This is the code for the JavaScript features in the Shopping Cart Tutorial, The tutorial can be found here:- 
//https://code.tutsplus.com/articles/how-to-build-a-shopping-cart-using-codeigniter-and-jquery--net-8187 -->

$(document).ready(function() {
		/*place jQuery actions here*/
		var link = "/tutorials/CodeIgniter_Shopping_Cart/demo/index.php/"; // Url to your application (including index.php/)

		$("ul.products form").submit(function() {
			// Get the product ID and the quantity
			var id = $(this).find('input[name=product_id]').val();
			var qty = $(this).find('input[name=quantity]').val();

			$.post(link + "ShoppingCartCon/cart/add_cart_item", { product_id: id, quantity: qty, ajax: '1' },
  				function(data){

 		 			if(data == 'true'){

    					$.get(link + "ShoppingCartCon/cart/show_cart", function(cart){ // Get the contents of the url cart/show_cart
  							$("#cart_content").html(cart); // Replace the information in the div #cart_content with the retrieved data
						});

 		 			}else{
 		 				alert("Product does not exist");
 		 			}
 			 });
		});
	});

	$(".empty").live("click", function(){
		$.get(link + "ShoppingCartCon/cart/empty_cart", function(){
			$.get(link + "ShoppingCartCon/cart/show_cart", function(cart){
				$("#cart_content").html(cart);
			});
		});

		return false;
	});
