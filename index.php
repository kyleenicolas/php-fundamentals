<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Session Example</title>
</head>
<body>
	<?php 
		// Start the session
		session_start(); 
	?>

	<h1>Fill in the input fields below</h1>
	
	<h2>
		<!-- Display the user's first name if they are logged in -->
		User logged in:
		<?php
		if (isset($_SESSION['firstName'])) {
			// Use htmlspecialchars to prevent XSS
			echo htmlspecialchars($_SESSION['firstName']);
		}
		?>		
	</h2>

	<h2>
		<!-- Display the user's password if available (consider hashing it) -->
		User password:
		<?php
		if (isset($_SESSION['password'])) {
			// Again, use htmlspecialchars for security
			echo htmlspecialchars($_SESSION['password']);
		}
		?>		
	</h2>

	<!-- Logout link -->
	<a href="unset.php">Logout</a>

	<!-- Show form if the user is not logged in -->
	<?php if (!isset($_SESSION['firstName'])): ?>
		<form action="handleForm.php" method="POST">
			<p><input type="text" placeholder="First name here" name="firstName" required></p>
			<p><input type="password" placeholder="Password here" name="password" required></p>
			<p><input type="submit" value="Submit" name="submitBtn"></p>
		</form>
	<?php else: ?>
		<!-- Inform the user they are logged in -->
		<p>User is already logged in. Please log out to log in as a different user.</p>
	<?php endif; ?>
</body>
</html>
