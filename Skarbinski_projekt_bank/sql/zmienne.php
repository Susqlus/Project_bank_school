<?php
include('sql/database.php');

$_SESSION['login'] = $_POST['LOGIN'];
$_SESSION['pass'] = $_POST['PASS'];
$_SESSION['index'] = $_POST['INDEX'];
?>