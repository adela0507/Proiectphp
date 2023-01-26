<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Vizualizare Inregistrari</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<br>
<h1>Inregistrarile din tabela produs</h1>
<p><b>Toate inregistrarile din produs</b</p>
</br>
<?php
include("Conectare.php");

if ($result = $mysqli->query("SELECT * FROM produs ORDER BY id "))
{    if ($result->num_rows > 0)
    {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>ID</th><th>Nume Produs</th><th>Cantitate</th><th>Pret</th><th>Categorie</th><th>Imagine</th><th>Descriere</th><th>Descriere completa</th><th>Stare</th><th>Oferta</th><th></th><th></th>";
        while ($row = $result->fetch_object())
        {
// definirea unei linii pt fiecare inregistrare
            echo "<tr>";
            echo "<td>" . $row->id . "</td>";
            echo "<td>" . $row->produs_nume . "</td>";
            echo "<td>" . $row->produs_cantitate . "</td>";
            echo "<td>" . $row->produs_pret . "</td>";
            echo "<td>" . $row->produs_categorie . "</td>";
            echo "<td>" . $row->produs_imagine . "</td>";
            echo "<td>" . $row->produs_descriere . "</td>";
            echo "<td>" . $row->produs_descrierecompleta . "</td>";
            echo "<td>" . $row->produs_stare . "</td>";
            echo "<td>" . $row->produs_oferta . "</td>";

            echo "<td><a href='Modificare.php?id=" . $row->id . "'>Modificare</a></td>";
            echo "<td><a href='Stergere.php?id=" .$row->id . "'>Stergere</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "Nu sunt inregistrari in tabela!";
    }
}
else
{ echo "Error: " . $mysqli->error; }
// se inchide
$mysqli->close();
?>
<a href="Inserare.php">Adaugarea unei noi inregistrari</a>
</body>
</html>