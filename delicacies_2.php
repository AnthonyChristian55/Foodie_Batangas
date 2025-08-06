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
    <title>Delicacies</title>

    <link rel="icon" href="./images/ADlogo.png" type="image/png">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="./css/delicacies.css">
    <script src="./javascript/script.js" defer></script>
    <script src="./css/journal.js" defer></script>
</head>

<body>
    <div class="logo">
    <div class="userlog">
        <div class="username">
            <br>
            <?php
        echo '<center><ul><span style="color: white; background-color: #212121; padding: 10px; 
        border-radius: 10px; font-size: 18px;">Welcome, ' . $_SESSION["user_name"] . '!</span></ul></center>';
        ?> </div>
    </div>
        <center><img src="./images/fblogo.png" alt="WanderLog"> </center>
    </div>
    <center>
        <div class="navbar">
            <span class="menu-btn material-symbols-outlined">menu</span>
            <nav>
                <ul class="links">
                    <li> <a href="index2.php">Home</a></li>
                    <li> <a href="delicacies_2.php">Delicacies</a></li>
                    <li> <a href="post.php">Journal</a></li>
                    <li> <a href="about.php">About</a></li>
                    <li> <a href="logout.php"><ion-icon name="log-out-outline"></ion-icon></a></li>
                </ul>
            </nav>


        </div>

        </center>
    <!-- Recommend Spots For Tours And Travel. -->
    <section class="recommended-spots">
    <center>
    <h2 class="h2">Known Delicacies in Batangas</h2>
        </center>
        <br>
        <div class="spot">
             <img src="./images/tapang-taal.jpg" alt="Tapang Taal">   
            <h3><i class="fa fa-map-marker" aria-hidden="true">&nbsp </i>Tapang Taal</h3>
            <div id="map-container" style="display: none;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3872.278267671479!2d121.14998297509372!3d13.942029886469955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd6d5689a9e85d%3A0x42e1a6b3c9f785f3!2sIjo%20Bakery%20Viennoiserie!5e0!3m2!1sen!2sph!4v1720793573836!5m2!1sen!2sph" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
               <p><b>Description: </b>Cured beef from Taal, Batangas, marinated in a mixture of soy sauce, vinegar, garlic, and sugar. It is typically fried and served with garlic rice and fried eggs for a hearty breakfast.</p>
            <center><a href="#" class="comment-link" onclick="toggleCommentSection(this, event)">See Review</a></center>
            <div class="comment-section">
                <p><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp <strong>JoseManuel: </strong>Wonderful</p>
            </div>
        </div>
        <div class="spot">
        <img src="./images/taal-longganisa.jpg" alt="Longganisang Taal">   
            <h3><i class="fa fa-map-marker" aria-hidden="true">&nbsp </i>Longganisang Taal</h3>
            <div id="map-container" style="display: none;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3872.152483632043!2d121.16402327509381!3d13.949524886463209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd6c9c0d0555bd%3A0x966dbca177d3ca26!2sLiam&#39;s%20Lomi%20House!5e0!3m2!1sen!2sph!4v1720849580895!5m2!1sen!2sph" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
               <p><b>Description: </b>A type of sausage made in Taal, Batangas, characterized by its garlicky and slightly sweet flavor. It is usually fried until golden brown and enjoyed with vinegar dip and garlic rice.</p>
            <center><a href="#" class="comment-link" onclick="toggleCommentSection(this, event)">See Review</a></center>
            <div class="comment-section">
                <p><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp <strong>JoseManuel: </strong>Wonderful</p>
            </div>
        </div>
        <div class="spot">
            <img src="./images/Adobo-sa-Dilaw.jpg" alt="Adobo sa Dilaw">
            <h3><i class="fa fa-map-marker" aria-hidden="true">&nbsp </i>Adobo sa Dilaw</h3>
            <div id="map-container" style="display: none;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3872.152483632043!2d121.16402327509381!3d13.949524886463209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd6c9c0d0555bd%3A0x966dbca177d3ca26!2sLiam&#39;s%20Lomi%20House!5e0!3m2!1sen!2sph!4v1720849580895!5m2!1sen!2sph" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
               <p><b>Description: </b>A unique version of the classic Filipino adobo, this dish uses turmeric (dilaw) to give it a distinct yellow color and a different flavor profile. It typically features chicken or pork stewed in vinegar, garlic, and turmeric.</p>
            <center><a href="#" class="comment-link" onclick="toggleCommentSection(this, event)">See Review</a></center>
            <div class="comment-section">
                <p><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp <strong>JoseManuel: </strong>Wonderful</p>
            </div>
        </div>
        <div class="spot">
            <img src="./images/Sinigang-na-maliputo.png" alt="Maliputo">
            <h3><i class="fa fa-map-marker" aria-hidden="true">&nbsp </i>Maliputo</h3>
            <p>A rare fish found in Taal Lake, known for its tender meat and unique flavor. It can be grilled, fried, or cooked in various ways to highlight its natural taste.</p>
            <center><a href="#" class="comment-link" onclick="toggleCommentSection(this, event)">See Review</a></center>
            <div class="comment-section">
                <p><i class="fa fa-user-circle-o" aria-hidden="true"></i> &nbsp <strong>Kath Any: </strong>This is a
                    great place for vacations and family gatherings.</p>
                <p><i class="fa fa-user-circle-o" aria-hidden="true"></i> &nbsp <strong>Ivan12: </strong>Good Food and a
                    great to take some picture.</p>
            </div>
        </div>
    </section>
    <!-- Number Navigation -->
    <footer>
        <div class="pagenum">
            <a href="delicacies_1.php">1</a>
            <a href="delicacies_2.php" class="active">2</a>
            <a href="#">3</a>
        </div>
    </footer>


























    <!-- Popup Form -->
    <div class="blur-bg-overlay"></div>
    <div class="form-popup" id="popup">
        <span class="close-btn material-symbols-outlined">close</span>
        <div class="form-box login">
            <div class="form-details">
                <h2>Welcome Back</h2>
                <p>Please log in using your personal information to stay with us.</p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form action="login.php" method="post">
                    <div class="input-field">
                        <input type="text" name="emailaddress" required>
                        <label>Email</label>
                    </div>

                    <div class="input-field">
                        <input type="password" name="pw" required>
                        <label>Password</label>
                    </div>

                    <a href="#" class="forgot-pass">Forgot password?</a>

                    <button type="submit">Log In</button>
                </form>
                <div class="bottom-link">
                    Don't have an account?
                    <a href="#" id="signup-link">Signup</a>
                </div>
            </div>
        </div>

        <div class="form-box signup">
            <div class="form-details">
                <h2>Create an account</h2>
                <p>To become a part of our community, please sign up using your personal information.</p>
            </div>
            <div class="form-content">
                <h2>SIGN UP</h2>
                <form action="reg.php" method="post">
                    <div class="input-field">
                        <input type="text" name="name" required>
                        <label>Name</label>
                    </div>

                    <div class="input-field">
                        <input type="email" name="emailaddress" required>
                        <label>Email</label>
                    </div>

                    <div class="input-field">
                        <input type="password" name="pw" required>
                        <label>Create password</label>
                    </div>

                    <div class="input-field">
                        <input type="password" name="cpw" required>
                        <label>Confirm password</label>
                    </div>

                    <div class="policy-text">
                        <input type="checkbox" id="policy" required>
                        <label for="policy">
                            I agree to the
                            <a href="#">Terms and Conditions</a>
                        </label>
                    </div>

                    <a href="#" class="forgot-pass">Forgot password?</a>

                    <button type="submit">Sign up</button>


                    <!-- Optional: Display errors or notifications -->
                    <div id="error-message"></div>

                    <script>
                        // Optional: You can handle additional validation here using JavaScript

                        // Example: Display error message using JavaScript
                        function submitForm() {
                            var policyCheckbox = document.getElementById("policy");

                            if (!policyCheckbox.checked) {
                                document.getElementById("error-message").innerText = "Please agree to the Terms and Conditions.";
                                return false; // Prevent form submission
                            }

                            // Additional validation logic can be added as needed

                            // If all validation passes, the form will be submitted
                            return true;
                        }
                    </script>
                </form>

                <div class="bottom-link">
                    Already have an account?
                    <a href="" id="login-link">Login</a>
                </div>
            </div>
        </div>

    </div>