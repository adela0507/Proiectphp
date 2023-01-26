<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bine ati venit!</title>
    <link href="Style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body class="loggedin">
<nav class="navtop">
    <div>
        <header>
        <h1>Magazin Electronice</h1>
        </header>
        <nav>
            <li><a href="starecomanda.php" class="decorare"><i class="fas fa-usercircle"></i>Profile</a></li>
        <li><a href="logout.php" class="decorare"><i class="fas fa-sign-outalt"></i>Logout</a></li>
            <li><a href="magazin.php" class="decorare"><i class="fas fa-sign-outalt"></i>Magazin</a></li>

        </nav>
    </div>
</nav>
<br>
<br>
<div class="content">
    <p>Bine ati revenit, <?= $_SESSION['name'] ?>!</p>
</div>
<footer>
    Date de contact:<a href="mailto:adelamiclea709@yahoo.com" class="decorare" target="_blank">CONTACT</a>

</footer>
</body>
</html>