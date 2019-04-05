<?php
    $array = array();
    $fp = fopen('list.csv', 'r');
    while($row = fgetcsv($fp, 1000, ';', chr(127)))
    {
        $array[$row[0]] = $row[1];
    }
	fclose($fp);
    unset($array[$_POST['id']]);
	print_r($array);
    $fp = fopen('list.csv', 'w');
    foreach ($tasks as $id => $task) {
        fputcsv($fp, array($id, $task), ";", chr(127));
    }
    fclose($fp);
?>