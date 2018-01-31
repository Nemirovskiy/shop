<?
include 'control/Controller.php';
?>
<pre>
	get
	<?print_r($_GET);?>
	==<br>
	<?
	$template = 'v_'.key($_GET).'.tmpl';
	if(is_file(DIR_VIEW.'/'.$template)) echo "Ok";
	else echo "no Ok";
	echo "<br>";
	//$page->getUrlPath();
	?>
</pre>