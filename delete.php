<?php
    include 'database.php';
    $id = $_GET['id'];
    $deleteQuery = "DELETE FROM `crud` WHERE id = $id";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if (!$deleteResult) { 
        echo "Failed " . mysqli_error($conn);
    }
    else{
        header("location: index.php");
    }
?>