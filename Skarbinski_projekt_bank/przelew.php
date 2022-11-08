<?php
    include('sql/dane.php');
    

    echo $row[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <main>
        <div class="przelewy">

        </div>

        <div class="prawy">
            <p>Utwórz przelew krajowy</p>
            <form action="" method="post">
                <div>
                    <label for="">Z rachunku</label>
                        <select name="" id="">
                            <?php


                            
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="">Nazwa odbiorcy</label>
                                <a href="">Książka odbiorców</a>
                            <input type="text" name="" id="" placeholder="Wyszukaj lub wpisz odbiorcę">
                    <a href="">Książka odbiorców</a>
                    </div>
                    <div>
                        <label for="">Numer rachunku</label>
                            <input type="text" name="" id="" placeholder="Wpisz numer rachunku ">
                    </div>
                    <div>
                        <label for="">Kwota przelewu</label>
                            <input type="text" name="" id="" placeholder="0.00">
                    </div>
                    <div>
                        <label for="">Tytuł przelewu</label>
                            <input type="text" name="" id="" placeholder="Przelew środków">
                    <a href="">Książka odbiorców</a>
                    </div>

                    


                    


                    

            </form>
        </div>
    </main>
</body>
</html>


