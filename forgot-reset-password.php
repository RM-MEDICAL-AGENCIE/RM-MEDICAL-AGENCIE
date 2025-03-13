<?php
// Connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fdata";

// Establish the database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the "Forgot Password" process (generate reset token)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email_or_username']) && empty($_POST['reset_token'])) {
    $emailOrUsername = $_POST['email_or_username'];

    // Check if the email or username exists in the database
    $sql = "SELECT * FROM details WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $emailOrUsername, $emailOrUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate reset token
        $resetToken = bin2hex(random_bytes(50));

        // Store the reset token in the database for the user
        $updateSql = "UPDATE details SET reset_token = ? WHERE username = ? OR email = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("sss", $resetToken, $emailOrUsername, $emailOrUsername);
        if ($stmt->execute()) {
            // Send reset link to user's email
            $row = $result->fetch_assoc();
            $email = $row['email'];
            $resetLink = "http://yourwebsite.com/forgot_and_reset_password.php?reset_token=" . $resetToken;
            $subject = "Password Reset Request";
            $message = "Click the following link to reset your password: " . $resetLink;
            $headers = "From: no-reply@yourwebsite.com";

            if (mail($email, $subject, $message, $headers)) {
                echo "A password reset link has been sent to your email.";
            } else {
                echo "Error sending email. Please try again later.";
            }
        } else {
            echo "Error updating reset token: " . $conn->error;
        }
    } else {
        echo "No user found with that email/username.";
    }
}

// Handle the "Reset Password" process (update the password)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reset_token']) && !empty($_POST['reset_token'])) {
    $resetToken = $_POST['reset_token'];
    $newPassword = $_POST['new_password'];

    // Check if the token exists in the database
    $sql = "SELECT * FROM details WHERE reset_token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $resetToken);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update the user's password
        $updateSql = "UPDATE details SET password = ?, reset_token = NULL WHERE reset_token = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("ss", $newPassword, $resetToken);
        if ($stmt->execute()) {
            echo "Your password has been reset successfully!";
        } else {
            echo "Error resetting password: " . $conn->error;
        }
    } else {
        echo "Invalid reset token.";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot and Reset Password</title>
</head>
<body>

    <!-- Forgot Password Form -->
    <h2>Forgot Password</h2>
    <form action="forgot_and_reset_password.php" method="POST">
        <label for="email_or_username">Enter your email or username:</label>
        <input type="text" id="email_or_username" name="email_or_username" required>
        <input type="submit" value="Submit">
    </form>

    <hr>

    <!-- Reset Password Form -->
    <h2>Reset Password</h2>
    <form action="forgot_and_reset_password.php" method="POST">
        <label for="reset_token">Enter your reset token:</label>
        <input type="text" id="reset_token" name="reset_token" required>
        
        <label for="new_password">Enter your new password:</label>
        <input type="password" id="new_password" name="new_password" required>
        
        <input type="submit" value="Reset Password">
    </form>

</body>
</html>
