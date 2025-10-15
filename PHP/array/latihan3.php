<?php

$fruits = [
    ['name' => 'Pepaya', 'color' => 'Orange', 'price' => 5000],
    ['name' => 'Apel', 'color' => 'Merah', 'price' => 3000],
    ['name' => 'Mangga', 'color' => 'Orange', 'price' => 6000]
];

echo $fruits[0]['name'] . ': Warna ' . $fruits[0]['color'] . ', Harga: ' . $fruits[0]['price'] . '<br>';
echo $fruits[1]['name'] . ': Warna ' . $fruits[1]['color'] . ', Harga: ' . $fruits[1]['price'] . '<br>';
echo $fruits[2]['name'] . ': Warna ' . $fruits[2]['color'] . ', Harga: ' . $fruits[2]['price'] . '<br>';

foreach ($fruits as $fruit) {
    echo $fruit['name'] . ': Warna ' . $fruit['color'] . ', Harga: ' . $fruit['price'] . '<br>';
}

?>