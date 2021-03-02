<?php
    include_once 'header.php';
    include_once './includes/dbh.inc.php';
    include_once './includes/functions.inc.php';
?>
    <main>
    <h1 class="prekes__h1">Krepšelis</h1>
        <?php
        $id = $_COOKIE['id'];
        $query = "SELECT prekes_id, pavadinimas, kaina FROM prekes INNER JOIN cart_userid ON prekes.prekes_id = cart_userid.preke_id WHERE vartotojo_id = $id;";
        $resultData = mysqli_query($connect, $query);
        mysqli_close($connect);
        $i = 0;
        while ($row = mysqli_fetch_assoc($resultData)) {
            $prekesId = $row['prekes_id'];
            $i ++;
            echo "
                <form action='./includes/cartDelete.inc.php' method='post' class=\"prekes__forma cart__forma\">
                <label for=\"preke\">$i)  <span> ".$row['kaina']."€</span> /vnt.<span class=\"prekes__preke cart__preke\">".$row['pavadinimas']."</span></label>
                <input type=\"hidden\" name=\"preke\" value=\"$prekesId\">
                <button type=\"submit\" name=\"submit\" class=\"prekes__btn cart__btn\">Pašalinti prekę</button>
                </form>
            ";
        }
        
         if($i == 0){
            if(isset($_GET['paidClient'])){
                echo "
                <h2>Dėkojame, kad pirkote iš šios parduotuvės :)<h2>
                ";
                unset($_GET['paidClient']);
                echo "
                <h4 style=\"font-size: 1.2rem;\">Ar likote patenkinti savo patirtimi? <a href=\"./apklausa.php\" style=\"color: greenyellow; font-size: 1.3rem;\">Čia</a> galite įvertinti mūsų paslaugų kokybę.</h4>
                ";
            }else{
                echo "
                <h4 style=\"font-size: 1.2rem;\">Jūsų krepšelis šiuo metu yra tuščias. <a href=\"./vidus.php\" style=\"color: greenyellow; font-size: 1.3rem;\">Čia</a> galite rasti daugiau prekių.</h4>
                ";
            }
         }else{
            echo "<form action='./includes/cartFinalize.inc.php' method='post' style=\"margin: 0 auto;\">
            <button type=\"submit\" name=\"submit\" class=\"prekes__btn\" style=\"font-size: 1.15rem; margin-top: 3.5rem;\">Pirkti</button>
            </from>";
         }
        ?>
    <main>
    </body>
</html>