<!DOCTYPE html>

<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>BELTEI International School</title>
<link rel='stylesheet' type='text/css' media='screen' href='Script/bootstrap.min.css'>
<script src='Script/jquery-3.2.1.slim.min.js'></script>
<script src='Script/popper.min.js'></script>
<script src='Script//bootstrap.min.js'></script>
<link rel="stylesheet" href="Styel.css">
<script src="Script/script.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="image/Logo.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="slick/slick.css">

<body>

  <header>
    <!-- banner -->
    <nav style="background-color: #1596e0; width:100%;">
      <div class="row">
        <div class="col-lg-3">
          <a class="navbar-brand mx-auto">
            <img src="image/banner.png" alt="" class="w-100" height="55" ></a>
        </div>
        <div class="col-lg-6" >
          <ul class="menu">
            <li><a href="" style="text-decoration:none;">Home</a></li>
            <li class="dropdown">
              <a href="aboutus.php"style="text-decoration:none;">About US</a>
            </li>
            <li><a href="contactus.php"style="text-decoration:none;">Contact</a></li>
            <li><a href="login.php"style="text-decoration:none;">Login</a></li>
            <li><a href="setup.php"style="text-decoration:none;">Register</a></li>
            <br>
          </ul>
        </div>
        <div class="col-lg-3 mt-3 mb-3 ">
        <form action="searchUser.php" method="GET">
            <div class="input-group d-flex">
                <input type="text" class="form-control" placeholder="Search" name="search">
                    <pre> </pre>
                        <select name="column" class="form-control">
                            <option>Choose</option>
                            <option value="FullNameKH">Khmer FullName</option>
                            <option value="FullNameEN">Latin FullName</option>
                            <option value="CertificateNumber">Certificate Number</option>
                            <option value="CampusEN">Campus</option>
                            <option value="CertificateRangEN">Certificate Range</option>

                        </select>
                    <pre> </pre>
                <button class="btn btn-outline-primary  " name="Search" type="submit">Display</button>
            </div>
        </form>
        </div>
      </div>

    </nav>
    <style>
      .menu {
        list-style: none;
        margin: 0;
        padding: 0;

      }

      .menu li {
        display: inline-block;
        position: relative;
      }

      .menu a {
        display: block;
        text-decoration: none;
        padding: 20px;
        color: white;
        font-size: 20px;

      }

      @media (max-width: 768px) {
        .menu li {
          display: block;
        }

      }

      form {
        float: right
      }

      form input {
        width: 250px;
      }

      input[type="text"] {
        padding: 8px;
        border-radius: 4px 0 0 4px;
        border: 1px solid #ccc;
        width: 60%;
        border-radius: 10px;
      }

      button[type="submit"] {
        padding: 8px;
        background-color: #4CAF50;
        color: white;
        border-radius: 0 4px 4px 0;
        border: none;
        cursor: pointer;
        width: 30%;
        border-radius: 10px;
      }

      button[type="submit"]:hover,
      button[type="submit"]:focus {
        background-color: #3e8e41;
      }

      #for_in {}
    </style>
  </header>
