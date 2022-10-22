<?php
include_once('./types.php');

$fields_to_insert = "readingValue";
$values_to_insert = "";

// VALUE
$post_value = $_POST['value'];
$value = '';
if (is_numeric($post_value)) {
    $value = $post_value;
    $values_to_insert = $value;
} else {
    // abort
    return;
}

// READING TYPE
$post_type = (isset($_POST['type'])) ? $_POST['type'] : '';
if (in_array($post_type, $ReadingTypes)) {
    $type = $post_type;
    $fields_to_insert = $fields_to_insert . ", readingType";
    $values_to_insert = $values_to_insert . ", '$type'";
}

// READING DATETIME
$post_dateTime = (isset($_POST['dateTime'])) ? $_POST['dateTime'] : '';
$dateTime = date('Y-m-d H:i:s', strtotime($post_dateTime));
if ($dateTime) {
    echo "<br />$dateTime<br />";
    $fields_to_insert = $fields_to_insert . ", readingTaken";
    $values_to_insert = $values_to_insert . ", '$dateTime'";
}

// DO THE SQL
include '../connect.php';
$sql = "INSERT INTO glucose_log ($fields_to_insert)
VALUES ($values_to_insert)";

if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
} else {
    echo "Record created!";
}
  
$conn->close();


?>