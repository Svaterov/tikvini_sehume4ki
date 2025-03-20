<?php

$message = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['subscribe'])) {
        $message = "Thank you for subscribing";
    } else {

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribe Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .message {
            margin-top: 20px;
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>

    <h1>Subscribe to our newsletter</h1>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <input type="checkbox" id="subscribe" name="subscribe">
        <label for="subscribe">Subscribe</label>
        <br><br>
        <button type="submit">Send</button>
    </form>

    <?php if ($message): ?>
        <div class="message"><?php echo $message; ?></div>
    <?php endif; ?>

</body>
</html>