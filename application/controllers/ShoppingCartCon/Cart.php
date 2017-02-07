<!-- This is the controller for the Shopping Cart Tutorial, it has various functions
to control the basket. The tutorial can be found here:-
https://code.tutsplus.com/articles/how-to-build-a-shopping-cart-using-codeigniter-and-jquery--net-8187 -->

<?php

    class Cart extends CI_Controller
    {

        function __construct()
        {
            parent::__construct(); // We define the the Controller class is the parent.
            $this->load->model('ShoppingCart/Cart_Model'); // Load our cart model for our entire class
        }

        function index()
        {
            $data['products'] = $this->Cart_Model->retrieve_products(); // Retrieve an array with all product
            //print_r($data['products']); // Print out the array to see if it works (Remove this line when done testing)

            $data['content'] = 'ShoppingCart/products'; // Select our view file that will display our products
            $this->load->view('index', $data); // Display the page with the above defined content
        }

        function add_cart_item(){

            if($this->Cart_Model->validate_add_cart_item() == TRUE){

                // Check if user has javascript enabled
                if($this->input->post('ajax') != '1'){
                    redirect('ShoppingCartCon/cart'); // If javascript is not enabled, reload the page with new data
                }else{
                    echo 'true'; // If javascript is enabled, return true, so the cart gets updated
                }
            }
        }

        function show_cart(){
            $this->load->views('ShoppingCart/cart');
        }

        function update_cart(){
            $this->Cart_Model->validate_update_cart();
            redirect('ShoppingCartCon/cart');
        }

        function empty_cart(){
            $this->cart->destroy(); // Destroy all cart data
            redirect('ShoppingCartCon/cart'); // Refresh te page
        }
    }
