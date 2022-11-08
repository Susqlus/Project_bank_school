<?php
include('sql/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administracyjny</title>
</head>
<body>
    <header>Panel Administracyjny</header>
    <main>
        <form action="" method="post">
        <!-- WYBÓR KONTA -->
            <div id="wybor_konto">
                Wybierz konto do edytowania <select name="konta">
                    <option value="FALSE">==</option>
                    <?php
                        $sql = 'SELECT
                                    id,
                                    login
                                FROM
                                    logowanie';

                        $sample = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($sample, MYSQLI_NUM)) {
                            echo "<option value=".$row[0].">".$row[1]."</option>";
                        }
                    ?>  
                </select>
            </div>
        <!-- BLOKOWANIE KONTA -->
            <div>
                
            </div>
        <!--  -->
            <div>
                <?php
                
                ?>
            </div>
        <!--  -->
            <div>
                <?php
                
                ?>
            </div>
        <!--  -->
            <div>
                <?php
                
                ?>
            </div>
        <!--  -->
            <div>
                <?php
                
                ?>
            </div>
        <!--  -->
            <div>
                <?php
                
                ?>
            </div>
        <!--  -->
            <div>
                <input type="submit" value="WYKONAJ" name="wykonaj">
                
            </div>
        </form>
    </main>

    <?php
        if (isset($_POST['wykonaj'])) {
            echo "wykonano";
        }
    ?>


</body>
</html>
