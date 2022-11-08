<?php   
    session_start();
    include('sql/database.php');

    if (isset($_SESSION['login_id'])) {
        $sql = 'SELECT 
                blokada 
            FROM 
                logowanie 
            WHERE id = '.$_SESSION['login_id'];
        $sample = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($sample, MYSQLI_NUM);     
                    
        if ($row[0] >= 3) {
            echo "konto zostało zablokowane";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link rel="stylesheet" href="styles/Login.css">
</head>
<body>
    <main>
    <!-- góra -->
        <header>
            <a href="login.php">
                <img src="zdjecia/alior-logo.svg" alt="Alior bank">
            </a>
            <p>Zaloguj się</p>
        </header>
    <!-- Wszystko po srodku, inputy itd -->
        <section>
            <div class="">
                <div>
                    <p>Witamy w Alior Banku!</p>
                </div>
                <!-- tutaj formularz -->
                <form method="post" id="FormLogin">
                    <label for="LOGIN" id="FormTitle">Login</label>
                    <input type="text" name="LOGIN" placeholder="wprowadź login">
                    <input type="submit" value="DALEJ">
                </form>
            </div>
            <div></div>
        </section>
    <!-- jakies cosie do byly na dole -->
        <footer>

        </footer>
    </main>



    
    
    <?php 
    
        if (isset($_POST['LOGIN'])) {
            $sql = 'SELECT id, login, blokada from logowanie';
            $sample = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_array($sample)) {
                if ($row[2] >= 3) {
                    echo "konto zostało zablokowane";
                    $_SESSION['login_id'] = $row[0];
                    header('Location: login.php');
                }
                else {
                    if ($row[1] == $_POST['LOGIN']) {
                        echo 'jest równy';
    
                        $_SESSION['login'] = $_POST['LOGIN'];
                        $_SESSION['login_id'] = $row[0];
                        $_SESSION['blokad-a'] = $row[2];
                        header('Location: pass.php');
                    }
                }
                
            }

            // header('Location: pass.php');
        }
        
    ?>
</body>
</html>
