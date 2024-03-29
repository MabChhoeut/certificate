<?php
include_once 'db.php';

if(isset($_POST['search1']))
{    
    $id = $_POST['id'];
    
    $sql = "select u.*,r.Role from users as u
            inner join usersrole as r
            on r.RoleID = u.RoleID Where id=$id";
    
    $query = mysqli_query($conn,$sql);

     while($data = mysqli_fetch_array($query))
      { 
         header("location:userstbl.php?id=".$data['id'].
         "&name=".$data['name'].
         "&email=".$data['email'].
         "&mobile=".$data['mobile'].
         "&password=".$data['password'].
        "&confirm_password=".$data['confirm_password'].
         "&RoleID=".$data['Role']. 
         "&photo=".$data['photo']);  
      }
}

if(isset($_POST['update1'])) {    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $RoleID = $_POST['RoleID'];
    $photo = $_POST['photo'];
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($password !== $confirm_password) {
        echo '<script>alert("Password and Confirm Password do not match")</script>';
    } else {
        $sql = "UPDATE users SET 
                name = '$name',
                email = '$email',
                password = '$hashed_password',
                RoleID = '$RoleID',
                photo = '$photo'
                WHERE id = '$id'";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Data has been updated successfully!")</script>';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
    }
}

if(isset($_POST['delete1']))
{    
    $id = $_POST['id'];
   
    $sql = "delete from users
            Where id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been deleted successully!")</script>';
    } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

?>


<!doctype html>
<html lang="en">
<?php include("head.php")?>
<body>
  <?php include("headmain.php")?>
  <?php include("menu.php")?>
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
            <div class="container">
        <h1 class="text-center"> Users Form</h1>
        <form action="userstbl.php" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">UserID:</label>
                        <input type="text" name="id" 
                            value="<?php if(!empty($_GET)) echo $_GET['id'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">User Name:</label>
                        <input type="text" name="name" 
                            value="<?php if(!empty($_GET)) echo $_GET['name'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div>
            <br>
            <div class = "row">
                <div class ="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">User Email:</label>
                        <input type="text" name="email" 
                            value="<?php if(!empty($_GET)) echo $_GET['email'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>  
                <div class ="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">User Mobile:</label>
                        <input type="text" name="mobile" 
                            value="<?php if(!empty($_GET)) echo $_GET['mobile'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">User Password:</label>
                        <input type="text" name="password" 
                            value="<?php if(!empty($_GET)) echo $_GET['password'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
               <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">User confirm_password:</label>
                        <input type="text" name="confirm_password" 
                            value="<?php if(!empty($_GET)) echo $_GET['confirm_password'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div> 
            <br>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                                <label for="formGroupExampleInput2">Role:</label>
                                <select name="RoleID" class="form-select" aria-label="Default select example">
                                <option><?php if(!empty($_GET)) echo $_GET['RoleID'] ?><?php if(empty($_GET)) echo "<strong>Choose your Role</strong>" ?></option>
                                <?php 
                                include_once 'connectToRole.php';
                                foreach ($options as $option) {
                                ?>
                                <option value="<?php echo $option['RoleID']; ?>">
                                <?php echo $option['Role']; ?></option>
                                <?php 
                                        }
                                ?>
                                </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Photo:</label>
                        <input type="text" name="photo" 
                            value="<?php if(!empty($_GET)) echo $_GET['photo'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div> 
            <br>
            <center>
                    <button type="button" class="btn btn-primary" onclick="location.href='setup.php'">Add User</button> 
                 <!-- no correct yet   <input type="submit" class="btn btn-primary" name="insert" value="Insert"> -->
                    <input type="submit" class="btn btn-primary" name="search1" value="Search">
                    <input type="submit" class="btn btn-primary" name="update1" value="Update">
                    <input type="submit" class="btn btn-primary" name="delete1" value="Delete">
            </center>
        </form>
        <br>
        <?php
 
            $sql = "select u.*, r.Role from users as u
                    left join usersrole as r
                    on r.RoleID = u.RoleID";

            $query = mysqli_query($conn,$sql);

            echo "<table class = 'table table-bordered'>";
                echo "<tr>";
                echo "<th>UserID</th>";
                echo "<th>User Name</th>";
                echo "<th>User Email</th>";
                echo "<th>User Mobile</th>";
             /*   echo "<th>User Password</th>";*/
             /*   echo "<th>confirm_password</th>"; */
                echo "<th>RoleID</th>";
                echo "<th>Photo</th>";
                echo "</tr>";
                
                while($data = mysqli_fetch_array($query))
                    { 
                    echo "<tr>";
                    echo "<td>".$data['id']."</td>";
                    echo "<td>".$data['name']."</td>";
                    echo "<td>".$data['email']."</td>";
                    echo "<td>".$data['mobile']."</td>";
                /*    echo "<td>".$data['password']."</td>"; */
                /*    echo "<td>".$data['confirm_password']."</td>";*/
                    echo "<td>".$data['Role']."</td>"; 
                    echo "<td>".$data['photo']."</td>"; 
                    echo "</tr>";
                }
            
            echo "</table>";
            
            mysqli_close($conn);
            ?>
    </div>
            </div>
        </div>
    </section>
  </main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<?php include("script.php")?>
</body>

</html>