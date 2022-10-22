<?php
include_once('./types.php');

$fields_to_insert = "type";
$values_to_insert = "";

// READING TYPE
$post_type = (isset($_POST['type'])) ? $_POST['type'] : '';
if (in_array($post_type, $MealTypes)) {
    $type = $post_type;
    $values_to_insert = "'" . $type . "'";
} else {
    // abort - no point going on
    return;
}

// DO THE SQL
include '../connect.php';
$sql = "INSERT INTO meal_log ($fields_to_insert)
VALUES ($values_to_insert)";

if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
} else {
    echo "Logged a meal!";
}
  
$conn->close();


?>