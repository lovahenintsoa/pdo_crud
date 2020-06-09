<?php
$dsn='mysql:host=127.0.0.1:3308;dbname=phpsamples';
$username = 'root';
$password = '';
$option =array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
);

$cnx = new PDO($dsn,$username, $password,$option);
    
?>

