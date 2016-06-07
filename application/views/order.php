<!DOCTYPE html>
<html lang="en-US">
  <head>
    <?php
    if( isset($y))
    { 

      $y = $_COOKIE["y"]; 

    print "<body onScroll=\"document.cookie='y=' + window.pageYOffset\" onLoad='window.scrollTo(0,$y)'>";
    }
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url() ?>a/css/components.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>a/css/responsee.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>a/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>a/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>a/views/css/lightcase.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>a/views/css/template-style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>


    <script type="text/javascript" src="<?php echo base_url() ?>a/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/jquery-ui.min.js"></script>    
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/responsee.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/validation.js"></script> 
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
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
                <li><a href="?php echo base_url() ?>a/"><i class="icon-facebook_circle text-orange-hover"></i></a></li>
                <li><a href="?php echo base_url() ?>a/"><i class="icon-twitter_circle text-orange-hover"></i></a> </li>
                <li><a href="?php echo base_url() ?>a/"><i class="icon-google_plus_circle text-orange-hover"></i></a></li>
                <li><a href="?php echo base_url() ?>a/"><i class="icon-instagram_circle text-orange-hover"></i></a></li>
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
    
    <!-- MAIN -->
    <main role="main">
      <!-- Content -->
      <article>
        <header class="section background-primary text-center">

          <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Pizzahouse</h1>
        </header>
		    
		    <div class="line">

            <div class="box">

               <div class="s-12 l-8 right">
                  <div class="margin">
                     <form  class="customform s-12 l-8" action="http://google.com/">
                        <div class="s-9"><input type="text" placeholder="Search form" title="Search form" /></div>
                        <div class="s-3"><button type="submit">Search</button></div>
                     </form>
                     <div class="s-12 l-4">
                        <p class="right"><?php echo $this->cart->total_items(); ?>items / €<?php echo $this->cart->total(); ?></p>
                     </div>
                  </div>
               </div>
            </div>
        </div>
        <div class="line">
         <div class="box">
            <div class="margin">
               <!-- CONTENT -->
               <section class="s-12 m-8 l-9 right">
                  <h1>Content</h1>
                  <div class="margin">
                    <?php foreach ($foods as $food): ?>
                    <?php echo form_open('user_authentication/addtocart'); ?>
                     <div class="s-12 m-6 l-4">
                        <img src="<?php echo base_url() ?>a/img/2.jpg"  >
                        <?php echo $food->name; ?>


                        <p ><?php echo $food->price; ?></p>
                        
                    <?php echo form_hidden('id', $food->id); ?>
                    <?php echo form_hidden('name', $food->name); ?>
                    <?php echo form_hidden('price', $food->price); ?>
                    <?php echo form_submit('action', 'Add to Cart'); ?>
                    <a href="<?php echo base_url() ?>index.php/user_authentication/reviews"> comment</a>

                    <!--?php echo form_submit('action', 'Reviews'); ?-->
                    
                     </div>
                     
                    <?php echo form_close(); ?>
                     <?php endforeach; ?>
                     
                     
                  </div>
                  <div class="s-12 m-12 l-8">

                      
                      <!--p class="text-white text-size-16 margin-bottom-40">Duis autem vel eum iriure dolor in hendrerit in vulputate velit<br> esse molestie consequat, vel illum dolore eu feugiat nulla facilisis</p-->  
                    </div>    

               </section>
               <!-- ASIDE NAV -->
               <aside class="s-12 m-4 l-3">
                  <h3>Navigation</h3>
                  <div class="aside-nav">
                     <ul>
                      <?php foreach ($restaurant as $rest): ?>
                      
                      <li><a  href="<?php echo base_url() ?>index.php/user_authentication/order/<?php echo $rest->id ?>">
                        <?php echo $rest->name ?></a></li>
                      <?php endforeach; ?> 
                     </ul>
                  </div>
               </aside>
            </div>
         </div>
      </div>
      </article>
    </main>
   
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/jquery.countTo.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/parallax.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/lightcase.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/jquery.events.touch.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>a/owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/typed.min.js"></script> 
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/template-scripts.js"></script>
     
   </body>
</html>