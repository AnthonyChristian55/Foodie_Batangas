<?php
require_once ("config.php");
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect to the login page
    header("Location: index.html");
    exit();
}

$user_id = $_SESSION["user_id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css./post.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+DK+Uloopet:wght@100..400&display=swap"
        rel="stylesheet">
    <script src="./javascript/script.js" defer></script>
    <script src="./javascript/journal.js" defer></script>
    <link rel="icon" href="./images/ADlogo.png" type="image/png">
    <title>Journal</title>
    <style>
        .star-rating {
            direction: rtl;
            font-size: 24px;
            display: inline-flex;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            color: #ddd;
            cursor: pointer;
        }

        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input[type="radio"]:checked~label {
            color: #ffca08;
        }
    </style>
</head>

<body>
    <!-- Profile -->
    <div class="header">
        <div class="logo">
            <center><img src="./images/fblogo.png" alt="foodie batangas"></center>
        </div>

        <!-- Sidebar -->
        <div id="toggle-btn">&#9776;</div>
        <div id="sidebar">
            <div class="profile-pic-div">
                <?php
                // Display the profile picture
                if (isset($_SESSION['profile_pic']) && !empty($_SESSION['profile_pic'])) {
                    echo '<img src="' . htmlspecialchars($_SESSION['profile_pic']) . '" alt="Profile Picture">';
                } else {
                    echo '<img src="uploads/Profile.jpg" alt="Default Profile Picture">';
                }
                ?>
                <input type="file" id="file">
                <label for="file" id="uploadBtn">Profile Picture</label>
            </div><br><br><br><br><br><br><br><br><br>
            <form action="change_profile_pic.php" method="post" enctype="multipart/form-data">
                <br><br>
                <label for="profile_pic" class="profile_pic">Select Image</label><br>
                <input type="file" class="form-control" id="profile_pic" name="profile_pic" style="display:none;" />
                <button type="submit" class="btn ">Upload</button>
            </form>
            <br>
            <?php
            echo '<center><ul><span class="welcome-message">' . htmlspecialchars($_SESSION["user_name"]) . '</span></ul></center>';
            ?>
            <br>
            <span id="close-btn" onclick="closeSidebar()">&#10006; Close</span>
        </div>
        <!-- Navbar -->
        <center>
            <div class="navbar">
                <span class="menu-btn material-symbols-outlined">menu</span>
                <nav>
                    <ul class="links">
                        <span class="close-btn material-symbols-outlined">close</span>
                        <li><a href="index2.php">Home</a></li>
                        <li><a href="delicacies_1.php">Delicacies</a></li>
                        <li><a href="post.php">Journal</a></li>
                        <li><a href="about.php">About</a></li>
                        <?php
                        echo '<li><a href="logout.php"><ion-icon name="log-out-outline"></ion-icon></a></li>';
                        ?>
                    </ul>
                </nav>
            </div>
        </center>
    </div>
    <!-- FYP -->
    <div class="row">
        <div class="leftcolumn">
            <div class="card">
                <!-- Comment box starts here -->
                <div class="comment-box">
                    <form id="create-post-form" method="POST" action="create_post.php" enctype="multipart/form-data">
                        <textarea id="comment" name="content" placeholder="What's on your mind?"
                            required></textarea><br><br>
                        <input type="file" id="uploadImg" name="image" class="hide">
                        <center> <label for="uploadImg"><ion-icon name="image-outline" class="icons"></ion-icon>
                                <ion-icon name="camera-outline" class="icons"></ion-icon></label>
                            <ion-icon name="location-outline" class="icons"></ion-icon>
                        </center>

                        <center>
                            <label for="rating" style="display:none;">Rating:</label>
                            <div class="star-rating">
                                <input type="radio" id="star5" name="rating" value="5"><label for="star5"
                                    title="5 Stars">★</label>
                                <input type="radio" id="star4" name="rating" value="4"><label for="star4"
                                    title="4 Stars">★</label>
                                <input type="radio" id="star3" name="rating" value="3"><label for="star3"
                                    title="3 Stars">★</label>
                                <input type="radio" id="star2" name="rating" value="2"><label for="star2"
                                    title="2 Stars">★</label>
                                <input type="radio" id="star1" name="rating" value="1"><label for="star1"
                                    title="1 Star">★</label>
                            </div>
                        </center>
                        <center> <button type="submit" class="upload-btn">POST</button></center>
                    </form>
                </div>
            </div>

            <!-- Sorting options -->
            <div class="card1">
                <div class="chead">
                    <h1>★ Find your Best Experience ★</h1>
                </div>
                <center>
                    <form method="GET" action="post.php">
                        <select id="sort" name="sort">
                            <option value="latest">Latest</option>
                            <option value="oldest">Oldest</option>
                            <option value="rating_desc">Wonderful</option>
                            <option value="rating_asc">Worse</option>
                        </select>
                        <button id="sort" type="submit">SORT</button>
                    </form>
                </center>
            </div>

            <script>
                // Function to set the selected option after form submission
                document.addEventListener('DOMContentLoaded', function () {
                    var sortSelect = document.getElementById('sort');
                    var currentSortOption = '<?php echo $_GET["sort"] ?? "latest"; ?>'; // PHP code to get current sort option if any

                    if (currentSortOption) {
                        sortSelect.value = currentSortOption;
                    }
                });
            </script>

            <div class="postCreated">
                <?php

                // Fetch and display posts from the database with sorting
                $sort_option = isset($_GET['sort']) ? $_GET['sort'] : 'latest';
                $sort_query = "";

                switch ($sort_option) {
                    case 'latest':
                        $sort_query = "ORDER BY created_at DESC";
                        break;
                    case 'oldest':
                        $sort_query = "ORDER BY created_at ASC";
                        break;
                    case 'rating_asc':
                        $sort_query = "ORDER BY rating ASC";
                        break;
                    case 'rating_desc':
                        $sort_query = "ORDER BY rating DESC";
                        break;
                    default:
                        $sort_query = "ORDER BY created_at DESC";
                        break;
                }

                $query = "SELECT * FROM foodie_posts WHERE user_id = ? $sort_query";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "i", $user_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card">';
                    // Display approval message if post is not approved
                    if ($row['approved'] == 0) {
                        echo '<p style="color:red; font-style: italic;">Your post is under approval.</p>';
                    } else {
                        // Display post content if approved
                        echo '<p class="postCreated1">' . htmlspecialchars($row['content']) . '</p>';
                        echo '<p class="starCreated"> ' . str_repeat('★', htmlspecialchars($row['rating'])) . str_repeat('☆', 5 - htmlspecialchars($row['rating'])) . '</p>';

                        // Check if the post has an image and display it
                        if (!empty($row['image_path'])) {
                            echo '<img src="' . htmlspecialchars($row['image_path']) . '" alt="Post Image" style="max-width:100%;">';
                        }

                        echo '<p>' . htmlspecialchars($row['created_at']) . '</p>';
                    }

                    // Edit button
                    echo '<form method="GET" action="edit_post.php" style="display:inline;">
                        <input type="hidden" name="post_id" value="' . $row['id'] . '">
                        <button type="submit" class="btnPost"><h1><ion-icon name="create-outline" class="icons"></ion-icon></h1></button>
                      </form>';

                    // Delete button
                    echo '<form method="POST" action="delete_post.php" style="display:inline;">
                        <input type="hidden" name="post_id" value="' . $row['id'] . '">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit" class="btnPost"><h1><ion-icon name="trash-outline" class="icons"></ion-icon></h1></button>
                      </form>';

                    echo '</div>';
                }
                ?>

            </div>

            <!-- Existing cards -->
        </div>

        <div class="rightcolumn">
            <div class="card">
                <center>
                    <p style="font-size:20px; font-weight:bold;">Edit Personal Information</p>
                    <a href="edit_info.php" style="text-decoration: none; color: black;font-size: 40px;">&rarr;</a>
                </center>
            </div>

            <div class="card">
                <h3>Popular Foods</h3><br>
                <h5>Lomi</h5>
                <a href="delicacies_1.php"><img src="./images/lomi.jpg" alt="lomi"></a><br>
                <h5>Goto</h5>
                <a href="delicacies_1.php"><img src="./images/goto1.png" alt="goto"> </a><br>
                <h5>Tapang Taal</h5>
                <a href="delicacies_2.php"><img src="./images/tapang-taal.jpg" alt="tapang taal"></a>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- <script>
        document.getElementById('sort').addEventListener('change', function() {
            if (this.value) {
                this.form.submit();
            }
        });
    </script> -->
</body>

</html>