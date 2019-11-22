<?php
	$debug = false; // Enable Debugging ** Warning private data dumped to console ***
	
	if ($debug == true) {
		echo '<div class="w3-panel w3-red w3-display-top">
	<h3>Warning!</h3>
	<p>Debugging is enabled! private data may be displayed in clear text in the console of your browser. DO NOT enter any passwords or any sensitive data on this site while debuggin is enabled.</p>
	</div>';
	}
	
	function debug_to_console($data)
	{
		$output = $data;
		if (is_array($output))
			$output = implode(',', $output);

		echo "<script>console.log(`Debug Objects: " . $output . " `);</script>";
	}
?>