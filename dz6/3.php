<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ввод данных</title>
</head>
<body>

<h1>Введите 10 записей с type и value</h1>
<form method="post">
    <?php for ($i = 1; $i <= 10; $i++): ?>
        <label for="type<?php echo $i; ?>">Type <?php echo $i; ?>:</label>
        <input type="text" name="data[<?php echo $i; ?>][type]" id="type<?php echo $i; ?>" required>
        <br>
        <label for="value<?php echo $i; ?>">Value <?php echo $i; ?>:</label>
        <input type="text" name="data[<?php echo $i; ?>][value]" id="value<?php echo $i; ?>" required>
        <br><br>
    <?php endfor; ?>
    <input type="submit" value="Отправить">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];


    echo "<h2>Введенные данные:</h2>";
    foreach ($data as $index => $item) {
        echo "<p>Запись $index: Type = " . htmlspecialchars($item['type']) . ", Value = " . htmlspecialchars($item['value']) . "</p>";
    }
}
?>

</body>
</html>