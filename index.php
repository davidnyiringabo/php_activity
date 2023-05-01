<?php include("header.php");?>
<?php include("dbconn.php");?>
 <div class="d-flex justify-content-between my-4">
 <h2>all students</h2>
<button class="btn btn-primary p-2 mb-2"  data-bs-toggle="modal" data-bs-target="#exampleModal" >ADD STUDENT</button>
 </div>
     <table class="table table-hover table-bordered table-striped" >
        <thead>
            <tr>
                <th>ID</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>age</th>
                <th>email</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM `students`";
            $result = mysqli_query($connection,$query);
            if(!$result){
                die("query failed".mysqli_error($connection));
            }else{
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["first_name"]; ?></td>
                        <td><?php echo $row["last_name"]; ?></td>
                        <td><?php echo $row["age"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><a href="update_page.php?id=<?php echo $row["id"];?>" class="btn btn-success">update</a></td>
                        <td><a href="delete_page.php?id=<?php echo $row["id"];?>" class="btn btn-danger">Delete</a></td>
                    </tr>
            <?php
                };
            }
            ?>
        </tbody>
    </table> 
    <?php
    if(isset($_GET['message'])){
        echo `<h6 class="text-success text-center">`.$_GET['message']."</h6>";
    };
    ?>
    <form action="create.php" method="POST"> 
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"> Add new student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" value="add student" name="add-student" class="btn btn-success">
      </div>
    </div>
  </div>
</div> 
</form>
    <?php include("footer.php");?>
   
