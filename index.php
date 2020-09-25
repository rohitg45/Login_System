<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <?php
        if (isset($_SESSION['user'])) {
            echo "<h1>Welcome " . $_SESSION['user'] . "</h1>";
        }
        ?>
        <h1>Home</h1>
        <p>This is a Home Page.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, ut dicta! Rerum labore alias et sapiente minus quia dicta officiis accusamus porro. Voluptates, sed accusantium cum nostrum iusto quidem cupiditate provident animi molestiae vitae, saepe tenetur illum ratione inventore est alias! Rem nesciunt voluptates quis in, odio totam impedit! Laborum.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia nemo, assumenda, dolores harum aperiam modi aut blanditiis ipsa molestiae obcaecati ducimus illo maxime expedita sint quaerat aliquam, quos sunt eligendi.</p>
    </div>
</body>

</html>