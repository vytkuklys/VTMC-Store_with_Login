<?php
    session_start();
    require_once './dbh.inc.php';
    require_once './functions.inc.php';

    if(isset($_SESSION['percentScore'])){
        $score = $_SESSION['percentScore'];
        $username = $_COOKIE['id'];
        $_SESSION['insertedScore'] = true;
        echo $username;
        echo $score;
        insertScore($connect, $username, $score);
    }