<?php
include_once 'db.php';
/*if(isset($_POST['insert1']))
{    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $RoleID = $_POST['RoleID'];
    $photo = $_POST['photo'];
   
    $sql = "INSERT INTO tblcertificaterangedetail
    VALUES ('$CertificateRangeDetailID', '$BTBacXIIid','$CertificateRangeID', '$CertificateNumber',
            '$FullNameKH','$FullNameEN','$SexID','$DOB','$CampusID','$Photo',
            '$BTBacXIIURL','$BacXIIURL')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been inserted successully!")</script';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
} should not be used this code because we have to do register instead*/ 

if(isset($_POST['search1']))
{    
    $id = $_POST['id'];
    
    $sql = "select * from users Where id=$id";
    
    $query = mysqli_query($conn,$sql);

     while($data = mysqli_fetch_array($query))
      { 
         header("location:users.php?id=".$data['id'].
         "&name=".$data['name'].
         "&email=".$data['email'].
         "&mobile=".$data['mobile'].
         "&password=".$data['password'].
         "&confirm_password=".$data['confirm_password'].
         "&RoleID=".$data['RoleID'].  
         "&photo=".$data['photo']);  
      }
}

if(isset($_POST['update1']))
{    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $RoleID = $_POST['RoleID'];
    $photo = $_POST['photo'];

    $sql = "Update users set 
        name = '$name',
        email = '$email',
        password = '$password',
        confirm_password = '$confirm_password',
        RoleID = '$RoleID',
        photo = '$photo'
        Where id= '$id'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been updated successully!")</script';
    } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
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

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>users account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center"> Users Form</h1>
        <form action="users.php" method="post">
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
                    <button type="button" onclick="location.href='setup.php'">Insert</button>
                    <input type="submit" class="btn btn-primary" name="search1" value="Search">
                    <input type="submit" class="btn btn-primary" name="update1" value="Update">
                    <input type="submit" class="btn btn-primary" name="delete1" value="Delete">
            </center>
        </form>
        <br>
        <?php
 
            $sql = "select * from users";

            $query = mysqli_query($conn,$sql);

            echo "<table class = 'table table-bordered'>";
                echo "<tr>";
                echo "<th>UserID</th>";
                echo "<th>User Name</th>";
                echo "<th>User Email</th>";
                echo "<th>User Mobile</th>";
                echo "<th>User Password</th>";
                echo "<th>confirm_password</th>";
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
                    echo "<td>".$data['password']."</td>";
                    echo "<td>".$data['confirm_password']."</td>";
                    echo "<td>".$data['RoleID']."</td>"; 
                    echo "<td>".$data['photo']."</td>"; 
                    echo "</tr>";
                }
            
            echo "</table>";
            
            mysqli_close($conn);
            ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>