<?php    
    require_once '../utils/config.php';

    if(isset ($_POST['prodId'])){
        if(strpos($_SESSION['cart'],"/".$_POST['prodId']."/") !== false){
            $_SESSION['cart'] = str_replace($_POST['prodId']."/", "",$_SESSION['cart']);
            if(substr( $_SESSION['cart'], 0, 2 ) === "//"){
                $_SESSION['cart'] = substr($_SESSION['cart'], 1);
            }
            if ( $_SESSION['cart'] == "/") {
                $_SESSION['cart'] = "";
            }
            echo "Item removed from cart.";
        }
        else{
            echo "Item is not in the cart.";
        }
    }
?>