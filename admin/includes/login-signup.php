<?php
include 'includes/session.php';
?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login-signup.css"> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
<!-- Header Section -->
<header>
    <div class="header-left">
        <img src="logo.png" alt="Company Logo" class="logo">
        <h1>Rain Forest</h1>
    </div>
    <h4 class="tagline">Online store of plants.</h4>
    <div class="header-right">
        <a href="https://facebook.com" target="_blank">
            <img src="fb.png" alt="Facebook">
        </a>
        <a href="https://twitter.com" target="_blank">
            <img src="tw.png" alt="Twitter">
        </a>
        <a href="https://instagram.com" target="_blank">
            <img src="ig.png" alt="Instagram">
        </a>
        <a href="https://linkedin.com" target="_blank">
            <img src="in.png" alt="LinkedIn">
        </a>
    </div>

</header>

<!-- Navigation Bar -->
<nav>
    <ul>
        <li><a href=index.html>Home</a></li>
        <li><a href=products.html>Our Products</a></li>
        <li><a href=new-arrivals.html>New Arrivals</a></li>
        <li><a href=about.html>About Us</a></li>
        <li><a href=login-signup.html>Login/Signup</a></li>
        <li><a href=gallery.html>Our Gallery</a></li>
    </ul>
</nav>
<br>
    <!-- Main Content -->
    <main class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-signup-container">
            <div class="text-center mb-4">
                <h2>Login / Sign Up</h2>
            </div>
         
            <div class="btn-group mb-4">
                <button class="btn btn-primary" id="login-btn">Login</button>
                <button class="btn btn-secondary" id="signup-btn">Sign Up</button>
            </div>
            <div id="login-form" class="form-container">
                <form action="verify.php" method="POST">
                    <div class="form-group">
                        <label for="login-email">Email</label>
                        <input type="email" class="form-control" id="login-email" placeholder="Enter your email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <input type="password" class="form-control" id="login-password" placeholder="Password" name="password">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" name="login">Login</button>
                </form>
            </div>
            <div id="signup-form" class="form-container d-none">
                <form action="register.php" method="POST">
                    <div class="form-group">
                        <label for="signup-fullname">First  Name</label>
                        <input type="text" class="form-control" id="signup-fullname" placeholder="Enter your full name" name="firstname">
                    </div>
                    <div class="form-group">
                        <label for="signup-fullname">Last Name</label>
                        <input type="text" class="form-control" id="signup-fullname" placeholder="Enter your full name" name="lastname">
                    </div>
                    <div class="form-group">
                        <label for="signup-location">Location</label>
                        <input type="text" class="form-control" id="signup-location" placeholder="Enter your location" name="location">
                    </div>
                    <div class="form-group">
                        <label for="signup-contact">Contact</label>
                        <input type="text" class="form-control" id="signup-contact" placeholder="Enter your contact number" name="contact">
                    </div>
                    <div class="form-group">
                        <label for="signup-email">Email</label>
                        <input type="email" class="form-control" id="signup-email" placeholder="Enter your email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="signup-password">Password</label>
                        <input type="password" class="form-control" id="signup-password" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="signup-password">Re-Password</label>
                        <input type="password" class="form-control" id="signup-password" placeholder="Password" name="repassword">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" name="signup" >Sign Up</button>
                </form>
            </div>
        </div>
    </main>
    <br>
    <br>



<!-- Footer Section -->
<footer>
    <!-- First Section: Team Members -->
    <div class="footer-section team-section">
        <div class="team-member">
            <img src="1.webp" alt="Team Member 1" class="team-photo">
            <div class="team-info">
                <h3>Nabin Khatri</h3>
                <p>CEO</p>
            </div>
        </div>
        <div class="team-member">
            <img src="200.jpg" alt="Team Member 2" class="team-photo">
            <div class="team-info">
                <h3>Kanchana </h3>
                <p>CTO</p>
            </div>
        </div>
        <div class="team-member">
            <img src="300.jpg" alt="Team Member 3" class="team-photo">
            <div class="team-info">
                <h3>Emily Johnson</h3>
                <p>COO</p>
            </div>
        </div>
    </div>

    <!-- Second Section: Contact Info and Social Media -->
    <div class="footer-section contact-section">
        <div class="contact-info">
            <img src="logo.png" alt="compaly logo/Location">
            <div class="location-details">
                <p>Rain Forest </p>
                <p>Digital market of plants.</p>
            </div>
        </div>
        <div class="social-media">
            <a href="https://facebook.com" target="_blank">
                <img src="fb.png" alt="Facebook">
            </a>
            <a href="https://twitter.com" target="_blank">
                <img src="tw.png" alt="Twitter">
            </a>
            <a href="https://instagram.com" target="_blank">
                <img src="ig.png" alt="Instagram">
            </a>
            <a href="https://linkedin.com" target="_blank">
                <img src="in.png" alt="LinkedIn">
            </a>
            <div class="phone-details">
                <p>Phone: +977 9894569890</p>
            </div>
        </div>
    </div>

    <!-- Third Section: Company Name -->
    <div class="footer-section company-name">
        <p>&copy; 2024 Rain Forest. All rights reserved.</p>
    </div>
</footer>

    <!-- js -->

    <script src="script.js"></script>
</body>
</html>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="login-signup.js"></script> 
    <script src="script.js"></script>
</body>
</html>
