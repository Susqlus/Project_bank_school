<?php
session_start();
include('sql/database.php');



$sql = 'SELECT 
            T.id_usera
        FROM
            transakcje T
        WHERE
            T.tytul_przelewu = "lokata"';

$sample = mysqli_query($conn, $sql);


while ($row = mysqli_fetch_array($sample, MYSQLI_NUM)) {
    if ($login_id == $row[0]) {
        $sql = 'SELECT 
                L.nr_konta,
                L.zabl_srodki,
                L.stan,
                L.nr_lokaty,
                L.stan_lokaty,
                T.kwota,
                T.data
            FROM
                transakcje T
            INNER JOIN logowanie L
            ON T.id_usera = L.id
            WHERE
                T.tytul_przelewu = "lokata"
                AND L.id = '.$login_id;
    
        $sample = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($sample, MYSQLI_NUM);
        break;
    }
    else {
        $sql = 'SELECT 
                L.nr_konta,
                L.zabl_srodki,
                L.stan,
                L.nr_lokaty,
                L.stan_lokaty
            FROM
                logowanie L
            WHERE
                L.id = '.$login_id;
    
        $sample = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($sample, MYSQLI_NUM);
        array_push($row, 0);
        array_push($row, NULL);
        break;
    }
}
?>