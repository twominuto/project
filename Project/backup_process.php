<?php
require_once("dbconfig.php");
$id = $_GET["id"];

if ($id == NULL){
    echo '<body>';
    echo'<script type="text/javascript">';
    echo 'alert("This is not the right access.");';
    echo 'window.location.href="list.php"';
    echo '</script>';
    echo '</body>';
}
else{
$query = "UPDATE content SET DB = '1' WHERE id = $id";
$result = mysqli_query($conn, $query);
header("Location: list.php");
}
?>