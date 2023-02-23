<?php
include_once 'db.php';
if(isset($_POST['insert1']))
{    
    $CertificateRangeDetailID = $_POST['CertificateRangeDetailID'];
    $BTBacXIIid = $_POST['BTBacXIIid'];
    $CertificateRangeID = $_POST['CertificateRangeID'];
    $CertificateNumber = $_POST['CertificateNumber'];
    $FullNameKH = $_POST['FullNameKH'];
    $FullNameEN = $_POST['FullNameEN'];
    $SexID = $_POST['SexID'];
    $DOB = $_POST['DOB'];
    $CampusID = $_POST['CampusID'];
    $Photo = $_POST['Photo'];
    $BTBacXIIURL = $_POST['BTBacXIIURL'];
    $BacXIIURL = $_POST['BacXIIURL'];
   
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
}

if(isset($_POST['search1']))
{    
    $CertificateRangeDetailID = $_POST['CertificateRangeDetailID'];
    
    $sql = "select * from tblcertificaterangedetail Where CertificateRangeDetailID=$CertificateRangeDetailID";
    
    $query = mysqli_query($conn,$sql);

     while($data = mysqli_fetch_array($query))
      { 
         header("location:tblcertificaterangedetail.php?CertificateRangeDetailID=".$data['CertificateRangeDetailID'].
         "&BTBacXIIid=".$data['BTBacXIIid'].
         "&CertificateRangeID=".$data['CertificateRangeID'].
         "&CertificateNumber=".$data['CertificateNumber'].
         "&FullNameKH=".$data['FullNameKH'].
         "&FullNameEN=".$data['FullNameEN'].
         "&SexID=".$data['SexID'].  
         "&DOB=".$data['DOB'].  
         "&CampusID=".$data['CampusID'].  
         "&Photo=".$data['Photo'].  
         "&BTBacXIIURL=".$data['BTBacXIIURL'].  
         "&BacXIIURL=".$data['BacXIIURL']);  
      }
}

if(isset($_POST['update1']))
{    
    $CertificateRangeDetailID = $_POST['CertificateRangeDetailID'];
    $BTBacXIIid = $_POST['BTBacXIIid'];
    $CertificateRangeID = $_POST['CertificateRangeID'];
    $CertificateNumber = $_POST['CertificateNumber'];
    $FullNameKH = $_POST['FullNameKH'];
    $FullNameEN = $_POST['FullNameEN'];
    $SexID = $_POST['SexID'];
    $DOB = $_POST['DOB'];
    $CampusID = $_POST['CampusID'];
    $Photo = $_POST['Photo'];
    $BTBacXIIURL = $_POST['BTBacXIIURL'];
    $BacXIIURL = $_POST['BacXIIURL'];

    $sql = "Update tblcertificaterangedetail set 
        BTBacXIIid = '$BTBacXIIid',
        CertificateRangeID = '$CertificateRangeID',
        CertificateNumber = '$CertificateNumber',
        FullNameKH = '$FullNameKH',
        FullNameEN = '$FullNameEN',
        SexID = '$SexID',
        DOB = '$DOB',
        CampusID = '$CampusID',
        Photo = '$Photo',
        BTBacXIIURL = '$BTBacXIIURL',
        BacXIIURL = '$BacXIIURL'
     Where CertificateRangeDetailID = '$CertificateRangeDetailID'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Data has been updated successully!")</script';
    } else {
      echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    // mysqli_close($conn);
}

