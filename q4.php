<?php
$str = 'iwrupvqb';
$add = 1;
$full = $str.$add;
while ( (substr(md5($full), 0, 6)) !== "000000") {
	$add++;
	$full = $str.$add;
}
echo "Adder: ".$add."\r\n";
