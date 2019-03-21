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
	$result = ft_split($argv[1]);
	array_push($result, $result[0]);
	array_shift($result);
	foreach ($result as $i => $value) 
	{
		echo $value;
		if ($i != count($result) - 1)
				echo " ";
	}
	if ($argc > 1)
		echo "\n";
?>