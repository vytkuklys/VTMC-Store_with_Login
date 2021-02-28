<?php
    include_once 'header.php'
?>
<main>
    <section class="form--flex">
        <h2>Prisijungti</h2>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Vartotojo vardas..."> <br>
            <input type="password" name="pwd" placeholder="Slaptažodis..."> <br>
            <button type="submit" name="submit">Prisijungti</button>
        </form>
        <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Visi laukai turi būti užpildyti!</p>";
            }else if($_GET["error"] == "wronglogin"){
                echo "<p>Neteisingas vartotojo vardas arba slaptažodis!</p>";
            }
        }
    ?>
    </section>
</main>
</body>

</html>