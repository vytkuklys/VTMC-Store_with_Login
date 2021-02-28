<?php
    include_once 'header.php'
?>
<main>
    <?php
    
    if(isset($_COOKIE["id"])){
        echo "<a href="."vidus.php"." class="."quiz__btn".">Apžiūrėti prekes!</a>";
    }else{
        echo "<h1>Sveiki, prašome prisijungti.</h1>";
    }
    ?>
</main>
</body>

</html>