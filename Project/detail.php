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
$query = "SELECT title, writer, content, DB FROM content WHERE id = ".$id;
$result = mysqli_query($conn, $query);
$message = "wrong access";
    
while($row = mysqli_fetch_array($result)) {
    if($row["DB"] == FALSE){
    echo "<div class= 'page-header'>";
    echo "<h1><small>Title:</small> ".$row["title"]."</h1>";
    echo "</div>";
    echo "<div class = 'panel panel-default'>";
    echo "<div class = 'panel-heading'>Writer: ".$row["writer"]."</div>";
    echo "<div class = 'panel-body'>".nl2br($row["content"])."</div>";
    echo "</div>";
    }
    else{
        echo "<script type= 'text/javascript'>alert('$message');";
        echo "window.location= 'list.php'";
        echo "</script>";
    }
}
?>

<button id = "list" class="btn btn-default" type="button">List</button>
<button id = "update" class="btn btn-default" type="button">Update</button>
<!-- <a id="delete-button">Delete</a> -->
<button id = "delete" class="btn btn-default" type="button">Delete</button>
<button id = "backup" class="btn btn-default" type="button">Backup</button>
</div>

<script>
    $(function(){
        $("#list").click(function(){
            location.href="list.php";
        });
    });
    $(function(){
        $("#update").click(function(){
            location.href="update.php?id="+<?php echo $_GET["id"];?>;
        });
    });
//     $("#delete-button").click(function(){
//     if(confirm("Are you sure you want to delete this?")){
//         $("#delete-button").attr("href", "delete_process.php?id="+<?php echo $_GET["id"];?>);
//     }
//     else{
//         return false;
//     }
// });

    $(function(){
        $("#delete").click(function(){
    var yesno=confirm("Are you sure you want to delete this item?");
    if(yesno)
    location.href="delete_process.php?id="+<?php echo $_GET["id"];?>;
    });
});
    $(function(){
        $("#backup").click(function(){
    var yesno=confirm("Are you sure you want to delete this item?\nPreserved as a Backup data");
    if(yesno)
    location.href="backup_process.php?id="+<?php echo $_GET["id"];?>;
    });
});
</script>
<?php include 'footer.html';?>
</body>
</html>