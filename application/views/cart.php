<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ONLINE FOOD ORDERING</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>a/css/components.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>a/css/responsee.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>a/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>a/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>a/views/css/lightcase.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>a/views/css/template-style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">

    <script type="text/javascript">
    // To conform clear all data in cart.
    function clear_cart() {
    var result = confirm('Are you sure want to clear all bookings?');

    if (result) {
      window.location = "<?php echo base_url(); ?>index.php/user_authentication/clearcart";
    } else {
      return false; // cancel button
    }
    }
    </script>


    <script type="text/javascript" src="<?php echo base_url() ?>a/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/jquery-ui.min.js"></script>    
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/responsee.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/validation.js"></script> 

  </head>
  
  
  <body class="size-1140">
  
    <!-- HEADER -->
    <header role="banner">    
      <!-- Top Bar -->
      <div class="top-bar background-white">
        <div class="line">
          <div class="s-12 m-6 l-6">
            
          </div>
          <div class="s-12 m-6 l-6">
            <div class="right">
              <ul class="top-bar-social right">
                <li><a href="/"><i class="icon-facebook_circle text-orange-hover"></i></a></li>
                <li><a href="/"><i class="icon-twitter_circle text-orange-hover"></i></a> </li>
                <li><a href="/"><i class="icon-google_plus_circle text-orange-hover"></i></a></li>
                <li><a href="/"><i class="icon-instagram_circle text-orange-hover"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
       <!-- Top Navigation -->
      <nav class="background-white background-primary-hightlight">
        <div class="line">
          <div class="s-12 l-2">
            <a href="index.html" class="logo"><img src="<?php echo base_url() ?>a/img/bio.png" alt=""></a>
          </div>
          <div class="top-nav s-12 l-10">
            <p class="nav-text"></p>
            <ul class="right chevron">
              <li><a href="<?php echo base_url() ?>index.php/user_authentication/home">Home</a></li>
              <li><a href="<?php echo base_url() ?>index.php/user_authentication/areas">Areas</a></li>
              <!--li><a href="products.html"></a></li-->
              <!--li><a>Services</a>
                <ul>
                  <li><a>Service 1</a>
                    <ul>
                      <li><a>Service 1 A</a></li>
                      <li><a>Service 1 B</a></li>
                    </ul>
                  </li>
                  <li><a>Service 2</a></li>
                </ul>
              </li-->
              <li><a href="<?php echo base_url() ?>index.php/user_authentication/reviews">Reviews</a></li>
              <li><a href="<?php echo base_url() ?>index.php/user_authentication/order">Order</a></li>
              <li><a href="<?php echo base_url() ?>index.php/user_authentication/cart">Cart</a></li>
              <li><a href="<?php echo base_url() ?>index.php/user_authentication/logout">Logout</a></li>
              

            </ul>
          </div>
        </div>
      </nav>
    </header>
    </header>
    
    <!-- MAIN -->
    <main role="main">
      <!-- Content -->
      <article>
        <header class="section background-primary text-center">

          <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Shopping Cart</h1>
        </header>
		
		<div class="line">
            <div class="box">

               <div class="s-12 l-8 right">
                  <div class="margin">
                     
                     <div class="s-12 l-4">
                        <p class="right"><?php echo $this->cart->total_items(); ?>items / €<?php echo $this->cart->total(); ?></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        <div class="line">
         <div class="box">
               <!-- CONTENT -->
               <section class="s-12 m-8 l-9 left">

              <div id="cart" >
              <div id = "heading">
              <h2 >Products on Your Shopping Cart</h2>
              </div>

              <div id="text">
              <?php $cart_check = $this->cart->contents();

              // If cart is empty, this will show below message.
              if(empty($cart_check)) {
              echo 'To add products to your shopping cart click on "Add to Cart" Button';
              } ?> </div>

              <table id="table" border="0" cellpadding="5px" cellspacing="1px">
              <?php
              // All values of cart store in "$cart".
              if ($cart = $this->cart->contents()): ?>
              <tr id= "main_heading">
              <td>Serial</td>
              <td>Name</td>
              <td>Price</td>
              <td>Qty</td>
              <td>Amount</td>
              <td>Cancel Product</td>
              </tr>
              <?php
              // Create form and send all values in "shopping/update_cart" function.

              echo form_open('user_authentication/updatecart');
              $grand_total = 0;
              $i = 1;

              foreach ($cart as $item):
              // echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
              // Will produce the following output.
              // <input type="hidden" name="cart[1][id]" value="1" />

              echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
              echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
              echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
              echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
              echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
              ?>
              <tr>
              <td>
              <?php echo $i++; ?>
              </td>
              <td>
              <?php echo $item['name']; ?>
              </td>
              <td>
              $ <?php echo number_format($item['price'], 2); ?>
              </td>
              <td>
              <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
              </td>
              <?php $grand_total = $grand_total + $item['subtotal']; ?>
              <td>
              $ <?php echo number_format($item['subtotal'], 2) ?>
              </td>
              <td>

              <?php
              // cancle image.
              $path = "<img src='http://localhost/onlinefoodorder/a/img/cartdelete.png' width='25px' height='20px'>";
              echo anchor('user_authentication/remove/' . $item['rowid'], $path); ?>
              </td>
              <?php endforeach; ?>
              </tr>
              <tr>
              <td><b>Order Total: $<?php

              //Grand Total.
              echo number_format($grand_total, 2); ?></b></td>

              <?php // "clear cart" button call javascript confirmation message ?>
              <td colspan="5" align="right"><input  class ='fg-button teal' type="button" value="Clear Cart" onclick="clear_cart()">

              <?php //submit button. ?>
              <input   type="submit" value="Update Cart">
              <?php echo form_close(); ?>

              <!-- "Place order button" on click send "billing" controller -->
              <input class ='fg-button teal' type="button" value="Place Order" onclick="window.location = 'shopping/billing_view'"></td>
              </tr>
              <?php endif; ?>
              </table>
              </div>
               </section>

         </div>
      </div>
      </article>
    </main>
   
    <script type="text/javascript" src="js/jquery.countTo.js"></script>
    <script type="text/javascript" src="js/parallax.min.js"></script> 
    <script type="text/javascript" src="js/lightcase.js"></script>
    <script type="text/javascript" src="js/jquery.events.touch.js"></script>
    <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/typed.min.js"></script> 
    <script type="text/javascript" src="js/template-scripts.js"></script>
     
   </body>
</html>