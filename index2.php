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
    <title>Foodie Batangas</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie Batangas</title>

    <link rel="icon" href="./images/ADlogo.png" type="image/png">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="./css/index2.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+CU:wght@100..400&display=swap" rel="stylesheet"> 

    <script src="./javascript/script.js" defer></script>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>

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
            echo '<center><ul><span style="color: black; background-color: white; padding: 10px; 
            border-radius: 25px; font-size: 18px; margin-top: 20px; margin-left: 20px; width: 24pc;" >Welcome, ' . $_SESSION["user_name"] . '!</span></ul></center>';
            ?></div>
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


    <div class="section">
        <div class="hcon">
            <h1>WHERE TO GO</h1>
        </div>
        <div class="container">
            <div class="carousel">
                <input type="radio" name="slides" checked="checked" id="slide-1">
                <input type="radio" name="slides" id="slide-2">
                <input type="radio" name="slides" id="slide-3">
                <input type="radio" name="slides" id="slide-4">
                <input type="radio" name="slides" id="slide-5">
                <input type="radio" name="slides" id="slide-6">
                <ul class="carousel__slides">
                    <li class="carousel__slide">
                        <figure>
                            <div>
                                <img src="./images/goto.png" alt="TKuya Oliver's Goto">
                            </div>
                            <figcaption>
                                <h2 style="color: red;">Kuya Oliver's Goto</h2><br>
                                <p><b>Location:</b>RC92+J4M, San Juan, Batangas</p><br>
                                <p><strong>Opening Hours:</strong></p>
                                <p> Monday to Sunday: 7:00 AM - 4:00 PM</p><br>

                            </figcaption>
                        </figure>
                    </li>
                    <li class="carousel__slide">
                        <figure>
                            <div>
                                <img src="./images/liams.jpg" alt="liams">
                            </div>
                            <figcaption>
                                <h2 style="color: red;">Liam's Lomi House</h2><br>
                                <p><b>Location:</b> Recenos Compound, Gen. Luna St, Lipa, 4217 Batangas</p><br>
                                <p><b> Phone:</b> 0917 208 9535</p><br>
                                <p><b>Description: </b>Liam's Lomi House is well-known for its lomi, a hearty Filipino
                                    noodle soup with a thick broth, noodles, and a variety of toppings including pig,
                                    liver, and veggies. It's a favourite dish among both locals and visitors, ideal for
                                    warming up on a cold day or serving as a full supper.</p>
                                <br>
                                <p><strong>Opening Hours:</strong></p>
                                <p> Monday to Sunday: 6:00 AM - 7:30 PM <br>

                            </figcaption>
                        </figure>
                    </li>
                    <li class="carousel__slide">
                        <figure>
                            <div>
                                <img src="./images/RoseandGrace.jpg" alt="RoseandGrace">
                            </div>
                            <figcaption>
                                <h2 style="color: red;">Rose and Grace Restaurant</h2><br>
                                <p><b>Location:</b> 2506 1, Santo Tomas, 4234 Batangas</p><br>
                                <p><b>Phone:</b> (043) 778 1052</p><br>
                                <p><b>Recommendations:</b>Don't miss their signature bulalo, served hot with a side of
                                    steamed rice and accompanied by traditional condiments like patis (fish sauce) and
                                    calamansi (Philippine lime), for a truly authentic dining experience</p>
                                <br>
                                <p><strong>Opening Hours:</strong></p>
                                <p> Monday to Sunday: 7:00 AM - 10:00 PM <br>

                            </figcaption>
                        </figure>
                    </li>
                    <li class="carousel__slide">
                        <figure>
                            <div>
                                <img src="./images/bibingka.jpg" alt="bibingka">
                            </div>
                            <figcaption>
                                <h2 style="color: red;">D' Lover's Line Bibingka</h2><br>
                                <p><b>Location:</b> P. Torres Street, Lipa City, Batangas, Philippines</p><br>
                                <p><b>Phone:</b> (043) 555-6789</p><br>
                                <p><strong>Opening Hours:</strong></p>
                                <p> Monday to Sunday: 6:00 AM - 7:00 PM</p><br>
                                <p><b>Recommendations:</b> Don't miss their classic bibingka with a generous topping of
                                    kesong puti for a truly authentic Batangueño experience. Pair it with a hot cup of
                                    native kapeng barako (Batangas brewed coffee) for a perfect local treat.</p>

                            </figcaption>
                        </figure>
                    </li>
                    <li class="carousel__slide">
                        <figure>
                            <div>
                                <img src="./images/pancit.jpg" alt="tustado ni ka rico">
                            </div>
                            <figcaption>
                                <h2 style="color: red;">Tustado ni ka rico</h2><br>
                                <p><b>Location:</b> Int.B.Morada Village,Brgy.2(papasok ng Cultural,near LTO and Lipa
                                    National Highschool beside PCSO), Lipa City, Philippines</p><br>
                                <p><b> Phone:</b> 0966 872 1843</p><br>
                                <p><b>Description: </b>Know for their black pancit or black guisado with an affordable
                                    price its famous among students and workers.</p><br>
                                <p><strong>Opening Hours:</strong></p>
                                <p> Monday to Sunday: 6:00 AM - 4:00 PM <br>

                            </figcaption>
                        </figure>
                    </li>
                    <li class="carousel__slide">
                        <figure>
                            <div>
                                <img src="./images/Cafeño.jpg" alt="Cafeño">
                            </div>
                            <figcaption>
                                <h2 style="color: red;">Cafeño</h2><br>
                                <p><b>Location:</b>198 Calle Real, San Juan, Batangas, Philippines</p><br>
                                <p><b> Phone:</b> +63 43 575 3548</p><br>
                                <p><b>Description: </b>Cafeño is a charming café situated in San Juan, Batangas, known
                                    for its unique blend of traditional and contemporary Filipino cuisine.</p><br>
                                <p><strong>Opening Hours:</strong></p>
                                <p> Monday to Sunday: 7:00 AM - 9:00 PM <br>

                            </figcaption>
                        </figure>
                    </li>
                </ul>
                <ul class="carousel__thumbnails">
                    <li>
                        <label for="slide-1"> <img src="./images/goto.png" alt="TKuya Oliver's Goto"></label>
                    </li>
                    <li>
                        <label for="slide-2"> <img src="./images/liams.jpg" alt="liams"> </label>
                    </li>
                    <li>
                        <label for="slide-3"> <img src="./images/RoseandGrace.jpg" alt="RoseandGrace"></label>
                    </li>
                    <li>
                        <label for="slide-4"> <img src="./images/bibingka.jpg" alt="bibingka"> </label>
                    </li>
                    <li>
                        <label for="slide-5"> <img src="./images/pancit.jpg" alt="tustado ni ka rico"> </label>
                    </li>
                    <li>
                        <label for="slide-6"> <img src="./images/Cafeño.jpg" alt="Cafeño"> </label>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- footer section -->
    <!-- Footer -->

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
</body>
</html>