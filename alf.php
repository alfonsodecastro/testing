#!/usr/bin/php
<?php

class MyDB extends SQLite3 {
	function __construct() {
		$this->open("/shared/GreyHackDB.db");
	}
}

$db= new MyDB();

$result= $db->query("SELECT AllLibs from infogen");
$realResult = $result->fetchArray();

$cad1=$realResult[0];

$cad2 = json_decode($cad1,true);


//cad2 tiene como clave el nombre de la librería y como array[0] el ID para buscar en ficheros.
foreach($cad2 as $x => $x_value) {
  echo "Key= " . $x . ", Value= " . $x_value[0] . "\n";
  $result = $db->query("SELECT content from files where ID='" . $x_value[0] . "'");
  $realResult = $result->fetchArray();

  $cad1=$realResult[0];
  $cad2 = json_decode($cad1,true);

  //var_dump($cad2);
  //print($cad2["listaZonaMem"] . "\n");
}



?>
