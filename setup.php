
<?php
session_start(); // Start session for user authentication
require_once "db.php";

// Check if the user has submitted the registration form
/* old form
if (isset($_POST['register'])) {

    if(isset($POST['RoleID'])){
        $RoleID = $_POST['RoleID'];
       }
    // Validate the user input
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $RoleID = $_POST['RoleID'];
    $confirm_password = $_POST['confirm_password'];


    // Query the database to check if the email already exists
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    // If the email doesn't exist, insert the new user data into the database
    if (mysqli_num_rows($result) == 0) {
        $insert = "INSERT INTO users (RoleID,name, email, mobile ,password,confirm_password) VALUES ('$RoleID','$name', '$email', '$mobile', '$password', '$confirm_password')";
        mysqli_query($conn, $insert);

        // Log the user in and redirect to their account page
        $_SESSION['email'] = $email;
        header('Location: login.php');
        exit;
    } else {
        // If the email already exists, display an error message
        $error = "Email already exists";
    }

    // Close the database connection
    mysqli_close($conn);
}*/
/*new form*/
if (isset($_POST['register'])) {
    // Validate the user input
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $RoleID = $_POST['RoleID'];
    $password = $_POST['password'];

    // Check if all required fields are filled
    if (empty($name) || empty($email) || empty($mobile) || empty($RoleID) || empty($password)) {
        $error = "Please fill in all required fields";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Query the database to check if the email already exists
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        // If the email doesn't exist, insert the new user data into the database
        if (mysqli_num_rows($result) == 0) {
            // Insert the new user data into the database
            $insert = "INSERT INTO users (RoleID,name, email, mobile ,password) VALUES ('$RoleID','$name', '$email', '$mobile', '$hashed_password')";
            mysqli_query($conn, $insert);

            // Log the user in and redirect to their account page
            $_SESSION['email'] = $email;
            header('Location: login.php');
            exit;
        } else {
            // If the email already exists, display an error message
            $error = "Email already exists";
        }
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!-- HTML code for the registration form with Bootstrap -->
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
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
                
                    <div class="card-body">
                        <?php if (isset($error)) { echo "<p class='text-danger'>$error</p>"; } ?>
                        <form method="post" action="">
                        <p><strong>Please fill all fields below:</strong></p>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Role:</label>
                                <select name="RoleID" class="form-select" aria-label="Default select example">
                                <option><?php if(!empty($_GET)) echo $_GET['RoleID'] ?><?php if(empty($_GET)) echo "<strong>Choose your Role</strong>" ?></option>
                                <?php 
                                include_once 'connectToRole.php';
                                foreach ($options as $option) {
                                ?>
                                <option value="<?php echo $option['RoleID']; ?>">
                                <?php echo $option['Role']; ?></option>
                                <?php 
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile:</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" required>
                            </div>
                            <div class="form-group">
                            <label for="password">Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" minlength="8" maxlength="20" required>
                                <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" id="generate-password">Generate</button>
                                </div>
                            </div>
                            <small id="passwordHelp" class="form-text text-muted">Password must be 8-20 characters long and contain at least one number, one uppercase letter, one lowercase letter, and one special character.</small>
                            <div class="mt-2" id="generated-password-container"></div>
                            </div>

						    <div class="form-group">
							    <label for="confirm_password">Confirm Password:</label>
							    <input type="password" class="form-control" id="confirm_password" placeholder="Enter confirm password" name="confirm_password" required>
						    </div>
                            <button type="submit" name="register" class="btn btn-primary">Register</button>
                            <p class="mt-3">Already have an account? <a href="login.php">Login</a></p>
                        </form>
                        <script>
                        // Select the relevant elements
                        const passwordField = document.getElementById('password');
                        const generateButton = document.getElementById('generate-password');
                        const generatedPasswordContainer = document.getElementById('generated-password-container');

                        // Function to generate a random password
                        function generatePassword() {
                        const symbols = '!@#$%^&*()_-+={}[]|\\:;\'\"<>,.?/~`';
                        const lowerCaseLetters = 'abcdefghijklmnopqrstuvwxyz';
                        const upperCaseLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        const numbers = '0123456789';

                        const allChars = symbols + lowerCaseLetters + upperCaseLetters + numbers;

                        let password = '';
                        for (let i = 0; i < 8; i++) {
                            const randomIndex = Math.floor(Math.random() * allChars.length);
                            password += allChars[randomIndex];
                        }
                        return password;
                        }

                        // Event listener for the Generate button
                        generateButton.addEventListener('click', () => {
                        const generatedPassword = generatePassword();
                        generatedPasswordContainer.textContent = `Generated Password: ${generatedPassword}`;
                        });

                        // Event listener for the Password field to clear the generated password when user types in the field
                        passwordField.addEventListener('input', () => {
                        generatedPasswordContainer.textContent = '';
                        });

                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$('form').submit(function(){
				var password = $('#password').val();
				var confirm_password = $('#confirm_password').val();
				if(password !== confirm_password){
					alert("Password and confirm password do not match");
					return false;
				}
			});
		});
	</script>
</body>
</html>
       
