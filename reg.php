<?php
require_once ("config.php"); // Ensure this file sets up the $conn variable correctly

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = mysqli_real_escape_string($conn, $_POST["fullname"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]); // Correctly retrieve username
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["pw"];
    $confirm_password = $_POST["cpw"];

    // Validate that passwords match
    if ($password !== $confirm_password) {
        echo "Error: Passwords do not match.";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statement to prevent SQL injection
    $query = "INSERT INTO foodie_users (fullname, username, pw, email) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $fullname, $username, $hashed_password, $email);

        if (mysqli_stmt_execute($stmt)) {
            // Registration successful
            header("Location: index.html"); // Redirect to login page
            exit();
        } else {
            // Registration failed
            echo "Error: Registration failed.";
            error_log("Error: " . mysqli_stmt_error($stmt)); // Log detailed error
        }

        mysqli_stmt_close($stmt);
    } else {
        // Registration failed
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>