<?php
    session_start();
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(isset($_SESSION['percentScore'])){
        $score = $_SESSION['percentScore'];
        $username = $_SESSION['useruid'];
        $_SESSION['insertedScore'] = true;
        insertScore($connect, $score, $username);
    }