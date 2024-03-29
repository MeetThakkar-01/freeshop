
<?php 

require_once "config.php";

#Script to handle login
session_start();

#check if user is already logged in
if(isset($_SESSION['username']))
{

  header("location: index.php");
  exit;
}


$username = $password = "";
$err = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
  {

    $err = "";
  }
  else{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
  }

  if(empty($err))
  {
            

    $sql = "SELECT id,username,password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = trim($username);

    # Try executing these statements
    if (mysqli_stmt_execute($stmt)) 
    {

        mysqli_stmt_store_result($stmt);

        if(mysqli_stmt_num_rows($stmt) == 1)
        {

          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

          if(mysqli_stmt_fetch($stmt))
          {

            if(password_verify($password, $hashed_password))
            {
              # This means password is correct allow user to login
              session_start();
              $login = true;
              $_SESSION["username"] = $username;
              $_SESSION["id"] = $id; 
              $_SESSION["loggedin"] = true;

              #redirect user to welcome page
              header("location: index.php");
            }
            else 
            {
               $err = "Invalid Username or Password ";
            }
          }
        }

        else
        {
            $err = "not in DB ";
         } 
    }
    

}

}

?>
<script type="text/javascript">
  
  
  function validate()
  {
    var err = '<?php  echo($err); ?>';

    if (err != ""){

      var uerr = document.getElementById("user_name");
      uerr.textContent = "*" + err;
      return false;

    }

    else 
    {
      return true;
    }

  }

</script>





<!DOCTYPE html>
<html>
<head>
  <title>Free Shopping-Official Site for freebies, Offers, Coupons, Online Shopping India, Best Deals,Bollywood promotion, and Free Stuff in India,Coupons,Discount Coupon Codes &amp; Offers India,Promo Code, Cashback Offers, Coupon Code, Best Deals Online India</title>
  <style type="text/css">
img.wp-smiley,
img.emoji {
  display: inline !important;
  border: none !important;
  box-shadow: none !important;
  height: 1em !important;
  width: 1em !important;
  margin: 0 .07em !important;
  vertical-align: -0.1em !important;
  background: none !important;
  padding: 0 !important;
}
</style>
<link rel='stylesheet' id='ccf-form-css'  href='http://freeshopping.co/wp-content/plugins/custom-contact-forms/assets/build/css/form.min.css?ver=7.8.5' type='text/css' media='all' />
<link rel='stylesheet' id='easy-facebook-likebox-plugin-styles-css'  href='http://freeshopping.co/wp-content/plugins/easy-facebook-likebox/public/assets/css/public.css?ver=4.3.3' type='text/css' media='all' />
<link rel='stylesheet' id='easy-facebook-likebox-font-awesome-css'  href='http://freeshopping.co/wp-content/plugins/easy-facebook-likebox/public/assets/css/font-awesome.css?ver=4.3.3' type='text/css' media='all' />
<link rel='stylesheet' id='easy-facebook-likebox-animate-css'  href='http://freeshopping.co/wp-content/plugins/easy-facebook-likebox/public/assets/css/animate.css?ver=4.3.3' type='text/css' media='all' />
<link rel='stylesheet' id='easy-facebook-likebox-popup-styles-css'  href='http://freeshopping.co/wp-content/plugins/easy-facebook-likebox/public/assets/popup/magnific-popup.css?ver=4.3.3' type='text/css' media='all' />
<link rel='stylesheet' id='rs-plugin-settings-css'  href='http://freeshopping.co/wp-content/plugins/revslider/public/assets/css/settings.css?ver=5.1' type='text/css' media='all' />
<style id='rs-plugin-settings-inline-css' type='text/css'>
#rs-demo-id {}
</style>
<link rel='stylesheet' id='Montserrat-css'  href='http://fonts.googleapis.com/css?family=Montserrat%3A400%2C700&#038;ver=4.6.14' type='text/css' media='all' />
<link rel='stylesheet' id='Lato-css'  href='http://fonts.googleapis.com/css?family=Lato%3A100%2C300%2C400%2C700%2C900&#038;ver=4.6.14' type='text/css' media='all' />
<link rel='stylesheet' id='comre-bootstrap-css'  href='http://freeshopping.co/wp-content/themes/freeshopping/css/bootstrap.css?ver=2.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='comre-animate-css'  href='http://freeshopping.co/wp-content/themes/freeshopping/css/animate.css?ver=2.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='comre-main-css'  href='http://freeshopping.co/wp-content/themes/freeshopping/css/main.css?ver=2.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='main_style-css'  href='http://freeshopping.co/wp-content/themes/freeshopping/style.css?ver=2.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='woocommerce-css'  href='http://freeshopping.co/wp-content/themes/freeshopping/css/woocommerce.css?ver=2.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='comre-responsive-css'  href='http://freeshopping.co/wp-content/themes/freeshopping/css/responsive.css?ver=2.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='main-color-css'  href='http://freeshopping.co/wp-content/themes/freeshopping/css/color.php?ver=2.0.2' type='text/css' media='all' />
<link rel='stylesheet' id='mc4wp-form-themes-css'  href='http://freeshopping.co/wp-content/plugins/mailchimp-for-wp/assets/css/form-themes.min.css?ver=4.1.11' type='text/css' media='all' />
<link rel='stylesheet' id='js_composer_front-css'  href='http://freeshopping.co/wp-content/plugins/js_composer/assets/css/js_composer.min.css?ver=4.8.1' type='text/css' media='all' />
<script type='text/javascript' src='http://freeshopping.co/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
<script type='text/javascript' src='http://freeshopping.co/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript' src='http://freeshopping.co/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='http://freeshopping.co/wp-includes/js/jquery/ui/datepicker.min.js?ver=1.11.4'></script>
<script type='text/javascript'>
jQuery(document).ready(function(jQuery){jQuery.datepicker.setDefaults({"closeText":"Close","currentText":"Today","monthNames":["January","February","March","April","May","June","July","August","September","October","November","December"],"monthNamesShort":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],"nextText":"Next","prevText":"Previous","dayNames":["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],"dayNamesShort":["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],"dayNamesMin":["S","M","T","W","T","F","S"],"dateFormat":"MM d, yy","firstDay":1,"isRTL":false});});
</script>
<script type='text/javascript' src='http://freeshopping.co/wp-includes/js/underscore.min.js?ver=1.8.3'></script>

