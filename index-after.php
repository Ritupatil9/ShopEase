<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ShopEase</title>

  <!-- Bootstrap & Font Awesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f9f9f9;
      color: #333;
    }

    /* Navbar layout */
    .navbar {
      background-color: #ffffff;
      border-bottom: 1px solid #e0e0e0;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
    }

    .navbar-brand {
      font-size: 1.8rem;
      font-weight: 600;
      color: #4b6cb7 !important;
      margin-left: 20px;
    }

    .nav-search {
      flex-grow: 1;
      display: flex;
      justify-content: center;
    }

    .nav-search input {
      width: 250px;
      border-radius: 6px 0 0 6px;
      border: 1px solid #ddd;
      padding: 8px;
    }

    .nav-search button {
      background-color: #4b6cb7;
      color: white;
      border: none;
      padding: 8px 14px;
      border-radius: 0 6px 6px 0;
    }

    .nav-actions {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .nav-actions a {
      color: #4b6cb7;
      text-decoration: none;
    }

    .nav-actions a:hover {
      text-decoration: underline;
    }

    /* Responsive design */
    @media (max-width: 768px) {
      .nav-search input {
        width: 200px;
      }

      .navbar {
        padding: 0 10px;
      }

      .nav-actions a {
        font-size: 14px;
      }
    }


    .hero-section {
      background: linear-gradient(135deg, #004d7a, #2a4d7f);
      color: #fff;
      text-align: center;
      padding: 100px 20px;
    }

    .hero-section h1 {
      font-size: 3rem;
      font-weight: 600;
    }

    .hero-section p {
      font-size: 1.2rem;
      opacity: 0.9;
    }

    .box-img {
      height: 200px;
      border-radius: 10px;
      background-size: cover;
      background-position: center;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease;
    }

    .box-img:hover {
      transform: scale(1.03);
    }

    .see-more-btn {
      margin-top: 10px;
      display: inline-block;
      background-color: #004d7a;
      color: white;
      padding: 6px 14px;
      border-radius: 5px;
      text-decoration: none;
    }

    .see-more-btn:hover {
      background-color: #005c8a;
    }

    footer {
      background-color: #004d7a;
      color: #ffffff;
      padding: 40px 0;
    }

    footer a {
      color: #ff7f50;
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline;
    }

    /* Adjust navbar layout */
    .navbar-nav {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-grow: 1;
    }

    .nav-actions {
      margin-left: auto;
      /* Make sure it's aligned right */
    }

    /* Responsive design */
    @media (max-width: 768px) {
      .nav-search input {
        width: 200px;
      }

      .col-md-3 {
        flex: 1 1 100%;
        margin-bottom: 20px;
      }

      .nav-actions a {
        font-size: 14px;
      }
    }

    /* Category boxes styling */
    .category-box {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
      padding: 15px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .category-box:hover {
      transform: scale(1.05);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    .category-box h5 {
      text-align: center;
      font-size: 1.2rem;
      margin-bottom: 10px;
    }

    .category-box .see-more-btn {
      margin-top: 10px;
      display: block;
      width: 100%;
      text-align: center;
    }

    /* Category Grid */
    .category-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }

    .category-grid .col-md-3 {
      flex: 1 1 22%;
      min-width: 250px;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar d-flex justify-content-between align-items-center">
    <a class="navbar-brand" href="#">ShopEase</a>

    <div class="navbar-nav">
      <div class="nav-search d-flex">
        <input type="text" placeholder="Search products..." />
        <button><i class="fa fa-search"></i></button>
      </div>
    </div>

    <div class="nav-actions">
      <!-- Updated Cart link with login prompt -->
      <a href="cart.html" id="cart-link">
        <i class="fa fa-shopping-cart"></i>
        <span id="cart-count" class="badge bg-danger">0</span> <!-- Default count is 0 -->
      </a>

      <a href="logout.php">Logout</a>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section">
    <div>
      <h1>Discover. Curate. Elevate.</h1>
      <p>Your lifestyle, your way — beautifully delivered</p>
      <a href="#shop" class="btn btn-lg">Explore Collections</a>
    </div>
  </section>

  <!-- Shop Section -->
  <div class="container shop-section py-5" id="shop">
    <h2>Curated Categories</h2>
    <div class="category-grid">
      <div class="category-box col-md-3">
        <h5>Clothes</h5>
        <div class="box-img" style="background-image: url('images/box1_image1.jpg');"></div>
        <a href="Clothes.html" class="see-more-btn">Shop Clothes</a>
      </div>
      <div class="category-box col-md-3">
        <h5>Health & Wellness</h5>
        <div class="box-img" style="background-image: url('images/box2_image.jpg');"></div>
        <a href="health.html" class="see-more-btn">Explore Health</a>
      </div>
      <div class="category-box col-md-3">
        <h5>Furniture</h5>
        <div class="box-img" style="background-image: url('images/download.jpeg');"></div>
        <a href="Furniture.html" class="see-more-btn">Browse Furniture</a>
      </div>
      <div class="category-box col-md-3">
        <h5>Mobiles</h5>
        <div class="box-img" style="background-image: url('images/box4_image.jpg');"></div>
        <a href="Mobile.html" class="see-more-btn">View Mobiles</a>
      </div>
      <div class="category-box col-md-3">
        <h5>Stationary</h5>
        <div class="box-img" style="background-image: url('images/stationary.webp');"></div>
        <a href="stationary.html" class="see-more-btn">Shop Your Stationary</a>
      </div>
      <div class="category-box col-md-3">
        <h5>Beauty</h5>
        <div class="box-img" style="background-image: url('images/box5_image.jpg');"></div>
        <a href="makeup.html" class="see-more-btn">Beauty Picks</a>
      </div>
      <div class="category-box col-md-3">
        <h5>Pets</h5>
        <div class="box-img" style="background-image: url('images/pets.jpeg');"></div>
        <a href="pets.html" class="see-more-btn">Style Your Pets</a>
      </div>
      <div class="category-box col-md-3">
        <h5>Toys & Games</h5>
        <div class="box-img" style="background-image: url('images/box7_image.jpg');"></div>
        <a href="Toys.html" class="see-more-btn">Fun & Games</a>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center">
    <div class="container">
      <p class="mb-2">Stay Connected</p>
      <a href="#">Facebook</a> |
      <a href="#">Instagram</a> |
      <a href="#">Twitter</a>

      <hr style="background-color: #666;">
      <p>&copy; 2024 ShopEase. All rights reserved.</p>
    </div>
  </footer>

  <script>
    // Function to update the cart count
    function updateCartCount() {
      // Get cart items from localStorage (assuming it's an array of item IDs or objects)
      const cartItems = JSON.parse(localStorage.getItem('cart')) || [];

      // Update the cart item count in the UI
      const cartCountElement = document.getElementById('cart-count');
      cartCountElement.textContent = cartItems.length;  // Set the cart count to the number of items
    }

    // Call updateCartCount when the page loads to reflect the cart count
    document.addEventListener('DOMContentLoaded', function () {
      updateCartCount();
    });


    // Example of adding an item to the cart (this would be triggered when a user adds an item)
    function addToCart(item) {
      // Get the current cart items from localStorage
      let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

      // Add the new item to the cart (could be an object or ID)
      cartItems.push(item);

      // Save the updated cart to localStorage
      localStorage.setItem('cartItems', JSON.stringify(cartItems));

      // Update the cart count
      updateCartCount();
    }

    // Initial call to update the cart count when the page loads
    updateCartCount();
  </script>


</body>

</html>