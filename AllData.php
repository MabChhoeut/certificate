
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="row flexbox">
        
        <div class="col-lg-12 right-panel">
            <header>
                <!-- banner -->
               
            </header>
            <div class="row pt-5 ">
               
                
                <div class="col-lg-6">
                    <form action="Search.php" method="GET">
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
            </div><br>
            <div class="row">
                <div>
                    <?php
                    // Display table
                    include_once 'db.php';
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
                    on d.BTBacXIIID = b.BTBacXIIID";
                    echo '
                    <table class="table-bordered w-100 h-100 text-center  table-hover">
                    <thead style="background-color: #1596e0;color:whitesmoke; height:80px;">
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

                    ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>