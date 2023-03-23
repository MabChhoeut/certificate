<?php
session_start();
require_once('db.php');

/* old form
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['email'] = $email;
        header('Location: index.php');
        exit;
    } else {
        // If the email and password don't match, display an error message
        $error = "Invalid email or password";
    }
}*/
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database to retrieve the user data
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Compare the entered password with the stored hash
        if (password_verify($password, $user['password'])) {
            // Passwords match, log the user in
            $_SESSION['email'] = $email;
            header('Location: index.php');
            exit;
        } else {
            // Passwords don't match, display an error message
            $error = "Invalid password";
        }
    } else {
        // User not found, display an error message
        $error = "Invalid email";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!-- HTML code for the login form with Bootstrap -->
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
				<form method="POST" action="">
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" id="password" name="password" required>
					</div>
					<button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
					<p class="mt-3 text-center">Forgot your password? <a href="reset-password.php">Reset it here</a></p>
					<p class="mt-3 text-center">Don't have an account? <a href="setup.php">Register</a></p>
				</form>
				<?php if(isset($error)) { ?>
					<div class="alert alert-danger"><?php echo $error; ?></div>
				<?php } ?>
			</div>
		</div>
	</div>

	
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
