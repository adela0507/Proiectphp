<?php
include("Conectare.php");
$error='';
if (!empty($_POST['id']))
{ if (isset($_POST['submit']))
{
    if (is_numeric($_POST['id']))
    {
        $id=$_POST['id'];
        $produs_nume = htmlentities($_POST['produs_nume'], ENT_QUOTES);
        $produs_cantitate= htmlentities($_POST['produs_cantitate'], ENT_QUOTES);
        $produs_pret = htmlentities($_POST['produs_pret'], ENT_QUOTES);
        $produs_categorie = htmlentities($_POST['produs_imagine'], ENT_QUOTES);
        $produs_imagine = htmlentities($_POST['produs_imagine'], ENT_QUOTES);
        $produs_descriere = htmlentities($_POST['produs_descriere'], ENT_QUOTES);
        $produs_descrierecompleta = htmlentities($_POST['produs_descrierecompleta'], ENT_QUOTES);
        $produs_stare= htmlentities($_POST['produs_stare'], ENT_QUOTES);
        $produs_oferta = htmlentities($_POST['produs_oferta'], ENT_QUOTES);
        if ($produs_nume == ''||$produs_cantitate==''||$produs_pret==''||$produs_categorie==''||$produs_imagine==''||$produs_descriere==''||$produs_descrierecompleta==''||$produs_stare==''||$produs_oferta=='')
        {
            echo "<div> ERROR: Completati campurile obligatorii!</div>";
        }else
        {
            if ($stmt = $mysqli->prepare("UPDATE produs SET
                produs_nume=?, produs_cantitate=?, produs_pret=?, produs_categorie=?, produs_imagine=?, produs_descriere=?, produs_descrierecompleta=?, produs_stare=?, produs_oferta=? WHERE id='" . $id . "'"))
            {
                $stmt->bind_param("sssssssss", $produs_nume, $produs_cantitate, $produs_pret,$produs_categorie,$produs_imagine ,
                    $produs_descriere, $produs_descrierecompleta,$produs_stare, $produs_oferta);
                $stmt->execute();
                $stmt->close();
            }
            else
            {echo "ERROR: nu se poate executa update.";}
        }
    }
    else
    {echo "id incorect!";} }}?>
<html> <head><title> <?php if ($_GET['id'] != '') { echo "Modificare inregistrare"; }?> </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf8"/></head>
<body>
<h1><?php if ($_GET['id'] != '') { echo "Modificare Inregistrare"; }?></h1>
<?php if ($error != '') {
    echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error."</div>";} ?>
<form action="" method="post">
    <div>
        <?php if ($_GET['id'] != '') { ?>
        <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
        <p>ID: <?php echo $_GET['id'];
            if ($result = $mysqli->query("SELECT * FROM produs where id='".$_GET['id']."'"))
            {
            if ($result->num_rows > 0)
            { $row = $result->fetch_object();?></p>
        <strong>Nume: </strong> <input type="text" name="produs_nume" value="<?php echo$row->produs_nume;
        ?>"/><br/>
        <strong>Cantitate: </strong> <input type="text" name="produs_cantitate" value="<?php echo$row->produs_cantitate;
        ?>"/><br/>
        <strong>Pret: </strong> <input type="text" name="produs_pret" value="<?php echo$row->produs_pret; ?>"/><br/>
        <strong>Categorie: </strong> <input type="text" name="produs_categorie" value="<?php echo $row->produs_categorie;?>"/><br/>
        <strong>Imagine: </strong> <input type="text" name="produs_imagine" value="<?php echo $row->produs_imagine; ?>"/><br/>
        <strong>Descriere: </strong> <input type="text" name="produs_descriere" value="<?php echo$row-> produs_descriere; ?>"/><br/>
        <strong>Descriere completa: </strong> <input type="text" name="produs_descrierecompleta" value="<?php echo$row-> produs_descrierecompleta; ?>"/><br/>
        <strong>Stare: </strong> <input type="text" name="produs_stare" value="<?php echo$row-> produs_stare; ?>"/><br/>
        <strong>Oferta </strong> <input type="text" name="produs_oferta" value="<?php echo$row-> produs_oferta; }}}?>"/><br/>

        <br/>
        <input type="submit" name="submit" value="Submit" />
        <a href="Vizualizare.php">Index</a>
    </div></form></body> </html>