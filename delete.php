<?php

    include 'database.php';

    $id = $_GET['id'];

    $deleteQuery = "DELETE FROM `details` WHERE id = '$id'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult){
        header("location: index.php");
    }
    else{
        echo "Failed" . mysqli_error($conn);
    }
?>
