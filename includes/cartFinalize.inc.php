<?php
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(isset($_POST['submit'])){
        $id = $_COOKIE['id'];
        removeAllGoods($connect, $id);
    }