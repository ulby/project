<?php
$db_link = mysql_connect('localhost','root','root');
if (!$db_link) {
	die('Die Verbindung schlug fehl: '. mysql_error());
}
mysql_select_db("cms2", $db_link);
?>