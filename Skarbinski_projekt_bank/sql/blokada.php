<?php

include('sql/database.php');

$sql = 'SELECT 
            blokada
        FROM
            logowanie
        WHERE id = '.$_SESSION['login_id'];
$sample = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($sample, MYSQLI_NUM);
echo "przed: ".$row[0];
$row[0] += 1;

$sql = 'UPDATE logowanie
        SET blokada = '.$row[0].'
        WHERE id = '.$_SESSION['login_id'];
mysqli_query($conn,$sql);

$sql = 'SELECT 
            blokada
        FROM
            logowanie
        WHERE id = '.$_SESSION['login_id'];
$sample = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($sample, MYSQLI_NUM);
echo "po: ".$row[0];
$_SESSION['blokada'] = $row[0];

?>