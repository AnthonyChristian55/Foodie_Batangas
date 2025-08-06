<?php
require_once ("config.php");  // Ensure this file sets up the $conn variable correctly

// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the username is for admin
    $adminQuery = "SELECT id, password FROM foodie_admin WHERE username=?";
    $adminStmt = mysqli_prepare($conn, $adminQuery);
    mysqli_stmt_bind_param($adminStmt, "s", $username);
    mysqli_stmt_execute($adminStmt);
    $adminResult = mysqli_stmt_get_result($adminStmt);

    if ($adminResult && mysqli_num_rows($adminResult) == 1) {
        $adminRow = mysqli_fetch_assoc($adminResult);
        if (password_verify($password, $adminRow["password"])) {
            // Successful admin login
            $_SESSION["admin_logged_in"] = true;
            echo json_encode(["success" => true, "redirect" => "adminhome.php"]);
            exit();
        } else {
            // Incorrect admin password
            echo json_encode(["success" => false, "message" => "Incorrect password"]);
            exit();
        }
    }

    // If not admin, check normal user credentials
    $userQuery = "SELECT id, fullname, pw, profile_pic FROM foodie_users WHERE username=?";
    $userStmt = mysqli_prepare($conn, $userQuery);
    mysqli_stmt_bind_param($userStmt, "s", $username);
    mysqli_stmt_execute($userStmt);
    $userResult = mysqli_stmt_get_result($userStmt);

    if ($userResult && mysqli_num_rows($userResult) == 1) {
        $userRow = mysqli_fetch_assoc($userResult);
        if (password_verify($password, $userRow["pw"])) {
            // Successful user login
            $_SESSION["user_id"] = $userRow["id"];
            $_SESSION["user_name"] = $userRow["fullname"];
            $_SESSION["profile_pic"] = $userRow["profile_pic"]; // Save profile pic path in session
            echo json_encode(["success" => true, "redirect" => "index2.php"]);
            exit();
        } else {
            // Incorrect user password
            echo json_encode(["success" => false, "message" => "Incorrect password"]);
            exit();
        }
    } else {
        // User not found
        echo json_encode(["success" => false, "message" => "User not found"]);
        exit();
    }
}

// Handle query error
echo json_encode(["success" => false, "message" => "Query error: " . mysqli_error($conn)]);
mysqli_close($conn);
?>