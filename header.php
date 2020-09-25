<header>
    <h1><a href="index.php">Authentication</a></h1>

    <input type="checkbox" id="check">
    <label class="menu-icon" for="check">
        <span class="open">=</span>
        <span class="close">&times;</span>
    </label>
    <nav class="side-bar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="page1.php">Page 1</a></li>
            <li><a href="page2.php">Page 2</a></li>
            <li><a href="page3.php">Page 3</a></li>
            <li><a href="login.php">
                    <?php echo (isset($_SESSION['user'])) ? "Logout" : "Login"; ?>
                </a></li>
        </ul>
    </nav>
</header>