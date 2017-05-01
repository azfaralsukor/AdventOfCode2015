<?php
$variable = file("test_azfar.txt", FILE_IGNORE_NEW_LINES);
ini_set('memory_limit', '200M');
$grid[1000][1000] = array();
$lights_on = 0;

$variable = "toggle 0,0 through 999,999";
$variable = "toggle 0,0 through 999,0";
$variable = "toggle 499,499 through 500,500";
foreach ($variable as $key => $value) {
	if (substr($variable, 1, 6) == "urn on") {
		$chg_state = 1;
		$coordinates = explode(',', substr(str_replace(' through ', ',', $variable), 7));
	}elseif (substr($variable, 1, 6) == "urn of") {
		$chg_state = 0;
		$coordinates = explode(',', substr(str_replace(' through ', ',', $variable), 8));
	}elseif (substr($variable, 1, 6) == "oggle ") {
		$chg_state = 'limbo';
		$coordinates = explode(',', substr(str_replace(' through ', ',', $variable), 6));
	}

	$x_start = $coordinates[0];
	$y_start = $coordinates[1];
	$x_stop = $coordinates[2];
	$y_stop = $coordinates[3];

	for ($x=$x_start; $x <= $x_stop; $x++) { 
		for ($y=$y_start; $y <= $y_stop; $y++) {
			if ($chg_state == 1) {
				$grid[$x][$y] = 1;
				$lights_on++;
			}elseif ($chg_state == 1) {
				$grid[$x][$y] = 0;
				$lights_on--;
			}elseif ($chg_state == 'limbo') {
				if ($grid[$x][$y] == 1) {
					$grid[$x][$y] = 0;
					$lights_on--;
				}else{
					$grid[$x][$y] = 1;
					$lights_on++;
				}
			}
		}
	}
}

echo "</br></br></br>Lights on : $lights_on"; 