<script type='text/javascript' src='http://freeshopping.co/wp-content/plugins/custom-contact-forms/assets/build/js/form.min.js?ver=7.8.5'></script>
<script type='text/javascript' src='http://freeshopping.co/wp-content/plugins/easy-facebook-likebox/public/assets/popup/jquery.magnific-popup.min.js?ver=4.3.3'></script>
<script type='text/javascript' src='http://freeshopping.co/wp-content/plugins/easy-facebook-likebox/public/assets/js/jquery.cookie.js?ver=4.3.3'></script>
<script type='text/javascript' src='http://freeshopping.co/wp-content/plugins/easy-facebook-likebox/public/assets/js/public.js?ver=4.3.3'></script>
<script type='text/javascript' src='http://freeshopping.co/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.tools.min.js?ver=5.1'></script>
<script type='text/javascript' src='http://freeshopping.co/wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js?ver=5.1'></script>
<script type='text/javascript'>
<script type='text/javascript' src='http://freeshopping.co/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=3.2.4'></script>
<script type='text/javascript' src='http://freeshopping.co/wp-content/plugins/js_composer/assets/js/vendors/woocommerce-add-to-cart.js?ver=4.8.1'></script>
<link rel='https://api.w.org/' href='http://freeshopping.co/wp-json/' />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://freeshopping.co/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://freeshopping.co/wp-includes/wlwmanifest.xml" /> 
<meta name="generator" content="WordPress 4.6.14" />
<meta name="generator" content="WooCommerce 3.2.4" />
<link rel='shortlink' href='http://freeshopping.co/' />
<link rel="alternate" type="application/json+oembed" href="http://freeshopping.co/wp-json/oembed/1.0/embed?url=http%3A%2F%2Ffreeshopping.co%2F" />
<link rel="alternate" type="text/xml+oembed" href="http://freeshopping.co/wp-json/oembed/1.0/embed?url=http%3A%2F%2Ffreeshopping.co%2F&#038;format=xml" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>


