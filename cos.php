<?php
require_once "ShoppingCart.php";
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
}
$member_id=$_SESSION['loggedin'];
$shoppingCart = new ShoppingCart();
if (! empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (! empty($_POST["quantity"])) {

                $productResult = $shoppingCart->getProductByCode($_GET["code"]);

                $cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["id"], $member_id);


                if (! empty($cartResult)) {
                    $newQuantity = $cartResult[0]["quantity"] +
                        $_POST["quantity"];
                    $shoppingCart->updateCartQuantity($newQuantity,$cartResult[0]["id"]);
                } else {
                    $shoppingCart->addToCart($productResult[0]["id"],
                        $_POST["quantity"], $member_id);
                }
            }
            break;
        case "remove":
            $shoppingCart->deleteCartItem($_GET["id"]);
            break;
        case "empty":
            $shoppingCart->emptyCart($member_id);
            break;
    }
}
?>
<HTML lang="">
<HEAD>
    <TITLE>creare cos permament in PHP</TITLE>
    <link href="Mystyle.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
    <div class="txt-heading">
        <header>
            <div class="txt-heading-label"><h3>Cos Cumparaturi</h3></div> <a
            id="btnEmpty" href="cos.php?action=empty"><img class="img1" src="product-images/empty-cart.png"
                                                           alt="empty-cart" title="Empty Cart" /></a>
    </div>
    </header>
    <?php
    $cartItem = $shoppingCart->getMemberCartItem($member_id);
    if (! empty($cartItem)) {
        $item_total = 0;
        ?>
        <table cellpadding="10" cellspacing="1">
            <tbody>
            <tr>
                <th style="text-align: left;"><strong>Nume</strong></th>
                <th style="text-align: left;"><strong>Imagine</strong></th>
                <th style="text-align:
right;"><strong>Pret</strong></th>
                <th style="text-align:
right;"><strong>Cantitate</strong></th>
                <th style="text-align:
center;"><strong>Descriere</strong></th>
            </tr>
            <?php
            foreach ($cartItem as $item) {
                ?>
                <tr>
                    <td
                        style="text-align: left; border-bottom: #F0F0F0 1px
solid;"><strong><?php echo $item["produs_nume"]; ?></strong></td>
                    <td
                        style="text-align: left; border-bottom: #F0F0F0 1px
solid;"><?php echo $item["produs_imagine"]; ?></td>
                    <td
                        style="text-align: right; border-bottom: #F0F0F0 1px
solid;"><?php echo "$".$item["produs_pret"]; ?></td>
                    <td
                        style="text-align: right; border-bottom: #F0F0F0 1px
solid;"><?php echo $item["quantity"]; ?></td>
                    <td
                            style="text-align: right; border-bottom: #F0F0F0 1px
solid;"><?php echo $item["produs_descriere"]; ?></td>
                    <td
                        style="text-align: center; border-bottom: #F0F0F0 1px
solid;"><a
                            href="cos.php?action=remove&id=<?php echo
                            $item["cart_id"]; ?>
            class="btnRemoveAction"><img class="img2" src="product-images/icon-delete.png"
                                         alt="icon-delete" title="Remove Item" /></a></td>
                </tr>
                <?php
                $item_total += ($item["produs_pret"] * $item["quantity"]);
            }
            ?>
            <tr>
                <td colspan="3"
                    align=right><strong>Total:</strong></td>
                <td align=right><?php echo "$".$item_total; ?></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    <br> <br>
    <form action="starecomanda.php"  method="post">
        <input type="submit" value="Trimite comanda"/>
    </form>
        <?php
    }
    ?>
</div>


<?php //require_once "product-list.php"; ?>
        <nav>
            <li> <div><a href="magazin.php" class="decorare"><h5>Alegeti alt produs</h5></a></div></li>
            <li> <div><a href="logout.php" class="decorare"><h5>Abandonati sesiunea de cumparare</h5></a></div></li>
            <li><div><a href="starecomanda.php" class="decorare"><h5>Stare comanda</h5></a></div></li>
        </nav>

</BODY>
</HTML>
