<?php
    session_start();
    include_once 'header.php';
    include_once './includes/dbh.inc.php';
    include_once './includes/functions.inc.php';
?>
<main>
    <?php
        if(isset($_SESSION["question4"])){
            $question = "Kaip vertinate bendrą pirkimo patirtį?";
        }else if(isset($_SESSION["question3"])){
            $question = "Kaip vertinate prekių kainas?";
        }else if(isset($_SESSION["question2"])){
            $question = "Kaip vertinate puslapio funkcionalumą?";
        }else if(isset($_SESSION["question1"])){
            $question = "Kaip vertinate pristatymo greitį?";
        }else{
            $question = "Kaip vertinate prekių kokybę?";
        }
    ?>
    <?php 
    if(!isset($_SESSION["question5"])){
        echo "
        <h1 class=\"prekes__h1 quiz__h1\">".$question."</h1>
        <form action=\"./includes/apklausa.inc.php\" class=\"cart__forma quiz__forma\" method=\"post\">
            <label for=\"vertinimas\" style=\"font-size: 1.5rem; color: #BC544B;\">Prastai</label>
            <input type=\"radio\" name=\"balas\" id='choice' value=\"1\">
            <input type=\"radio\" name=\"balas\" id='choice' value=\"2\">
            <input type=\"radio\" name=\"balas\" id='choice' value=\"3\">
            <input type=\"radio\" name=\"balas\" id='choice' value=\"4\">
            <input type=\"radio\" name=\"balas\" id='choice' value=\"5\">
            <p style=\"font-size: 1.6rem; color: greenyellow;\">Gerai</p> <br>
            <button type=\"submit\" name=\"submit\" class=\"prekes__btn quiz__btn\">Pateikti</button>
        </form>";
    }else{
            $score = ($_SESSION['score']);
            $score = ($score * 100) / 25;
            $_SESSION['percentScore']  = $score;
                echo "
                    <h1 class=\"prekes__h1 quiz__h1\">Mes vertiname Jūsų grįžtamąjį ryšį<br><span style=\"font-weight:normal;\">".$score."%</span></hą>";

                if(!isset($_SESSION['insertedScore'])){
                    header("location: ./includes/insertScore.inc.php");
                }else{
                    $data = array_keys($_SESSION);
                    for($i = 0; count($_SESSION) > 0; $i++){
                        unset($_SESSION[$data[$i]]);
                    }
                }
        }
    ?>     
    </div>
</main>
</body>

</html>