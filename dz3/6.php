<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Календарь на текущий месяц</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            margin: 20px;
        }
        .day {
            padding: 20px;
            text-align: center;
            border: 1px solid #ccc;
            position: relative;
            transition: background-color 0.3s, color 0.3s;
        }
        .weekend {
            color: red;
        }
        .holiday {
            color: red;
        }
        .today {
            border: 2px solid blue;
        }
        .day:hover {
            color: white;
            background-color: red; /* Можно изменить на черный, если нужно */
        }
    </style>
</head>
<body>

<?php
function getHolidays($year, $month) {

    return [
        "$year-01-01",
        "$year-05-01", 
        "$year-05-09", 
        "$year-12-31",
    ];
}

$today = date('j');
$currentMonth = date('n');
$currentYear = date('Y');
$firstDayOfMonth = mktime(0, 0, 0, $currentMonth, 1, $currentYear);
$daysInMonth = date('t', $firstDayOfMonth);
$holidays = getHolidays($currentYear, $currentMonth);

echo '<div class="calendar">';
for ($day = 1; $day <= $daysInMonth; $day++) {
    $date = "$currentYear-$currentMonth-$day";
    $isWeekend = (date('N', strtotime($date)) >= 6); 
    $isHoliday = in_array($date, $holidays);
    $isToday = ($day == $today);

    $class = 'day';
    if ($isWeekend) {
        $class .= ' weekend';
    }
    if ($isHoliday) {
        $class .= ' holiday';
    }
    if ($isToday) {
        $class .= ' today';
    }

    echo "<div class='$class'>$day</div>";
}
echo '</div>';
?>

</body>
</html>