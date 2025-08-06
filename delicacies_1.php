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
                    <li> <a href="delicacies_1.php">Delicacies</a></li>
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
  <img src="./images/goto1.png" alt="Goto">
  <h3><i class="fa fa-map-marker" aria-hidden="true">&nbsp;</i>Goto</h3>
  <div id="map-container" style="display: none;">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3874.3182502386444!2d121.39709747509147!3d13.819918686579083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd39aeff5257ed%3A0xb1a5bb3bab76ec16!2sKuya%20Oliver%E2%80%99s%20Gotohan!5e0!3m2!1sen!2sph!4v1720792731163!5m2!1sen!2sph" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
    <p>Kuya Oliver's Goto is popular for its flavorful and comforting dish, often enjoyed as a breakfast meal or a comforting snack at any time of the day. The place might also serve other variations of porridge 
        and Filipino comfort food, making it a favorite among locals for its hearty and delicious offerings.</p>
  <center><a href="#" class="comment-link" onclick="toggleCommentSection(this, event)">See Review</a></center>
  <div class="comment-section">
    <p><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;<strong>Michael21: </strong>This Place is
      100 percent Recommended, Great Place and Great Food.</p>
    <p><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;<strong>Raymond: </strong>Place is great</p>
  </div>
</div>
        </div>
        <div class="spot">
            <img src="./images/kape.jpg" alt="Kapeng Barako">   
            <h3><i class="fa fa-map-marker" aria-hidden="true">&nbsp </i>Kapeng Barako</h3>
            <div id="map-container" style="display: none;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15489.129002008269!2d121.14724181738282!3d13.9417925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd6cbcecfd43a9%3A0x7fec1760581b5a63!2sD&#39;%20Lover&#39;s%20Line%20Bibingka!5e0!3m2!1sen!2sph!4v1720784087561!5m2!1sen!2sph" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
               <p><b>Description:</b>A robust coffee variety grown in Batangas, known for its strong flavor and distinctive aroma. It is a favorite among coffee enthusiasts who prefer a bold and intense coffee experience.</p>
            <center><a href="#" class="comment-link" onclick="toggleCommentSection(this, event)">See Review</a></center>
            <div class="comment-section">
                <p><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp <strong>JoseManuel: </strong>Wonderful</p>
            </div>
        </div>
        <div class="spot">
            <img src="./images/lomi.jpg" alt="Lomi">
            <h3><i class="fa fa-map-marker" aria-hidden="true">&nbsp </i>Lomi</h3>
            <div id="map-container" style="display: none;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3872.437466023709!2d121.08369987509364!3d13.932538186478515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd12ac604de905%3A0x83ab10e976aa7e4a!2sA%20%26%20B%20Lomi%20House%20Duhatan%20Lipa!5e0!3m2!1sen!2sph!4v1720786884068!5m2!1sen!2sph" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
               <p><b>Description:</b>A thick, egg noodle soup made with a rich, flavorful broth, thickened with a mixture of cornstarch and beaten eggs. It usually includes pork, liver, fish balls, kikiam (Chinese meat rolls), and vegetables, topped with chicharron (fried pork rinds) and served with a side of calamansi (Philippine lime) and soy sauce.</p>
            <center><a href="#" class="comment-link" onclick="toggleCommentSection(this, event)">See Review</a></center>
            <div class="comment-section">
                <p><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp <strong>Gloria23: </strong>Such a great
                    time unwinding in this place. It makes you feel relax from a stressful week. Good job!.</p>
                <p><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp <strong>Alvin Trq: </strong>The place is
                    great for photoshoot especially if you’re theme is an abandoned castle or palace. This is a perfect
                    place for you.</p>
            </div>
        </div>
        <div class="spot">
            <img src="./images/bulalo.jpg" alt="Bulalo">
            <h3><i class="fa fa-map-marker" aria-hidden="true">&nbsp </i>Bulalo</h3>
            <div id="map-container" style="display: none;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3869.424610068398!2d121.14167397509682!3d14.111108786319274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd659596bf9d35%3A0xb9b0189360d36368!2sRose%20and%20Grace%20Restaurant!5e0!3m2!1sen!2sph!4v1720787585103!5m2!1sen!2sph" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
               <p><b>Description:</b>A hearty beef shank soup with marrow bones, vegetables like cabbage, corn, and potatoes, slow-cooked to perfection. Bulalo is known for its rich and savory broth, making it a favorite comfort food, especially in cooler weather.</p>
            <center><a href="#" class="comment-link" onclick="toggleCommentSection(this, event)">See Review</a></center>
            <div class="comment-section">
                <p><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp <strong>Daniel Pa: </strong>Beautiful and
                    clean place. Must go to if your looking for a peaceful quiet place to clear your mind. Quite close
                    to the highway so can easily be found.</p>
                <p><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp <strong>Ivan12: </strong>Really Cool
                    Place to Visit.</p>
            </div>
        </div>
    </section>
    <!-- Number Navigation -->
    <footer>
        <div class="pagenum">
            <a href="delicacies_1.php" class="active">1</a>
            <a href="delicacies_2.php">2</a>
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