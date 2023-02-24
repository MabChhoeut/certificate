<?php
include_once 'db.php';
if(isset($_POST['insert1']))
{    
    $BTListStudentID = $_POST['BTListStudentID'];
    $BTBacXIIid = $_POST['BTBacXIIid'];
    $ListStudentURL = $_POST['ListStudentURL'];
   
    $sql = "INSERT INTO tblbtliststudent (BTListStudentID, BTBacXIIid , ListStudentURL) 
    VALUES ('$BTListStudentID', '$BTBacXIIid','$ListStudentURL')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been inserted successully!")</script';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['search1']))
{    
    $BTListStudentID = $_POST['BTListStudentID'];
    
    $sql = "select BTListStudentID, BTBacXIIid , ListStudentURL from tblbtliststudent Where BTListStudentID=$BTListStudentID";
    
    $query = mysqli_query($conn,$sql);

     while($data = mysqli_fetch_array($query))
      { 
         header("location:tblbtliststudent.php?BTListStudentID=".$data['BTListStudentID']."&BTBacXIIid=".$data['BTBacXIIid'].
         "&ListStudentURL=".$data['ListStudentURL']);      
      }
}

if(isset($_POST['update1']))
{    
    $BTListStudentID = $_POST['BTListStudentID'];
    $BTBacXIIid = $_POST['BTBacXIIid'];
    $ListStudentURL = $_POST['ListStudentURL'];

    $sql = "Update tblbtliststudent set BTBacXIIid = '$BTBacXIIid'
     ,ListStudentURL='$ListStudentURL' Where BTListStudentID = '$BTListStudentID'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been updated successully!")</script';
    } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['delete1']))
{    
    $BTListStudentID = $_POST['BTListStudentID'];
   
    $sql = "delete from tblbtliststudent Where BTListStudentID = '$BTListStudentID'";

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
        <h1 class="text-center">Student List Form</h1>
        <form action="tblbtliststudent.php" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Student List ID</label>
                        <input type="text" name="BTListStudentID" value="<?php if(!empty($_GET)) echo $_GET['BTListStudentID'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">BacXII ID</label>
                        <input type="text" name="BTBacXIIid" value="<?php if(!empty($_GET)) echo $_GET['BTBacXIIid'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div>
            <br>
            <div class = "row">
                <div class ="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">List Student URL</label>
                        <input type="text" name="ListStudentURL" value="<?php if(!empty($_GET)) echo $_GET['ListStudentURL'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>  
                <br>
                <div class = "col-lg-6">
                    <input type="submit" class="btn btn-primary" name="insert1" value="Insert">
                    <input type="submit" class="btn btn-primary" name="search1" value="Search">
                    <input type="submit" class="btn btn-primary" name="update1" value="Update">
                    <input type="submit" class="btn btn-primary" name="delete1" value="Delete">
                </div>
            </div>
        </form>
        <br>
        <?php
 
            $sql = "select BTListStudentID,BTBacXIIid,ListStudentURL from tblbtliststudent";

            $query = mysqli_query($conn,$sql);

            echo "<table class = 'table table-bordered'>";
            echo "<tr>";
            echo "<th>Student List ID</th>";
            echo "<th>BacXII ID</th>";
            echo "<th>List Student URL</th>";
            echo "</tr>";
            
            while($data = mysqli_fetch_array($query))
            { 
            echo "<tr>";
            echo "<td>".$data['BTListStudentID']."</td>";
            echo "<td>".$data['BTBacXIIid']."</td>";
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
  </main><!-- End #main -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<?php include("script.php")?>
</body>

</html>