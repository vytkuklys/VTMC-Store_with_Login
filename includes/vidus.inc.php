<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(isset($_POST["submit"])){
    $id = $_COOKIE['id'];
    $preke = $_POST['preke'];
    addToCart($connect, $id, $preke);
}else{
    header("location: ../vidus.php");
    exit();
}
