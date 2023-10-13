<?php
include('component/dbconnect.php');

 //$row['id'] = $_GET['editid'];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    //$exists = false;
    $sql = "update `users` set name= '$name',email= '$email' ,phone= '$phone',
    password= '$password',cpassword= '$cpassword' "; 
    $result = mysqli_query($conn, $sql);
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
    <div class="container">
        <div class="container my-4">
            <h1>edit user</h1>
            <form action="/crud+log/edit.php" method="POST">
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
           
                <input type="radio" name="gender" value="male"/> male
                <input type="radio" name="gender" value="female"/> female
                <input type="radio" name="gender" value="other"/> other
                
            </div>



                <label for="phone" class="form-label">how did you here about this?</label>
                <div class="form-check mx-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        linkdin
                    </label>
                </div>
                <div class="form-check mx-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        friends
                    </label>
                </div>
                <div class="form-check mx-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        job portel
                    </label>
                </div>
                <div class="form-check mx-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        other
                    </label>
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

                <button type="submit" class="btn btn-primary" name="submit">update</button>
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
           <a class='btn btn-dark' href='edit.php? editid=". $row['id'] ."'> edit </a>
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