<?php

  include 'database.php';
  $id = $_GET['id'];

  if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $dept = $_POST['dept'];
    $task = $_POST['task'];

    $updateQuery = "UPDATE `details` SET `Name`='$name',`Dept`='$dept',`Task`='$task' WHERE id = '$id'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if($updateResult){ 

       header("location: index.php");
    } else{
      echo "Failed" . mysqli_error($conn);
    }
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taskmate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

    <!-- Nav bar -->

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#" style="font-weight: bolder; color: aqua;  font-size:1.5rem;">Taskmate</a>
        </div>
    </nav>
   

    <!-- Update Task (Form) -->

    <?php

        $fetchQuery = "SELECT * FROM `details` WHERE id = '$id'";
        $fetchResult = mysqli_query($conn, $fetchQuery);
        $row = mysqli_fetch_assoc($fetchResult);

    ?>

    <form method = 'post' style="width: 30vw; text-align: center; margin: 5vh 0 0 35vw;">
        <div class="mb-3">
          <input type="text" class="form-control" id="nameInput" name="name" placeholder="Enter your name" value = '<?php echo $row['Name'] ?>' >
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" id="dept" name="dept" placeholder="Enter your department" value = '<?php echo $row['Dept'] ?>' >
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="task" name="task" placeholder="Task" value = '<?php echo $row['Task'] ?>' >
          </div>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
