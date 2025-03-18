<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перевод из двоичной в шестнадцатеричную систему</title>
</head>
<body>

<?php
$result = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $binary = $_POST['binary'];


    if (preg_match('/^[01]+$/', $binary)) {

        $decimal = bindec($binary);

        $hexadecimal = dechex($decimal);
        $result = strtoupper($hexadecimal); 
    } else {
        $result = 'Ошибка: Введите корректное двоичное число.';
    }
}
?>

<form method="post" action="">
    <label for="binary">Введите двоичное число:</label>
    <input type="text" id="binary" name="binary" required>
    <input type="submit" value="Перевести">
</form>

<p>Результат: <?php echo $result; ?></p>

</body>
</html>