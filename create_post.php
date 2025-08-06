<?php
require_once ("config.php");
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $content = htmlspecialchars($_POST["content"]);
    $rating = intval($_POST["rating"]);
    $approved = 0; // New posts are not approved by default

    $image_path = "";
    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "uploads/";
        $image_path = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image_path);
    }

    $query = "INSERT INTO foodie_posts (user_id, content, rating, image_path, approved) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "isisi", $user_id, $content, $rating, $image_path, $approved);
    mysqli_stmt_execute($stmt);

    header("Location: post.php");
    exit();
}
?>