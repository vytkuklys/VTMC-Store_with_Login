<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Quiz</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css?rnd=132">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="index.php">Pagrindinis</a></li>
                    <?php
                        if(isset($_COOKIE["id"])){
                            echo "<li><a href='vidus.php'>Prekės</a></li>";
                            echo "<li><a href='cart.php'>Krepšelis</a></li>";
                            echo "<li><a href='apklausa.php'>Apklausa</a></li>";
                            echo "<li><a href='includes/logout.inc.php'>Atsijungti</a></li>";
                        }else{
                            echo "<li><a href='signup.php'>Užsiregistruoti</a></li>";
                            echo "<li><a href='login.php'>Prisijungti</a></li>";
                        }
                    ?>
                </ul>
            </nav>
        </header>