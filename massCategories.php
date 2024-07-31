<?php
$categories = [];
$categories[] = new PhoneCategory('Phones');
$categories[] = new MonitorCategory('Monitors');
$products = [
    ['type' => 'Phone', 'name' => 'iPhone 12', 'Price' => 999, 'Ram' => 4, 'CountSim' => 1, 'Hdd' => 128, 'OS' => 'iOS'],
    ['type' => 'Monitor', 'name' => 'Samsung Monitor', 'Price' => 199, 'Diagonal' => 24, 'Frequency' => 60],
];
foreach ($products as $product)
{
    if ($product['type'] == 'Phone')
    {
        $categories[0]->addProduct($product);
    }
    elseif ($product['type'] == 'Monitor')
    {
        $categories[1]->addProduct($product);
    }
}