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
<body>
<?php include("headmain.php")?> 
  <?php include("menu.php")?>
  <?php include("slide.php")?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include("script.php")?>
</body>

</html>