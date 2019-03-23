#!/usr/bin/php
<?php
    if ($argc > 1)
		echo preg_filter(["/[ \t]+/"], " ", trim($argv[1]))."\n";
?>