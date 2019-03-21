#!/usr/bin/php
<?php
	$first = 1;
	foreach ($argv as $arg) 
	{
		if ($first == 1)
			$first = 0;
		else
			echo $arg."\n";
	}
?>