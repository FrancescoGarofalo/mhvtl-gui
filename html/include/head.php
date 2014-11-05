<?php
/**
 * Bootstrap Head function inclusion & auth checking.
 * Date: 05/11/14
 * Time: 21:55
 */
 $PROTO = "http://";
 if (! empty ( $_SERVER ['HTTPS'] )) {
  $PROTO = "https://";
 }
 $my_basedir=str_replace('html','',dirname($_SERVER['PHP_SELF']));
 $baseurl=$PROTO.$_SERVER['HTTP_HOST'].$my_basedir."/";

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="MHVTL-GUI">
 <meta name="author" content="Web Console GUI built by (nia) mhvtl-community-forums">
 <link rel="icon" href="<?php echo  $baseurl ?>favicon.ico">
<!--
 <title>Dashboard Template for Bootstrap</title>
-->

 <!-- Bootstrap core CSS -->
 <link href="<?php echo  $baseurl ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">

 <!-- Custom styles for this template -->
 <link href="<?php echo  $baseurl ?>bootstrap/css/dashboard.css" rel="stylesheet">


 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
 <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
 <div class="container-fluid">
  <div class="navbar-header">
   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
   </button>
   <a class="navbar-brand" href="http://sites.google.com/site/linuxvtl2/">
    <img src="<?php echo  $baseurl ?>html/images/mhvtl.png" height="42" width="120">
   </a>  <span class="text-muted">
   Linux Virtual Tape Library System
    </span>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
   <ul class="nav navbar-nav navbar-right">
    <li><a href="#NOTIMPLEMENTED">Dashboard</a></li>
    <li><a href="<?php echo  $baseurl ?>html/license.php">License</a></li>
    <li><a href="#NOTIMPLEMENTED">About</a></li>
    <li><a href="http://mhvtl-a-linux-virtual-tape-library.966029.n3.nabble.com/">Help</a></li>
   </ul>
   <form class="navbar-form navbar-right">
    <input type="text" class="form-control" placeholder="Search...">
   </form>
  </div>
 </div>
</nav>
<?php

 $indir_html=strpos(dirname($_SERVER['PHP_SELF']),'html');
 if ($indir_html=== false) {
  // something else
 }else{
  // show the left menu cause we are in html dir
 ?>
<div class="container-fluid">
 <div class="row">
  <div class="col-sm-3 col-md-2 sidebar">
   <ul class="nav nav-sidebar">
    <li class="active"><a href="server_host.php">Server: <?php echo php_uname('n');?></a></li>
    <li><a href="console.php">Console</a></li>
    <li><a href="setup.php">Setup</a></li>
    <li><a href="vtlcmd.php">Operator</a></li>
    <li><a href="stgt.php">iSCSI (tgt)</a></li>
    <li><a href="tools.php">Utility</a></li>
    <li><a href="help.php">Support</a></li>
   </ul>
   <ul class="nav nav-sidebar">

   </ul>
   <ul class="nav nav-sidebar">

   </ul>

   <br>
   <a href="http://stgt.sourceforge.net/" ONCLICK="parent.frames[1].location.href='http://stgt.sourceforge.net/'" target="showframe">
    <td align=center valign=middle><img border="0" src='images/tgt.png' alt="http://stgt.sourceforge.net" width=120 height=40 ></td></a>

   <!--
   <br>
   <a href="http://en.wikipedia.org/wiki/Linear_Tape-Open" ONCLICK="parent.frames[1].location.href='http://en.wikipedia.org/wiki/Linear_Tape-Open'" target="showframe">
   <td align=center valign=middle><img border="0" src='images/Lto-ultrium-logo.png' alt="http://en.wikipedia.org/wiki/Linear_Tape-Open" width=120 height=40 ></td></a>
   -->


   <br>
   <a href="http://www.gnu.org/licenses/gpl-2.0.html" ONCLICK="parent.frames[1].location.href='http://www.gnu.org/licenses/gpl-2.0.html'" target="showframe">
    <td align=center valign=middle><img border="0" src='images/gplv2.gif' alt="http://www.gnu.org/licenses/gpl-2.0.html" ></td></a>


   <br>
   <br>
   <?php $output = `sudo -u root -S cat ../version`;?>
   <FONT COLOR=#000000 size=1 ><b>Console </FONT><FONT COLOR=#0000ff size=1 ><?php echo $output ;?></FONT></b>

  </div>
  <?php
  }?>
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">