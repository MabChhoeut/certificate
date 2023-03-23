
<?php
include_once 'db.php';
if (isset($_POST['Search'])) {
    $BTListStudentID = mysqli_real_escape_string($conn, $_POST['BTListStudentID']);
    $sql = "SELECT * from tblbtliststudent
            WHERE d.CertificateRangDetailID = '$CertificateRangDetailID'";
    $query = mysqli_query($conn, $sql);
    if (!$query) {
        die("Query failed: " . mysqli_error($conn));
    }
    if ($data = mysqli_fetch_array($query)) {
        header("Location: tblbtliststudent.php?BTListStudentID=".$data['BTListStudentID']."&BTBacXIIID=".$data['BTBacXIIID']);
        exit;
    } else {
        echo "No result found.";
    }
}
if (isset($_POST['Insert'])) {
    $BTListStudentID = $_POST['BTListStudentID'];
    $BTBacXIIID = $_POST['BTBacXIIID'];

    // Check if photo is uploaded
    if (!empty($_FILES['photo']['name'])) {
        $photo = $_FILES['photo']['name'];
        $photo_temp = $_FILES['photo']['tmp_name'];
        // Generate unique name for photo
        $photo_unique = uniqid() . '_' . $photo;
        move_uploaded_file($photo_temp, "studentlisturl/" . $photo_unique);
    } else {
        $photo_unique = null;
    }

    $sql = "INSERT INTO tblbtliststudent (BTListStudentID,BTBacXIIID,ListStudentURL)
     VALUES ('$BTListStudentID','$BTBacXIIID','$photo_unique')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Insert Successfully.")</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

if (isset($_POST['Update'])) {
    $BTListStudentID = $_POST['BTListStudentID'];
    $BTBacXIIID = $_POST['BTBacXIIID'];
   
    // Check if photo is uploaded
    if (!empty($_FILES['photo']['name'])) {
        $photo = $_FILES['photo']['name'];
        $photo_temp = $_FILES['photo']['tmp_name'];
        // Generate unique name for photo
        $photo_unique = uniqid() . '_' . $photo;
        move_uploaded_file($photo_temp, "studentlisturl/" . $photo_unique);
    } else {
        $photo_unique = null;
    }

    $sql = "UPDATE tblbtliststudent set 
    BTBacXIIID='$BTBacXIIID',
    ListStudentURL='$photo_unique'
    where BTListStudentID=$BTListStudentID";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Update Successfully.")</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

if (isset($_POST['Delete'])) {
    $BTListStudentID = $_POST['BTListStudentID'];
    $sql = "DELETE from tblbtliststudent where BTListStudentID='$BTListStudentID'";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Delete Successfully.")</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include("head.php")?>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('header.php') ?>
  <?php include_once('menu.php') ?>
  <?php include("headmain.php")?>
  <?php include("script.php")?>
   
</head>
<body>

<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="container">
                    <h1 class="text-center">List Student</h1>
                    <p class="text-center">Please input your data here and click insert to store data.</p>
                        <form action="tblbtliststudent.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="formGroupExampleInput">BTListStudentID:</label>
                                    <input type="text" name="BTListStudentID" value="<?php if(!empty($_GET)) echo $_GET['BTListStudentID'] ?>"
                                    class="form-control" id="formGroupExampleInput">
                                </div> 
                                <div class='col-lg-6'>
                                    <label for="formGroupExampleInput">BacXII ID:</label>
                                    <select name="BTBacXIIID" class="form-select" aria-label="Default select example">
                                    <option><?php if(!empty($_GET)) echo $_GET['BTBacXIIID'] ?><?php if(empty($_GET)) echo "Select" ?></option>
                        
                                        <?php 
                                        include_once 'bacXIIconnector.php';
                                        foreach ($options as $option) {
                                        ?>
                                        <option value="<?php echo $option['BTBacXIIID']; ?>">
                                        <?php echo $option['BTBacXIIID']; ?></option>
                                        <?php 
                                                }
                                        ?>
                                    </select><br>
                                </div>
                            </div>
                           <br>
                            <label for="photo">Choose a student photo:</label>
                            <input type="file" name="photo" id="photo"><br>
                            <!--  <input class="btn btn-primary" type="submit" name="Insert" value="Insert">-->
                            <!--<div class="row">
                                <div class ="col-lg-6">
                                    <label for="photo">Choose a photo:</label>
                                    <input type="file" name="photo" id="photo"><br>
                                 </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class = "col-lg-6">
                                    <label for="BTurl">Choose a BT url:</label>
                                    <input type="file" name="BTurl" id="BTurl"><br>
                                 </div>
                            </div>
                            <br>
                            <div class ="row">
                                <div class="col-lg-6">
                                    <label for="Miniurl">Choose a Mini url:</label>
                                    <input type="file" name="Miniurl" id="Miniurl"><br>
                                    <input type="submit" name="Insert" value="Insert">     
                                </div>
                            </div>
                                            -->
                            <br>
                            <div class="row">
                                <div class="col-lg-12 pb-4" style="text-align: right">
                                    <div class="row">
                                        <div class="col-lg-12" style="text-align: right">
                                            <button type="submit" name="Insert" value="Insert"
                                                class="btn btn-primary">Insert</button>
                                            <button type="submit" name="Search" value="Search"
                                                class="btn btn-primary">Search</button>
                                            <button type="submit" name="Update" value="Update"
                                                class="btn btn-primary">Update</button>
                                            <button type="submit" name="Delete" value="Delete"
                                                class="btn btn-primary">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                       
                        <!-- Search -->
                        <br>
                        <?php
                            include_once 'db.php';
                
                            $sql = "select * from tblbtliststudent";

                            $query = mysqli_query($conn,$sql);

                            echo "<table class = 'table table-bordered'>";
                            echo "<tr>";
                            echo "<th>BTListStudent ID</th>";
                            echo "<th>BTBacXIIID</th>";
                            echo "<th>ListStudentURL</th>";
                            echo "</tr>";
                            
                            while($data = mysqli_fetch_array($query))
                            { 
                            echo "<tr>";
                            echo "<td>".$data['BTListStudentID']."</td>";
                            echo "<td>".$data['BTBacXIIID']."</td>";
                            echo "<td>".$data['ListStudentURL']."</td>";
                            echo "</tr>";
                            }
                            
                            echo "</table>";
                            
                            mysqli_close($conn);
                            ?>
                </div>
            </div>
        </div>
    </section>
</main>
</body>

</html>
<!-- insert -->



