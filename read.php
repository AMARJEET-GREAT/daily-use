
     <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
        <style>
      *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }
        body{
           height: 50vh;
           display: grid;
              place-items: center;

        }
        h1{
            text-align: center;
            margin-bottom: 20px;
        }

</style>
</head>
<body>
<div class="mian">
    <h1> php crud</h1>
     <a href="create.php"><button class="btn btn-success">add  data</button></a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">pasword</th>
      <th >update</th>
      <th>delete</th>
    </tr>
  </thead>
  <tbody>
     <?php
     
     include('confing.php');
    $query = " select * from first ";
    $run = mysqli_query($conn,$query);
foreach($run as $data);
    ?>
    <tr>
      <td><?php echo $data['id'] ?></td>
      <td><?php echo $data['student_name'] ?></td>
      <td><?php echo $data['email'] ?></td>
      <td><?php echo $data['pasword']?></td>
      <td> <botton class="btn btn-primary"><a href="update.php?id=<?php echo $data['id'] ?>" class="text-light text-decoration-none">update</a></botton></td>
      <td><a href="delete.php?id=<?php echo $data['id'] ?>" class="btn btn-danger">delete</a></td>
    </tr>

    <?php
     $run = mysqli_query($conn,$query);

    if($run){
    
      header('location: read.php');
    }                        
    else
    {
      echo" error";
    }




   ?>
  </tbody>
</table>
      </div>

</body>
</html>