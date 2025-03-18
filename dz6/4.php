<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Рисование фигур</title>
    <style>
        canvas {
            border: 1px solid black;
        }
    </style>
</head>
<body>

<h1>Введите данные о фигурах</h1>
<form method="post">
    <?php for ($i = 1; $i <= 5; $i++): ?>
        <label for="shape<?php echo $i; ?>">Фигура <?php echo $i; ?>:</label>
        <input type="text" name="shapes[<?php echo $i; ?>][name]" id="shape<?php echo $i; ?>" required>
        <br>
        <label for="x<?php echo $i; ?>">Координата X:</label>
        <input type="number" name="shapes[<?php echo $i; ?>][x]" id="x<?php echo $i; ?>" required>
        <br>
        <label for="y<?php echo $i; ?>">Координата Y:</label>
        <input type="number" name="shapes[<?php echo $i; ?>][y]" id="y<?php echo $i; ?>" required>
        <br>
        <label for="color<?php echo $i; ?>">Цвет:</label>
        <input type="color" name="shapes[<?php echo $i; ?>][color]" id="color<?php echo $i; ?>" required>
        <br><br>
    <?php endfor; ?>
    <input type="submit" value="Отправить">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shapes = $_POST['shapes'];
    echo "<h2>Рисуем фигуры:</h2>";
    echo '<canvas id="canvas" width="500" height="500"></canvas>';
    echo '<script>';
    echo 'var canvas = document.getElementById("canvas");';
    echo 'var ctx = canvas.getContext("2d");';

    foreach ($shapes as $shape) {
        $name = htmlspecialchars($shape['name']);
        $x = (int)$shape['x'];
        $y = (int)$shape['y'];
        $color = htmlspecialchars($shape['color']);


        if (strtolower($name) == 'квадрат') {
            echo "ctx.fillStyle = '$color'; ctx.fillRect($x, $y, 50, 50);"; 
        } elseif (strtolower($name) == 'круг') {
            echo "ctx.fillStyle = '$color'; ctx.beginPath(); ctx.arc($x, $y, 25, 0, Math.PI * 2); ctx.fill();"; 
        } elseif (strtolower($name) == 'треугольник') {
            echo "ctx.fillStyle = '$color'; ctx.beginPath(); ctx.moveTo($x, $y); ctx.lineTo($x - 25, $y + 50); ctx.lineTo($x + 25, $y + 50); ctx.closePath(); ctx.fill();"; 
        }
    }

    echo '</script>';
}
?>

</body>
</html>