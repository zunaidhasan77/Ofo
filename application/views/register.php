<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Registration Form</title>
  
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <?php echo link_tag('a/registercss/style.css'); ?>
</head>

<body>
  <div class="container">
    <section class="register">
      <h1>Register </h1>
      <form method="post" action="new_user_registration">
      <div class="reg_section personal_info">
      <h3>Your Personal Information</h3>
      <input type="text" name="name" value="" placeholder="Username">
      <input type="text" name="emailaddress" value="" placeholder="E-mail Address">
      <input type="text" name="contact" value="" placeholder="Contact">
      </div>
      <div class="reg_section password">
      <h3>Your Password</h3>
      <input type="password" name="password" value="" placeholder="Your Password">
      <input type="password" name="confirm" value="" placeholder="Confirm Password">
      </div>
      <div class="reg_section password">
      <h3>Your Area</h3>
      <select name="area">
        <option value="Hatirpul">Hatirpul</option>
        <option value="Ajimpur">Ajimpur</option>
        <option value="Lalbag">Lalbag</option>
        <option value="DU">DU</option>
      </select>
      <h3>Road no</h3>
      <input type="text" name="roadno" value="" placeholder="">
      </div>
      </p>
      <?php
if (isset($message_display))
{
  echo "<div class='message'>";
  echo $message_display;
  echo "</div>";
}
?>
      <p class="submit"><input type="submit" name="commit" value="Sign Up"></p>
      </form>
    </section>

  </div>


</body>
</html>