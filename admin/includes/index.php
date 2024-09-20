<?php include 'includes/conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rain Forest</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<!-- DataTables -->
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
</head>
<body>
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
            <li><a href=index.php>Home</a></li>
            <li><a href=products.php>Our Products</a></li>
            <!-- <li><a href=new-arrivals.html>New Arrivals</a></li> -->
            <li><a href=about.php>About Us</a></li>
            <li><a href=login-signup.php>Login/Signup</a></li>
            <li><a href=gallery.html>Our Gallery</a></li>
        </ul>
    </nav>

    <!-- Search Bar -->
    <div class="search-bar">
        <img src="search.png" alt="Search Icon">
        <form method="POST" action="search.php">
        <input type="text" placeholder="Search here" name="keyword">
        <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-search"></i> </button>
</form>
    </div>

    <!-- '''''''''''''''''''''''''''''''''''''''''''''''''''''''''''' -->

    <section class="slideshow-container">
        <div class="slogan">
            <pre>Love The Nature,  
    And The Nature Will Love You. </pre>
        </div>
        <div class="slideshow-image"></div>
    </section>
    
    <!-- ........................................................ -->

    <!-- Product Display Section -->
  


    <?php
    // Open the PDO connection
    $conn = $pdo->open();

    try {
        // Fetch all categories
        $stmt = $conn->prepare("SELECT * FROM category");
        $stmt->execute();

        foreach ($stmt as $row) {
            echo "<section class='product-section'>";
            // Display category name as a heading
            echo "<h2>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</h2>";

            // Use prepared statements with placeholders
            $category_id = $row['id'];
            $stmts = $conn->prepare("SELECT * FROM products WHERE category_id = :category_id LIMIT 3");
            $stmts->execute(['category_id' => $category_id]);

            echo "<div class='row'>";
            foreach ($stmts as $data) {
                // Check if product image exists, otherwise use a default image
                $image = (!empty($data['photo'])) ? 'images/' . htmlspecialchars($data['photo'], ENT_QUOTES, 'UTF-8') : 'images/noimage.jpg';

                // Output each product in a grid-like column
                echo "
                    <div class='col-md-4' style='border:1px solid black;'>
                    <a href='product.php?product=" . htmlspecialchars($data['slug'], ENT_QUOTES, 'UTF-8') . "'> <div class='box box-solid'>
                            <div class='box-body prod-body'>
                                <img src='" . htmlspecialchars($image, ENT_QUOTES, 'UTF-8') . "' width='100%' height='230px' class='thumbnail'>
                                <h5><a href='product.php?product=" . htmlspecialchars($data['slug'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8') . "</a></h5>
                            </div>
                            <div class='box-footer'>
                                <h4><b>Rs. " . number_format($data['price'], 2) . "</b></h4>
                            </div>
                        </div>
                        </a>
                    </div>
                ";
            }
            echo "</div>"; // Close the row

            // Add "See More" link for category
            echo "<div class='text-center'><a href='category.php?category=" . htmlspecialchars($row['cat_slug'], ENT_QUOTES, 'UTF-8') . "' class='btn btn-primary'>See More</a></div>";
            echo "</section>";
        }

        // Close the PDO connection
        $pdo->close();
    } catch (PDOException $e) {
        // Handle errors properly
        echo "Error: " . $e->getMessage();
    }
?>

<!-- <section class="product-section">
    <h2>Top Sell</h2>
    <div class="product-grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
        <div class="product-item">
            <img src="./a photo/aster.webp" alt="Product 1">
            <h3>Aster plant</h3>
            <p class="price">RS, 500</p>
            <button class="buy-now">Buy Now</button>
        </div>
        <div class="product-item">
            <img src="./a photo/nurserylive-barbados-cherry-tree-malpighia-emarginata-plant_512x512.webp" alt="Product 2">
            <h3>barbados-cherry-tree</h3>
            <p class="price">RS,1000</p>
            <button class="buy-now">Buy Now</button>
        </div>
        <div class="product-item">
            <img src="./a photo/siris-gulmohar red siris-300x300.webp" alt="Sirirs plant">
            <h3>Sirirs plant red</h3>
            <p class="price">RS, 1500</p>
            <button class="buy-now">Buy Now</button>
        </div>
    </div>

    <h2>New Arrivals</h2>
    <div class="product-grid">
        <div class="product-item">
            <img src="./a photo/lucky-bamboo-300x300.webp" alt="Lucky Bamboo">
            <h3>Lucky Bamboo</h3>
            <p class="price">RS, 1000</p>
            <button class="buy-now">Buy Now</button>
        </div>
        <div class="product-item">
            <img src="./a photo/jade plant2.webp" alt="jade plant">
            <h3>jade plant</h3>
            <p class="price">RS, 2000</p>
            <button class="buy-now">Buy Now</button>
        </div>
        <div class="product-item">
            <img src="./a photo/indoor1.webp" alt="indoor1">
            <h3>Indoor plant</h3>
            <p class="price">RS, 3000</p>
            <button class="buy-now">Buy Now</button>
        </div>
    </div>
</section> -->

<!-- ........................................................ -->

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
                <h3>Kanchana Ale Magar </h3>
                <p>CTO</p>
            </div>
        </div>
        <div class="team-member">
            <img src="300.jpg" alt="Team Member 3" class="team-photo">
            <div class="team-info">
                <h3>Shraddha Sedhai</h3>
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
