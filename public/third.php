<?php
session_start();

$num1 = rand(1, 10);
$num2 = rand(1, 10);
$question = "$num1 + $num2";
$response = $num1 + $num2;

$wrong_answer = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['answer'] == $_POST['correct_answer']) {
        $_SESSION['fourth'] = true;
        unset($_SESSION['third']); 
        header('Location: fourth.php');
        exit();
    } else {
        $wrong_answer = true;  
    }
}

if (!isset($_SESSION['third']) || $_SESSION['third'] !== true) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Third Page</title>
    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            color: white;
            background-color: green;
            font-size: 16px;
            display: none;
        }

        .alert.show {
            display: block;
        }
    </style>
</head>
<body>
    <h1>Third Page: Solve the problem</h1>
    <p><?php echo "What is $question?"; ?></p>

    <?php if ($wrong_answer): ?>
        <div class="alert show">Wrong answer! Try again.</div>
    <?php endif; ?>

    <form action="third.php" method="POST">
        <label for="answer">Your Answer:</label>
        <input type="number" id="answer" name="answer" required>
        <input type="hidden" name="correct_answer" value="<?php echo($response); ?>">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
