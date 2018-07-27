<?php

try {
	$dataBase = new PDO(
		'mysql:host=sql300.epizy.com; dbname=epiz_22466187_calendar',
		'epiz_22466187',
		'tropfort',
		array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8' )
	);
}
catch ( PDOException $e ) {
	echo 'Impossible de se connecter à la base de donnée : ' . $e;
	exit();
}

$GLOBALS['server'] = 'http://erasia-calendar.epizy.com/';