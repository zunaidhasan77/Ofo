<!DOCTYPE html>
<html  lang="en-US">
<?php
if (isset($this->session->userdata['logged_in'])) 
{

	header("location: http://localhost/onlinefoodorder/index.php/user_authentication/user_login_process");
  //mane jodi user logged in thake tahole eventually okhane jeye home page load hobe
}
?>
<head>
<title>Login Form</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ONLINE FOOD ORDERING</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>a/css/components.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>a/css/responsee.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>a/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>a/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>a/css/lightcase.css">


    <script type="text/javascript" src="<?php echo base_url() ?>a/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/jquery-ui.min.js"></script>    
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/responsee.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>a/js/validation.js"></script> 

</head>
<body>
<div class="top-bar background-white">
        <div class="line">
         
          <div class="s-12 m-6 l-6">
            <div class="right">
              <ul class="top-bar-social right">
                <li><a href="<?php echo base_url() ?>a/"><i class="icon-facebook_circle text-orange-hover"></i></a></li>
                <li><a href="<?php echo base_url() ?>a/"><i class="icon-twitter_circle text-orange-hover"></i></a> </li>
                <li><a href="<?php echo base_url() ?>a/"><i class="icon-google_plus_circle text-orange-hover"></i></a></li>
                <li><a href="<?php echo base_url() ?>a/"><i class="icon-instagram_circle text-orange-hover"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<nav class="background-white background-primary-hightlight">
        <div class="line">
          <div class="s-12 l-2">
            <a href="index.html" class="logo"><img src="<?php echo base_url() ?>a/img/bio.png" alt=""></a>
          </div>
          <div class="top-nav s-12 l-10">
            <p class="nav-text"></p>
            <ul class="right chevron">
              <li><a href="<?php echo base_url() ?>index.php/user_authentication/home">Home</a></li>
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
              <li><a href="about.html">Reviews</a></li>
              

            </ul>
          </div>
        </div>
      </nav>

<?php
if (isset($logout_message)) 
{
	echo "<div class='message'>";
	echo $logout_message;
	echo "</div>";
}
?>
<?php
if (isset($message_display))
{
	echo "<div class='message'>";
	echo $message_display;
	echo "</div>";
}
?>
<div id="main">
<div id="login">
<h2>Login Form</h2>
<hr/>
<?php echo form_open('user_authentication/user_login_process'); ?>
<?php
	echo "<div class='error_msg'>";
if (isset($error_message)) {
	echo $error_message;
}
echo validation_errors();
echo "</div>";
?>
<label>UserName :</label>
<input type="text" name="username" id="name" placeholder="username"/><br /><br />
<label>Password :</label>
<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
<input type="submit" value=" Login " name="submit"/><br />
<a href="<?php echo base_url() ?>index.php/user_authentication/user_registration_show">To SignUp Click Here</a>
<?php echo form_close(); ?>
</div>
</div>
</body>
</html>