<?php
try
{
$host='localhost';
$user = 'postgres';
$dbname='company';
$pw='Lucky@123';
$dbcon = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pw);
//echo " connection established";
}
catch(PDOException $e)
{
	echo " not done ".$e;
}
?>
