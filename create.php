<?php
include ("dbconn.php");

if(isset($_POST['add-student'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    $query = "INSERT INTO students (first_name,last_name,age,email) VALUES ('$firstname','$lastname','$age','$email')";

    $results = mysqli_query($connection, $query);
    // $results = $connection->query($query);
    if(!$results){
        echo "query failed".mysqli_error($connection);
    }
    else{
        header("location:index.php?message=student added successfully");
    }
}
?>