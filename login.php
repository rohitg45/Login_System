<?php
require 'connection.php';
session_start();
// Logout
if (isset($_SESSION['user'])) {
  session_unset();
  session_destroy();
  header("Location: index.php");
}

// Login
if (isset($_POST['submit'])) {
  $uname = $_POST['user-name'];
  $upswd = $_POST['user-pswd'];
  // SQL Query 
  $query = "Select * from user where uname='{$uname}' AND upswd='{$upswd}'";

  $result = mysqli_query($connection, $query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="container">
    <div class="box">
      <h1>Login</h1>
      <?php
      if (isset($_POST['submit'])) {
        if (mysqli_num_rows($result) == 1) {
          $_SESSION['user'] = $_POST['user-name'];
          header("Location: index.php");
        } else
          echo "<div class='alert danger'>Incorrect Username or Password</div>";
      }
      ?>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
          <div class="input-box">
            <input type="text" name="user-name" required>
            <label>User Name</label>
          </div>
          <small>
            <?php if (isset($_POST['submit']) && strlen($_POST['user-name']) < 6)
              echo "Username must be 6 character."; ?>
          </small>
        </div>

        <div class="form-group">
          <div class="input-box">
            <input type="password" name="user-pswd" required>
            <label>Password</label>
          </div>
          <small>
            <?php if (isset($_POST['submit']) && strlen($_POST['user-pswd']) < 6)
              echo "Password must be 6 character."; ?>
          </small>
        </div>

        <input class="btn log-btn" type="submit" name="submit" value="Login">
        <div class="footer">
          <p>Not a User? <a href="register.php">Sign Up</a></p>
        </div>
      </form>
    </div>
  </div>

</body>

</html>