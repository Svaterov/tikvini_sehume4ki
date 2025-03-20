<?php
function calculate($num1, $num2, $operation) {
    switch ($operation) {
        case 'add':
            return $num1 + $num2;
        case 'subtract':
            return $num1 - $num2;
        case 'multiply':
            return $num1 * $num2;
        case 'divide':
            if ($num2 == 0) {
                return "Ошибка: Деление на ноль невозможно.";
            }
            return $num1 / $num2;
        default:
            return "Ошибка: Некорректное действие.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = isset($_POST['num1']) ? floatval($_POST['num1']) : 0;
    $num2 = isset($_POST['num2']) ? floatval($_POST['num2']) : 0;
    $operation = isset($_POST['operation']) ? $_POST['operation'] : '';

    $result = calculate($num1, $num2, $operation);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
</head>
<body>
    <h1>Калькулятор</h1>
    <form method="POST">
        <label for="num1">Первое число:</label>
        <input type="number" step="any" name="num1" required>
        <br>
        <label for="num2">Второе число:</label>
        <input type="number" step="any" name="num2" required>
        <br>
        <label for="operation">Действие:</label>
        <select name="operation" required>
            <option value="add">Сложение</option>
            <option value="subtract">Вычитание</option>
            <option value="multiply">Умножение</option>
            <option value="divide">Деление</option>
        </select>
        <br>
        <button type="submit">Выполнить</button>
    </form>

    <?php if (isset($result)): ?>
        <h2>Результат: <?php echo $result; ?></h2>
    <?php endif; ?>
</body>
</html>