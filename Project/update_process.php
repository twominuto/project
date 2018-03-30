<?php
header("Progma:no-cache");
header("Cache-Control:no-cache, must-revalidate");

require_once("dbconfig.php");
$id = $_GET["id"];
$title = $_POST["title"];
$writer = $_POST["writer"];
$content = $_POST["content"];

$blank = trim($title, " ");

if (empty($blank) == TRUE){
    echo "Failed to update data into database<br>";
    echo "Error: ".mysqli_error($conn);
    header("Location: list.php");
    }
    
    else if (empty($blank) == FALSE){
$query = "UPDATE content SET title = '".$title."', writer = '".$writer."', content = '".$content."' WHERE id =".$id;
$result = mysqli_query($conn, $query); //신비의 연결다리

if ($result == FALSE) {
    echo "Failed to update data into database<br>";
    echo "Error: ".mysqli_error($conn);
}
else {
    header("Location: detail.php?id=".$id);
}
    }

?>