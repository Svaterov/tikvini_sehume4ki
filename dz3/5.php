<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перевод в римскую систему счисления</title>
</head>
<body>

<?php
function toRoman($number) {
    $map = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    ];

    $result = '';
    foreach ($map as $value => $symbol) {
        while ($number >= $value) {
            $result .= $symbol;
            $number -= $value;
        }
    }
    return $result;
}

$result = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = intval($_POST['number']);


    if ($number > 0 && $number < 4000) {
        $result = toRoman($number);
    } else {
        $result = 'Ошибка: Введите число от 1 до 3999.';
    }
}
?>

<form method="post" action="">
    <label for="number">Введите число:</label>
    <input type="number" id="number" name="number" min="1" max="3999" required>
    <input type="submit" value="Перевести">
</form>

<p>Результат: <?php echo $result; ?></p>

</body>
</html>