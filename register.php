<?php require 'function.php'; require 'connection.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="container">
    <div class="box">
      <h1>Register</h1>
      <?php
      if (isset($_POST['submit'])) 
      {
        $uname = $_POST['user-name'];
        $upswd = $_POST['user-pswd'];
        $uemail = $_POST['user-email'];
        if (empty($uname) || empty($upswd) || empty($uemail)) {
          echo "<div class='alert danger'>All Input Feilds are Required</div>";
        }
        else if (strlen($uname) < 6 || strlen($upswd) < 6 || strcmp($upswd, $_POST['user-pswd2']));
        else if(mysqli_num_rows(mysqli_query($connection,"Select * from user where uname='{$uname}' OR upswd='{$uemail}';"))){
          echo "<div class='alert danger'>Username or Email Allready Registered</div>";
        }
        else {
          // Register
          $query = "Insert into user Values('{$uname}','{$upswd}','{$uemail}')";
          mysqli_query($connection, $query);
          mysqli_close($connection);
          // echo "<div class='alert success'>Register Successfully</div>";
          session_start();
          $_SESSION['user'] = $_POST['user-name'];
          header("Location: index.php");
        }
      }
      ?>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <div class="form-group">
          <div class="input-box">
            <input type="text" name="user-name" required>
            <label>User Name</label>
          </div>
          <?php if (isset($_POST['submit']) && strlen($uname) < 6)
            echo "<small>Username must be Atleast 6 character.</small>"; ?>
        </div>

        <div class="form-group">
          <div class="input-box">
            <input type="email" name="user-email" required>
            <label>Email</label>
          </div>
        </div>

        <div class="form-group">
          <div class="input-box">
            <input type="password" name="user-pswd" required>
            <label>Password</label>
          </div>
          <?php if (isset($_POST['submit']) && strlen($upswd) < 6)
            echo "<small>Password must be Atleast 6 character.</small>"; ?>
        </div>

        <div class="form-group">
          <div class="input-box">
            <input type="password" name="user-pswd2" required>
            <label>Confirm Password</label>
          </div>
          <?php if (isset($_POST['submit']) && strcmp($upswd, $_POST['user-pswd2']))
            echo "<small>Password doesn't Match.</small>"; ?>
        </div>

        <input class="btn log-btn" type="submit" name="submit" value="Register">
        <div class="footer">
          <p>All Ready a User? <a href="login.php">Sign In</a></p>
        </div>
      </form>
    </div>
  </div>

</body>

</html>