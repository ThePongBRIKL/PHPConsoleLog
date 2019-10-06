function console_log() {

	$args = func_get_args();

	echo "<script>";
	foreach ($args as $key => $value) {
		
		if ( is_array($value) ) {
			
			$dataJSON = json_encode($value);
			$data = str_replace('\\', '\\\\', $dataJSON);
			$data = str_replace("'", "\'", $data);

			?>
			var data = JSON.parse('<?php echo $data; ?>');
			console.log('console_log', data);
			<?php

		}
		else if ( is_numeric($value) ) {

			?>
			var data = parseFloat('<?php echo $value; ?>');
			console.log('console_log', data);
			<?php
		} 
		else {

			?>
			console.log('console_log', '<?php echo $value; ?>');
			<?php
		}
	}
	echo "</script>";

}
