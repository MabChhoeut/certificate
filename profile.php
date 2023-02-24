<?php
session_start();
require_once('db.php');

// Check if user is logged in, redirect to login page if not
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

$email = $_SESSION['email'];

// Get user information from database using email
$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($conn);
?>

<!-- HTML code for the profile page with Bootstrap -->
<!DOCTYPE html>
<html>
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
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<div class="pr-container">
					<img src="images/logo1.png" alt="Logo" class="pro">
				</div>
				<h1>User Profile</h1>
				<p><strong>Name:</strong> <?php echo $user['name']; ?></p>
				<p><strong>Email:</strong> <?php echo $user['email']; ?></p>
				<p><strong>Mobile:</strong> <?php echo $user['mobile']; ?></p>
				<p><strong>Role ID:</strong> <?php echo $user['RoleID']; ?></p>
				<p><a href="logout.php">Logout</a></p>
			</div>
		</div>
	</div>
    </div>
        </div>
    </section>
  </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <?php include("script.php")?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
