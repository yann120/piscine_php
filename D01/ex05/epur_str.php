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
		return($result);
	}
	if ($argc == 2)
	{
		$tab = ft_split($argv[1]);

		foreach ($tab as $i => $value) {
			echo $value;
			if ($i != count($tab) - 1)
				echo " ";
		}
		echo "\n";
	}
?>