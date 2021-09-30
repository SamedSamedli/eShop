<?php    
    require_once '../utils/config.php';

    if(isset ($_POST['amount'])){
        if ($_SESSION['balance']>$_POST['amount']) {
            $prevBalance = $_SESSION['balance'];
            $_SESSION['balance'] = $_SESSION['balance'] - $_POST['amount'];
            $_SESSION['cart'] = null;
            echo "Payment successful. \nPrevious balance: ".$prevBalance." \nPurchase amount: ".$_POST['amount']." \nRemaining balance: ".$_SESSION['balance'];
        }
        else{
            echo "Insufficient funds.";
        }
    }
?>