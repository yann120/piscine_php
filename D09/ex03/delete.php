<?php
    $array = array();
    $fp = fopen('list.csv', 'r');
    while($row = fgetcsv($fp, 1000, ';', chr(127)))
    {
        $array[$row[0]] = $row[1];
    }
	fclose($fp);
    unset($array[$_POST['id']]);
    $fp = fopen('list.csv', 'w');
    foreach ($array as $id => $task) {
        fputcsv($fp, array($id, $task), ";", chr(127));
    }
    fclose($fp);
?>