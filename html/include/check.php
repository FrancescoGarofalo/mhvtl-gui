<?php
/**
 * Checks if the System Requirements are met
 * Date: 05/11/14
 * Time: 22:42
 */

 $CLEANUP = shell_exec('sudo -u root -S rm -f  /tmp/test.required.components.*');


 $testsudo = shell_exec('scripts/check_before_use.sh testsudo');
$CMD = shell_exec('cat /tmp/test.required.components.testsudo | grep -v "PASS" | sort -u|wc -l');
if ($CMD != 0 )
{
 echo "<pre><FONT COLOR=#FFFF00>ERROR: sudo</FONT></pre>";
 echo "<pre><FONT COLOR=#FFFF00>$testsudo</FONT></pre>";
 echo "<pre><FONT COLOR=#FFFFFF>Modify /etc/sudoers</FONT></pre>";
 echo "<pre><FONT COLOR=#FFFFFF>Add this line: example :</FONT></pre>";
 echo "<pre><FONT COLOR=#FFFFFF>apache ALL=(ALL) NOPASSWD: ALL  </FONT></pre>";
 echo "<pre><FONT COLOR=#FFFFFF>Remove Defaults requiretty </FONT></pre>";
 echo "<pre><FONT COLOR=#FFFFFF>Disable selinux </FONT></pre>";
 echo "<pre><b><a style='text-decoration:none; color:#FFFF00;' href='README'>See README</a></b></pre>";
 exit;
}

$testmhvtl = shell_exec('scripts/check_before_use.sh testmhvtl');
$CMD = shell_exec('cat /tmp/test.required.components.testmhvtl | grep -v "PASS" | sort -u|wc -l');
if ($CMD != 0 )
{
 echo "<pre><FONT COLOR=#FFFFFF>ERROR: mhvtl</FONT></pre>";
 echo "<pre><FONT COLOR=#FFFF00>$testmhvtl</FONT></pre>";
 echo "<pre><FONT COLOR=#FFFFFF>You need to install MHVTL first</FONT></pre>";
 echo "<pre><FONT COLOR=#FFFFFF>Please visit MHVTL development site:</FONT></pre>";
 echo "<pre><b><a style='text-decoration:none; color:#FFFF00;' href='http://sites.google.com/site/linuxvtl2/'>http://sites.google.com/site/linuxvtl2/ </a></b></pre>";

 echo "<pre><b><a style='text-decoration:none; color:#00FF00;' href='http://mhvtl-linux-virtual-tape-library-community-forums.966029.n3.nabble.com/MHVTL-Getting-Started-td1663811.html'>For additional help, click here </a></b></pre>";
 echo "<pre><FONT COLOR=#FFFFFF>Exiting ....</FONT></pre>";
 exit;
}



$output = shell_exec('scripts/check_before_use.sh testmhvtl');
 if ( !empty($output)){
 echo "<pre><FONT COLOR=#FFFFFF>$output</FONT></pre>";
 }
$output = shell_exec('scripts/check_before_use.sh testlsscsi');
 if ( !empty($output)){
 echo "<pre><FONT COLOR=#FFFFFF>$output</FONT></pre>";
 }
$output = shell_exec('scripts/check_before_use.sh testmt');
  if ( !empty($output)){
 echo "<pre><FONT COLOR=#FFFFFF>$output</FONT></pre>";
  }
$output = shell_exec('scripts/check_before_use.sh testmtx');
   if ( !empty($output)){
 echo "<pre><FONT COLOR=#FFFFFF>$output</FONT></pre>";
   }

$CMD = shell_exec('cat /tmp/test.required.components.* | grep -v "PASS" | sort -u|wc -l');
if ($CMD == 0 )
{
 // All checks passed
}
else
{
 echo "<pre><FONT COLOR=#FF0000><b>Error: Required Components Not Verified </b></FONT></pre>";
 echo "<pre><b><a style='text-decoration:none; color:#FFFF00;' href='README'>See README</a></b></pre>";
 echo "<pre><b><a style='text-decoration:none; color:#00FF00;' href='http://mhvtl-linux-virtual-tape-library-community-forums.966029.n3.nabble.com/'>Click here to get help</a></b></pre>";
// Something went wrong so we stop here
 die;
}




?>