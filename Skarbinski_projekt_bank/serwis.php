<?php   
    session_start();
    include('sql/database.php');

    // if (!$_SESSION['enter']) {
    //     header('Location: login.php');
    //     printf("Error: %s\n", mysqli_error($conn));
    //     exit();
    // }

    $login = $_SESSION['login'];
    $login_id = $_SESSION['login_id'];
    echo $login_id;
    setrawcookie("login_cookie", $login, time() + (86400), "/");
    setrawcookie("id_cookie", $login_id, time() + (86400), "/"); 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/serwis.css">
    <script src="https://kit.fontawesome.com/2b87e2445e.js" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="gorny">
        <a href="">Szablony</a>
        <a href="">Moje sprawy</a>
        <a href="">Motyw</a>
        <a href="">Ustawienia</a>
        <a href="login.php">
            <button>Wyloguj</button>
        </a>
    </nav>
<!--  -->
    <header>
            <nav>
                <a href="login.php">
                    <img src="zdjecia/alior-logo.svg" alt="Alior bank">
                </a>


                <a href="" class="arrow">Pulpit</a>
                <a href="" class="arrow">Płatności <i class="fa-solid fa-chevron-down"></i></a>
                <a href="" class="arrow">Oferty <i class="fa-solid fa-chevron-down"></i></a>
                <a href="" class="arrow">Usługi <i class="fa-solid fa-chevron-down"></i></a>
                <a href="" class="arrow">Alior Mobile <i class="fa-solid fa-chevron-down"></i></a>
            </nav>

        </header>
<!--  -->
    <main>
        <div class="Titles">
            <p>Mój portfel</p>
            <a href="">Ukryj Kwoty w Portfelu</a>
        </div>
        <div class="Titles">
            <p>Historia</p>
            <a href="">Zwiń historię</a>
        </div>
        <div class="konto">
            <?php
                include('sql/dane.php');
            ?>

            <div>
                <div></div>
                <div>
                    <b>Konto Freemium</b>
                    <?php   echo $row[0];   ?>
                </div>
                <div>
                    <p>Saldo księgowe</p>
                    <?php   echo $row[1];   ?>
                </div>
                <div>
                    <p>Saldo dostępne</p>
                    <?php   echo $row[2];   ?>
                    <a href="przelew.php"><button > Wyślij przelew</button></a>
                </div>
            </div>
        <!--  -->
        <div class="lokata">
            <div></div>
                <div>
                    <b>Lokata</b>
                    <?php   echo $row[3];   ?>
                </div>
                <div>
                    <p>Saldo księgowe</p>
                    <?php   echo $row[1];   ?>
                </div>
                <div>
                    <p>Saldo dostępne</p>
                    <?php   echo $row[2];   ?>
                    <button>Otwórz nową lokatę</button>
                </div>
            </div>
        </div>
        <div class="historia">
            <?php 
                include('sql/historia.php');
            ?>
        </div>
    </main>
<!--  -->
    <footer>

    </footer>

    <?php
        
        $sql = "SELECT imie, nazwisko, stan from logowanie WHERE login = '$login'";
        $sample = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($sample)) {
            echo "Imie ".$row[0]."<br>";
            echo "Nazwisko ".$row[1]."<br>";
            echo "Stan ".$row[2]."<br>";
        }  
    ?>
</body>
</html>
<?php
    $login = $_SESSION['login'];
    $login_id = $_SESSION['login_id'];


    session_destroy()
?>