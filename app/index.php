<?php
$mac=$_POST['mac'];
$ip=$_POST['ip'];
$username=$_POST['username'];
$linklogin=$_POST['link-login'];
$linkorig=$_POST['link-orig'];
$error=$_POST['error'];
$trial=$_POST['trial'];
$loginby=$_POST['login-by'];
$chapid=$_POST['chap-id'];
$chapchallenge=$_POST['chap-challenge'];
$linkloginonly=$_POST['link-login-only'];
$linkorigesc=$_POST['link-orig-esc'];
$macesc=$_POST['mac-esc'];
$identity=$_POST['identity'];
$bytesinnice=$_POST['bytes-in-nice'];
$bytesoutnice=$_POST['bytes-out-nice'];
$sessiontimeleft=$_POST['session-time-left'];
$uptime=$_POST['uptime'];
$refreshtimeout=$_POST['refresh-timeout'];
$linkstatus=$_POST['link-status'];
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="A captive portal login page of 91springboard">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>91SpringBoard Captive Portal Login</title>

  <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <!-- Place favicon.ico in the root directory -->

  <!-- build:css styles/vendor.css -->
  <!-- bower:css -->
  <link rel="stylesheet" href="bower_components/components-font-awesome/css/font-awesome.css" />
  <!-- endbower -->
  <!-- endbuild -->

  <!-- build:css styles/main.css -->
  <link rel="stylesheet" href="styles/main.css">
  <!-- endbuild -->

  <!-- build:js scripts/vendor/modernizr.js -->
  <script src="/bower_components/modernizr/modernizr.js"></script>
  <!-- endbuild -->

  <script type="text/javascript">
    var errorMessage;
    <?php if (isset($error)) {?>
    errorMessage = '<?php echo $error; ?>';
    <?php }?>

    <?php echo $username."\n"?>
    <?php echo $ip."\n"?>
    <?php echo $loginby."\n"?>
    <?php echo $macesc."\n"?>
    <?php echo $bytesinnice."\n"?>
    <?php echo $bytesoutnice."\n"?>
    <?php echo $sessiontimeleft."\n"?>
    <?php echo $uptime."\n"?>
    <?php echo $refreshtimeout."\n"?>
    <?php echo $linkstatus."\n"?>

  </script>
</head>
<body class="full">
  <!--[if lt IE 10]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
  <![endif]-->

  <div class="container">
    <div class="row ">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 login">
        <form id="userForm" action="<?php echo $linkloginonly; ?>" role="form" data-toggle="validator" method="POST">
          <fieldset>

            <legend class="legend">91springboard</legend>

            <div class="header">
              <h3 class="text-muted text-center">Login</h3>
            </div>

            <div class="input form-group col-xs-12">
              <span><i class="fa fa-envelope-o"></i></span>
              <input type="text" id="emailField" name="username" placeholder="Email" required />
            </div>

            <div class="input form-group col-xs-12">
              <input type="password" id="passwordField" name="password" placeholder="Password" required/>
              <span><i class="fa fa-key"></i></span>
            </div>

            <div class="input" id="input-hidden-fields">
              <input type="hidden" name="dst" value="<?php echo $linkorig; ?>"/>
              <input type="hidden" name="popup" value="true"/>
            </div>

            <div class="input form-group col-xs-12">
                <input type="checkbox" id="terms" required>
                <label for="terms">I accept the <a href="#">Terms of Service</a></label>
            </div>

            <button type="submit" class="submit">
              <i class="fa fa-long-arrow-right"></i>
            </button>

          </fieldset>

          <div class="feedback <?php if($error) : echo 'error'?><?php endif; ?>">
              <div ><?php echo $error; ?></div>
          </div>



          <div class="footer">
            <p class="text-center">♥ from the 91springboard team</p>
          </div>

        </form>
      </div>
    </div>
  </div>

  <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
  <!--
  <script>
    (function (b, o, i, l, e, r) {
      b.GoogleAnalyticsObject = l;
      b[l] || (b[l] =
        function () {
          (b[l].q = b[l].q || []).push(arguments)
        });
      b[l].l = +new Date;
      e = o.createElement(i);
      r = o.getElementsByTagName(i)[0];
      e.src = 'https://www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X');
    ga('send', 'pageview');
  </script>
  -->

  <!-- build:js scripts/vendor.js -->
  <!-- bower:js -->
  <script src="bower_components/modernizr/modernizr.js"></script>
  <script src="bower_components/jquery/dist/jquery.js"></script>
  <script src="bower_components/bootstrap-validator/dist/validator.min.js"></script>
  <!-- endbower -->
  <!-- endbuild -->

  <!-- build:js scripts/plugins.js -->
  <script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/affix.js"></script>
  <script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/alert.js"></script>
  <script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js"></script>
  <script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js"></script>
  <script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/modal.js"></script>
  <script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/transition.js"></script>
  <script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/button.js"></script>
  <script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/popover.js"></script>
  <script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/carousel.js"></script>
  <script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/scrollspy.js"></script>
  <script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/collapse.js"></script>
  <script src="/bower_components/bootstrap-sass/assets/javascripts/bootstrap/tab.js"></script>
  <!-- endbuild -->

  <!-- build:js scripts/main.js -->
  <script src="scripts/main.js"></script>
  <!-- endbuild -->
</body>
</html>
