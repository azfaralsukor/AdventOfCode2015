<?php
$myfile = fopen("q3.txt", "r") or die("Unable to open file!");
$str =  fread($myfile,filesize("q3.txt"));
fclose($myfile);
$strlen = strlen( $str );
$grid = array();

$house = 1;
$grid[0][0]=1;

$santa_x = 0;
$santa_y = 0;

$robo_x = 0;
$robo_y = 0;

for( $i = 0; $i <= $strlen; $i++ ) {
	$char = substr( $str, $i, 1 );
	if ($i % 2 == 0) {
		if ($char == '^')
			$santa_y++;
		elseif ($char == 'v')
			$santa_y--;
		elseif ($char == '>') 
			$santa_x++;
		elseif ($char == '<') 
			$santa_x--;
		$x = $santa_x;
		$y = $santa_y;
	}elseif ($i % 2 == 1) {
		if ($char == '^')
			$robo_y++;
		elseif ($char == 'v')
			$robo_y--;
		elseif ($char == '>') 
			$robo_x++;
		elseif ($char == '<') 
			$robo_x--;
		$x = $robo_x;
		$y = $robo_y;
	}
	
	if (!isset($grid[$x][$y])) {
		$house++;
		$grid[$x][$y] = 1;
	}
	else $grid[$x][$y]++;
}
echo "The house number is $house.\r\n";