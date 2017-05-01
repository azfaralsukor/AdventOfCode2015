<?php
$str = file("q2.txt", FILE_IGNORE_NEW_LINES);

$total = 0;
foreach ($str as $key => $value) {
	$dim = explode("x", $value);
	$l = $dim[0];
	$w = $dim[1];
	$h = $dim[2];
	$longest = max ($l, $w, $h);
	// (SUM(A3:C3)-MAX(A3:C3))*2
	$smallest_perimeter = ($l + $w + $h - $longest) * 2;
	
	// print_r($smallest_perimeter);
	// echo "</br>";
	// $v = $l * $w * $h;
	// $f = 2*$l*$w;
	// $s = 2*$w*$h;
	// $t = 2*$h*$l;
	// $e = min ($f/2, $s/2, $t/2);
	// $tot = $f + $s + $t + $e;
	// $total = $total + $tot;
	$tot = $v + $smallest_perimeter;
	$total = $total + $tot;
}
echo $total;