<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Разница между датами</title>
</head>
<body>

<h1>Введите 5 дат</h1>
<form method="post">
    <?php for ($i = 1; $i <= 5; $i++): ?>
        <label for="date<?php echo $i; ?>">Дата <?php echo $i; ?>:</label>
        <input type="date" name="dates[]" id="date<?php echo $i; ?>" required>
        <br>
    <?php endfor; ?>
    <input type="submit" value="Отправить">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dates = $_POST['dates'];


    if (count($dates) === 5) {
        $daysBetween = [];


        for ($i = 0; $i < count($dates) - 1; $i++) {
            $date1 = new DateTime($dates[$i]);
            $date2 = new DateTime($dates[$i + 1]);
            $interval = $date1->diff($date2);
            $daysBetween[] = $interval->days;
        }


        echo "<h2>Результаты:</h2>";
        for ($i = 0; $i < count($daysBetween); $i++) {
            echo "<p>Количество дней между датой " . ($i + 1) . " и датой " . ($i + 2) . ": " . $daysBetween[$i] . " дней</p>";
        }
    } else {
        echo "<p>Пожалуйста, введите 5 дат.</p>";
    }
}
?>

</body>
</html>