<?php
     $array = array();
     $fp = fopen('list.csv', 'r');
     while($row = fgetcsv($fp, 1000, ';', chr(127)))
     {
         $array[$row[0]] = $row[1];
     }
     fclose($fp);
     echo json_encode($array);
?>