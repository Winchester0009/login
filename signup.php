<?php
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "projects"; // Change to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$success = false;
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirmPassword = $conn->real_escape_string($_POST['confirmPassword']);

    // Check if passwords match
    if ($password !== $confirmPassword) {
        die("Error: Passwords do not match!");
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert data into the database
    $sql = "INSERT INTO signup (first_name, last_name, phone, email, password) 
            VALUES ('$firstName', '$lastName', '$phone', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        $success = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account</title>
  <link rel="stylesheet" href="https://kit.fontawesome.com/a076d05399.css" crossorigin="anonymous">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      background-image: url(bglogin.jpg);
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #5a3e2b;
    }

    .create-account-container {
      background: rgba(255, 235, 205, 0.8);
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(90, 62, 43, 0.3);
      width: 100%;
      max-width: 500px;
      text-align: center;
    }

    .logo {
      font-size: 2rem;
      font-weight: bold;
      color: #5a3e2b;
      margin-bottom: 1rem;
    }

    .create-box h2 {
      margin-bottom: 1rem;
      font-size: 1.8rem;
      color: #5a3e2b;
    }

    .create-box p {
      margin-bottom: 1.5rem;
      color: #3e2c20;
    }

    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
    }

    .input-group {
      text-align: left;
      position: relative;
    }

    .input-group label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: bold;
      color: #3e2c20;
    }

    .input-group .input-wrapper {
      display: flex;
      align-items: center;
      border: 1px solid #a67c52;
      border-radius: 5px;
      padding: 0.75rem;
      background: #f5e1c8;
    }

    .input-group .input-wrapper i {
      color: #8b5e3b;
      font-size: 1rem;
      margin-right: 10px;
    }

    .input-group input {
      width: 100%;
      border: none;
      font-size: 1rem;
      outline: none;
      background: transparent;
      color: #3e2c20;
    }

    .create-btn {
      width: 100%;
      padding: 0.75rem;
      background: #8b5e3b;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s ease-in-out;
      margin-top: 1rem;
    }

    .create-btn:hover {
      background: #5a3e2b;
      transform: scale(1.05);
    }

    .links {
      margin-top: 1.5rem;
      display: flex;
      justify-content: center;
    }

    .links a {
      color: #8b5e3b;
      text-decoration: none;
      font-size: 0.9rem;
      transition: color 0.3s ease;
    }

    .links a:hover {
      color: #5a3e2b;
    }
    .create-account-container {
      background: rgba(255, 235, 205, 0.8);
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(90, 62, 43, 0.3);
      max-width: 500px;
      text-align: center;
    }
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.4);
    }
    .modal-content {
      background-color: #fff;
      margin: 15% auto;
      padding: 20px;
      border-radius: 10px;
      width: 300px;
      text-align: center;
    }
    .close-btn {
      background-color: #8b5e3b;
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 5px;
    }
    .close-btn:hover {
      background-color: #5a3e2b;
    }
  </style>
</head>
<body>
  <div class="create-account-container">
    <div class="logo"><i class="fas fa-user-plus"></i></div>
    <div class="create-box">
      <h2>Create an Account</h2>
      <p>Fill in the details to create your account</p>
      <form action="signup.php" method="POST">
        <div class="form-grid">
          <div class="input-group">
            <label for="firstName">First Name</label>
            <div class="input-wrapper">
              <i class="fas fa-user"></i>
              <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
            </div>
          </div>
          <div class="input-group">
            <label for="lastName">Last Name</label>
            <div class="input-wrapper">
              <i class="fas fa-user"></i>
              <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
            </div>
          </div>
          <div class="input-group">
            <label for="phone">Phone Number</label>
            <div class="input-wrapper">
              <i class="fas fa-phone"></i>
              <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
            </div>
          </div>
          <div class="input-group">
            <label for="email">Email</label>
            <div class="input-wrapper">
              <i class="fas fa-envelope"></i>
              <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
          </div>
          <div class="input-group">
            <label for="password">Password</label>
            <div class="input-wrapper">
              <i class="fas fa-lock"></i>
              <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
          </div>
          <div class="input-group">
            <label for="confirmPassword">Confirm Password</label>
            <div class="input-wrapper">
              <i class="fas fa-lock"></i>
              <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
            </div>
          </div>
        </div>
        <button type="submit" class="create-btn">Create Account</button>
      </form>
      <div class="links">
      <?php if ($success): ?>
  <div id="successModal" class="modal" style="display:block;">
    <div class="modal-content">
      <p>Account created successfully!</p>
      <button class="close-btn" onclick="window.location.href='login.php';">Go to Login</button>
    </div>
  </div>
  <?php endif; ?>
        <a href="login.php">Already have an account?</a>
      </div>
    </div>
  </div>
</body>
</html>
