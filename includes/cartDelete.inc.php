<?php
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(isset($_POST['submit'])){
        $prekesId = $_POST['preke'];
        $id = $_COOKIE['id'];
        removeOneGood($connect, $id, $prekesId);
    }