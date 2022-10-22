<?php
include '../connect.php';

$sql = "SELECT * FROM meal_log ORDER BY time DESC LIMIT 1";

$result = mysqli_query($conn, $sql);

foreach ($result as $row) {
    $type = $row['type'];
    $timestamp = $row['time'];
    
    $date = date('D g:i a', strtotime($timestamp));

    echo "<p>$type on $date</p>";

    $testDate = new DateTimeImmutable('2000-01-01');
    echo $testDate;

}

?>