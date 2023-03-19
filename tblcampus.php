<?php
include_once 'db.php';
if(isset($_POST['insert1']))
{    
    $CampusID = $_POST['CampusID'];
    $CampusKH = $_POST['CampusKH'];
    $CampusEN = $_POST['CampusEN'];
   
    $sql = "INSERT INTO tblcampus (CampusID, CampusKH , CampusEN) 
    VALUES ('$CampusID', '$CampusKH','$CampusEN')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been inserted successully!")</script';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['search1']))
{    
    $CampusID = $_POST['CampusID'];
    
    $sql = "select CampusID, CampusKH , CampusEN from tblcampus Where CampusID=$CampusID";
    
    $query = mysqli_query($conn,$sql);

     while($data = mysqli_fetch_array($query))
      { 
         header("location:tblcampus.php?CampusID=".$data['CampusID']."&CampusKH=".$data['CampusKH'].
         "&CampusEN=".$data['CampusEN']);      
      }
}

if(isset($_POST['update1']))
{    
    $CampusID = $_POST['CampusID'];
    $CampusKH = $_POST['CampusKH'];
    $CampusEN = $_POST['CampusEN'];

    $sql = "Update tblcampus set CampusEN = '$CampusEN'
     ,CampusKH='$CampusKH' Where CampusID = '$CampusID'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been updated successully!")</script';
    } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['delete1']))
{    
    $CampusID = $_POST['CampusID'];
   
    $sql = "delete from tblcampus Where CampusID = '$CampusID'";

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
        <h1 class="text-center">Campus List Form</h1>
        <form action="tblcampus.php" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Campus ID</label>
                        <input type="text" name="CampusID" value="<?php if(!empty($_GET)) echo $_GET['CampusID'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Campus Khmer</label>
                        <input type="text" name="CampusKH" value="<?php if(!empty($_GET)) echo $_GET['CampusKH'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div>
            <br>
            <div class = "row">
                <div class ="col-lg-6">
                    <div class="form-group">
                    <label for="Campus">Campus:</label>
                    <select class="form-control" name="CampusEN" id="Campus">
                        <option value="" disabled selected>Select campus</option>
                        <option value="B1 Kirirom">B1 Kirirom</option>
                        <option value="B2 Phsar Toul Tumpong">B2 Phsar Toul Tumpong</option>
                        <option value="B3 DN">B3 DN</option>
                        <option value="B4 Phsar Deum Thkov">B4 Phsar Deum Thkov</option>
                        <option value="B5 Chbar Ampoeu">B5 Chbar Ampoeu</option>
                        <option value="B6 O’Rusey">B6 O’Rusey</option>
                        <option value="B7 Loksang Hospital">B7 Loksang Hospital</option>
                        <option value="B8 Pochintong">B8 Pochintong</option>
                        <option value="B9 Stung Meanchey">B9 Stung Meanchey</option>
                        <option value="B10 Ang Teuk Olympic">B10 Ang Teuk Olympic</option>
                        <option value="B11 Phsa Toch">B11 Phsa Toch</option>
                        <option value="B12 Phsar Deihoy">B12 Phsar Deihoy</option>
                        <option value="B13 Camko City Roundabout">B13 Camko City Roundabout</option>
                        <option value="B14 Takhmao City">B14 Takhmao City</option>
                        <option value="B15 Phsar Chumpou Vorn">B15 Phsar Chumpou Vorn</option>
                        <option value="B16 Phlov Koang Veng Sreng">B16 Phlov Koang Veng Sreng</option>
                        <option value="B17 Russey Keo">B17 Russey Keo</option>
                        <option value="B18 Phar Prek Eng8">B18 Phar Prek Eng</option>
                        <option value="B19 Phsar Preak Leab">B19 Phsar Preak Leab</option>
                        <option value="B20 Chom Chao">B20 Chom Chao</option>
                        <option value="B21 Chhouk Meas Market1">B21 Chhouk Meas Market</option>
                        <option value="B22 Kour Srov Roundabout">B22 Kour Srov Roundabout</option>
                        <option value="B23 PreySar Road, Russey Sanh Stoplight">B23 PreySar Road, Russey Sanh Stoplight</option>
                        <option value="2B24 Prek Tamak Roundabout4">B24 Prek Tamak Roundabout</option>
                    </select><br>

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
 
            $sql = "select CampusID, CampusKH,CampusEN from tblcampus";

            $query = mysqli_query($conn,$sql);

            echo "<table class = 'table table-bordered'>";
            echo "<tr>";
            echo "<th>Campus ID</th>";
            echo "<th>Campus Khmer</th>";
            echo "<th>Campus English</th>";
            echo "</tr>";
            
            while($data = mysqli_fetch_array($query))
            { 
            echo "<tr>";
            echo "<td>".$data['CampusID']."</td>";
            echo "<td>".$data['CampusKH']."</td>";
            echo "<td>".$data['CampusEN']."</td>";
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