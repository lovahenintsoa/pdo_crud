<?php
require_once("db.php");
$stmt = $cnx->prepare("DELETE FROM poste WHERE id=:id ");
$stmt ->execute(array('id' => $_GET['id']));
header('location:index.php');
?>