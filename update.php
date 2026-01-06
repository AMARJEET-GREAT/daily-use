     <?php
     include('confing.php');
    $id = $_GET['id'];
    $query = " select * from first where id='$id' ";
    $run = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($run);


    include('confing.php');
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pasword = $_POST['pasword'];

    $query = "update first set name='$name', email='$email', pasword='$pasword' where id='$id'";

    $run = mysqli_query($conn,$query);

    if($run){
    
      header('location:read.php');
    }                        
    else
    {
      echo" error";
    }

}
     ?>  
           <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>update</title>
    <style>
      *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }
        body{
           height: 100vh;
           display: grid;
              place-items: center;

        }
    </style>
</head>
<body>
    <div class="main">
        <h2>  add data</h2>
         <a href="read.php"><button class="btn btn-success">back</button></a>
        <form method="post" action="read.php">
              <div class="mb-3">
    <label for="name" class="form-label">name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="student_name"  value="<?php echo $row['name'] ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name=email value="<?php echo $row['email'] ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name =password value="<?php echo $row['pasword'] ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
</body>
</html>


<?php

include('confing.php');
if(isset($_POST['submit']))
{
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pasword = $_POST['pasword'];

    $query = " insert into first ( id,username,email,pasword)values('' ,'$username','$email','$pasword'); ";

    $run = mysqli_query($conn,$query);

    if($run){
    
      header('location:read.php');
    }                        
    else
    {
      echo" error";
    }

}

?>