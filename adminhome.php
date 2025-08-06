<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.html');
    exit();
}

require_once ("config.php");

function fetchUsers($conn)
{
    $sql = "SELECT fullname, username, email FROM foodie_users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['fullname']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['email']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No users found</td></tr>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie Batangas - Admin Approve Posts</title>
    <link rel="icon" href="./images/ADlogo.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/index2.css">
    <link rel="stylesheet" href="./css/footer.css">
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

        .container th {
            background-color: #212121;
            color: white;
        }

        .pcontainer {
            width: 80pc;
            height: auto;
            background-color: white;
            margin: 40px;
            border-radius: 27%;
            border: 7px solid black;
            margin: 0 auto;
            margin-top: 20px;
        }

        .pcontainer:hover {
            border-radius: 15%;
        }

        .container button {
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

        .container button:hover {
            background-color: black;
        }

        .icons {
            font-size: 50px;
            display: grid;
            place-items: center;
            justify-content: center;
            padding-top: 20px;
            cursor: pointer;
        }

        /* Print styles */
        @media print {
            body {
                background-color: white;
            }

            header,
            footer,
            aside,
            nav,
            form,
            .bghead,
            .pcontainer,
            .icons {
                display: none;
            }

            .container {
                border: none;
                padding: 0;
                background-color: transparent;
            }

            table {
                display: table;
                width: 100%;
                border: 1px solid black;
                color: black;
            }

            th,
            td {
                border: 1px solid black;
            }
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

    <div class="pcontainer">
        <div class="container">
            <h2>User List</h2>
            <table width="100%" id="userTable">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php fetchUsers($conn); ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="icons">
        <ion-icon name="print" onclick="printTable()"></ion-icon>
    </div>

    <!-- Footer -->
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
                    <li>
                        <a href="#">Join Now</a>
                    </li>
                    <li>
                        <a href="#">Learn More</a>
                    </li>
                    <li>
                        <a href="#">Manage Account</a>
                    </li>
                </ul>
            </li>

            <li class="nav__item">
                <h2 class="nav__title" style="margin-top: 120px">News & Info</h2>
                <ul class="nav__ul">
                    <li>
                        <a href="#">Press Releases</a>
                    </li>
                    <li>
                        <a href="#">About Our Products</a>
                    </li>
                    <li>
                        <a href="#">Product Support</a>
                    </li>
                    <li>
                        <a href="#">Product Manuals</a>
                    </li>
                    <li>
                        <a href="#">Product Registration</a>
                    </li>
                    <li>
                        <a href="#">Newsletter Sign Up</a>
                    </li>
                </ul>
            </li>

            <li class="nav__item">
                <h2 class="nav__title" style="margin-top: 120px">Support</h2>
                <ul class="nav__ul">
                    <li>
                        <a href="#">FAQ</a>
                    </li>
                    <li>
                        <a href="#">Help Desk</a>
                    </li>
                    <li>
                        <a href="#">Forums</a>
                    </li>
                </ul>
            </li>
        </ul>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        function printTable() {
            var divToPrint = document.getElementById("userTable");
            var newWin = window.open("");
            newWin.document.write("<html><head><title>Print Users</title>");
            newWin.document.write("<style>table, th, td { border: 1px solid black; border-collapse: collapse; padding: 10px; text-align: left; }</style>");
            newWin.document.write("</head><body>");
            newWin.document.write(divToPrint.outerHTML);
            newWin.document.write("</body></html>");
            newWin.print();
            newWin.close();
        }
    </script>
</body>

</html>