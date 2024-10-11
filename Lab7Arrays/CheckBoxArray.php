<!DOCTYPE html>
<html>

<head>
    <title>
        LAB 7 - Question 2
    </title>
    <style>
        .redtext{
            color: red;
        }
    </style>
</head>

<body>

    <?php
    if (!isset($_POST['sub'])) {
    ?>

        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
            <table border="1">
                <tr>
                <td colspan="2">Select your Services:</td>
                </tr>
                <tr>
                    <td><label for="i1">TV cable<label></td>
                    <td><input id="i1" type="checkbox" name="techno[]" value="TVcable"></td>
                </tr>
                <tr>
                    <td><label for="i2">Mobile phone</label></td>
                    <td><input id="i2" type="checkbox" name="techno[]" value="Mobilephone"></td>
                </tr>
                <tr>
                    <td><label for="i3">Wired phone</label></td>
                    <td><input id="i3" type="checkbox" name="techno[]" value="Wiredphone"></td>
                </tr>
                <tr>
                    <td><label for="i4">Cable Internet</lable></td>
                    <td><input id="i4" type="checkbox" name="techno[]" value="CableInternet"></td>
                </tr>
                <tr>
                    <td><label for="i5">Fiber Internet</label></td>
                    <td><input id="i5" type="checkbox" name="techno[]" value="FiberInternet"></td>
                </tr>
                <tr>
                    <td><label for="i6">Home Alarm</label></td>
                    <td><input id="i6" type="checkbox" name="techno[]" value="HomeAlarm"></td>
                </tr>
                <tr>
                    <td><label for="i7">Smart Home</label></td>
                    <td><input id="i7" type="checkbox" name="techno[]" value="SmartHome"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="SEND" name="sub"></td>
                </tr>
            </table>
        </form>

    <?php

        // Form handling
    } else {

        echo"<h1 class=redtext>You selected the following services:</h1>";
        
        echo "<ol>";
        if(isset($_POST['techno'])){
            foreach($_POST['techno'] as $value){
                echo "<li>$value</li>";
            }

        }
    
    echo "<a href =".$_SERVER['SCRIPT_NAME'].">Try Again!</a>";

    }
    ?>

</body>

</html>