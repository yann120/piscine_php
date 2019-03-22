#!/usr/bin/php
<?php
	function	ft_split($str)
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
	function	echo_alpha(&$tab)
	{
		$to_print = [];
		foreach ($tab as $i => $value) 
		{
			if (ctype_alpha($value[0]))
			{
				array_push($to_print, $value);
				unset($tab[$i]);
			}
		}
		natcasesort($to_print);
		foreach ($to_print as $value) 
			echo $value."\n";
	}

	function	echo_num(&$tab)
	{
		$to_print = [];
		foreach ($tab as  $i => $value) 
		{
			if (ctype_digit($value[0]))
			{
				array_push($to_print, $value);
				unset($tab[$i]);
			}
		}
		sort($to_print);
		foreach ($to_print as $value) 
			echo $value."\n";
	}

	if ($argc != 1)
	{
		$result = [];
		$temp = [];
		foreach ($argv as $value) 
		{
			$temp = ft_split($value);
			foreach ($temp as $tempvalue)
				array_push($result, $tempvalue);
		}
		array_shift($result);

		echo_alpha($result);
		echo_num($result);
		sort($result);
		foreach ($result as $value) 
			echo $value."\n";
	}
?>