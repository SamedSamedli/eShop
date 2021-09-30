<?php    
    require_once '../utils/config.php';

    if(isset ($_POST['prodId'])){
        if(empty($_SESSION['cart'])){
            $_SESSION['cart'].="/".$_POST['prodId']."/";
            echo "Item added to cart.";
        }
        else if(strpos($_SESSION['cart'],"/".$_POST['prodId']."/")===false){
            $_SESSION['cart'].=$_POST['prodId']."/";
            echo "Item added to cart.";
        }
        else{
            echo "Item is already in the cart";
        }
    }
?>