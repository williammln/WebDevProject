<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate form data
    if (empty($email) || empty($password)) {
        echo "Please enter email and password";
        exit;
    }

    // Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fitverse_db";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // CHANGED: Use prepared statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT Password FROM users WHERE Email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists and password is correct
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // CHANGED: Verify the password using password_verify
        if (password_verify($password, $row['Password'])) {
            // Login successful, set session variable
            $_SESSION["email"] = $email;
            header("Location: Home.php");
            exit;
        }
    }

    echo "Invalid login credentials";
    $conn->close();
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <script>
      function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        if (passwordInput.type === "password") {
          passwordInput.type = "text";
        } else {
          passwordInput.type = "password";
        }
      }
    </script>
  </head>
  <body>
    <h1>Login Form</h1>
    <div class="container">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="checkbox" onclick="togglePasswordVisibility()"> Show password

        <input type="submit" value="Login">
      </form>
      <div class="button-container">
        <a href="index.php" class="register-button">Register</a>
      </div>
    </div>
  </body>
</html>




