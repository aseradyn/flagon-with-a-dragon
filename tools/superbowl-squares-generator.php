<?php

$numberOfSquares = $_POST["count"];

$startingArray = [0,1,2,3,4,5,6,7,8,9];

for ($x = 1; $x <= $numberOfSquares; $x++) {

    $top = $startingArray;
    shuffle($top);

    $side = $startingArray;
    shuffle($side);

    ?>

    <table border="1" style="width: 100%;">
        <tr>
            <td></td>
            <?php
                foreach ($top as $value) {
                    echo "<td>$value</td>";
                }
            ?>
        </tr>
        <?php
            foreach ($side as $value) {
                ?>
                    <tr>
                        <td><?php echo $value ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php
            }
        ?>
    </table>
    <br /> <br />

    <?php

}


?>