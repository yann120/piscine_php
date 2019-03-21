#!/usr/bin/php
<?php
	function ft_split($str)
	{
		$temps = explode(" ", $str);
		$result = [];
		foreach ($temps as $temp) 
		{
			if (!empty($temp))
				array_push($result, $temp);
		}
		return($result);
	}
	$result = [];
	$temp = [];
	foreach ($argv as $value) 
	{
		$temp = ft_split($value);
		foreach ($temp as $tempvalue)
			array_push($result, $tempvalue);
	}
	array_shift($result);
	sort($result);
	foreach ($result as $value)
		echo "$value\n";
?>