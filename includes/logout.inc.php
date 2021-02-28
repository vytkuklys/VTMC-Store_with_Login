<?php   
    setcookie("id", "a", time() - 1, '/');

    header("location: ../index.php");