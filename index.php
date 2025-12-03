<?php

include_once ("stock.php");


    # Bundle Offers Computation
    $discount_rate = 0.10; # 10% Discount

    $icecream_total = array_sum(array_column($icecream, 'price'));
    $cake_total = array_sum(array_column($cake, 'price'));
    $chocolate_total = array_sum(array_column($chocolate, 'price'));
    $others_total = array_sum(array_column($others, 'price'));

	# Bundle Offers with Discount	
    $bundles = [ 
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
        
        <?php include 'header.php'; ?>

        <h1>Desserts Menu</h1>

        <!-- Dessert Menu Table -->
        <table>
            <tr class="table-pink">
                <th class="width-55">Dessert Item</th>
                <th class="width-15">Price (PHP)</th>
                <th class="width-15">Stock</th>
                <th class="width-15">Availability</th>
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
                            <td colspan=\"4\"><strong>$section_name</strong></td></tr>";

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
                        echo "<td>" . number_format($item['price'], 1) . "</td>";
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
            <h2>Holiday Special Deals !!!</h2>
            <h3><span>Starting December 1 - December 25</span></h3>
            <h3><span>Every PHP 300 worth of items comes with a free brownie!</span></h3>
        </div>

        <?php include 'footer.php'; ?>

    </body>
</html>