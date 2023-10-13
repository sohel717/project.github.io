<?php
 $showalert = false;
 $showerr =false;
 $login = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include('component/dbconnect.php');
    
    $email = $_POST["email"];
    $password = $_POST["password"];
   
    $sql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login= true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("location: home.php");
        }
         
    else{ 
        $showerr = "invaid creadential";
    }
    
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login please</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    require('component/navbar.php')   ?>

<?php
    if($login){
     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>Success!</strong> successfully logged in.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>'; 
    }
      if($showerr){
     echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
     <strong>failed!</strong> ' .$showerr. '
     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
   </div>";
    }
    ?>
    <div class="container my-4">
    <h1 class="text-center text-primary my-3">Login Page</h1>
        <form action="/crud+log/index.php" method="POST">
           
            <div class="mb-2">
                <label for="email" class="form-label">E-mail</label>
                <input name="email" type="text" class="form-control" id="email">

            </div>
            <div class="mb-2">
                <label for="password" class="form-label">password</label>
                <input name="password" type="password" class="form-control" id="password">

            </div>
            <button type="submit" class="btn btn-primary  my-2">login </button>
            
            </form>
            Dont Have An Account
            <a class="btn btn-danger my-4" href="signup.php"> Sign Up</a> 
            </div>
    
   
    
</body>
</html>