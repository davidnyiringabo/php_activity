<?php include("header.php");?>
<?php include("dbconn.php");?>
<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];

    $query = "select * from `students` WHERE `id`=$id";
    $result = mysqli_query($connection,$query);
    if(!$result){
        echo "query failed".mysqli_error($connection);
    }
    else{
        $row = mysqli_fetch_assoc($result);
    }
}
?>
<?php
if(isset($_POST['update_button'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    $query = "UPDATE students set first_name='$firstname',last_name='$lastname',age=$age,email='$email' where id=$id";
    $result = mysqli_query($connection,$query);
    if(!$result){
        echo "query failed".mysqli_error($connection);
    }else{
        header('location:index.php?message=updated successfully');
    }
}
?>

<div class="container">


<form action="update_page.php?id=<?php echo $id; ?>" method="POST">
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" class="form-control" value="<?php echo $row['first_name'] ?>" required>
    </div>
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" class="form-control" value="<?php echo $row['last_name'] ?>" required>
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" name="age" class="form-control" value="<?php echo $row['age'] ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $row['email'] ?>" required>
    </div>
    <input type="submit" name="update_button" value="update" class="btn btn-success my-2">
</form>
</div>

<?php include("footer.php");?>