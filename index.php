<?php

    $menu = [
        $icecream = [ # Ice Cream Menu
            ['name' => 'Vanilla Ice Cream',         'price' => 50, 'quantity' => 100],
            ['name' => 'Chocolate Ice Cream',       'price' => 60, 'quantity' => 80],
            ['name' => 'Coffee Fudge Ice Cream',    'price' => 55, 'quantity' => 90],
            ['name' => 'Ube Cheese Ice Cream',      'price' => 65, 'quantity' => 70]
        ],
        $cake = [ # Cake Menu (1 Slice only)
            ['name' => 'Chocolate Cake',        'price' => 150, 'quantity' => 40],
            ['name' => 'Vanilla Cake',          'price' => 140, 'quantity' => 50],
            ['name' => 'Red Velvet Cake',       'price' => 160, 'quantity' => 30],
            ['name' => 'Cheesecake ',           'price' => 250, 'quantity' => 60]
        ],
        $chocolate = [ # Chocolate Menu (1 Bar only)
            ['name' => 'Milk Chocolate',            'price' => 130, 'quantity' => 200],
            ['name' => 'Dark Chocolate',            'price' => 135, 'quantity' => 150],
            ['name' => 'White Chocolate',           'price' => 120, 'quantity' => 180],
            ['name' => 'Assorted Chocolates Box',   'price' => 400, 'quantity' => 30]
        ],
        $others = [ # Various Sweets and Pies Menu
            ['name' => 'Brownie',               'price' => 50, 'quantity' => 100],
            ['name' => 'Glazed Donut',          'price' => 25, 'quantity' => 200],
            ['name' => 'Chocolate Chip Cookie', 'price' => 15, 'quantity' => 150],
            ['name' => 'Apple Pie',             'price' => 385, 'quantity' => 75]
        ]
    ];

    # Bundle Offers Computation
    $discount_rate = 0.10; # 10% Discount

    $icecream_total = array_sum(array_column($icecream, 'price'));
    $cake_total = array_sum(array_column($cake, 'price'));
    $chocolate_total = array_sum(array_column($chocolate, 'price'));
    $others_total = array_sum(array_column($others, 'price'));

    $bundles = [ # Bundle Offers with Discount
        ['name' => 'All Ice Cream',         'price' => ($icecream_total * (1 - $discount_rate))],
        ['name' => 'All Cakes',             'price' => ($cake_total * (1 - $discount_rate))],
        ['name' => 'All Chocolates',        'price' => ($chocolate_total * (1 - $discount_rate))],
        ['name' => 'All Various Sweets',    'price' => ($others_total * (1 - $discount_rate))]
    ];
?>

<DOCTYPE html>
<html>
    <head>
        <title>Forever Sweets</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1>Forever Sweets</h1>

        <!-- Dessert Menu Table -->
        <table>
            <tr class="table-pink">
                <th>Dessert Item</th>
                <th>Price (PHP)</th>
            </tr>
            <tr class="table-cyan menu-section">
                <td colspan="2">Ice Cream Menu</td>
            </tr>
            <tr class="table-cyan">
                <td><?= $icecream[0]['name']; ?></td>
                <td><?= $icecream[0]['price']; ?></td>
            </tr>
            <tr class="table-cyan">
                <td><?= $icecream[1]['name']; ?></td>
                <td><?= $icecream[1]['price']; ?></td>
            </tr>
            <tr class="table-cyan">
                <td><?= $icecream[2]['name']; ?></td>
                <td><?= $icecream[2]['price']; ?></td>
            </tr>
            <tr class="table-cyan">
                <td><?= $icecream[3]['name']; ?></td>
                <td><?= $icecream[3]['price']; ?></td>
            </tr>
            <tr class="table-green menu-section">
                <td colspan="2">Cake Menu</td>
            </tr>
            <tr class="table-green">
                <td><?= $cake[0]['name']; ?></td>
                <td><?= $cake[0]['price']; ?></td>
            </tr>
            <tr class="table-green">
                <td><?= $cake[1]['name']; ?></td>
                <td><?= $cake[1]['price']; ?></td>
            </tr>
            <tr class="table-green">
                <td><?= $cake[2]['name']; ?></td>
                <td><?= $cake[2]['price']; ?></td>
            </tr>
            <tr class="table-green">
                <td><?= $cake[3]['name']; ?></td>
                <td><?= $cake[3]['price']; ?></td>
            </tr>
            <tr class="table-blue menu-section">
                <td colspan="2">Chocolate Menu</td>
            </tr>
            <tr class="table-blue">
                <td><?= $chocolate[0]['name']; ?></td>
                <td><?= $chocolate[0]['price']; ?></td>
            </tr>
            <tr class="table-blue">
                <td><?= $chocolate[1]['name']; ?></td>
                <td><?= $chocolate[1]['price']; ?></td>
            </tr>
            <tr class="table-blue">
                <td><?= $chocolate[2]['name']; ?></td>
                <td><?= $chocolate[2]['price']; ?></td>
            </tr>
            <tr class="table-blue">
                <td><?= $chocolate[3]['name']; ?></td>
                <td><?= $chocolate[3]['price']; ?></td>
            </tr>
            <tr class="table-purple menu-section">
                <td colspan="2">Various Sweets and Pies Menu</td>
            </tr>
            <tr class="table-purple">    
                <td><?= $others[0]['name']; ?></td>
                <td><?= $others[0]['price']; ?></td>
            </tr>
            <tr class="table-purple">
                <td><?= $others[1]['name']; ?></td>
                <td><?= $others[1]['price']; ?></td>
            </tr>
            <tr class="table-purple">
                <td><?= $others[2]['name']; ?></td>
                <td><?= $others[2]['price']; ?></td>    
            </tr>
            <tr class="table-purple">   
                <td><?= $others[3]['name']; ?></td>
                <td><?= $others[3]['price']; ?></td>
            </tr>
            <tr class="table-yellow menu-section">
                <td colspan="2">Bundle Offers (10% Discount)</td>
            </tr>
            <tr class="table-yellow">
                <td><?= $bundles[0]['name']; ?></td>
                <td><?= $bundles[0]['price']; ?></td>
            </tr>
            <tr class="table-yellow">
                <td><?= $bundles[1]['name']; ?></td>
                <td><?= $bundles[1]['price']; ?></td>
            </tr>
            <tr class="table-yellow">
                <td><?= $bundles[2]['name']; ?></td>
                <td><?= $bundles[2]['price']; ?></td>
            </tr>
            <tr class="table-yellow">
                <td><?= $bundles[3]['name']; ?></td>
                <td><?= $bundles[3]['price']; ?></td>
            </tr>
        </table>
    </body>
</html>