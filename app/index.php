<?php

$hostname =  $_POST['hostname'];
$login_by = $_POST['login-by'];
$link_login = $_POST['link-login'];
$link_login_only = $_POST['link-login-only'];
$link_logout = $_POST['link-logout'];
$link_status = $_POST['link-status'];
$link_orig = $_POST['link-orig'];
$username = $_POST['username'];
$error = $_POST['error'];
$error_orig = $_POST['error-orig'];
$logged_in = $_POST['logged-in'];
$mac = $_POST['mac'];
$ip = $_POST['ip'];
$bytes_in_nice = $_POST['bytes-in-nice'];
$bytes_out_nice = $_POST['bytes-out-nice'];
$session_time_left = $_POST['session-time-left'];
$uptime = $_POST['uptime'];
$refresh_timeout = $_POST['refresh-timeout'];

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="A captive portal login page of 91springboard">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <?php if (!empty($refresh_timeout)): ?>
  <meta http-equiv="refresh" content="<?php echo $refresh_timeout; ?>">
  <?php endif; ?>

  <title>91Springboard Captive Portal</title>

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
    function get_host(url){
      if (url)
        return url.replace(/^((\w+:)?\/\/[^\/]+\/?).*$/,'$1');
      return '';
    }

    var errorMessage, actionUrl, isUserLoggedIn, hostname='<?php echo $hostname; ?>';
    <?php

    if (!empty($error)):
      echo "errorMessage = '$error'";
    endif;

    if ($logged_in == "yes"):
      echo 'isUserLoggedIn = true';
    else:
      echo 'isUserLoggedIn = false';
    endif;

    ?>

  </script>

  <script type="text/html">

    <?php echo "Username= ".$username."\n"?>
    <?php echo "Error= ".$error."\n"?>
    <?php echo "Error-Orig= ".$error_orig."\n"?>
    <?php echo "Logged-In= ".$logged_in."\n"?>
    <?php echo "IP= ".$ip."\n"?>
    <?php echo "Login-By= ".$login_by."\n"?>
    <?php echo "Bytes-Down= ".$bytes_in_nice."\n"?>
    <?php echo "Bytes-Up= ".$bytes_out_nice."\n"?>
    <?php echo "Session-Time-Left= ".$session_time_left."\n"?>
    <?php echo "Uptime= ".$uptime."\n"?>
    <?php echo "Refresh-Time= ".$refresh_timeout."\n"?>
    <?php echo "Link-Status= ".$link_status."\n"?>
    <?php echo "Link-Orig= ".$link_orig."\n"?>
    <?php echo "Link-Login= ".$link_login."\n"?>
    <?php echo "Link-Logout= ".$link_logout."\n"?>
    <?php echo "Link-Login-Only= ".$link_login_only."\n"?>

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
        <form id="userForm" action="#" role="form" data-toggle="validator" method="POST">
          <fieldset>

            <legend class="legend">91springboard</legend>

            <?php if ($logged_in == "no"): ?>
              <div class="header">
                <h3 class="text-muted text-center">Login</h3>
              </div>

              <div class="input form-group col-xs-12">
                <span><i class="fa fa-envelope-o"></i></span>
                <input type="text" id="emailField" name="username" placeholder="Email/Username"
                    <?php if (!empty($username)): echo 'value="'.$username.'""'; endif;?> required />
              </div>

              <div class="input form-group col-xs-12">
                <input type="password" id="passwordField" name="password" placeholder="Password" required/>
                <span><i class="fa fa-key"></i></span>
              </div>

              <div class="input" id="input-hidden-fields">
                <input type="hidden" name="dst" value="<?php echo $link_orig; ?>"/>
                <input type="hidden" name="popup" value="true"/>
              </div>

              <div class="input form-group col-xs-12">
                <input type="checkbox" id="terms" required checked>
                <label for="terms">I accept the <a href="#">Terms of Service</a></label>
              </div>

              <button type="submit" class="submit input" title="Login">
                <i class="fa fa-sign-in"></i>
              </button>

            <?php else: ?>
              <div class="header">
                <h3 class="text-muted text-center">Status</h3>
              </div>

              <div class="status-table">
                <table class="table table-bordered">
                  <tbody>
                  <tr>
                    <td>IP Address</td>
                    <td> <?php echo $ip; ?></td>
                  </tr>
                  <tr>
                    <td>Download Bytes</td>
                    <td> <?php echo $bytes_in_nice; ?></td>
                  </tr>
                  <tr>
                    <td>Upload Bytes</td>
                    <td> <?php echo $bytes_out_nice; ?></td>
                  </tr>
                  <tr>
                    <td>Uptime</td>
                    <td> <?php echo $uptime; ?></td>
                  </tr>
                  </tbody>
                </table>

                <div class="input" id="input-hidden-fields">
                  <input type="hidden" name="erase-cookie" value="on">
                </div>

                <button type="submit" class="submit" title="Logout">
                  <i class="fa fa-sign-out" aria-hidden="true"></i>
                </button>

                <div style="text-align: center; padding-top: 15px;">
                  <a href="http://radius.91springboard.com/users">
                    <p> Click here to access USER PORTAL</p>
                  </a>
                </div>

              </div>
            <?php endif; ?>

          </fieldset>

          <div class="feedback">
          </div>



          <div class="footer">
            <p class="text-center">♥ from the 91springboard team</p>
          </div>

        </form>
      </div>
    </div>
  </div>


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
