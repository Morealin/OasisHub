<?php

/* Database config */
$db_host		='198.71.227.39';
$db_user		='dirjohn';
$db_pass		='g?c%usFt';
$db_database	='OasisHub';
/* End Config */

$db = new PDO('mysql:host='.$db_host.'; dbname='.$db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(!$db){
	echo "Unable to connect to database";
}

?>
