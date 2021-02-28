<?php
    include_once 'header.php';
    include_once './includes/dbh.inc.php';
    include_once './includes/functions.inc.php';
?>
<main>
    <!-- <?php
        if(isset($_SESSION["question4"])){
            $question = "What are exact numeric data types?";
            $a = "NUMERIC, DECIMAL, INTEGER";
            $b = "FLOAT, REAL, DOUBLE PRECISION";
            $c = "BLOB, CHAR, CLOB";
        }else if(isset($_SESSION["question3"])){
            $question = "Can SQL be used to simulate any Turing machine?";
            $a = "Not anymore";
            $b = "No";
            $c = "Yes";
        }else if(isset($_SESSION["question2"])){
            $question = "Which operator is used in a WHERE clause to search for a specified pattern in a column?";
            $a = "LIKE";
            $b = "BETWEEN";
            $c = "IN";
        }else if(isset($_SESSION["question1"])){
            $question = "What is the correct statement to delete exsisting records in a table?";
            $a = "DELETE FROM table_name IF condition;";
            $b = "DELETE FROM table_name WHERE condition;";
            $c = "DELETE FROM table_name THERE condition;";
        }else{
            $question = "What is the correct syntax for insertion of new records to a table?";
            $a = "INSERT TO table_name VALUES (value1, value2, value3)";
            $b = "INSERT INFO table_name VALUES (value1, value2, value3)";
            $c = "INSERT INTO table_name VALUES (value1, value2, value3)";
        }
    ?>
    <?php 
    if(!isset($_SESSION["question5"])){
        echo "
        <h2 class='quiz__h2'>".$question."</h2>
        <form action='includes/quiz.inc.php' method='post' class='quiz__form'>
            <label for='choiceA' class="."quiz__label"."><input type='radio' id='choiceA' name='choice' value='A'>".$a."</label><br>
            <label for='choiceB' class="."quiz__label"."><input type='radio' id='choiceB' name='choice' value='B'>".$b."</label><br>
            <label for='choiceC' class="."quiz__label"."><input type='radio' id='choiceC' name='choice' value='C'>".$c."</label><br>
            <button type='submit' name='submit'>Submit</button>
        <form>";
    }else{
            $score = ($_SESSION['score']);
            $score = ($score * 100) / 5;
            $_SESSION['percentScore']  = $score;
            if($score === 100){
                echo "<h2>Congratulations you got a perfect score of ".$score."%!</h2>";
                if(!isset($_SESSION['insertedScore'])){
                    header("location: ./includes/insertScore.inc.php");
                }else{
                    $data = array_keys($_SESSION);
                    for($i = 2; count($_SESSION) > 2; $i++){
                        unset($_SESSION[$data[$i]]);
                    }
                }
            }else{
                echo "<h2>Your quiz score is ".$score."%</h2>";
                if(!isset($_SESSION['insertedScore'])){
                    header("location: ./includes/insertScore.inc.php");
                }else{
                    $data = array_keys($_SESSION);
                    for($i = 2; count($_SESSION) > 2; $i++){
                        unset($_SESSION[$data[$i]]);
                    }
                }
            }
    }
    ?> -->

    <h1>Prekės</h1>
    
    <div class="prekes__form">
    <?php
        if(isset($_COOKIE['fname'])){
            print_r($_COOKIE);
        }
        // $query = "SELECT * FROM prekes;";
        // $resultData = mysqli_query($connect, $query);
        // $arr = array();
        // while ($row = mysqli_fetch_assoc($resultData)) {
        //     array_push($arr, $row);
        // }
        // setcookie('returned', 'true', time() + 3600 * 4, '/');
        // if(!empty($arr)){
        //     return $arr;
        // }else{
        //     return false;
        // }
        
        // print_r($arr);
    echo "
    <form action='includes/quiz.inc.php' method='post'>
        <fieldset>
        <label for=\"brokolis\"><span class=\"prekes__kaina\">169€</span> /vnt.<span class=\"prekes__preke\">Brokolis</span> <br><span class=\"prekes__kategorija\">Laisvalaikio prekė</span></label><br>
        <input type=\"hidden\" name=\"preke\" value=\"brokolis\">
        <button type=\"submit\" name=\"submit\">Registruotis</button>
        </fieldset>
    </form>
    <form action='includes/quiz.inc.php' method='post'>
        <fieldset>
        <label for=\"blynas\"><span class=\"prekes__kaina\">169€</span> /vnt.<span class=\"prekes__preke\">Brokolis</span> <br><span class=\"prekes__kategorija\">Laisvalaikio prekė</span></label><br>
        <input type=\"hidden\" name=\"preke\" value=\"blynas\">
        <button type=\"submit\" name=\"submit\">Registruotis</button>
        </fieldset>
    </form>
        ";
        ?>
        <!-- <label for='choiceB' style='display: inline-block;'>Brokolis</label>
        <input type='submit' id='choiceB' name='choice' value='A'><br> -->
        <!-- <input type=\"text\" id=\"brokolis\" name=\"fname\" value=\"pirkti\"><br> -->
        <!-- <label for='choiceB'><input type='submit' id='choiceB' name='choice' value='B'>Blynas</label><br> -->
    </div>
</main>
</body>

</html>