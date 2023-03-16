<?php 
    include_once 'db.php';
    $query ="SELECT CertificateRangID,
    CertificateRangEN FROM tblcertificaterang";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>
