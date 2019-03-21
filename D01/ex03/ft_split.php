#!/usr/bin/php
<?php
function ft_split($str)
{
	$temps = explode(" ", $str);
	$result = [];
	foreach ($temps as $temp) {
		if (!empty($temp))
			array_push($result, $temp);
	}
	sort($result);
	return($result);
}
?>