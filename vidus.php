<?php
    include_once 'header.php';
    include_once './includes/dbh.inc.php';
    include_once './includes/functions.inc.php';
?>
<main>
    

    <h1 class="prekes__h1">Prekės</h1>
    
    <div class="prekes__container">
    <?php
        $query = "SELECT * FROM prekes;";
        $resultData = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_assoc($resultData)) {
            $preke = $row['pavadinimas'];
            //--------tik su $row['pavadinimas'] naudojau kintamaji, nes post persiusdavo tik pirma zodi, jei megindavau iskart issistatyti tokiu budu: <input value=".$row['pavadinimas']."
            echo "
            <form action='includes/vidus.inc.php' method='post' class=\"prekes__forma\">
                <fieldset>
                    <label for=\"preke\"><span class=\"prekes__kaina\">".$row['kaina']."€</span> /vnt. <br><span class=\"prekes__kategorija\">".$row['apibudinimas']."</span></label><br><span
                    class=\"prekes__preke\">".$preke."</span> <br>
                    <input type=\"hidden\" name=\"preke\" value=\"$preke\">
                    <button type=\"submit\" name=\"submit\" class=\"prekes__btn\">Pridėti</button>
                </fieldset>
            </form>
        ";
        }
        ?>
       
    </div>

    <?php 
        if(isset($_GET['cart'])){
            echo "
                <form action='./cart.php' style=\"margin: 0 auto;\">
            <button type=\"submit\" class=\"prekes__btn\" style=\"font-size: 1.15rem; margin-top: 3rem;\">Pradėti pirkimą</button>
            </form>
        ";
        }
    ?> 
</main>
</body>

</html>