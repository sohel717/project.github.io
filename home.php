<?php
include('component/dbconnect.php');
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
    header('location:index.php');
    exit;
}


?>
<?php
 $showalert = false;
 $showerr =false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include('component/dbconnect.php');
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $chec = $_POST["chec"];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    //$exists = false;
    $existsql = "SELECT * FROM `users` WHERE email = '$email'";
    $result = mysqli_query($conn, $existsql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        $showerr = "user exist";
        }
         
    else{
     if(($password == $cpassword)){
     $sql = "INSERT INTO `users` (`id`, `name`, `email`, `gender`,`chec`,`phone`, `password`, `cpassword`, `dt`)
      VALUES (NULL, '$name', '$email', '$phone','$gender','$chec', '$password', '$cpassword', current_timestamp())";
     $result = mysqli_query($conn , $sql);
    if($result){
       $showalert = true;
   }
}
   else{ $showerr = "password do not match" ;
         }      
    }
}
    
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>home</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
   
    require('component/navbar.php');  
    
    if($showalert){
     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>Success!</strong> you have successfully signup
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>'; 
    }
      if($showerr){
     echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
     <strong>failed!</strong> $showerr
     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
   </div>";
    }
    ?>

    <h2 class="danger text-center my-3 "> Welcome admin : <?php  echo $_SESSION['email'] ?> <a class="btn btn-primary"
            href="logout.php"> log out</a></h2>



    <div class="container">
        <div class="container my-4">
            <h1>add user</h1>
            <form action="/crud+log/home.php" method="POST">
                <div class="mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" id="name">

                </div>
                <div class="mb-2">
                    <label for="email" class="form-label">E-mail</label>
                    <input name="email" type="email" class="form-control" id="email">

                </div>

                <div class="mb-2">
                    <label for="phone" class="form-label">Phone</label>
                    <input name="phone" type="text" class="form-control" id="phone">

                </div>
                 
                <div class="form-group mb-2">
            <label for="" class="form-label">gender</label><br>
           
                <input type="radio" name="gender" value="male" /> male
                <input type="radio" name="gender" value="female" /> female
                <input type="radio" name="gender" value="other" /> other
                
            </div>
            <div class="form-group mb-2">
            <label for="" class="form-label">how did you here about this?r</label><br>
           
                <input type="checkbox" name="chec" value="friends" /> friends
                <input type="checkbox" name="chec" value="job portel" /> job portel
                <input type="checkbox" name="chec" value="linkdin" /> linkdin
                <input type="checkbox" name="chec" value="other" /> other
                
            </div>
               
                <div class="mb-2">
                    <label for="city" class="form-label">city</label>
                    <select name="city" type="text" class="form-control" id="city">
                        <option value="betul">mumbai</option>
                        <option value="betul">pune</option>
                        <option value="betul">ahmadabad</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">state</label>
                    <input name="password" type="text" class="form-control" id="password">
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="text" class="form-control" id="password">
                </div>

                <div class="mb-2">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input name="cpassword" type="text" class="form-control" id="cpassword">

                </div>

                <input type="submit" class="btn btn-primary  my-3" />
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="row">id</th>
                        <th scope="col">name</th>
                        <th scope="col">Email</th>
                        <th scope="col">phone</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   
                   
$sql = "SELECT * FROM `users`";


$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){
 
    echo "<tr> <td>". $row['id'] . "</th>
            <td>". $row['name'] . "</th>
            <td>". $row['email'] . "</td>
            <td>". $row['phone'] . "</td>
            <td>
           <a class='btn btn-dark' href='edit.php? editid=". $row['id']. "'> edit </a>
           <a  class='btn btn-danger' href='delete.php? deleteid=". $row['id'] . "'> delete </a>
        
            </td>
            
        </tr>";
}
        ?>

                </tbody>
            </table>



        </div>

        <script src="bootstrap/css/bootstrap.min.js">
        </script>
</body>

</html>