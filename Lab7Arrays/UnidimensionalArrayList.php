<!DOCTYPE html>
<html>
<head>
    <title>Unidimensional Array</title>
</head>
<body>

<h1>Enter your grade separeted by a comma between each 2 grades</h1>

<?php
    if(!isset($_POST['sub'])){
?>

        <form action=" <?php echo $_SERVER['SCRIPT_NAME'];?>" method="post">
        <h2 for="title">Enter a set of minimum 2 numbers between 0 to 100</h2><br>
        
        <td><input type="text" id="number" name="numberBox"><br></td>

        <td><input type="submit" value="SEND" name = "sub"></td>
        </form> 
    <?php
    }
    else if(isset($_POST['sub'])){
        $values = $_POST['numberBox'];
        $arrayString = explode(',',$values);
        $array = array_map('floatval',$arrayString);
        $isRight = True;
        $messages = array(
            'input' => 'You entered: ',
            'size' => 'The number of grades entered is: ',
            'success' => 'The number of grades greater than or equal to 60% is: ',
            'failure' => 'The number of grades lower than 60% is: ',
            'avg' => 'The average grade is: ',
            'greatest' => 'The greatest grade is: ',
            'lowest' => 'The lowest grade is: ',
            'errVal' => "<b>You didn't enter grades between only 0 and 100!</b>",
            'errQty' => "<b>You didn't enter a minimum of 2 grades!</b>",
            'errNotNbr' => "<b>You didn't enter only numeric values!</b>"
        );   
        $bigger60 = [];
        $smaller60 = [];
        $greatestGrade = 0;
        $lowestGrade = 100;
        $avgGrade = 0;
        $sumGrades = 0;

        foreach($array as $val){
            if(count($array) < 2){
                echo $messages['input']. $values;
                echo $messages['errQty'];
                $isRight = false;
                exit;
            }
            else if(!is_numeric($val)){
                echo $messages['input']. $values;
                echo $messages['errNotNbr'];
                $isRight = false;
                exit;
            }
            else if($val < 0 || $val > 100){
                echo $messages['input']. $values;
                echo $messages['errVal'];
                $isRight = false;
                exit;
            }
        }
        if($isRight){
            for($i = 0; $i < count($array); $i++ ){
                if($array[$i] >= 60){
                    $bigger60[] = $array[$i];
                }
                else if($array[$i] < 60){
                    $smaller60[] = $array[$i];
                }
                else if($array[$i] < $lowestGrade){
                    $lowestGrade = $array[$i];
                }
                else if($array[$i] > $greatestGrade){
                    $greatestGrade = $array[$i];
                }
                
                $sumGrades += $array[$i];
            }

            $avgGrade = ($sumGrades/count($array));

            echo $messages['input']. $values."<br>";
            echo $messages['size']. count($array)."<br>";
            echo $messages['success']. count($bigger60)."<br>";
            echo $messages['failure']. count($smaller60)."<br>";
            echo $messages['avg']. $avgGrade."<br>";
            echo $messages['greatest']. $greatestGrade."<br>";
            echo $messages['lowest']. $lowestGrade."<br>";
        }
    }
    ?>
</body>
</html>