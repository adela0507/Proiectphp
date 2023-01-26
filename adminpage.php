<?php
include ('index.html');
session_start();
header('Location: Vizualizare.php');
?>

<html>
<HEAD>
    <link href="Style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
    <div class="txt-heading">
        <header>
            <div class="txt-heading-label"><h3>Bine ai venit in modul de editare</h3></div> <a
                    id="btnEmpty" href="Vizualizare.php?action=empty">

    </div>
    </header>
    <h1> </h1>
    <a href="Vizualizare.php">Adaugarea unei noi inregistrari</a>

</div>
</BODY>
</html>