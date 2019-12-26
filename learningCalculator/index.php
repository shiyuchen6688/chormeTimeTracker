<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <Title>Title</Title>
    </head>
    <body>
        <form>
            <input type="text" name="num1" placeholder="Number 1">
            <input type="text" name="num2" placeholder="Number 2">
            <select name="operator">
                <option>None</option>
                <option>Add</option>
                <option>Subtrct</option>
                <option>Multiply</option>
                <option>Divide</option>
            </select>
            <br>
            <button type="submit" name="submit" value="submit">Calculate</button>
        </form>

        <p>The answer is:</p>  
        <?php
            if (isset($_GET["submit"])) {
                $number1 = $_GET["num1"];
                $number2 = $_GET["num2"];
                $operator = $_GET["operator"];
                switch($operator) {
                    case "None":
                        echo "You need to select a method!";
                        break;
                    case "Add":
                        echo $number1 + $number2;
                        break;
                    case "Subtract":
                        echo $number1 - $number2;
                        break;
                    case "Multiply":
                        echo $number1 * $number2;
                        break;
                    case "Divide":
                        echo $number1 / $number2;
                        break;

                }
            }
        ?>
    </body>
</html>