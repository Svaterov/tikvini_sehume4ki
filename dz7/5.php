<?php
session_start();


$score1 = isset($_SESSION['score1']) ? $_SESSION['score1'] : 0;
$score2 = isset($_SESSION['score2']) ? $_SESSION['score2'] : 0;
$score3 = isset($_SESSION['score3']) ? $_SESSION['score3'] : 0;


$totalScore = $score1 + $score2 + $score3;

if (isset($_POST['restart'])) {
    session_destroy(); 
    header("Location: page1.php"); /
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Результаты теста</title>
</head>
<body>
    <h1>Результаты теста</h1>
    <p>Вы набрали:</p>
    <ul>
        <li>Страница 1: <?php echo $score1; ?> правильных ответов</li>
        <li>Страница 2: <?php echo $score2; ?> правильных ответов</li>
        <li>Страница 3: <?php echo $score3; ?> правильных ответов</li>
    </ul>
    <p>Общий результат: <?php echo $totalScore; ?> правильных ответов</p>

    <form method="POST">
        <button type="submit" name="restart">Начать заново</button>
    </form>
</body>
</html>