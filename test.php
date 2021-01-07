
<!-- Buat Ngetest Query -->
<?php
    include('db-connection.php');
    // Get all categories title's and slug's
    $query="SELECT title,slug,id From categories ORDER BY id ASC;";
    $categories = $con->query($query);
    if ($categories->num_rows > 0) {
        // output data of each row
        while($row = $categories->fetch_assoc()) {
            print_r($row);
            die();
            echo "<a class='dropdown-item' href='/privat/kategori/index.php?slug=".$row["slug"]."'>".$row["title"]."</a>";
        //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }

    }
?>