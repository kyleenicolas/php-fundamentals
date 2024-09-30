<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    <?php
    // Start the session
    session_start();

    // Destroy all session data
    session_destroy();

    // Redirect the user to the homepage (index.php)
    header("Location: index.php");
    
    // Ensure the script stops after the redirect
    exit();
    ?>
</body>
</html>
