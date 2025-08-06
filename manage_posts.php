<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.html');
    exit();
}

require_once ("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = intval($_POST["post_id"]);
    $action = $_POST["action"];

    if ($action === 'approve') {
        $query = "UPDATE foodie_posts SET approved = 1 WHERE id = ?";
    } elseif ($action === 'deny') {
        $query = "DELETE FROM foodie_posts WHERE id = ?";
    }

    if ($query) {
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $post_id);
        mysqli_stmt_execute($stmt);
    }
}

header("Location: admin_posts.php");
exit();
?>