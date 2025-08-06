<?php
// Start the session
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect to the login page
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="icon" href="./images/ADlogo.png" type="image/png">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
   
    <link rel="stylesheet" href="./css./about.css">
    <link rel="stylesheet" href="./css/post.css">
    <script src="./javascript/script.js" defer></script>

</head>

<body>

<div class="header">
        <div class="logo">
            <center><img src="./images/fblogo.png" alt="foodie batangas"></center>
        </div>
        <?php
        echo '<center><ul><span style="color: white; background-color: #212121; padding: 10px; 
        border-radius: 10px; font-size: 18px;">Welcome, ' . $_SESSION["user_name"] . '!</span></ul></center>';
        ?>
    </div>
    <center>
    <div class="navbar" style="margin-top: 30px">
        <span class="menu-btn material-symbols-outlined">menu</span>
        <nav>
            <ul class="links">

                <span class="close-btn material-symbols-outlined">close</span>
                <li> <a href="index2.php">Home</a></li>
                <li> <a href="delicacies_1.php">Delicacies</a></li>
                <li> <a href="post.php">Journal</a></li>
                <li> <a href="about.php">About</a></li>
                <li> <a href="logout.php"><ion-icon name="log-out-outline"></ion-icon></a></li>



            </ul>
        </nav>
    </div>
    </center>
           


    <section class="about-us" style="margin-top: 70px;">
        <div class="abu-container">
            <h2>Welcome to Foodie Batangas</h2>
            <p>Foodie Batangas is a personal blog dedicated to exploring and celebrating the rich culinary heritage and vibrant food culture of Batangas, Philippines. Here, you'll find a delightful mix of food reviews, personal experiences, and culinary adventures that showcase the best of what Batangas has to offer.</p>
            
            <h2>Our Story</h2>
            <p>Foodie Batangas was born out of a deep love for food and a passion for sharing the unique flavors and dining experiences that make Batangas a food lover's paradise. From bustling markets to hidden gems, from traditional dishes to modern culinary innovations, this blog captures the essence of Batangueño cuisine.</p>
            
            <h2>Mission</h2>
            <p>Our mission is to inspire and inform fellow food enthusiasts about the diverse and delectable food scene in Batangas. We aim to provide a platform where food lovers can connect, share, and celebrate the culinary wonders of our beloved region.</p>
            <h2>Join Us</h2>
            <p>Whether you're a local resident, a visitor, or simply a food enthusiast, we invite you to join us on this delicious journey. Follow our blog for the latest updates, and don't hesitate to share your own food stories and recommendations.</p>
            <p>Thank you for visiting Foodie Batangas. Let's savor the flavors of Batangas together!

</p>
        </div>
    </section>



       <!-- Footer -->

   
       <footer class="footer">
        <div class="footer__addr">
          <center> <h1 class="footer__logo"> <img src="./images/fblogo.png"></h1> </center> 

            <h2 style="margin-top: 2pc; font-weight: bold;" >Contact</h2>

            <address style="margin-top: 1pc;">
                Lipa City, Batangas, Philippines, 4217<br>

                <a class="footer__btn" href="mailto:2120585@ub.edu.ph">Email Us</a>
            </address>
        </div>

        <ul class="footer__nav">
            <li class="nav__item">
                <h2 class="nav__title">Rewards</h2>

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
                <h2 class="nav__title" >News & Info</h2>

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
                <h2 class="nav__title">Support</h2>

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






    <div></div>
    <div></div>
</body>

</html>