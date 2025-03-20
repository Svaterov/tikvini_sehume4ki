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
    <script>
        function validateForm() {
            const questions = document.querySelectorAll('input[type="text"]');
            for (let question of questions) {
                if (question.value.trim() === "") {
                    alert("Пожалуйста, ответьте на все вопросы перед переходом на следующую страницу.");
                    return false;
                }
            }
            return true;
        }
    </script>
</head>
<body>
    <h1>Тест - Страница 3</h1>
    <form method="POST" onsubmit="return validateForm();">
        <?php foreach ($questions3 as $question => $correctAnswer): ?>
            <p><?php echo $question; ?></p>
            <input type="text" name="<?php echo $question; ?>" required>
        <?php endforeach; ?>
        <button type="submit">Finish</button>
    </form>
</body>
</html>