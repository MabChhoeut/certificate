<?php
session_start();
require_once('db.php');
// Check if the reset form has been submitted
if (isset($_POST['reset'])) {

    // Retrieve the email address entered by the user
    $email = $_POST['email'];

    // Check if the email address exists in the database
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Generate a new password for the user
        $new_password = bin2hex(random_bytes(8));

        // Hash the new password
        $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the user's password in the database
        $query = "UPDATE users SET password='$new_password_hash' WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Send the new password to the user's email address using PHPMailer
            require_once "PHPMailer/src/PHPMailer.php";
            require_once "PHPMailer/src/SMTP.php";
            require_once "PHPMailer/src/Exception.php";
            

            // Create a new PHPMailer instance
            $mail = new PHPMailer\PHPMailer\PHPMailer();

            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your_gmail_username@gmail.com';
            $mail->Password = 'your_gmail_password';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Set the sender and recipient email addresses
            $mail->setFrom('noreply@yourwebsite.com', 'Your Website');
            $mail->addAddress($email);

            // Set the email subject and message
            $mail->Subject = 'Password Reset';
            $mail->Body = "Your new password is: $new_password";

            // Send the email
            if ($mail->send()) {
                $success = "Your new password has been sent to your email address";
            } else {
                $error = "Failed to send email: " . $mail->ErrorInfo;
            }
        } else {
            $error = "Failed to reset password";
        }
    } else {
        $error = "Email address not found";
    }

    // Close the database connection
    mysqli_close($conn);
}

?>

<!-- Add the HTML form for password reset here -->
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
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
				<form method="POST" action="reset-password.php">
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>
					<button type="submit" name="reset" class="btn btn-primary btn-block">Reset Password</button>
					<p class="mt-3 text-center">Remembered your password? <a href="login.php">Login</a></p>
				</form>
				<?php if(isset($success)) { ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                <?php } ?>
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