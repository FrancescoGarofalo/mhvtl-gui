
<h1 class="page-header">Linux Virtual Tape Library System</h1>


<?php
$upt = shell_exec('sudo -u root -S uptime');
echo "<pre>$upt</pre>" ;
?>


<script type="text/javascript">
var ray={
ajax:function(st)
	{
		this.show('load');
	},
show:function(el)
	{
		this.getID(el).style.display='';
	},
getID:function(el)
	{
		return document.getElementById(el);
	}
}
</script>




<div id="load" style="display:none;"><img src="images/loading.gif" border=0></div>


<div  id="ReloadThis" >
<?php
include 'fdisplay.php' ;
?>
</div>


<table>
<?php
$output = shell_exec('DEVICES=`sudo -u root -S ../scripts/plot_devices.sh`; if [ ! -z "$DEVICES" ]; then echo "$DEVICES";fi');
echo "<pre><p style=\"text-align:left;\"><b>$output</b></p></pre>";
?>
</table>
