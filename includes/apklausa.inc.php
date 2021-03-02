<?php
session_start();
if(isset($_POST['submit'])){
    $choice = $_POST["balas"];
    
    if(!isset($_SESSION["score"])){ $_SESSION["score"] = 0;}
    
    if(isset($_SESSION["question4"])){
        $_SESSION["question5"] = $choice;
        $_SESSION["score"] += (int)$choice;
        header("location: ../apklausa.php");
        exit();
    }
    else if(isset($_SESSION["question3"])){
        $_SESSION["question4"] = $choice;
        $_SESSION["score"] += (int)$choice;
        header("location: ../apklausa.php");
        exit();
    }
    else if(isset($_SESSION["question2"])){
        $_SESSION["question3"] = $choice;
        $_SESSION["score"] += (int)$choice;
        header("location: ../apklausa.php");
        exit();
    }
    else if(isset($_SESSION["question1"])){
        $_SESSION["question2"] = $choice;
        $_SESSION["score"] += (int)$choice;
        header("location: ../apklausa.php");
        exit();
    }
    else{
        $_SESSION["question1"] = $choice;
        $_SESSION["score"] += (int)$choice;
        header("location: ../apklausa.php");
        exit();
    }
}