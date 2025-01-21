<?php
session_start();

if (!isset($_SESSION['success']) || $_SESSION['success'] !== true) {
    header('Location: index.php');
    exit();
}

unset($_SESSION['success']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <style>
        body {
            background-color: #4caf50;
            color: white;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
            flex-direction: column;
            animation: backgroundAnimation 3s ease-in-out infinite alternate;
        }

        h1 {
            font-size: 48px;
            animation: bounceIn 2s ease-in-out;
        }

        .congratulations {
            font-size: 32px;
            margin-top: 20px;
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes backgroundAnimation {
            0% { background-color: #4caf50; }
            50% { background-color: #8bc34a; }
            100% { background-color: #388e3c; }
        }

        @keyframes bounceIn {
            0% { transform: translateY(-2000px); }
            60% { transform: translateY(30px); }
            80% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .button {
            background-color: #fff;
            color: #4caf50;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 30px;
            font-size: 20px;
            transition: all 0.3s ease;
        }

        .button:hover {
            background-color: #4caf50;
            color: white;
            transform: scale(1.1);
        }
    </style>
</head>
<body>

    <h1>Congratulations!</h1>
    <div class="congratulations">
        <p>You have completed all the pages successfully!</p>
    </div>

    <button class="button" onclick="window.location.href='index.php'">Start Over</button>

</body>
</html>
