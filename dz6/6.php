<?php
$pageElements = [
    'Header' => [
        'height' => '100px',
        'background_color' => '#4CAF50',
        'text_color' => '#FFFFFF',
    ],
    'Content' => [
        'height' => 'calc(100vh - 200px)', 
        'background_color' => '#FFFFFF',
        'text_color' => '#000000',
    ],
    'Footer' => [
        'height' => '100px',
        'background_color' => '#333333',
        'text_color' => '#FFFFFF',
    ],
];


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страница на основе массива</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .header {
            height: <?php echo $pageElements['Header']['height']; ?>;
            background-color: <?php echo $pageElements['Header']['background_color']; ?>;
            color: <?php echo $pageElements['Header']['text_color']; ?>;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .content {
            height: <?php echo $pageElements['Content']['height']; ?>;
            background-color: <?php echo $pageElements['Content']['background_color']; ?>;
            color: <?php echo $pageElements['Content']['text_color']; ?>;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .footer {
            height: <?php echo $pageElements['Footer']['height']; ?>;
            background-color: <?php echo $pageElements['Footer']['background_color']; ?>;
            color: <?php echo $pageElements['Footer']['text_color']; ?>;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Заголовок страницы</h1>
    </div>

    <div class="content">
        <p>Это содержимое страницы. Здесь можно разместить текст, изображения и другие элементы.</p>
    </div>

    <div class="footer">
        <p>Подвал страницы © 2023</p>
    </div>

</body>
</html>