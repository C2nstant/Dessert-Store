<?php

    $menu = [
        $icecream = [ # Ice Cream Menu
            ['name' => 'Vanilla Ice Cream',         'price' => 50, 'quantity' => 0],
            ['name' => 'Chocolate Ice Cream',       'price' => 60, 'quantity' => 80],
            ['name' => 'Coffee Fudge Ice Cream',    'price' => 55, 'quantity' => 90],
            ['name' => 'Ube Cheese Ice Cream',      'price' => 65, 'quantity' => 70]
        ],
        $cake = [ # Cake Menu (1 Slice only)
            ['name' => 'Chocolate Cake',        'price' => 150, 'quantity' => 40],
            ['name' => 'Vanilla Cake',          'price' => 140, 'quantity' => 0],
            ['name' => 'Red Velvet Cake',       'price' => 160, 'quantity' => 30],
            ['name' => 'Cheesecake ',           'price' => 250, 'quantity' => 60]
        ],
        $chocolate = [ # Chocolate Menu (1 Bar only)
            ['name' => 'Milk Chocolate',            'price' => 130, 'quantity' => 200],
            ['name' => 'Dark Chocolate',            'price' => 135, 'quantity' => 150],
            ['name' => 'White Chocolate',           'price' => 120, 'quantity' => 0],
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
                <th ckass="table-header-extra-space">Stock</th>
                <th class="table-header-extra-space">Availability</th>
            </tr>
            

            <?php
                $categories = [
                    'Ice Cream Menu' =>                 ['items' => $icecream, 'class' => 'table-cyan'],
                    'Cake Menu' =>                      ['items' => $cake, 'class' => 'table-green'],
                    'Chocolate Menu' =>                 ['items' => $chocolate, 'class' => 'table-blue'],
                    'Various Sweets and Pies Menu' =>   ['items' => $others, 'class' => 'table-purple'],
                ];

                foreach ($categories as $section_name => $data) {
                    # Section Header (Ice Cream Menu, Cake Menu, etc.)
                    echo    "<tr class=\"{$data['class']} menu-section\">
                            <td colspan=\"4\">{$section_name}</td></tr>";

                    # Dessert Items
                    foreach ($data['items'] as $item) {
                        
                        # if else to know the availability of the dessert item
                        if ($item['quantity'] > 0) {
                            $availability = 'Available';
                        } else {
                            $availability = 'Out of Stock'; 
                        }

                        echo "<tr class=\"{$data['class']}\">";
                        echo "<td>" . $item['name'] . "</td>";
                        echo "<td>" . $item['price'] . "</td>";
                        echo "<td>" . $item['quantity'] . "</td>";
                        echo "<td>" . $availability . "</td>";
                        echo "</tr>";
                    }
                }
            ?>
            
            <tr class="table-yellow menu-section">
                <td colspan="4">Bundle Offers (10% Discount)</td>
            </tr>
            
            <?php foreach ($bundles as $bundle) { # Separate foreach loop because it doesnt have a quantity and availabiliy ?>
                <tr class="table-yellow">
                    <td><?= $bundle['name']; ?></td>
                    <td><?php echo $bundle['price']; ?></td>
                    <td colspan="2">- - -</td>
                </tr>
            <?php } ?>
        </table>

        <div id="special-offers">
            <h2>Holiday Special Deals !</h2>
            <h3><span>Purchasing a bundle comes<br> with a free brownie !!</span></h3>
        </div>
        <img id="img-bell" src="images/bell.png" alt="Dessert Image">
        <img id="img-border" src="images/christmas_border.png" alt="Dessert Image">

        <?php include 'footer.php'; ?>

    </body>
</html>