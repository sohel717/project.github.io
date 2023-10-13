<?php
 $showalert = false;
 $showerr =false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include('component/dbconnect.php');
    $name = $_POST['name'];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $chec = $_POST["chec"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    //$exists = false;
    $existsql = "SELECT * FROM `users` WHERE email = '$email'";
    $result = mysqli_query($conn, $existsql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        $showerr = "user exist";
        }
         
    else{
     if(($password == $cpassword)){
     $sql = "INSERT INTO `users` (`id`, `name`, `email`,`gender`,`phone`, `password`, `cpassword`, `chec`, `dt`)
      VALUES (NULL, '$name', '$email', '$gender', '$phone', '$password', '$cpassword','$chec', current_timestamp())";
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup please</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    require('component/navbar.php');  ?>
    <?php
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
    <div class="container my-4">
        <h1 class="text-center text-primary my-3">Register For Login</h1>
        <form action="/crud+log/signup.php" method="POST">
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
                    <option value="mumbai">mumbai</option>
                    <option value="pune">pune</option>
                    <option value="ahmadabad">ahmadabad</option>
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
        <h3 style="color:red;"> already have an account <a href="index.php" class="btn btn-outline-danger  my-3">log in
            </a></h3>
    </div>





    <script src="bootstrap/js/bootstrap.min.js">
    </script>
</body>

</html>