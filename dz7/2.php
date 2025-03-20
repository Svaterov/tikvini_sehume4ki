<?php
session_start();


$questions1 = [
    "1. Какой язык программирования используется для веб-разработки?" => [
        "A" => "Python",
        "B" => "JavaScript",
        "C" => "C++",
        "D" => "Java",
        "correct" => "B"
    ],
    "2. Какой из этих языков является языком разметки?" => [
        "A" => "HTML",
        "B" => "CSS",
        "C" => "JavaScript",
        "D" => "PHP",
        "correct" => "A"
    ],
 
];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;
    foreach ($questions1 as $question => $answers) {
        if (isset($_POST[$question]) && $_POST[$question] === $answers['correct']) {
            $score++;
        }
    }
    $_SESSION['score1'] = $score; 
    header("Location: page2.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тест - Страница 1</title>
</head>
<body>
    <h1>Тест - Страница 1</h1>
    <form method="POST">
        <?php foreach ($questions1 as $question => $answers): ?>
            <p><?php echo $question; ?></p>
            <?php foreach ($answers as $key => $value): ?>
                <?php if ($key !== 'correct'): ?>
                    <input type="radio" name="<?php echo $question; ?>" value="<?php echo $answers['correct']; ?>" required> <?php echo $key . ": " . $value; ?><br>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
        <button type="submit">Next</button>
    </form>
</body>
</html>
Страница 2: Вопросы с несколькими правильными ответами
php
Копировать код
<?php
session_start();


$questions2 = [
    "1. Какие из следующих языков являются языками программирования? (Выберите все подходящие)" => [
        "A" => "Python",
        "B" => "HTML",
        "C" => "JavaScript",
        "D" => "CSS",
        "correct" => ["A", "C"]
    ],
    "2. Какой из этих языков является языком стилей?" => [
        "A" => "HTML",
        "B" => "CSS",
        "C" => "JavaScript",
        "D" => "PHP",
        "correct" => ["B"]
    ],

];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;
    foreach ($questions2 as $question => $answers) {
        $correctAnswers = $answers['correct'];
        $userAnswers = isset($_POST[$question]) ? $_POST[$question] : [];
        if (empty(array_diff($correctAnswers, $userAnswers)) && empty(array_diff($userAnswers, $correctAnswers))) {
            $score++;
        }
    }
    $_SESSION['score2'] = $score; 
    header("Location: page3.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тест - Страница 2</title>
</head>
<body>
    <h1>Тест - Страница 2</h1>
    <form method="POST">
        <?php foreach ($questions2 as $question => $answers): ?>
            <p><?php echo $question; ?></p>
            <?php foreach ($answers as $key => $value): ?>
                <?php if ($key !== 'correct'): ?>
                    <input type="checkbox" name="<?php echo $question; ?>[]" value="<?php echo $key; ?>"> <?php echo $key . ": " . $value; ?><br>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
        <button type="submit">Next</button>
    </form>
</body>
</html>
Страница 3: Вопросы с текстовыми ответами
php
Копировать код
<?php
session_start();


$questions3 = [
    "1. Какой язык программирования используется для создания динамических веб-страниц?" => "PHP",
    "2. Какой язык используется для создания стилей веб-страниц?" => "CSS",

];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;
    foreach ($questions3 as $question => $correctAnswer) {
        if (isset($_POST[$question]) && strtolower(trim($_POST[$question])) === strtolower($correctAnswer)) {
            $score++;
        }
    }
    $_SESSION['score3'] = $score; 
    header("Location: results.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тест - Страница 3</title>
</head>
<body>
    <h1>Тест - Страница 3</h1>
    <form method="POST">
        <?php foreach ($questions3 as $question => $correctAnswer): ?>
            <p><?php echo $question; ?></p>
            <input type="text" name="<?php echo $question; ?>" required>
        <?php endforeach; ?>
        <button type="submit">Finish</button>
    </form>
</body>
</html>
Страница результатов
php
Копировать код
<?php
session_start();

$score1 = isset($_SESSION['score1']) ? $_SESSION['score1'] : 0;
$score2 = isset($_SESSION['score2']) ? $_SESSION['score2'] : 0;
$score3 = isset($_SESSION['score3']) ? $_SESSION['score3'] : 0;


$totalScore = ($score1 * 1) + ($score2 * 3) + ($score3 * 5);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Результаты теста</title>
</head>
<body>
    <h1>Результаты теста</h1>
    <p>Правильные ответы на первой странице: <?php echo $score1; ?></p>
    <p>Правильные ответы на второй странице: <?php echo $score2; ?></p>
    <p>Правильные ответы на третьей странице: <?php echo $score3; ?></p>
    <p>Ваш общий балл: <?php echo $totalScore; ?></p>
</body>
</html>