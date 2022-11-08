<?php

include('sql/database.php');

$login = $_SESSION['login'];
$login_id = $_SESSION['login_id'];

$sql = 'SELECT 
            T.data,
            T.tytul_przelewu,
            T.kwota 
        FROM 
            transakcje T
        WHERE id_usera = '.$login_id
        .' ORDER BY data DESC';
        
        

$sample = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($sample)) {
    echo "<div class='tranzakcja'>
            <div>
            $row[0] <br>
            $row[1] 
            </div>
            <div>
                $row[2] PLN
            </div>
        </div>";
}
?>