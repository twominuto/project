<?php
header("Progma:no-cache");
header("Cache-Control:no-cache, must-revalidate");

require_once("dbconfig.php");

$title = $_POST["title"];
$writer = $_POST["writer"];
$content = $_POST["content"];

$blank = trim($title, " ");

$title1= mysqli_real_escape_string($conn, $title);
$writer1= mysqli_real_escape_string($conn, $writer);
$content1= mysqli_real_escape_string($conn, $content);

if (empty($blank) == TRUE){
    echo "Failed to insert data into database<br>";
    echo "Error: ".mysqli_error($conn);
    header("Location: list.php");
    }
    
    else if (empty($blank) == FALSE){
$query = "INSERT INTO content (title, writer, content)
VALUES ('".$title1."','".$writer1."','".$content1."')";
$result = mysqli_query($conn, $query); //신비의 연결다리

if ($result == FALSE) {
    echo "Failed to insert data into database<br>";
    echo "Error: ".mysqli_error($conn);
}
else {
    header("Location: list.php");
}
    }

?>