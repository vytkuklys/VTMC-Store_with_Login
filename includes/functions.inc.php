<?php

function emptyInputSignUp($username, $name, $lastname, $pwd, $pwdRepeat){
    $result;
    if(empty($username) || empty($name) || empty($lastname) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat){
    $result;
    if($pwd !== $pwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExists($connect, $username){
    $sql = "SELECT * FROM vartotojai WHERE vartotojo_vardas = ?;";
    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}
function createUser($connect, $username, $name, $lastname, $pwd){
    $query = "INSERT INTO vartotojai (vartotojo_vardas, vardas, pavarde, slaptazodis) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt, $query)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $username, $name, $lastname, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../signup.php?error=none');
    exit();
}

function emptyInputLogin($username, $pwd){
    $result;
    if(empty($username) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($connect, $username, $pwd){
    $uidExists = uidExists($connect, $username);

    if($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $uidExists["slaptazodis"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else{
        setcookie("id", $uidExists["id"], time() + 3600, '/');
        header("location: ../index.php");
        exit();
    }
}

function insertScore($connect, $score, $username){
    $query = "INSERT INTO vertinimai (vartotojo_id, vidurkis) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($connect);
    if(!mysqli_stmt_prepare($stmt, $query)){
        header("location: ../quiz.php?error=somethingWentWrong");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $score, $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../quiz.php');
    exit();
}

function getGoods($connect){
    $query = "SELECT * FROM prekes;";
    // $stmt = mysqli_stmt_init($connect);
    // if(!mysqli_stmt_prepare($stmt, $query)){
    //     header("location: ../stats.php?error=somethingWentWrong");
    //     exit();
    // }

    // mysqli_stmt_bind_param($stmt);
    // mysqli_stmt_execute($stmt);

    // $resultData = mysqli_stmt_get_result($stmt);
    $resultData = mysqli_query($connect, $query);
    $arr = array();
    while ($row = mysqli_fetch_assoc($resultData)) {
        array_push($arr, $row);
    }
    setcookie('returned', 'true', time() + 3600 * 4, '/');
    if(!empty($arr)){
        return $arr;
    }else{
        return false;
    }

    // mysqli_stmt_close($stmt);
    mysqli_close($connect);
}