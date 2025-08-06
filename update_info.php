<?php
session_start();
require 'config.php'; // Database connection file

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$username = $_POST["username"];
$fullname = $_POST["fullname"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$birthday = $_POST["birthday"];
$age = $_POST["age"];
$province = $_POST["province"];
$gender = $_POST["gender"];
$favorite_food = $_POST["favorite_food"];

// Update user information
$update_user_query = "UPDATE foodie_users SET username = ?, fullname = ?, pw = ? WHERE id = ?";
$update_user_stmt = $conn->prepare($update_user_query);
$update_user_stmt->bind_param('sssi', $username, $fullname, $password, $user_id);
$update_user_stmt->execute();

// Check if additional details exist
$check_details_query = "SELECT * FROM foodie_otherInfo WHERE user_id = ?";
$check_details_stmt = $conn->prepare($check_details_query);
$check_details_stmt->bind_param('i', $user_id);
$check_details_stmt->execute();
$details_result = $check_details_stmt->get_result();

if ($details_result->num_rows > 0) {
    // Update additional details
    $update_details_query = "UPDATE foodie_otherInfo SET birthday = ?, age = ?, province = ?, gender = ?, favorite_food = ? WHERE user_id = ?";
    $update_details_stmt = $conn->prepare($update_details_query);
    $update_details_stmt->bind_param('sisssi', $birthday, $age, $province, $gender, $favorite_food, $user_id);
    $update_details_stmt->execute();
} else {
    // Insert additional details
    $insert_details_query = "INSERT INTO foodie_otherInfo (user_id, birthday, age, province, gender, favorite_food) VALUES (?, ?, ?, ?, ?, ?)";
    $insert_details_stmt = $conn->prepare($insert_details_query);
    $insert_details_stmt->bind_param('isisss', $user_id, $birthday, $age, $province, $gender, $favorite_food);
    $insert_details_stmt->execute();
}

header("Location: edit_info.php?update=success");
exit();
?>