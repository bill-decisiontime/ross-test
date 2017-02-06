<!--
This is the Controller for showing a shpping cart. Unfortunately the tutorial was too vague
to fix the problems within a short period of time. I have therefore found a better tutorial
and started working for it. It was written using a CodeIgnitor tutorial found here:-
https://codeigniter.com/userguide2/libraries/cart.html.
-->

<?php
    class CartController extends CiController{
        public function cartFun(){
            $this->load->library('cart');

            $data = array(
                        array(
                                'id'      => 'sku_123ABC',
                                'qty'     => 1,
                                'price'   => 39.95,
                                'name'    => 'T-Shirt',
                                'options' => array('Size' => 'L', 'Color' => 'Red')
                             ),
                        array(
                                'id'      => 'sku_567ZYX',
                                'qty'     => 1,
                                'price'   => 9.95,
                                'name'    => 'Coffee Mug'
                             ),
                        array(
                                'id'      => 'sku_965QRS',
                                'qty'     => 1,
                                'price'   => 29.95,
                                'name'    => 'Shot Glass'
                             )
                         );

            $this->cart->insert($data);
            $this->load->view('ShoppingCart/CartView');

        }
    }
