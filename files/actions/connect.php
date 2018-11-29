<?php

/* Database config */
$db_host		='****';
$db_user		='****';
$db_pass		='****';
$db_database	='****';
/* End Config */

$db = new PDO('mysql:host='.$db_host.'; dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!$db){
	echo "Unable to connect to database";
}

?>
