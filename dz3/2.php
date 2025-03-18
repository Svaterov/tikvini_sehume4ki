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
    $condition = $_POST['condition'];
    $count = 0;

    switch ($condition) {
        case 'mirror':
    
            for ($i = 1; $i <= 9; $i++) { 
                for ($j = 0; $j <= 9; $j++) {
                    $count++; 
                }
            }
            break;

        case 'even':

            for ($i = 2; $i <= 8; $i += 2) { 
                for ($j = 0; $j <= 4; $j++) { 
                    for ($k = 0; $k <= 4; $k++) {
                        for ($l = 0; $l <= 4; $l++) {
                            $count++; 
                        }
                    }
                }
            }
            break;

        case 'odd':

            for ($i = 1; $i <= 9; $i += 2) { 
                for ($j = 1; $j <= 9; $j += 2) {
                    for ($k = 1; $k <= 9; $k += 2) {
                        for ($l = 1; $l <= 9; $l += 2) {
                            $count++; 
                        }
                    }
                }
            }
            break;

        case 'decreasing':

            for ($i = 1; $i <= 9; $i++) {
                for ($j = 0; $j < $i; $j++) {
                    for ($k = 0; $k < $j; $k++) {
                        for ($l = 0; $l < $k; $l++) {
                            $count++; 
                        }
                    }
                }
            }
            break;

        default:
            echo "<h2 style='color: red;'>Неверный выбор условия.</h2>";
            break;
    }

    echo "<h2 style='color: green;'>Количество 4-значных чисел по условию '{$condition}': {$count}</h2>";
} else {

    ?>
    <form method="post" action="">
        <label for="condition">Выберите условие:</label>
        <select id="condition" name="condition" required>
            <option value="mirror">Цифры зеркальные</option>
            <option value="even">Все цифры четные</option>
            <option value="odd">Все цифры нечетные</option>
            <option value="decreasing">Цифры идут в порядке от большего к меньшему</option>
        </select>
        <input type="submit" value="Отправить">
    </form>
    <?php
}
?>
</body>
</html>