<?php
require_once "DBController.php";
class ShoppingCart extends DBController
{
    function getAllProduct()
    {
        $query = "SELECT * FROM produs";

        $productResult = $this->getDBResult($query);
        return $productResult;
    }
    function getMemberCartItem($client_id)
    {
        $query = "SELECT produs.*, tbl_cart.id as
cart_id,tbl_cart.quantity FROM produs, tbl_cart WHERE
 produs.id = tbl_cart.product_id AND tbl_cart.client_id = ?";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $client_id
            )
        );
        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }
    function getProductByCode($product_code)
    {
        $query = "SELECT * FROM produs WHERE produs_nume=?";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $product_code
            )
        );

        $productResult = $this->getDBResult($query, $params);
        return $productResult;
    }
    function getCartItemByProduct($product_id, $client_id)
    {
        $query = "SELECT * FROM tbl_cart WHERE product_id = ? AND client_id = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $client_id
            )
        );
        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }
    function addToCart($product_id, $quantity, $client_id)
    {
        $query = "INSERT INTO tbl_cart (product_id,quantity,client_id)
VALUES (?, ?, ?)";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $client_id
            )
        );

        $this->updateDB($query, $params);
    }
    function updateCartQuantity($quantity, $cart_id)
    {
        $query = "UPDATE tbl_cart SET quantity = ? WHERE id= ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );


        $this->updateDB($query, $params);
    }
    function deleteCartItem($cart_id)
    {
        $query = "DELETE FROM tbl_cart WHERE id = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );

        $this->updateDB($query, $params);
    }
    function emptyCart($client_id)
    {
        $query = "DELETE FROM tbl_cart WHERE client_id = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $client_id
            )
        );

        $this->updateDB($query, $params);
    }
}