<body class="home page page-id-471 page-template page-template-tpl-visual_composer page-template-tpl-visual_composer-php customize-support wpb-js-composer js-comp-ver-4.8.1 vc_responsive">




    <!-- Page Wrap ===========================================-->

    <div id="wrap">

 <!--======= TOP BAR =========-->
      
        <div class="top-bar">

            <div class="container">
          
                <ul class="left-bar-side">

                                                            <li> <a href="login.php"><i class="fa fa-lock"></i> Login</a> </li>
                                                        <li> <a href="register.php"><i class="fa fa-lock"></i> Register</a> </li>
                                          <li> <a href="http://freeshopping.co/career"><strong>Career with us</strong></a> </li>
                                         </ul>

                        
                <ul class="right-bar-side social_icons">
                  
      <li data-color="#3b5a9b">
        <a title="Facebook" href="https://www.facebook.com/freeshoppingpage"><i class="fa fa-facebook"></i></a>
      </li>

      <li data-color="#2baae1" style="background-color: rgb(255, 255, 255);">
        <a title="twitter" href="https://twitter.com/freeshoppingco"><i class="fa fa-twitter"></i></a>
      </li>

      <li data-color="#0072b2">
        <a title="Linkedin" href="https://in.linkedin.com/in/freeshopping"><i class="fa fa-linkedin"></i></a>
      </li>

      <li data-color="#fb1243">
        <a title="Google+" href=""><i class="fa fa-google-plus"></i></a>
      </li>

      <li data-color="#fb0f79">
        <a title="Pinterest" href="https://in.pinterest.com/freekashopping/"><i class="fa fa-pinterest"></i></a>
      </li>

      <li data-color="#3c71e7">
        <a title="Instagram" href="https://www.instagram.com/freeshopping.co/"><i class="fa fa-instagram"></i></a>
      </li>

      <li data-color="#ff1700">
        <a title="Slideshare" href="http://www.slideshare.net/freeshoppingonline1"><i class="fa fa-foursquare"></i></a>
      </li>

      <li data-color="#f11132">
        <a title="Youtube" href="https://www.youtube.com/channel/UCaAkF7F98rJ2rXdTf66v5hg"><i class="fa fa-youtube"></i></a>
      </li>
        </ul>


                                

            </div>

        </div>

  <!--======= HEADER =========-->
 <header>
  <div class="container"> 
 <!--======= LOGO =========-->
      <div class="logo"> 
        <a href="http://freeshopping.co/" title="logo"><img src="img\logo.png" alt="logo"></a>
      </div>
 </div>

<nav>

            <div class="container"> 



                <!--======= MENU START =========-->

                <ul class="ownmenu"><li class="showhide" style="display: none;"><span class="title"></span><span class="icon fa fa-bars"></span></li>
                <li id="menu-item-565" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-565" style=""><a title="Home" href="#">Home</a></li>
                <li id="menu-item-563" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-563" style=""><a title="Freebies" href="#">Freebies</a></li>
                <li id="menu-item-566" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-566" style=""><a title="Mobile Recharge Offer" href="#">Mobile Recharge Offer</a></li>
                <li id="menu-item-562" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-562" style=""><a title="Electronics Offer" href="#">Electronics Offer</a></li>
                <li id="menu-item-567" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-567" style=""><a title="Restaurant Offer" href="#">Restaurant Offer</a></li>
                <li id="menu-item-569" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-569" style=""><a title="Travels Offer" href="#">Travels Offer</a></li>
                <li id="menu-item-564" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-564" style=""><a title="Groceries Offer" href="#">Groceries Offer</a></li>
                        </ul>



                                <!--======= SUBMIT COUPON =========-->
                                          <div class="sub-nav-co"> <a href="#">Student Discount</a> </div>
                                    </div>

</nav>

</header>

<!--======= BANNER =========-->
<section class="sub-banner" style="background-image:url(http://demos.megawpthemes.com/comre/files/2015/05/sub-bnr-bg8.jpg);">
  <div class="overlay">
    <div class="container">
    <h2>SIGN UP</h2>
    <ul class="sub-nav"><li><a href="#"><i class="fa fa-home"></i></a>  /  </li><li>SIGN IN</li></ul>  
    </div>
  </div>
</section>

