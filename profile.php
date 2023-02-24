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
<head>
    <title>User Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		body {
			background-color: #fbfbfb;
		}
		.logo-container {
			display: flex;
			align-items: center;
			justify-content: center;
			margin-top: 100px;
			margin-bottom: 50px;
		}
		.logo {
			height: 100px;
			width: 100px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<div class="logo-container">
					<img src="images/logo1.png" alt="Logo" class="logo">
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
