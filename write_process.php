<?php
header("Progma:no-cache");
header("Cache-Control:no-cache, must-revalidate");

require_once("dbconfig.php");

$title = $_POST["title"];
$writer = $_POST["writer"];
$content = $_POST["content"];

$query = "INSERT INTO content (title, writer, content)
VALUES ('".$title."','".$writer."','".$content."')";

$result = mysqli_query($conn, $query); //신비의 연결다리

/*
if (empty($title) == TRUE){
echo "Failed to insert data into database<br>";
echo "Error: ".mysqli_error($conn);
header("Location: list.php");
}

else if (empty($title) == FALSE){
    header("Location: list.php");
}
*/

if ($result == FALSE) {
    echo "Failed to insert data into database<br>";
    echo "Error: ".mysqli_error($conn);
}
else {
    header("Location: list.php");
}
?>