<div class="white-bg" id="portfoli">
         <div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column col-md-12">
    

 <section class="sign-up">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h4>Login Here :</h4>
          <img class="img-responsive" src="" alt=""> </div>
        
        <!--======= SIGN UP FORM =========-->
        <div class="col-sm-6">
                    <hr>
                    <form action="" name="loginform" method="post" id="loginform1" class="form form-register" onsubmit="return validate()">
            <ul class="row">

              
              <li class="col-md-6">
                <div class="form-group">
                  <label for="lname">User Name *                    <input type="text" name="username" class="form-control" id="username" placeholder="" required oninvalid="this.setCustomValidity('Enter valid Username ')" oninput="this.setCustomValidity('')">
                    
                  </label>              
                </div>
              </li>
              <li class="col-md-6">
                <div class="form-group">
                  <label for="password">Password  *                  <input type="password" name="password" class="form-control" id="password4" placeholder="" required oninvalid="this.setCustomValidity('Password cannot be Empty')" oninput="this.setCustomValidity('')">
                  </label>
                </div>
              </li>

              <li class="col-md-6">
                <span id="user_name" style="color: red;"></span>
                         
        <input type="submit" class="btn" value="Login">
        </li>
            </ul>
          </form>
          
                          <div class="policy">
            <p></p>
          </div>
        </div>
      </div>
    </div>
  </section>



  </div>
</div>
  </div>



<footer>
  
  <div class="container">
    
            <ul class="row">
              <li id="nav_menu-3" class="col-sm-4 widget_nav_menu"><h6>GET TO KNOW US</h6><div class="menu-footera-container"><ul id="menu-footera" class="menu"><li id="menu-item-610" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-610"><a href="#">About Us</a></li>
<li id="menu-item-625" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-625"><a href="#">Our Team</a></li>
<li id="menu-item-613" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-613"><a href="#">FAQ’S</a></li>
<li id="menu-item-616" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-616"><a href="#">Testimonials</a></li>
<li id="menu-item-611" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-611"><a href="#">Career With Us</a></li>
<li id="menu-item-615" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-615"><a href="#">Media Contact</a></li>
<li id="menu-item-614" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-614"><a href="#">Investors</a></li>
<li id="menu-item-612" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-612"><a href="contact.php">Contact Us</a></li>
</ul></div></li><li id="nav_menu-4" class="col-sm-4 widget_nav_menu"><h6>SUPPORT</h6><div class="menu-footerb-container"><ul id="menu-footerb" class="menu"><li id="menu-item-619" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-619"><a href="#">Advertise With Us</a></li>
<li id="menu-item-622" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-622"><a href="#">Campus Ambassador</a></li>
<li id="menu-item-621" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-621"><a href="#">Feedback</a></li>
<li id="menu-item-1396" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1396"><a href="#">Digital marketing Course in Thane</a></li>
<li id="menu-item-620" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-620"><a href="#">Win A Gift Cards</a></li>
<li id="menu-item-618" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-618"><a href="#">Terms &amp; Conditions</a></li>
<li id="menu-item-617" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-617"><a href="#">Privacy Policy</a></li>
</ul></div></li><li id="text-2" class="col-sm-4 widget_text"><h6>Never Miss Out Exclusive Deals !</h6>      <div class="textwidget">
  <p>
  <label>Email address: </label><br>
  <input type="email" name="EMAIL" placeholder="Your email address" required="">
</p>
<p>
  <input type="submit" value="Sign up"></p>
</div>
    </li>            </ul>
    
          </div>
          <div class="rights">
                        <p>Made with love from INDIA.<br>
                                    <ul class="social_icons">
              
      <li data-color="#3b5a9b">
        <a title="Facebook" href="https://www.facebook.com/freeshoppingpage"><i class="fa fa-facebook"></i></a>
      </li>

      <li data-color="#2baae1">
        <a title="twitter" href="https://twitter.com/freeshoppingco"><i class="fa fa-twitter"></i></a>
      </li>

      <li data-color="#0072b2">
        <a title="Linkedin" href="https://in.linkedin.com/in/freeshopping"><i class="fa fa-linkedin"></i></a>
      </li>

      <li data-color="#fb1243">
        <a title="Google+" href=""><i class="fa fa-google-plus"></i></a>
      </li>

      <li data-color="#fb0f79">
        <a title="Pinterest" href="https://in.pinterest.com/freekashopping/"><i class="fa fa-pinterest"></i></a>
      </li>

      <li data-color="#3c71e7">
        <a title="Instagram" href="https://www.instagram.com/freeshopping.co/"><i class="fa fa-instagram"></i></a>
      </li>

      <li data-color="#ff1700">
        <a title="Slideshare" href="http://www.slideshare.net/freeshoppingonline1"><i class="fa fa-foursquare"></i></a>
      </li>

      <li data-color="#f11132">
        <a title="Youtube" href="https://www.youtube.com/channel/UCaAkF7F98rJ2rXdTf66v5hg"><i class="fa fa-youtube"></i></a>
      </li>
            </ul>
                      </div>


</footer>
</body>
</html>