<?php
/*$str = file("q5.txt", FILE_IGNORE_NEW_LINES);
$nice = 0;
$naughty = 0;
$vowel = array('a', 'e', 'i', 'o', 'u');
$pair = array('ab', 'cd', 'pq', 'xy');
foreach ($str as $key => $value) {
	$double_flag = false;
	$pair_flag = false;
	$vowel_count = preg_match_all('/[aeiou]/i',$value,$matches);

	for ($i=0; $i < 26; $i++) { 
		$d_char = chr(97 + $i).chr(97 + $i);
		if (strpos($value, $d_char) !== false) {
			$double_flag = true;
		}
	}

	foreach ($pair as $p_key => $p_val) {
		if (strpos($value, $p_val) !== false) {
			$pair_flag = true;
		}
	}

	if ($vowel_count > 2 && $double_flag && !$pair_flag) 
		$nice++;
	else
		$naughty++;
}
echo "Nice : $nice\r\nNaughty : $naughty\r\n";*/
//       (Part 2)
$str = file("q5.txt", FILE_IGNORE_NEW_LINES);
$nice = 0;
$naughty = 0;
foreach ($str as $key => $value) {
	$pair = false;
	for ($i=0; $i < strlen($value); $i++) { 
		$cur_pair = substr($value, $i, 2);
		//echo "Current Pair : $cur_pair (Pos: ".($i+1)." - ".($i+2).")\r\n";
		for ($j=0; $j < strlen($value); $j++) { 
			if ($i-1 != $j && $i != $j && $i+1 != $j) {
				$chk_pair = substr($value, $j, 2);
				//echo "Checking Pair : $chk_pair (Pos: ".($j+1)." - ".($j+2).")";
				if ($cur_pair == $chk_pair) {
					$pair = true;
					//echo " ----------------------------------------------------------------------->TRUE\r\n";
					break 2;
				}
				//echo "\r\n";
			}
		}
	}

	$apit = false;
	for ($i=0; $i < strlen($value); $i++) { 
		$sub_str = substr($value, $i, 3);
		//echo "Substring: $sub_str (Pos $i - ".($i+3).")\r\n";
		if (substr($sub_str, 0, 1) == substr($sub_str, 2)) {
			//echo "Comparing: ".substr($sub_str, 0, 1)." with ".substr($sub_str, 2);
					//echo " ------------------------------------------------------------------------------------->TRUE\r\n";
			$apit = true;
			break;
		}//else
			//echo "Comparing: ".substr($sub_str, 0, 1)." with ".substr($sub_str, 2)."\r\n";
	}

	if ($apit && $pair)
		$nice++;
	else
		$naughty++;
}
echo "Nice : $nice\r\nNaughty : $naughty\r\n";