<!DOCTYPE html>
<html lang="en">
<?php include("head.php") ?>

<head>

    <title>BELTEI International School</title>

</head>

<body>
<main id="main" class="main">
  <br><br>

  <section class="diploma_info" id="diploma_info">
    <div class="container">
      <h1 class="heading text-center">
        <span style="color: #1596e0 ">BELTEI high school Diploma
      </h1>
      </form><br>
      <div>
          <?php
          include_once 'db.php';
          $sql = "SELECT y.AcademicYearEN, 
          b.StudentTotal, 
          b.StudentTotalFemale, 
          r.CertificateRangEN, 
          st.ListStudentURL
    FROM tblbtbachxii as b 
    inner JOIN tblacademicyear as y
    ON y.AcademicYearID =b.AcademicYearID 
    inner join tblcertificaterang as r
    on b.CertificateRang = r.CertificateRangID
    left JOIN tblbtliststudent as st
    ON b.BTBacXIIID=st.BTBacXIIID";

          $query = mysqli_query($conn, $sql);
          echo '
              <table class="table text-center table-responsive-md table-hover ">
              <thead style="background-color: #1596e0;color:whitesmoke;">
                  <tr>
                  <th>AcademicYear ID</th>
                  <th></th>
                  <th>Student Total</th>
                  <th></th>
                  <th>Total Female</th>
                  <th></th>
                  <th>Certificate Range</th>
                  <th >View Info</th>
                  <th >Document</th>
                  <th></th>
                  </tr>
              </thead>
              <tbody>
          ';
          if ($query->num_rows > 0) {
              while ($row = mysqli_fetch_array($query)) {
                  echo '
          <tr>
                                 
          <td style="vertical-align:middle;" >' . $row['AcademicYearEN'] . '<td/>                         
          <td style="vertical-align:middle;" >' . $row['StudentTotal'] . '<td/>
          <td style="vertical-align:middle;" >' . $row['StudentTotalFemale'] . '<td/>
          <td style="vertical-align:middle;"><a href="Data2020to2021.php">' . $row['CertificateRangEN'] . '</a></td>
          <td style="vertical-align:middle;"><a href="Data2020to2021.php">Open</a></td>
          <td>
          <a href="' . $row['ListStudentURL'] . '" target="_blank">Open</a>
        </td>
        
          
          </tr>
          ';

              }
          } else {
              echo '<p style="text-align: center;">Data not found !!</p>';
          }
          ?>
          </tbody>
          </table>
      </div>
    </div>
  </section>
</body>

</html>