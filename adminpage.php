
<!DOCTYPE html>
<html lang="en">
<?php include("head.php")?>
<head>
  <?php include_once('header.php') ?>
  <?php include_once('menu.php') ?>
  <?php include("headmain.php")?>
  <?php include("script.php")?>
  <title>BELTEI International School</title>
</head>

<body >
<main id="main" class="main">
  <!-- header
  <header>
    <!-banner -->
    <!-- <nav class="navbar navbar-light" style="background-color: #1596e0; width:100%;">
      <a class="navbar-brand mx-auto" href="#">
        <img src="image/banner.png" alt="" class="w-100" height="55">

      </a>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-0" id="navbar_top"
      style=" box-shadow: 0 2px 10px -5px;">
      <a class="navbar-brand" href="adminpage.php">
        <img src="image/Logo.png" alt="" width="65" class="d-inline-block text-center ml-3">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">

        <ul class=" navbar-nav mx-auto text-center">
          <li class="nav-item active ">
            <a class="nav-link hover-2 ml-2" href="#" style="color: #181616;">Home <span
                class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link hover-2 ml-2" href="#diploma_info" style="color: #181616;">Diploma Info</a>
          </li>
          <li class="nav-item">
            <a class="nav-link hover-2 ml-2" href="#about" style="color: #181616;">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  hover-2 ml-2" href="#campus" style="color: #181616;">Campus</a>
          </li>
          <li class="nav-item">
            <a class="nav-link hover-2 ml-2" href="#teamwork" style="color: #181616;">teamwork</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link hover-2 ml-2" href="#contact" style="color: #181616;">Contact us</a>
          </li>

          <li class="nav-item ">
            <a class="nav-link hover-2 ml-2" href="admin.php" style="color: #181616;">Admin</a>
          </li>
        </ul>
        <form class="pr-1">
          <input type="text" class="form-control" placeholder="Search">
        </form>

        <a type="button" class="btn btn-primary d-flex justify-content-center align-items-center"
          href="logout.php">Logout
        </a>
      </div>
    </nav> 
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        window.addEventListener('scroll', function () {
          if (window.scrollY >= 80) {
            document.getElementById('navbar_top').classList.add('fixed-top');
            // add padding top to show content behind navbar
            navbar_height = document.querySelector('.navbar').offsetHeight;
            document.navbar_top = navbar_height;
          } else {
            document.getElementById('navbar_top').classList.remove('fixed-top');
            // remove padding top from body
            document.body.style.paddingTop;
          }
        });
      }); 
    </script>
  </header> -->

  <!-- home -->
  <!-- <section class="home" id="home">
    <div class="bg-image"></div>
    <div class="bg-text">
      <p style="font-weight: bold; font-size: 50px;">Welcome</p>
      <h5>BELTEI International School</h5>
      <p>Builds the spirit to love nation and motherland, preserve its culture and national identity,<br> obey the
        state
        laws and the BELTEI's regulations as well as possess justice, morality, and virtue like <br> a bamboo shoot
        growing
        up to bamboo for the future of the country.</p>
    </div>
  </section>
  <br>
  <br> -->

  <!-- table show -->
  <br><br>

  <section class="diploma_info" id="diploma_info">
    <div class="container">
      <h1 class="heading text-center">
        <span style="color: #1596e0 ">BELTEI high school</span> Diploma
      </h1>
      <form action="Select.php" method="GET">
        <div class="row">
          
          <div class="col-lg-6 text-center">
            <div class="input-group d-flex">
              <input type="text" class="form-control" placeholder="Search" name="search">
              <pre> </pre>
              <select name="column" class="form-control">
                <option>Choose</option>
                <option value="FullNameKH">Khmer FullName</option>
                <option value="FullNameEN">Latin FullName</option>
                <option value="CertificateNumber">Certificate Number</option>
                <option value="CampusEN">Campus</option>

              </select>
              <pre> </pre>
              <button class="btn btn-outline-primary  " name="Search" type="submit">Search</button>
            </div>
          </div>
        </div>
      </form><br>

      <div>
        <table class="table table-responsive-md table-hover text-center">
          <thead style="background-color: #1596e0;color:whitesmoke;">
            <tr>
              <th scope="col">Diploma-year</th>
              <th scope="col"></th>
              <th scope="col">Total-Stu</th>
              <th scope="col"></th>
              <th scope="col">Female</th>
              <th scope="col"></th>
              <th scope="col">No.certificate</th>
              <th scope="col"></th>
              <th scope="col">View Info</th>
              <th scope="col">Document</th>
            </tr>
          </thead>
          <tbody>
            <!-- 2020-2021 -->
            <?php
            include_once 'db.php';
            $data;

            $sql = "select tblacademicyear.AcademicYearEN ,tblbtbachxii.StudentTotal,tblbtbachxii.StudentTotalFemale,tblbtbachxii.CertificateRang,tblbtliststudent.ListStudentURL
                    FROM tblacademicyear
                    INNER JOIN tblbtbachxii ON tblacademicyear.AcademicYearID =tblbtbachxii.AcademicYearID INNER JOIN tblbtliststudent ON 
                    tblbtbachxii.BTBacXIIID=tblbtliststudent.BTBacXIIID where tblbtbachxii.BTBacXIIID='6'";
            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($query)) {
              echo "<table class = ' table table-bordered w-100 p-3 '>";
              echo '
                    <tr >
                        
                        <td style="vertical-align:middle;" >' . $row['AcademicYearEN'] . '<td/>                        
                        <td style="vertical-align:middle;" >' . $row['StudentTotal'] . '<td/>                         
                        <td style="vertical-align:middle;" >' . $row['StudentTotalFemale'] . '<td/>
                        <td style="vertical-align:middle;" ><a href="Data2020to2021.php">' . $row['CertificateRang'] . '</a><td/>
                        <td><a href="Data2020to2021.php">Open</a></td>
                        <td><a href="' . $row['ListStudentURL'] . '"<?php echo' . $row['ListStudentURL'] . ';?>Open</a></td>
                    </tr>
                    ';

            }
            ?>
            <!-- 2019-2020 -->
            <?php
            include_once 'db.php';
            $data;

            $sql = "select tblacademicyear.AcademicYearEN ,tblbtbachxii.StudentTotal,tblbtbachxii.StudentTotalFemale,tblbtbachxii.CertificateRang,tblbtliststudent.ListStudentURL
                    FROM tblacademicyear
                    INNER JOIN tblbtbachxii ON tblacademicyear.AcademicYearID =tblbtbachxii.AcademicYearID INNER JOIN tblbtliststudent ON  tblbtbachxii.BTBacXIIID=tblbtliststudent.BTBacXIIID where tblbtbachxii.BTBacXIIID='5'";
            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($query)) {
                    
                    
              echo '
                    <tr>
                        
                        <td style="vertical-align:middle;" >' . $row['AcademicYearEN'] . '<td/>                        
                        <td style="vertical-align:middle;" >' . $row['StudentTotal'] . '<td/>                         
                        <td style="vertical-align:middle;" >' . $row['StudentTotalFemale'] . '<td/>
                        <td style="vertical-align:middle;" ><a href="Data2019to2020.php">' . $row['CertificateRang'] . '</a><td/>
                        <td><a href="Data2019to2020.php">Open</a></td>
                        <td><a href="' . $row['ListStudentURL'] . '"<?php echo' . $row['ListStudentURL'] . ';?>Open</a></td>
                    </tr>
                    ';

            }
            ?>
            <!-- 2018-2019 -->
            <?php
            include_once 'db.php';
            $data;

            $sql = "select tblacademicyear.AcademicYearEN ,tblbtbachxii.StudentTotal,tblbtbachxii.StudentTotalFemale,tblbtbachxii.CertificateRang,tblbtliststudent.ListStudentURL
                    FROM tblacademicyear
                    INNER JOIN tblbtbachxii ON tblacademicyear.AcademicYearID =tblbtbachxii.AcademicYearID INNER JOIN tblbtliststudent ON  tblbtbachxii.BTBacXIIID=tblbtliststudent.BTBacXIIID where tblbtbachxii.BTBacXIIID='4'";
            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($query)) {

              echo '
                    <tr>
                        
                        <td style="vertical-align:middle;" >' . $row['AcademicYearEN'] . '<td/>                        
                        <td style="vertical-align:middle;" >' . $row['StudentTotal'] . '<td/>                         
                        <td style="vertical-align:middle;" >' . $row['StudentTotalFemale'] . '<td/>
                        <td style="vertical-align:middle;" ><a href="Data2018to2019.php">' . $row['CertificateRang'] . '</a><td/>
                        <td><a href="Data2018to2019.php">Open</a></td>
                        <td><a href="' . $row['ListStudentURL'] . '"<?php echo' . $row['ListStudentURL'] . ';?>Open</a></td>
                    </tr>
                    ';

            }
            ?>

            <!-- 2017-2018 -->
            <?php
            include_once 'db.php';
            $data;

            $sql = "select tblacademicyear.AcademicYearEN ,tblbtbachxii.StudentTotal,tblbtbachxii.StudentTotalFemale,tblbtbachxii.CertificateRang,tblbtliststudent.ListStudentURL
                    FROM tblacademicyear
                    INNER JOIN tblbtbachxii ON tblacademicyear.AcademicYearID =tblbtbachxii.AcademicYearID INNER JOIN tblbtliststudent ON  tblbtbachxii.BTBacXIIID=tblbtliststudent.BTBacXIIID where tblbtbachxii.BTBacXIIID='3'";
            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($query)) {

              echo '
                    <tr>
                        
                        <td style="vertical-align:middle;" >' . $row['AcademicYearEN'] . '<td/>                        
                        <td style="vertical-align:middle;" >' . $row['StudentTotal'] . '<td/>                         
                        <td style="vertical-align:middle;" >' . $row['StudentTotalFemale'] . '<td/>
                        <td style="vertical-align:middle;" ><a href="Data2017to2018.php">' . $row['CertificateRang'] . '</a><td/>
                        <td><a href="Data2017to2018.php">Open</a></td>
                        <td><a href="' . $row['ListStudentURL'] . '"<?php echo' . $row['ListStudentURL'] . ';?>Open</a></td>
                    </tr>
                    ';

            }
            ?>
            <!-- 2016-2017 -->
            <?php
            include_once 'db.php';
            $data;

            $sql = "select tblacademicyear.AcademicYearEN ,tblbtbachxii.StudentTotal,tblbtbachxii.StudentTotalFemale,tblbtbachxii.CertificateRang,tblbtliststudent.ListStudentURL
                    FROM tblacademicyear
                    INNER JOIN tblbtbachxii ON tblacademicyear.AcademicYearID =tblbtbachxii.AcademicYearID INNER JOIN tblbtliststudent ON  tblbtbachxii.BTBacXIIID=tblbtliststudent.BTBacXIIID where tblbtbachxii.BTBacXIIID='2'";
            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($query)) {

              echo '
                    <tr>
                        
                        <td style="vertical-align:middle;" >' . $row['AcademicYearEN'] . '<td/>                        
                        <td style="vertical-align:middle;" >' . $row['StudentTotal'] . '<td/>                         
                        <td style="vertical-align:middle;" >' . $row['StudentTotalFemale'] . '<td/>
                        <td style="vertical-align:middle;" ><a href="Data2016to2017.php">' . $row['CertificateRang'] . '</a><td/>
                        <td><a href="Data2016to2017.php">Open</a></td>
                        <td><a href="' . $row['ListStudentURL'] . '"<?php echo' . $row['ListStudentURL'] . ';?>Open</a></td>
                    </tr>
                    ';

            }
            ?>

            <!-- 2015-2016 -->
            <?php
            include_once 'db.php';
            $data;

            $sql = "select tblacademicyear.AcademicYearEN ,tblbtbachxii.StudentTotal,tblbtbachxii.StudentTotalFemale,tblbtbachxii.CertificateRang,tblbtliststudent.ListStudentURL
                    FROM tblacademicyear
                    INNER JOIN tblbtbachxii ON tblacademicyear.AcademicYearID =tblbtbachxii.AcademicYearID INNER JOIN tblbtliststudent ON  tblbtbachxii.BTBacXIIID=tblbtliststudent.BTBacXIIID where tblbtbachxii.BTBacXIIID='1'";
            $query = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($query)) {

              echo '
                    <tr>
                        
                        <td style="vertical-align:middle;" >' . $row['AcademicYearEN'] . '<td/>                        
                        <td style="vertical-align:middle;" >' . $row['StudentTotal'] . '<td/>                         
                        <td style="vertical-align:middle;" >' . $row['StudentTotalFemale'] . '<td/>
                        <td style="vertical-align:middle;" ><a href="Data2015to2016.php">' . $row['CertificateRang'] . '</a><td/>
                        <td><a href="Data2015to2016.php">Open</a></td>
                        <td><a href="' . $row['ListStudentURL'] . '"<?php echo' . $row['ListStudentURL'] . ';?>Open</a></td>
                    </tr>
                    ';

            }
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </section>
  
</body>

</html>