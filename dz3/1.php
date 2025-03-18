<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $N = intval($_POST['n']); 

 
    if ($N > 0) {

        $oddNumbers = [];
        for ($i = 0; $i < $N; $i++) {
            $oddNumbers[] = 2 * $i + 1; /
        }


        $average = array_sum($oddNumbers) / count($oddNumbers);


        echo "<h2 style='color: red;'>Нечетные числа в обратном порядке:</h2>";
        for ($i = $N - 1; $i >= 0; $i--) {
            $number = $oddNumbers[$i];

            $fontSize = strlen((string)$number) * 10; 
            echo "<span style='font-size: {$fontSize}px; color: red;'>{$number}</span><br>";
        }


        echo "<h2 style='color: red;'>Среднее значение: {$average}</h2>";
    } else {
        echo "<h2 style='color: red;'>Пожалуйста, введите положительное число.</h2>";
    }
} else {

    ?>
    <form method="post" action="">
        <label for="n">Введите количество нечетных чисел (N):</label>
        <input type="number" id="n" name="n" min="1" required>
        <input type="submit" value="Отправить">
    </form>
    <?php
}
?>
</body>
</html>