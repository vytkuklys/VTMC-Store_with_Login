<?php
// session_start();

// if(isset($_POST["submit"])){
//     $choice = $_POST["choice"];
    
//     /*score is incremented by one if the answer is correct*/
//     if(!isset($_SESSION["score"])){ $_SESSION["score"] = 0;}
    
//     if(isset($_SESSION["question4"])){
//         $_SESSION["question5"] = $choice;
//         if($choice === "A"){
//             $_SESSION["score"] += 1;
//         }
//         header("location: ../quiz.php");
//         exit();
//     }
//     else if(isset($_SESSION["question3"])){
//         $_SESSION["question4"] = $choice;
//         if($choice === "C"){
//             $_SESSION["score"] += 1;
//         }
//         header("location: ../quiz.php");
//         exit();
//     }
//     else if(isset($_SESSION["question2"])){
//         $_SESSION["question3"] = $choice;
//         if($choice === "A"){
//             $_SESSION["score"] += 1;
//         }
//         header("location: ../quiz.php");
//         exit();
//     }
//     else if(isset($_SESSION["question1"])){
//         $_SESSION["question2"] = $choice;
//         if($choice === "B"){
//             $_SESSION["score"] += 1;
//         }
//         header("location: ../quiz.php");
//         exit();
//     }
//     else{
//         $_SESSION["question1"] = $choice;
//         if($choice === "C"){
//             $_SESSION["score"] += 1;
//         }
//         header("location: ../quiz.php");
//         exit();
//     }
// }else{
//     header("location: ../quiz.php");
//     exit();
// }

print_r($_POST["preke"]);
setcookie("fname", $_POST["preke"], time() + 3600, '/');
header("location: ../vidus.php");
exit();