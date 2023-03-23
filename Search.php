<?php
  session_start();
  if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
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
    <div class="row flexbox">
        <div class="col-lg-12 right-panel">
           
            <div class="row pt-5 ">
                <div class="col-lg-12">
                    <div>
                        <form>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h1>Display Data</h1>
                                    <p>Please check your information here.</p>
                                </div>
                            </div>
                        </form>
                    </div>
                    <form action="Search.php" method="GET">
                        <div class="row">
                            <div class="col-lg-3">
                            </div>
                            <div class="col-lg-3">
                            </div>
                            <div class="col-lg-6 text-center">
                                <div class="input-group d-flex">
                                    <input type="text" class="form-control" placeholder="Search" name="search" id="search-input">
                                    <select name="column" class="form-control" id="search-column">
                                        <option value="FullNameKH">Khmer FullName</option>
                                        <option value="FullNameEN">Latin FullName</option>
                                        <option value="CertificateNumber">Certificate Number</option>
                                        <option value="CampusEN">Campus</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" name="Search" type="submit">Display</button>
                                    </div>
                                </div>
                                <div id="search-dropdown" class="dropdown-menu"></div>

                            </div>
                        </div>
                    </form><br>
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