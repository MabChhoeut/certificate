<!DOCTYPE html>
<html lang="en">

<body>
 
    <div class="row ">
        
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

                            </select>
                            <pre> </pre>
                            <button class="btn btn-outline-primary" name="Search" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div><br>
            <div class="row">
                <div>
                    <?php
                    include_once 'db.php';
                    $sql = "SELECT CertificateNumber,FullNameKH,FullNameEN,SexEN,DOB,CampusEN,Photo,BTBacXIIURL,BacXIIURL
                FROM tblcertificaterangdetail 
                INNER JOIN tblsex ON tblcertificaterangdetail.SexID=tblsex.SexID
                INNER JOIN tblcampus ON tblcertificaterangdetail.CampusID=tblcampus.CampusID";
                    echo '
                    <table class="table-bordered w-100 h-100 text-center  table-hover">
                    <thead style="background-color: #1596e0;color:whitesmoke; height:80px;">
                        <tr > 
                            <th style="vertical-align:middle;">No.Certi</th>
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
                        
                        <td style="vertical-align:middle;" >' . $row['CertificateNumber'] . '<td/>                        
                        <td style="vertical-align:middle;" >' . $row['FullNameKH'] . '<td/>                         
                        <td style="vertical-align:middle;" >' . $row['FullNameEN'] . '<td/>
                        <td style="vertical-align:middle;" >' . $row['SexEN'] . '<td/>
                        <td style="vertical-align:middle;" >' . $row['DOB'] . '<td/>
                        <td style="vertical-align:middle;" >' . $row['CampusEN'] . '<td/>
                        <td style="vertical-align:middle;" ><a href="image/' . $row['Photo'] . '"<?php echo' . $row['Photo'] . ';?><img width="80px" height="100px"  src="image/' . $row['Photo'] . '"</a></td>
                        <td style="vertical-align:middle;" ><a href="image/' . $row['BTBacXIIURL'] . '"<?php echo' . $row['BTBacXIIURL'] . ';"><img width="80px" height="100px"  src="image/' . $row['BTBacXIIURL'] . '"</a></td>
                        <td style="vertical-align:middle;" ><a href="image/' . $row['BacXIIURL'] . '"<?php echo' . $row['BacXIIURL'] . ';?><img width="80px" height="100px"  src="image/' . $row['BacXIIURL'] . '"</a></td>
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