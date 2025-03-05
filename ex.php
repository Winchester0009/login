<?php

session_start();
$servername = "localhost";
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "projects"; // Your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password']; 

    // Sanitize input
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to check email
    $sql = "SELECT * FROM signup WHERE email = '$email' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // *Fix: Direct password comparison (since it's stored as plain text)*
        if ($password == $row['password']) {
            echo "testtt", $password;
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            //header("Location: home.php");
            exit();
        } else {
            $error_message = "Incorrect password.";
        }
    } else {
        $error_message = "email not found.";
    }
}

$conn->close();
?>
 <!DOCTYPE html>
<html>
<head>
  <title>Authentication Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: linear-gradient(135deg, #667eea, #764ba2);
      margin: 0;
    }
    .container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
      width: 320px;
      text-align: center;
    }
    h2 {
      margin-bottom: 20px;
      color: #333;
    }
    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }
    button {
      width: 100%;
      padding: 12px;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      transition: background 0.3s;
    }
    button:hover {
      background: #0056b3;
    }
    .toggle-link {
      margin-top: 15px;
      font-size: 14px;
      color: #007bff;
      cursor: pointer;
    }
    .toggle-link:hover {
      text-decoration: underline;
    }
    .hidden {
      display: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <div id="loginFormContainer">
      <h2>Login</h2>
      <form id="loginForm" method="POST">
        <input type="text" id="loginUsername" name="username" placeholder="Username" required>
        <input type="password" id="loginPassword" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
      </form>
      <p class="toggle-link" onclick="toggleForms()">Don't have an account? Sign Up</p>
    </div>

    
  </div>
</body>
</html>