<?php
session_start();
$num1=rand(1,10);
$num2=rand(1,10);
$question = "$num1 + $num2";
$responce=$num1+$num2;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['answer'] == $_POST['correct_answer']) {
        $_SESSION['second'] = true;
        header('Location: second.php');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
}

if (!isset($_SESSION['second']) || $_SESSION['second'] !== true) {
    header('Location: index.php');
    exit();
}

unset($_SESSION['second']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Second Page</title>
</head>
<body>
<h1>Second Page</h1>
<h1>Solve the following problem:</h1>
    <p><?php echo "What is $question?"; ?></p>
    <form action="third.php" method="POST">
        <input type="number" id="answer" name="answer" required>
        <input type="hidden" name="correct_answer" value="<?php echo($responce)?>">
        <button type="submit">Next</button>
    </form>
</body>
</html>
