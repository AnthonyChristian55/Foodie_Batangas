<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.html');
    exit();
}

require_once("config.php");

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all pending posts with full names
$query = "SELECT p.id, p.content, p.rating, p.image_path, u.fullname AS posted_by
          FROM foodie_posts p 
          JOIN foodie_users u ON p.user_id = u.id 
          WHERE p.approved = 0";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie Batangas - Admin</title>

    <link rel="icon" href="./images/ADlogo.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="./css/index2.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+CU:wght@100..400&display=swap" rel="stylesheet">
    <script src="./javascript/script.js" defer></script>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <style>

        body {
            background-color: whitesmoke;
        }
        table,
        th,
        td {
            border: 3px solid black;
            border-collapse: collapse;
            
        }


        th,
        td {
            padding: 10px;
            text-align: left;
            
        }

        table img {
            cursor: pointer;
            margin: 0 auto;
        }


        .card {
            padding: 10px;
        }

        /* Popup image styles */
        #popup {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

        #popup img {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            height: auto;
            margin-top: 30px;
            cursor: pointer;
        }

        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }
        .container {
           
            padding: 20px;
            background-color: white;
            border-radius: 50px;
            height: auto;
            border: 7px solid black;
            
           
            

        }

        .container th{
            background-color: #212121;
            color: white;
        }

        .pcontainer{
            width: 80pc;
            height: auto;
            background-color: white;
            margin:40px;
            border-radius: 27%;
            border: 7px solid black;
          

        }

        .pcontainer:hover{
            border-radius: 15%;
        }

        .container button{
            width: 5pc;
            height: 2pc;
            border-radius: 30px;
            border: none;
            background-color: red;
            color: white;
            font-weight: bold;
            cursor: pointer;
            margin-left: 10px;

        }

        .container button:hover{
            background-color: black;
        }
    </style>
</head>

<body>
    <br>
    <div class="bghead">
        <img src="./images/bghead (2).jpg" alt="">
    </div>

    <center>
        <div class="navbar">
            <nav>
                <ul class="links">
                    <li><a href="adminhome.php">Home</a></li>
                    <li><a href="admin_posts.php">Manage Posts</a></li>
                    <li><a href="logout.php"><ion-icon name="log-out-outline"></ion-icon></a></li>
                </ul>
            </nav>
        </div>
    </center>
<center>
    <div class="pcontainer">


    <div class="container">

    
        <h2 style="padding: 10px;">PENDING POST</h2>
        <table style="width:100%;">
            <tr>
                <th>User</th>
                <th>Content</th>
                <th>Rating</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['posted_by']); ?></td>
                    <td><?php echo htmlspecialchars($row['content']); ?></td>
                    <td>
                       <span style="color: orangered;"> <?php echo str_repeat('★', htmlspecialchars($row['rating'])) . str_repeat('☆', 5 - htmlspecialchars($row['rating'])); ?></span>
                    </td>
                    <td>
                        <?php if (!empty($row['image_path'])) { ?>
                            <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="Post Image" style="max-width:200px;"
                                class="clickable-image">
                        <?php } ?>
                    </td>
                    
                    <td>
                        <form method="POST" action="manage_posts.php">
                            <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="action" value="approve">Approve</button>
                            <button type="submit" name="action" value="deny">Deny</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
</center>

    <footer class="footer">
        <div class="footer__addr">
            <h1 class="footer__logo" style="margin-top: 70px; margin-left: 20px;"> <img src="./images/fblogo.png"></h1>

            <h2 style="margin-top: 2pc; font-weight: bold; margin-left: 20px;">Contact</h2>

            <address style="margin-top: 1pc; margin-left: 20px;">
                Lipa City, Batangas, Philippines, 4217<br>

                <a class="footer__btn" href="mailto:2120585@ub.edu.ph">Email Us</a>
            </address>
        </div>

        <ul class="footer__nav">
            <li class="nav__item">
                <h2 class="nav__title" style="margin-top: 120px">Rewards</h2>

                <ul class="nav__ul">
                    <li><a href="#">Join Now</a></li>

                    <li><a href="#">Learn More</a></li>

                    <li><a href="#">Manage Account</a></li>
                </ul>
            </li>

            <li class="nav__item">
                <h2 class="nav__title" style="margin-top: 120px">News & Info</h2>

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
                <h2 class="nav__title" style="margin-top: 120px">Support</h2>

                <ul class="nav__ul">
                    <li><a href="#">FAQ</a></li>

                    <li><a href="#">Help Desk</a></li>

                    <li><a href="#">Forums</a></li>
                </ul>
            </li>
        </ul>
    </footer>

    <!-- Popup image container -->
    <div id="popup">
        <span class="close">&times;</span>
        <img id="popup-img" src="">
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        // JavaScript for popup image with delay
        document.querySelectorAll('.clickable-image').forEach(image => {
            image.addEventListener('click', function() {
                setTimeout(() => {
                    document.getElementById('popup-img').src = this.src;
                    document.getElementById('popup').style.display = 'block';
                }, 500); // 500 milliseconds delay
            });
        });

        document.querySelector('.close').addEventListener('click', function() {
            document.getElementById('popup').style.display = 'none';
        });
    </script>
</body>

</html>
