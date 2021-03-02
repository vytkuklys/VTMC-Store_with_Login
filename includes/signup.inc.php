<?php
    if(isset($_POST["submit"])){

        $username = $_POST["username"];
        $name = $_POST["name"];
        $lastname = $_POST["lastname"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwdrepeat"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if(emptyInputSignUp($username, $name, $lastname, $pwd, $pwdRepeat) !== false){
            header("location: ../signup.php?error=emptyinput");
            exit();
        }

        if(invalidUid($username) !== false){
            header("location: ../signup.php?error=invaliduid");
            exit();
        }
        if(pwdMatch($pwd, $pwdRepeat) !== false){
            header("location: ../signup.php?error=invalidpassword");
            exit();
        }
        if(uidExists($connect, $username) !== false){
            header("location: ../signup.php?error=usernametaken");
            exit();
        }
        createUser($connect, $username, $name, $lastname, $pwd);
    }
    else{
        header("location: ../signup.php");
        exit();
    }
