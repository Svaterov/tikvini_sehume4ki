<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$processors = [
    ['name' => 'Intel Core i5', 'socket' => 'LGA 1151', 'frequency' => '3.2 GHz', 'cores' => 4],
    ['name' => 'AMD Ryzen 5', 'socket' => 'AM4', 'frequency' => '3.6 GHz', 'cores' => 6],
];

$motherboards = [
    ['name' => 'ASUS ROG Strix', 'socket' => 'LGA 1151', 'memory_type' => 'DDR4'],
    ['name' => 'MSI B450M', 'socket' => 'AM4', 'memory_type' => 'DDR4'],
];

$ram = [
    ['name' => 'Corsair Vengeance', 'memory_type' => 'DDR4', 'capacity' => '16 GB'],
    ['name' => 'G.Skill Ripjaws', 'memory_type' => 'DDR4', 'capacity' => '8 GB'],
];

$hard_drives = [
    ['name' => 'Samsung 970 EVO', 'type' => 'SSD', 'capacity' => '500 GB'],
    ['name' => 'Seagate Barracuda', 'type' => 'HDD', 'capacity' => '1 TB'],
];

$power_supplies = [
    ['name' => 'Corsair RM550x', 'power' => '550W'],
    ['name' => 'EVGA 600 W1', 'power' => '600W'],
];


function generateCombinations($processors, $motherboards, $ram, $hard_drives, $power_supplies) {
    $combinations = [];

    foreach ($processors as $processor) {
        foreach ($motherboards as $motherboard) {
            foreach ($ram as $memory) {
                foreach ($hard_drives as $hard_drive) {
                    foreach ($power_supplies as $power_supply) {
                        // Проверяем совместимость
                        if ($processor['socket'] === $motherboard['socket']) {
                            $combinations[] = [
                                'processor' => $processor,
                                'motherboard' => $motherboard,
                                'ram' => $memory,
                                'hard_drive' => $hard_drive,
                                'power_supply' => $power_supply,
                            ];
                        }
                    }
                }
            }
        }
    }

    return $combinations;
}


$combinations = generateCombinations($processors, $motherboards, $ram, $hard_drives, $power_supplies);


foreach ($combinations as $index => $combination) {
    echo "Комбинация " . ($index + 1) . ":\n";
    echo "Процессор: " . $combination['processor']['name'] . " (Сокет: " . $combination['processor']['socket'] . ", Частота: " . $combination['processor']['frequency'] . ", Ядер: " . $combination['processor']['cores'] . ")\n";
    echo "Материнская плата: " . $combination['motherboard']['name'] . " (Сокет: " . $combination['motherboard']['socket'] . ", Тип памяти: " . $combination['motherboard']['memory_type'] . ")\n";
    echo "Оперативная память: " . $combination['ram']['name'] . " (Тип: " . $combination['ram']['memory_type'] . ", Объем: " . $combination['ram']['capacity'] . ")\n";
    echo "Жесткий диск: " . $combination['hard_drive']['name'] . " (Тип: " . $combination['hard_drive']['type'] . ", Объем: " . $combination['hard_drive']['capacity'] . ")\n";
    echo "Блок питания: " . $combination['power_supply']['name'] . " (Мощность: " . $combination['power_supply']['power'] . ")\n";
    echo "----------------------------------------\n";
}
?>
</body>
</html>