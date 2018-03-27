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
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>


<div class="container">
<?php
$query = "SELECT title, writer, content FROM content WHERE id = ".$id;
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($result)) {
    echo "<div class= 'page-header'>";
    echo "<h1><small>Title:</small> ".$row["title"]."</h1>";
    echo "</div>";
    echo "<div class = 'panel panel-default'>";
    echo "<div class = 'panel-heading'>Writer: ".$row["writer"]."</div>";
    echo "<div class = 'panel-body'>".nl2br($row["content"])."</div>";
    echo "</div>";
}
?>
<button id = "hoit" class="btn btn-default" type="button">List</button>
</div>

<script>
    $(function(){
        $("#hoit").click(function(){
            location.href="list.php";
        });
    });
$("button").click(function(){
    location.href="list.php";
});
</script>
<?php include 'footer.html';?>
</body>
</html>