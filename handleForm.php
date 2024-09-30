<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Login</title>
</head>
<body>
	<?php
	// Start the session
	session_start();

	// Check if a user is already logged in
	if (isset($_SESSION['firstName'])) {
		echo "A user is already logged in as " . htmlspecialchars($_SESSION['firstName']) . ". Please log out first.";
		exit();
	}

	// Handle the form submission
	if (isset($_POST['submitBtn'])) {
		// Get the form input values
		$firstName = trim($_POST['firstName']);
		$password = $_POST['password'];

		// Validate that fields are not empty
		if (!empty($firstName) && !empty($password)) {
			// Use a secure hashing function instead of MD5
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

			// Set the session variables
			$_SESSION['firstName'] = $firstName;
			$_SESSION['password'] = $hashedPassword;  // Store hashed password in session

			// Provide feedback to the user
			echo "Login successful! Welcome, " . htmlspecialchars($firstName);
			echo "<br><a href='index.php'>Go back to home</a>";
		} else {
			echo "Please fill in both fields.";
		}
	} else {
		echo "No form data received.";
	}
	?>
</body>
</html>
