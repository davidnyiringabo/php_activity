<?php include("dbconn.php");?>
<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM students where id=$id";
    $result = mysqli_query($connection,$query);
    if(!$result){
        echo "query failed".mysqli_error($connection);
    }else{
        header('location:index.php?message=deleted successfully');
    }
}

?>



