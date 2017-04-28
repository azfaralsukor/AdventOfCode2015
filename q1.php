<?php
$myfile = fopen("q1.txt", "r") or die("Unable to open file!");
$str =  fread($myfile,filesize("q1.txt"));
fclose($myfile);
$strlen = strlen( $str );
$floor = 0;
for( $i = 0; $i <= $strlen; $i++ ) {
	$char = substr( $str, $i, 1 );
	if ($char == '(') {
		$floor = $floor + 1;
	}elseif ($char == ')') {
		$floor = $floor - 1;
	}
	// Comment this part for 1st part answer
	/*if ($floor < 0) {
		echo $i+1;
		echo "\r\n";
		die();
	}*/
}
echo $floor;
echo "\r\n";