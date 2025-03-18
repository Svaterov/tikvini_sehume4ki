<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Массив чисел</title>
</head>
<body>

<h1>Введите 10 чисел</h1>
<form method="post">
    <?php for ($i = 1; $i <= 10; $i++): ?>
        <label for="number<?php echo $i; ?>">Число <?php echo $i; ?>:</label>
        <input type="number" name="numbers[]" id="number<?php echo $i; ?>" required>
        <br>
    <?php endfor; ?>
    <input type="submit" value="Отправить">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numbers = $_POST['numbers'];


    $greaterThanPrevious = [];
    for ($i = 1; $i < count($numbers); $i++) {
        if ($numbers[$i] > $numbers[$i - 1]) {
            $greaterThanPrevious[] = $numbers[$i];
        }
    }


    $sum = array_sum($numbers);
    $average = $sum / count($numbers);

 
    $oddNumbers = array_filter($numbers, function($num) {
        return $num % 2 !== 0;
    });
    rsort($oddNumbers);


    echo "<h2>Результаты:</h2>";
    echo "<p>Элементы, которые больше предыдущих: " . implode(', ', $greaterThanPrevious) . "</p>";
    echo "<p>Сумма всех элементов: $sum</p>";
    echo "<p>Среднее значение: $average</p>";
    echo "<p>Нечетные элементы, отсортированные по убыванию: " . implode(', ', $oddNumbers) . "</p>";
}
?>

</body>
</html>