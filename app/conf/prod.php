<?php

try {
	$dataBase = new PDO(
		'mysql:host=sql209.epizy.com; dbname=epiz_27194087_calendar',
		'epiz_27194087',
		'7mPD8n5qKt3w',
		array( PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8' )
	);
}
catch ( PDOException $e ) {
	echo 'Impossible de se connecter à la base de donnée : ' . $e;
	exit();
}

$GLOBALS['server'] = 'http://erasia-calendar.epizy.com/';