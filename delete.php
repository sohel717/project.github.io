<?php

//connect to the database
$servername = "localhost";
$username = "root";
$password =  "";
$database = "crud";

//connection
$conn = mysqli_connect($servername, $username, $password, $database);

if(isset($_GET['deleteid'])){
    $row['id'] = $_GET['deleteid'];
    $sql =" delete from users where id = ". $row['id'] ."";
    $result = mysqli_query($conn , $sql);
    if($result){
        header('location:home.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>