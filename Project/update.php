<?php
require_once("dbconfig.php");
$id = $_GET["id"];
$query = "SELECT title, writer, content, DB FROM content WHERE id = ".$id;
$result = mysqli_query($conn, $query);
$message = "wrong access";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="write.css">
        <title> 21600830 </title>        
    </head>
    <body>
<div class="container">
    <form class="form-horizontal" action="update_process.php?id=<?php echo $_GET["id"];?>" method="post">
        <div class="form-group">
            <label class="col-md-2 control-label">Title</label>
            <div class="col-md-10">
                <input class="form-control" type= "text" name="title" value="<?php 
                while($row = mysqli_fetch_array($result)){echo $row["title"];} ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label"> Writer</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="writer" value="<?php 
                $query = "SELECT writer FROM content WHERE id = ".$id; 
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result)){echo $row["writer"];} ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Content</label>
            <div class="col-md-10">
                <textarea class="form-control" name="content" rows="10"><?php 
                $query = "SELECT content FROM content WHERE id = ".$id; 
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result)){echo $row["content"];} ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button class="btn btn-default" type="submit"> Write</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
