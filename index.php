<?php

    include "database.php";

    if (isset($_GET['submit'])){
        $name = $_GET['name'];
        $dept = $_GET['dept'];
        $task = $_GET['task'];

        $insertQuery = "INSERT INTO `crud`(`Name`, `Dept`, `Task`) VALUES ('$name', '$dept', '$task')";
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult){ ?>
           
           <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: absolute; top:10vh; right:2vw;">
           <strong>Success!!</strong> Data added to the database...!
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
            
        <?php }
        else{ 
            echo "Failed " . mysqli_error($conn);
        }
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


</head>
<body>

    <!-- Nav bar -->

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#" style="font-weight: bolder; color: aqua;  font-size:1.5rem;">Taskmate</a>
        </div>
    </nav>
   

    <!-- Create Task (Form) -->


    <form style="width: 30vw; text-align: center; margin: 5vh 0 0 35vw;">
        <div class="mb-3">
          <input type="text" class="form-control" id="nameInput" name="name" placeholder="Enter your name">
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" id="dept" name="dept" placeholder="Enter your department">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="task" name="task" placeholder="Task">
          </div>
        <button type="submit" class="btn btn-primary" name="submit">Add task</button>
    </form>


    <!-- Display Data (table) -->


    <table class="table" style="margin: 10vh 15vw; width: 70vw; text-align:center;">
        <thead class="table-info" style="color: #272829;">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Department</th>
            <th scope="col">Task</th>
            <th scope="col">Edit/Delete</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
        <?php 
            $fetchQuery = "SELECT * FROM `crud`";
            $fetchResult = mysqli_query($conn, $fetchQuery);
            $i = 1;
            while($row = mysqli_fetch_assoc($fetchResult)){ ?>
                <tr>
                <td><?php echo $i; ?></th>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Dept']; ?></td>
                <td><?php echo $row['Task'] ?> </td>
                <td><a href="edit.php?id=<?php echo $row['id'] ?>"><button class="btn btn-primary" >edit</button></a><a href="delete.php?id=<?php echo $row['id'] ?>"><button class="btn btn-danger" style="margin-left: 10px;">delete</button></a></td>
                </tr>
        <?php  $i++; }
        ?>
        </tbody>
    </table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>