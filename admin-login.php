<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register & Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(135deg, #004d7a, #2a4d7f);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .container {
      background: #fff;
      padding: 40px 30px;
      width: 100%;
      max-width: 400px;
      border-radius: 20px;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease-in-out;
      animation: fadeIn 0.6s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .form-title {
      text-align: center;
      font-size: 32px;
      font-weight: 600;
      margin-bottom: 20px;
      color: #333;
    }

    .input-group {
      position: relative;
      margin-bottom: 20px;
    }

    .input-group input {
      width: 100%;
      padding: 12px 40px 12px 35px;
      border: 1px solid #ccc;
      border-radius: 12px;
      outline: none;
      font-size: 15px;
      transition: border-color 0.3s;
    }

    .input-group input:focus {
      border-color: #004d7a;
    }

    .input-group label {
      position: absolute;
      top: -8px;
      left: 35px;
      background: #fff;
      padding: 0 5px;
      font-size: 13px;
      color: #555;
    }

    .input-group i {
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: #777;
    }

    .btn {
      width: 100%;
      padding: 12px;
      background: #004d7a;
      color: #fff;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.3s;
    }

    .btn:hover {
      background: #003458;
    }

    .links {
      text-align: center;
    }

    .links p {
      margin-bottom: 5px;
      color: #555;
    }

    .links button {
      background: none;
      border: none;
      color: #004d7a;
      font-weight: bold;
      cursor: pointer;
      font-size: 14px;
    }

    @media screen and (max-width: 480px) {
      .container {
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>

  <div class="container" id="signIn">
    <h1 class="form-title">Sign In</h1>
    <form id="loginForm" method="post" action="register.php">
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" id="email" placeholder="Email" required />
        <label for="email">Email</label>
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" id="password" placeholder="Password" required />
        <label for="password">Password</label>
      </div>
      <input type="submit" class="btn" value="Sign In" name="signIn" />
    </form>
    <div class="links">
      <p>Don't have an account yet?</p>
      <button id="signUpButton">Sign Up</button>
    </div>
  </div>

  <div class="container" id="signup" style="display: none">
    <h1 class="form-title">Register</h1>
    <form method="post" action="register.php">
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="fName" id="fName" placeholder="First Name" required />
        <label for="fName">First Name</label>
      </div>
      <div class="input-group">
        <i class="fas fa-user"></i>
        <input type="text" name="lName" id="lName" placeholder="Last Name" required />
        <label for="lName">Last Name</label>
      </div>
      <div class="input-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="email" id="email" placeholder="Email" required />
        <label for="email">Email</label>
      </div>
      <div class="input-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" id="password" placeholder="Password" required />
        <label for="password">Password</label>
      </div>
      <input type="submit" class="btn" value="Sign Up" name="signUp" />
    </form>
    <div class="links">
      <p>Already have an account?</p>
      <button id="signInButton">Sign In</button>
    </div>
  </div>

  <script>
    const signUpButton = document.getElementById("signUpButton");
    const signInButton = document.getElementById("signInButton");
    const signUpForm = document.getElementById("signup");
    const signInForm = document.getElementById("signIn");

    signUpButton.addEventListener("click", () => {
      signInForm.style.display = "none";
      signUpForm.style.display = "block";
    });

    signInButton.addEventListener("click", () => {
      signUpForm.style.display = "none";
      signInForm.style.display = "block";
    });

    // Adding the login success alert
    const loginForm = document.getElementById("loginForm");

    loginForm.addEventListener("submit", function(event) {
      event.preventDefault(); // Prevent form submission

      // Simulate a successful login
      alert("Login Successful!"); // Notification message after successful login
      window.location.href = "admin-dashboard.php";

    });
  </script>

</body>
</html>
