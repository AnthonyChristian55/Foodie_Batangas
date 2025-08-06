<?php
// Start the session
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect to the login page
    header("Location: index.html");
    exit();
}

// Fetch current user information
require 'config.php';
$user_id = $_SESSION["user_id"];
$query = "SELECT u.*, o.birthday, o.age, o.province, o.gender, o.favorite_food 
          FROM foodie_users u
          LEFT JOIN foodie_otherInfo o ON u.id = o.user_id
          WHERE u.id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Foodie Batangas</title>
    <link rel="icon" href="./images/ADlogo.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+CU:wght@100..400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/index2.css">
    <script src="./javascript/script.js" defer></script>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <style>
        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Oswald', sans-serif;
            color: #333;
        }

        .input-field {
            margin-bottom: 15px;
        }

        .input-field label {
            display: block;
            margin-bottom: 5px;
            font-family: 'Poppins', sans-serif;
            color: #555;
        }

        .input-field input,
        .input-field select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-field input:focus,
        .input-field select:focus {
            outline: none;
            border-color: #007bff;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            font-family: 'Oswald', sans-serif;
        }

        button:hover {
            background-color: red;
        }
    </style>
</head>

<body>
    <br>
    <div class="bghead">
        <img src="./images/bghead (2).jpg" alt="">
    </div>

    <div class="userlog">
        <div class="username">
            <br>
            <?php
            echo '<center><ul><span style="color: black; background-color: white; padding: 10px; border-radius: 25px; font-size: 18px; margin-top: 20px; margin-left: 20px; width: 24pc;" >Welcome, ' . $_SESSION["user_name"] . '!</span></ul></center>';
            ?>
        </div>
    </div>

    <center>
        <div class="navbar">
            <nav>
                <ul class="links">
                    <li> <a href="#">Home</a></li>
                    <li> <a href="delicacies_1.php">Delicacies</a></li>
                    <li> <a href="post.php">Journal</a></li>
                    <li> <a href="about.php">About</a></li>
                    <li> <a href="logout.php"><ion-icon name="log-out-outline"></ion-icon></a></li>
                </ul>
            </nav>
    </center>

    <div class="container">
        <h2>Edit Information</h2>
        <form action="update_info.php" method="post">
            <div class="input-field">
                <label for="username">Username</label>
                <input type="text" name="username" id="username"
                    value="<?php echo htmlspecialchars($user['username']); ?>" required>
            </div>
            <div class="input-field">
                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" id="fullname"
                    value="<?php echo htmlspecialchars($user['fullname']); ?>" required>
            </div>
            <div class="input-field">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="input-field">
                <label for="birthday">Birthday</label>
                <input type="date" name="birthday" id="birthday"
                    value="<?php echo htmlspecialchars($user['birthday']); ?>">
            </div>
            <div class="input-field">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" value="<?php echo htmlspecialchars($user['age']); ?>">
            </div>
            <div class="input-field">
                <label for="province">Province</label>
                <input type="text" name="province" id="province"
                    value="<?php echo htmlspecialchars($user['province']); ?>">
            </div>
            <div class="input-field">
                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value="Male" <?php if ($user['gender'] == 'Male')
                        echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($user['gender'] == 'Female')
                        echo 'selected'; ?>>Female</option>
                    <option value="Other" <?php if ($user['gender'] == 'Other')
                        echo 'selected'; ?>>Other</option>
                </select>
            </div>
            <div class="input-field">
                <label for="favorite_food">Favorite Food</label>
                <input type="text" name="favorite_food" id="favorite_food"
                    value="<?php echo htmlspecialchars($user['favorite_food']); ?>">
            </div>
            <button type="submit">Update Profile</button>
        </form>
    </div>

    <footer class="footer">
        <div class="footer__addr">
            <h1 class="footer__logo"> <img src="./images/fblogo.png"></h1>
            <h2 style="margin-top: 2pc; font-weight: bold;">Contact</h2>
            <address style="margin-top: 1pc;">
                Lipa City, Batangas, Philippines, 4217<br>
                <a class="footer__btn" href="mailto:2120585@ub.edu.ph">Email Us</a>
            </address>
        </div>
        <ul class="footer__nav">
            <li class="nav__item">
                <h2 class="nav__title">Rewards</h2>
                <ul class="nav__ul">
                    <li><a href="#">Join Now</a></li>
                    <li><a href="#">Learn More</a></li>
                    <li><a href="#">Manage Account</a></li>
                </ul>
            </li>
            <li class="nav__item">
                <h2 class="nav__title">News & Info</h2>
                <ul class="nav__ul">
                    <li><a href="#">Press Releases</a></li>
                    <li><a href="#">About Our Products</a></li>
                    <li><a href="#">Product Support</a></li>
                    <li><a href="#">Product Manuals</a></li>
                    <li><a href="#">Product Registration</a></li>
                    <li><a href="#">Newsletter Sign Up</a></li>
                </ul>
            </li>
            <li class="nav__item">
                <h2 class="nav__title">Support</h2>
                <ul class="nav__ul">
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Help Desk</a></li>
                    <li><a href="#">Forums</a></li>
                </ul>
            </li>
        </ul>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>