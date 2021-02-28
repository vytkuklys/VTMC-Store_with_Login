<?php
    require_once 'header.php'
?>

<main>
    <?php 
        if(!isset($_SESSION['scores'])){
            header("Location: ./includes/stats.inc.php");
        }else{
            if($_SESSION['scores'] === "false"){
                $title = 'Take a quiz to have your results displayed!';
                
            }else{
                $title = 'Statistical report';
                $scores = $_SESSION['scores'];
                $sum = array_sum($scores[0]);
                $attempts = count($scores[0]);
            }
          
        }
    if($title !== "Statistical report"){
        echo "<h2>".$title."</h2>";
    }else{
        ?>
    <h2><?php echo $title ?></h2>
    <table>
        <tr>
            <th>Attempt</th>
            <th>Score</th>
        </tr>
        <?php 
            for($i = 0; $i < count($scores[0]); $i++){
                echo "
                <tr>
                    <td>".($i+1)."</td>
                    <td>".$scores[0][$i]."%</td>
                </tr>";
            }
        ?>
        <tr>
            <td class="quiz__td" colspan="3">Totals</td>
        </tr>
        <tr>
            <?php 
            echo "
            <td>".$attempts."</td>
            <td>".number_format(($sum / $attempts), 2)."%</td>
            ";
            ?>
        </tr>
    </table>
    <?php
    }
    ?>
</main>
</body>
</html>