if(isset($_POST['delete1']))
{    
    $CertificateRangeDetailID = $_POST['CertificateRangeDetailID'];
   
    $sql = "delete from tblcertificaterangedetail 
            Where CertificateRangeDetailID = '$CertificateRangeDetailID'";

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
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BELTEI INTERNOANL UNIVERSITY</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="images/logo1.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.php" class="logo d-flex align-items-center">
 <img src="imag/logo1.png" alt="" >
 <p style = "font-family: Khmer OS Muol Light;font-size:12px;padding-top:15px;"> 
  សាលា ប៊ែលធី អន្តរជាតិ
 <br>Beltei International School<br><p>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="#">
    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form>
</div><!-- End Search Bar -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number">4</span>
      </a><!-- End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
          You have 4 new notifications
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-exclamation-circle text-warning"></i>
          <div>
            <h4>Lorem Ipsum</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>30 min. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-x-circle text-danger"></i>
          <div>
            <h4>Atque rerum nesciunt</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>1 hr. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-check-circle text-success"></i>
          <div>
            <h4>Sit rerum fuga</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>2 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-info-circle text-primary"></i>
          <div>
            <h4>Dicta reprehenderit</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>4 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>
        <li class="dropdown-footer">
          <a href="#">Show all notifications</a>
        </li>

      </ul><!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-chat-left-text"></i>
       
      </a><!-- End Messages Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
        <li class="dropdown-header">
          You have 3 new messages
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Maria Hudson</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>4 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Anna Nelson</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>6 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
            <div>
              <h4>David Muldon</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>8 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="dropdown-footer">
          <a href="#">Show all messages</a>
        </li>

      </ul><!-- End Messages Dropdown Items -->

    </li><!-- End Messages Nav -->

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="imag/Admin.jpg" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2">Rangsey</span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>Kann Rangsey</h6>
          <span>Web Designer</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
            <i class="bi bi-gear"></i>
            <span>Account Settings</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="pages-faq.php">
            <i class="bi bi-question-circle"></i>
            <span>Need Help?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul>
    </li>

  </ul>
</nav>
</header>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
  <li class="nav-item">
    <a class="nav-link " href="index.php">
      <i class="bi bi-grid"></i>
      <span>Home Page</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Form</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="tables-general.php">
          <i class="bi bi-circle"></i><span>School</span>
        </a>
      </li>
      <li>
        <a href="tables-data.html">
          <i class="bi bi-circle"></i><span>Student</span>
        </a>
      </li>
      <li>
        <a href="tables-data.html">
          <i class="bi bi-circle"></i><span>Study Infor</span>
        </a>
      </li>
    </ul> 
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>User Info</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="userstbl.php">
          <i class="bi bi-circle"></i><span>User Account</span>
        </a>
      </li>
      <li>
        <a href="roletbl.php">
          <i class="bi bi-circle"></i><span>User Role</span>
        </a>
      </li>
    </ul>
  </li><!-- End Form
   <End Tables Nav <a href="home.php">-->
  <li class="nav-item">
    <a class="nav-link collapsed" href="users-profile.php">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="logout.php">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Log Out</span>
    </a>
  </li>
</ul>
</aside>
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
            <div class="container">
        <h1 class="text-center"> Certificate Range Detail Form</h1>
        <form action="tblcertificaterangedetail.php" method="post">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Certificate_RangeDetail_ID</label>
                        <input type="text" name="CertificateRangeDetailID" 
                            value="<?php if(!empty($_GET)) echo $_GET['CertificateRangeDetailID'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">BacXII_ID</label>
                        <input type="text" name="BTBacXIIid" 
                            value="<?php if(!empty($_GET)) echo $_GET['BTBacXIIid'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">CertificateRange_ID</label>
                        <input type="text" name="CertificateRangeID" 
                            value="<?php if(!empty($_GET)) echo $_GET['CertificateRangeID'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div>
            <br>
            <div class = "row">
                <div class ="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Certificate_Number</label>
                        <input type="text" name="CertificateNumber" 
                            value="<?php if(!empty($_GET)) echo $_GET['CertificateNumber'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>  
                <div class ="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Full Name Khmer</label>
                        <input type="text" name="FullNameKH" 
                            value="<?php if(!empty($_GET)) echo $_GET['FullNameKH'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class ="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Full Name English</label>
                        <input type="text" name="FullNameEN" 
                            value="<?php if(!empty($_GET)) echo $_GET['FullNameEN'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Sex_ID</label>
                        <input type="text" name="SexID" 
                            value="<?php if(!empty($_GET)) echo $_GET['SexID'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Date of Birth</label>
                        <input type="text" name="DOB" 
                            value="<?php if(!empty($_GET)) echo $_GET['DOB'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Campus_ID</label>
                        <input type="text" name="CampusID" 
                            value="<?php if(!empty($_GET)) echo $_GET['CampusID'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div> 
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Photo</label>
                        <input type="text" name="Photo" 
                            value="<?php if(!empty($_GET)) echo $_GET['Photo'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Beltei BacXII_URL</label>
                        <input type="text" name="BTBacXIIURL" 
                            value="<?php if(!empty($_GET)) echo $_GET['BTBacXIIURL'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="formGroupExampleInput">BacXII_URL</label>
                        <input type="text" name="BacXIIURL" 
                            value="<?php if(!empty($_GET)) echo $_GET['BacXIIURL'] ?>"
                            class="form-control" id="formGroupExampleInput">
                    </div>
                </div>
            </div> 
            <br>
            <center>
                    <input type="submit" class="btn btn-primary" name="insert1" value="Insert">
                    <input type="submit" class="btn btn-primary" name="search1" value="Search">
                    <input type="submit" class="btn btn-primary" name="update1" value="Update">
                    <input type="submit" class="btn btn-primary" name="delete1" value="Delete">
            </center>
        </form>
        <br>
        <?php
 
            $sql = "select * from tblcertificaterangedetail";

            $query = mysqli_query($conn,$sql);

            echo "<table class = 'table table-bordered'>";
                echo "<tr>";
                echo "<th>Certificate_RangeDetail_ID</th>";
                echo "<th>BacXII_ID</th>";
                echo "<th>CertificateRange_ID</th>";
                echo "<th>Certificate_Number</th>";
                echo "<th>Full Name Khmer</th>";
                echo "<th>Full Name English</th>";
                echo "<th>Sex_ID</th>";
                echo "<th>Date of Birth</th>";
                echo "<th>Campus_ID</th>";
                echo "<th>Photo</th>";
                echo "<th>CBeltei BacXII_URL</th>";
                echo "<th>BacXII_URL</th>";
                echo "</tr>";
                
                while($data = mysqli_fetch_array($query))
                    { 
                    echo "<tr>";
                    echo "<td>".$data['CertificateRangeDetailID']."</td>";
                    echo "<td>".$data['BTBacXIIid']."</td>";
                    echo "<td>".$data['CertificateRangeID']."</td>";
                    echo "<td>".$data['CertificateNumber']."</td>";
                    echo "<td>".$data['FullNameKH']."</td>";
                    echo "<td>".$data['FullNameEN']."</td>";
                    echo "<td>".$data['SexID']."</td>"; 
                    echo "<td>".$data['DOB']."</td>"; 
                    echo "<td>".$data['CampusID']."</td>";  
                    echo "<td>".$data['Photo']."</td>";  
                    echo "<td>".$data['BTBacXIIURL']."</td>";  
                    echo "<td>".$data['BacXIIURL']."</td>";
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

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>