


<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projects";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
  die("Failed" . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $email = $conn->real_escape_string($_POST['email']);
  $password = $_POST['password'];

  $sql = "SELECT * FROM signup WHERE email = '$email'";
  $result = $conn->query($sql);

  if($result->num_rows > 0){
    $rows = $result->fetch_assoc();
    if(password_verify($password, $rows['password'])){
      $_SESSION['user_id'] = $rows['id'];
      $_SESSION['email'] = $rows['email'];
      header("location: index.php");
      exit();
    }else{
      $error = "invalid";
    }
  }else{
    $error = "invalid";
  }
}

?>
















<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
    .login-container {
      background: rgba(255, 235, 205, 0.8);
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 6px 20px rgba(90, 62, 43, 0.3);
      width: 100%;
      max-width: 400px;
      text-align: center;
      animation: fadeIn 0.8s ease-in-out;
    }
    .logo {
      font-size: 2rem;
      font-weight: bold;
      color: #5a3e2b;
      margin-bottom: 1rem;
    }
    .login-box h2 {
      margin-bottom: 1rem;
      font-size: 1.8rem;
      color: #5a3e2b;
    }
    .login-box p {
      margin-bottom: 1.5rem;
      color: #3e2c20;
    }
    .input-group {
      margin-bottom: 1.5rem;
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
    .login-btn {
      width: 100%;
      padding: 0.75rem;
      background: #8b5e3b;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s ease-in-out;
    }
    .login-btn:hover {
      background: #5a3e2b;
      transform: scale(1.05);
    }
    .links {
      margin-top: 1.5rem;
      display: flex;
      justify-content: space-between;
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
    /* Error message */
    .error {
      color: red;
      font-size: 0.9rem;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="logo"><i class="fas fa-user-lock"></i></div>
    <div class="login-box">
      <h2>Welcome Back</h2>
      <p>Please login to your account</p>
      
      <!-- Display error message -->
      <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
      <?php endif; ?>

      <form method="POST">
        <div class="input-group">
          <label for="email">Email</label>
          <div class="input-wrapper">
            <i class="fas fa-envelope"></i>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
          </div>
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <div class="input-wrapper">
            <i class="fas fa-lock"></i>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
          </div>
        </div>
        <button type="submit" class="login-btn">Login</button>
      </form>
      <div class="links">
        <a href="#">Forgot Password?</a>
        <a href="signup.php">Create Account</a>
      </div>
    </div>
  </div>
</body>
</html>