<body>
   <main id="main" class="main">
    <div class="row flexbox">
        <div class="col-lg-12 right-panel">
           
            <div class="row pt-5 ">
                <div class="col-lg-12">
                    <!-- didn't work
                    </form>

                    <script>
                    // Get references to the search input field and datalist
                    const searchInput = document.querySelector('#search');
                    const dataList = document.querySelector('#search-list');

                    // Listen for changes in the search input field
                    searchInput.addEventListener('input', function() {
                    // Get the current value of the search input field
                    const searchTerm = searchInput.value;

                    // Get the selected column from the dropdown
                    const column = document.querySelector('#search-column').value;

                    // Use AJAX to fetch suggestions from your server based on the searchTerm and column
                    fetch(`suggestions.php?term=${searchTerm}&column=${column}`)
                        .then(response => response.json())
                        .then(data => {
                        // Clear any existing options from the datalist
                        dataList.innerHTML = '';

                        // Add new options to the datalist for each suggestion returned by your server
                        data.forEach(suggestion => {
                            const option = document.createElement('option');
                            option.value = suggestion;
                            dataList.appendChild(option);
                        });
                        });
                    });

                    </script> -->
                        <!-- table show -->
                        <?php
                        include_once 'db.php';
                        if (isset($_GET['Search'])) {
                            $search = $_GET['search'];
                            $column = $_GET['column'];
                            $data;
                            $sql = "SELECT 
                            d.CertificateRangDetailID,
                            d.CertificateNumber,
                            d.FullNameKH,
                            d.FullNameEN,
                            s.SexEN,
                            d.DOB,
                            c.CampusEN,
                            d.Photo,
                            d.BTBacXIIURL,
                            d.BacXIIURL,
                            cr.CertificateRangEN,
                            d.BTBacXIIID
                            FROM tblcertificaterangdetail as d
                            left JOIN tblsex as s
                            ON s.SexID=d.SexID
                            left JOIN tblcampus as c
                            ON c.CampusID=d.CampusID
                            left join tblcertificaterang as cr
                            on cr.CertificateRangID = d.CertificateRangID
                            left join tblbtbachxii as b
                            on d.BTBacXIIID = b.BTBacXIIID
                            where $column like '%$search%'";
                            echo '
                            <table class="table-bordered w-100 h-50 text-center  table-hover">
                            <thead style="background-color: #1596e0;color:whitesmoke; height:50px;">
                                    <tr >
                                        <th style="vertical-align:middle;">Certi_Detail_ID</th>
                                        <th></th>
                                        <th style="vertical-align:middle;">No.Certi</th>
                                        <th></th>
                                        <th style="vertical-align:middle;">Certificate Range</th>
                                        <th></th>
                                        <th style="vertical-align:middle;">BacXII ID</th>
                                        <th></th>
                                        <th style="vertical-align:middle;">Khmer Name</th>
                                        <th></th>
                                        <th style="vertical-align:middle;">Latin Name</th>
                                        <th></th>
                                        <th style="vertical-align:middle;">Sex</th>
                                        <th></th>
                                        <th style="vertical-align:middle;">DOB</th>
                                        <th></th>
                                        <th style="vertical-align:middle;">Campus</th>
                                        <th></th>
                                        <th style="vertical-align:middle;">Photo</th>
                                        <th style="vertical-align:middle;">BELTEI Certi</th>
                                        <th style="vertical-align:middle;">Ministry Certi</th>
                                    </tr>
                    </thead>
                    <tbody>
               ';
                            $query = mysqli_query($conn, $sql);
                            if ($query->num_rows > 0) {
                                while ($row = mysqli_fetch_array($query)) {

                                    echo '
                                    <tr>
                                    <td style="vertical-align:middle;" >' . $row['CertificateRangDetailID'] . '<td/>  
                                    <td style="vertical-align:middle;" >' . $row['CertificateNumber'] . '<td/>  
                                    <td style="vertical-align:middle;" >' . $row['CertificateRangEN'] . '<td/>                         
                                    <td style="vertical-align:middle;" >' . $row['BTBacXIIID'] . '<td/>                      
                                    <td style="vertical-align:middle;" >' . $row['FullNameKH'] . '<td/>                         
                                    <td style="vertical-align:middle;" >' . $row['FullNameEN'] . '<td/>
                                    <td style="vertical-align:middle;" >' . $row['SexEN'] . '<td/>
                                    <td style="vertical-align:middle;" >' . $row['DOB'] . '<td/>
                                    <td style="vertical-align:middle;" >' . $row['CampusEN'] . '<td/>
                                    <td style="vertical-align:middle;" ><a href="image/' . $row['Photo'] . '"<?php echo' . $row['Photo'] . ';?><img width="80px" height="100px"  src="image/' . $row['Photo'] . '"</a></td>
                                    <td style="vertical-align:middle;" ><a href="beleiimage/' . $row['BTBacXIIURL'] . '"<?php echo' . $row['BTBacXIIURL'] . ';"><img width="80px" height="100px"  src="beleiimage/' . $row['BTBacXIIURL'] . '"</a></td>
                                    <td style="vertical-align:middle;" ><a href="minimage/' . $row['BacXIIURL'] . '"<?php echo' . $row['BacXIIURL'] . ';?><img width="80px" height="100px"  src="minimage/' . $row['BacXIIURL'] . '"</a></td>
                                    
                                </tr>
                    ';

                                }
                            } else {
                                echo '<p style="text-align: center;">Data not found !!</p>';
                            }
                        }
                        ?>
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>