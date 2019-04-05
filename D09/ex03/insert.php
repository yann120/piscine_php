<?php
    // $tasks = array();
    // $tasks[1] = "faire le menage";
    // $tasks[2] = "faire la vaisselle";
    // $tasks[3] = "faire le repassage";

    $array = array();
    $fp = fopen('list.csv', 'r');
    while($row = fgetcsv($fp, 1000, ';', chr(127)))
    {
        $array[$row[0]] = $row[1];
    }
	fclose($fp);
	echo $_POST['id'] + " " + $_POST['task'] + "\n";
	$array[$_POST['id']] = $_POST['task'];
	print_r($array);
	
    $fp = fopen('list.csv', 'w');
    foreach ($array as $id => $task) {
        fputcsv($fp, array($id, $task), ";", chr(127));
    }
    fclose($fp);
?>