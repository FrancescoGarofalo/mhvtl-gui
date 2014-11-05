<?php // <h1> if you read this in your browser php is not enabled on your web server </h1>  ?>
<?php require_once('html/include/head.php');

  require_once('html/include/functions.php');

  // Checks if we meet the requirements
  include_once('html/include/check.php');

  ob_start();
  ob_flush();
  @session_start();

  //we got a POST request check if password match
  if(isset($_POST['pswd'])) {
    $password = $_POST['pswd'];
    if ( file_exists(dirname(__FILE__).'/html/include/password.php')){
      // Replace your password in include/password.php
      require_once(dirname(__FILE__).'/html/include/password.php');
    }else{
      // password file does not exists lets create a default one
      $adminpassword='mhvtl';
      $FILE_TEMPLATE_PASSWORD="<?php // DEFAULT ADMIN PASSWORD
   \$adminpassword='$adminpassword';
   ?>";
      file_put_contents(dirname(__FILE__).'/html/include/password.php',$FILE_TEMPLATE_PASSWORD);
      // Since it's the FIRST time we run we show the password on html
      echo "<font color='white'>Default password is ".$adminpassword."<br> please change it on <br>".dirname(__FILE__)."/html/include/password.php<br>";
    }

    if ( $password == $adminpassword ) {
      $_SESSION['phplogin'] = true;
      HttpRedirect(dirname($_SERVER['PHP_SELF']).'/html/mhvtl.php');
      exit;
    } else {
      ?>
      <script type="text/javascript">
 <!--
 alert('Wrong Password, Please Try Again')
 //-->
 </script>
    <?php
    }
  }

?>

  <style>
    body {
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #eee;
    }

    .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
      margin-bottom: 10px;
    }
    .form-signin .checkbox {
      font-weight: normal;
    }
    .form-signin .form-control {
      position: relative;
      height: auto;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
      padding: 10px;
      font-size: 16px;
    }
    .form-signin .form-control:focus {
      z-index: 2;
    }
    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }



  </style>
  <br>
  <br>
  <br>

  <div class="container" style="width: 300px;">

    <form class="form-signin" role="form" method="post">
      <h2 class="form-signin-heading">Please sign in</h2>
      <input type="password" class="form-control" placeholder="Password" name="pswd" required autofocus>
      <!-- NOT IMPLEMENTED
      <div class="checkbox">
       <label>
        <input type="checkbox" value="remember-me"> Remember me
       </label>
      </div>
      -->
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
    <?php
      $version=file_get_contents('version');
      $mhvtlrel = `sudo -u root -S vtlcmd -V| cut -d "-" -f1,3| cut -d ":" -f2| cut -d " " -f2`;
      echo "<center><font size=1>Console Version $version MHVTL Release  $mhvtlrel</font></center>";
    ?>
  </div> <!-- /container -->
<?php
  require_once('html/include/footer.php');
?>