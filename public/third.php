<?php
session_start();
$num1 = rand(1, 10);
$num2 = rand(1, 10);
$question = "$num1 + $num2";
$response = $num1 + $num2;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['answer'] == $_POST['correct_answer']) {
        $_SESSION['third'] = true;
        header('Location: third.php');
        exit();
    } else {
        header('Location: second.php');
        exit();
    }
}

if (!isset($_SESSION['third']) || $_SESSION['third'] !== true) {
    header('Location: second.php');
    exit();
}
unset($_SESSION['third']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Third Page</title>
</head>
<body>
    <h1>Third Page</h1>
    <h1>Solve the following problem:</h1>
    <p><?php echo "What is $question?"; ?></p>

    <form action="fourth.php" method="POST">
        <input type="number" id="answer" name="answer" required>
        <input type="hidden" name="correct_answer" value="<?php echo($response); ?>">
        <button type="submit">Finish</button>
    </form>
</body>
</html>
