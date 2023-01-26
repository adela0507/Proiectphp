<?php
include("Conectare.php");
$error='';
if (isset($_POST['submit']))
{
    $produs_nume = htmlentities($_POST['produs_nume'], ENT_QUOTES);
    $produs_cantitate = htmlentities($_POST['produs_cantitate'], ENT_QUOTES);
    $produs_pret = htmlentities($_POST['produs_pret'], ENT_QUOTES);
    $produs_categorie = htmlentities($_POST['produs_categorie'], ENT_QUOTES);
    $produs_imagine = htmlentities($_POST['produs_imagine'], ENT_QUOTES);
    $produs_descriere = htmlentities($_POST['produs_descriere'], ENT_QUOTES);
    $produs_descrierecompleta = htmlentities($_POST['produs_descrierecompleta'], ENT_QUOTES);
    $produs_stare = htmlentities($_POST['produs_stare'], ENT_QUOTES);
    $produs_oferta = htmlentities($_POST['produs_oferta'], ENT_QUOTES);

    if ($produs_nume == '' || $produs_cantitate == ''||$produs_pret==''||$produs_categorie==''||$produs_descriere==''||$produs_descrierecompleta==''||$produs_stare==''||$produs_oferta=='')
    {
        $error = 'ERROR: Campuri goale!';
    } else {
        if ($stmt = $mysqli->prepare("INSERT into produs (produs_nume, produs_cantitate, produs_pret, produs_categorie, produs_imagine, produs_descriere,
produs_descrierecompleta, produs_stare, produs_oferta) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"))
        {
            $stmt->bind_param("sssssssss", $produs_nume, $produs_cantitate,$produs_pret,$produs_categorie,$produs_imagine,$produs_descriere,$produs_descrierecompleta,$produs_stare,$produs_oferta);
            $stmt->execute();
            $stmt->close();
        }
        else
        {
            echo "ERROR: Nu se poate executa insert.";
        }
    }
}
// se inchide conexiune mysqli
$mysqli->close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head> <title><?php echo "Inserare inregistrare"; ?> </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head> <body>
<h1><?php echo "Inserare inregistrare"; ?></h1>
<?php if ($error != '') {
    echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error."</div>";} ?>
<form action="" method="post">
    <div>
        <strong>Nume: </strong> <input type="text" name="produs_nume" value=""/><br/>
        <strong>Cantitate: </strong> <input type="text" name="produs_cantitate" value=""/><br/>
        <strong>Pret: </strong> <input type="text" name="produs_pret" value=""/><br/>
        <strong>Categorie: </strong> <input type="text" name="produs_categorie" value=""/><br/>
        <strong>Imagine: </strong> <input type="text" name="produs_imagine" value=""/><br/>
        <strong>Descriere: </strong> <input type="text" name="produs_descriere" value=""/><br/>
        <strong>Descriere completa: </strong> <input type="text" name="produs_descrierecompleta" value=""/><br/>
        <strong>Stare: </strong> <input type="text" name="produs_stare" value=""/><br/>
        <strong>Oferta: </strong> <input type="text" name="produs_oferta" value=""/><br/>

        <br/>
        <input type="submit" name="submit" value="Submit" />
        <a href="Vizualizare.php">Index</a>
    </div></form></body></html>