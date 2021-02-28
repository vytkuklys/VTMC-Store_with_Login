<?php
    session_start();

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(isset($_SESSION['useruid'])){
        $username = $_SESSION['useruid'];
        $scores = getScores($connect, $username);
        if($scores){
            $_SESSION['scores'] = array();
            array_push($_SESSION['scores'], $scores);
        }else{
            $_SESSION['scores'] = "false";
        }
        header("location: ../stats.php");
        exit();
    }