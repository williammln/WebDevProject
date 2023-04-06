<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $email = $_POST["email"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $age = $_POST["age"];
  $password = $_POST["password"];

  // Validate form data
  if (empty($email) || empty($fname) || empty($lname) || empty($age) || empty($password)) {
    echo "Please fill out all fields";
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

  // Check if user already exists
  $sql = "SELECT * FROM users WHERE Email='$email'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo "User already exists";
    exit;
  }

  // CHANGED: Hash the password before storing it in the database
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Insert user data into database
  $sql = "INSERT INTO users (Email, FName, LName, Age, Password)
          VALUES ('$email', '$fname', '$lname', '$age', '$hashed_password')";

  if ($conn->query($sql) === TRUE) {
    echo "Registration successful";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="register.css">
  </head>
  <body>
    <h1>Registration Form</h1>
    <div class="container">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required>

        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Submit">
      </form>
      <div class="button-container">
        <a href="login.php" class="login-button">Login</a>
      </div>
    </div>
  </body>
</html>

