<?php
    include_once 'header.php'
?>
<main>
    <section class="form--flex">
        <h2>Registracijos forma</h2>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="username" value = "asdfs" placeholder="Vartotojo vardas..."> <br>
            <input type="text" name="name" value = "asdf" placeholder="Vardas..."> <br>
            <input type="text" name="lastname"  value = "fsf" placeholder="Pavarde..."> <br>
            <input type="password" name="pwd" placeholder="Slaptažodis..."> <br>
            <input type="password" name="pwdrepeat" placeholder="Pakartoti slaptažodį..."> <br>
            <button type="submit" name="submit">Registruotis</button>
        </form>
        <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyinput"){
                        echo "<p>Visi laukai turi būti užpildyti!</p>";
                    }else if($_GET["error"] == "invaliduid"){
                        echo "<p>Pasirinkite kitą vartotojo vardą!</p>";
                    }else if($_GET["error"] == "invalidpassword"){
                        echo "<p>Nesutampa įvesti slaptažodžiai!</p>";
                    }else if($_GET["error"] == "usernametaken"){
                        echo "<p>Šis vartotojo vardas yra užimtas!</p>";
                    }else if($_GET["error"] == "stmtfailed"){
                        echo "<p>Įvyko klaida, mėginkite dar sykį!</p>";
                    }else {
                        echo "<p>Paskyra sukurta sėkmingai! Galite prisijungti!</p>";
                    }
                }
            ?>
    </section>

</main>
</body>

</html>