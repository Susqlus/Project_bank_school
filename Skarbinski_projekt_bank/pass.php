<?php   
    session_start();
    include('sql/database.php');

    if (!$_SESSION['login']) {
        header('Location: login.php');
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }


    // DEBUGGING
    echo "id użytkownika: ".$_SESSION['login_id']."<br>";
    printf('Liczba blokad: %d\n', $_SESSION['blokada']);
    
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link rel="stylesheet" href="styles/LogNPass.css">
        <link rel="stylesheet" href="styles/tymczasowypass.css">
</head>
<body>
    
    <form method="post">
    <label for="PASS" id="FormTitle">Password</label>
    <input type="password" name="PASS" placeholder="wprowadź password">
        <br><br>

        <?php
            $images = [];
            $i = 0;
            $sql = 'SELECT id, obraz_zabezpieczajacy FROM zabezpieczenia';
            $sample = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_array($sample)) {
                $temp = "zdjecia/".$row[1]; 
                
                $images[$i] = array($row[0], $temp);
                $i += 1;
            }
            $indexes = [];
            shuffle($images);
                foreach ($images as $img => $value) {
                    echo "<label>
                            <input type='radio' name='INDEX' value='$value[0]'>
                            <img src=".$value[1]." alt='' id='captcha'>
                        </label>";


                    array_push($indexes, $value[0]);
            }
        ?>

        <br><br>
        <input type="submit" value="DALEJ" name="SubValuesIn">
    </form>


    
    <?php
        if(isset($_POST['SubValuesIn'])){
            $_SESSION['pass'] = $_POST['PASS'];
            $_SESSION['index'] = $_POST['INDEX'];
            echo "LOGIN ".$_SESSION['login']."<br>";
            echo "PASS ".$_SESSION['pass']."<br>";
            echo "INDEX ".$_SESSION['index']."<br>";

            $sql = 'SELECT 
                        logi.login,
                        logi.pass,
                        zabez.id
                    FROM
                        logowanie logi
                    INNER JOIN zabezpieczenia zabez
                    ON zabez.id = logi.id_obr;';
            $sample = mysqli_query($conn,$sql);

            if (!$sample) {
                printf("Error: %s\n", mysqli_error($conn));
                exit();
            }
            $nope = True;
            while ($row = mysqli_fetch_array($sample)) {
                for ($i=0; $i < count($row); $i++) { 
                    echo "ROW: ".$row[0]." | ".$row[1]." | ".$row[2]."<br>";
                    if ($row[0] == $_SESSION['login']
                        && sha1($_SESSION['pass']) == $row[1]
                        && $row[2] == $_SESSION['index']) {
                            $nope = False;
                            echo "Wszystko się zgadza <br>";
                            $_SESSION['enter'] = True;
                            header('Location: serwis.php');
                            break;
                    }
                }
                
            }
            if ($nope) {
                include('sql/blokada.php');
                echo "NOPE KONIEC LOL <br>";
                header('Location: login.php');
            }
            
               
            
            echo "długość ".strlen("109f4b3c50d7b0df729d299bc6f8e9ef9066971f");
            echo $_SESSION['login'];
        }
        
    ?>
</body>
</html>
