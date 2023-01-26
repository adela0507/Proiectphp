<?php
require_once "ShoppingCart.php";?>
<HTML lang="">
<HEAD>
    <TITLE>Creare cos cumparaturi </TITLE>
    <link href="Mystyle.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="product-grid">

    <div class="txt-heading"><div class="txt-headinglabel"><header><h1>Products</h1></header></div></div>
</div>
<div class="grid-container">
    <?php
    $shoppingCart = new ShoppingCart();
    $query = "SELECT * FROM produs";
    $product_array = $shoppingCart->getAllProduct($query);
    if (! empty($product_array)) {
        foreach ($product_array as $key => $value) {
            ?>

           <div class="product-item">
                <table>
                <form method="post" action="cos.php?action=add&code=<?php
                echo $product_array[$key]["produs_nume"]; ?>">
                        <img  src="<?php echo $product_array[$key]["produs_imagine"]; ?>">
                    </div>
                    <div>
                        <strong><?php echo "$".$product_array[$key]["produs_pret"];
                            ?></strong>
                    </div>
                    <div class="product-price"><?php echo
                            $product_array[$key]["produs_descrierecompleta"]; ?></div>

                    <div>
                        <input type="text" name="quantity" value="1" size="2" />
                        <br> <br>
                        <input type="submit" value="Add to cart"
                               class="btnAddAction" />
                    </div>
    <br>

                </form>
        </section>
                </table>
            </div>
            <?php
        }
    }
    ?>
</div>
<section>
    <footer>
        Date de contact:<a href="mailto:adelamiclea709@yahoo.com" class="decorare" target="_blank">CONTACT</a>
    </footer>
</BODY>
</HTML>