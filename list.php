<?php
require_once("dbconfig.php");
$page = $_GET["page"];
if ($page == NULL)$page = 1;
else $page = (int)$page;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="list.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>21600830</title>
</head>
<body>

<table class="table table-hover">
    <thead>
        <tr>
            <th id="number">#</th>
            <th id="title">Title</th>
            <th id="writer">Writer</th>
            <th id="date">Date</th>
</tr>
</thead>
<tbody>
    <?php
    $condition = "id > ".(($page - 1) * 10)." AND id < ".($page * 10 + 1);
    $query = "SELECT id, title, writer, write_date FROM content WHERE ".$condition;
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["title"]."</td>";
        echo "<td>".$row["writer"]."</td>";
        $date =date_create("$row[write_date]");
        echo "<td>".date_format($date, "m/d/Y g:i A")."</td>";

        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<div class="text-center">
    <ul class="pagination col-md-12">
        <?php
        $query = "SELECT id FROM content";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);

        if (!($rows <= 10)) {
            if ($page == 1)
            echo "<li class='disabled'><a href='#'><span>&laquo;</span></a></li>";
            else
            echo "<li><a href='list.php?page=".($page - 1)."'><span>&laquo;</span></a></li>";

            for ($i = 1; $i <= (int)($rows / 10 +1); $i++) {
                if ($page == $i)
                    echo "<li class='active'><a href='list.php?page=".$i."'>".$i."</a></li>";
                else
                echo "<li><a href='list.php?page=".$i."'>".$i."</a></li>";
            }
            if ($page == (int)($rows / 10+1))
            echo "<li class='disabled'><a href='#'><span>&raquo;</span></a></li>";
            else
            echo "<li><a href='list.php?page=".($page + 1)."'><span>&raquo;</span></a></li>";

        }
        ?>
        </ul>
    </div>

<button id="btn" class="btn btn-default" type="button">Write</button>

<script>
    $(function(){
        $("table > tbody > tr").click(function(){
            var number = $(this).find("td").eq(0).text();
            var url = "detail.php?id=" + number;
            location.href = url;
        });

        $("#btn").click(function(){
            location.href = "write.html";
        });
    });
    </script>
<?php include 'footer.html';?>

</body>
</html>