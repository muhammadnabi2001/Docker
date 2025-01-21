<?php
$number1 = rand(1, 20);
$number2 = rand(1, 20);
$question = "$number1 + $number2";
$answer = $number1 + $number2;

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Page</title>
</head>

<body>
    <h1>Solve the following problem:</h1>
    <p><?php echo "What is $question?"; ?></p>

    <form action="second.php" method="POST">
        <label for="answer">Your Answer:</label>
        <input type="number" id="answer" name="answer" required>
        <input type="hidden" name="correct_answer" value="<?php echo $answer; ?>">
        <button type="submit">Submit</button>
    </form>
</body>

</html>
