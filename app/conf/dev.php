<?php

try {
	$dataBase = new PDO(
		'mysql:host=localhost; dbname=calendar_t0ka',
		'root',
		'root',
		array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8' )
	);
}
catch ( PDOException $e ) {
	echo 'Impossible de se connecter à la base de donnée : ' . $e;
	exit();
}

$GLOBALS['server'] = 'http://localhost/erasia-calendar/';