<?php
include('layout/Header.php');
$cart = $_SESSION['cart'];
$cart = substr($cart, 1);
$cart = substr($cart, 0, -1);
$items = explode("/", $cart);
?>

<section id="cart">
    <div class="container">
        <?php
        if (!empty($_SESSION['cart'])) {
            foreach ($items as $item) {
                require_once 'utils/connect.php';
                $sql = "SELECT * FROM Products Where Id=" . $item;
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_array($result);

                echo '<div class="cart-item">';
                echo '<div class="row align-items-center">';
                echo '<div class="col-md-1">';
                echo '<img src="assets/img/products/' . $row['Image'] . '" class="w-100 rounded">';
                echo '</div>';
                echo '<div class="col-md-8 name">';
                echo $row["Name"];
                echo '</div>';
                echo '<div class="col-md-1">';
                echo '<input type="number" min="1" class="form-control" value="1">';
                echo '<span class="quantity">x ' . (($row['UnitType'] == 1) ? 'item' : 'kg') . '</span>';
                echo '</div>';
                echo '<div class="col-md-2 price">';
                echo '<span>' . $row['UnitPrice'] . '</span> $';
                echo '</div>';
                echo '</div>';
                echo '<span data-id="' . $row['Id'] . '" class="remove">×</span>';
                echo '</div>';
            }
        } else {
            echo '<h2 class="text-center">Cart is empty.</h2>';
        }
        ?>
    </div>
</section>
<section class="mb-5">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-4">
                <select class="form-control shipping">
                    <option>Select Shipping Option</option>
                    <option value="0">Pick up - 0$</option>
                    <option value="4">UPS - 4$</option>
                </select>
                <hr>
                <p class="total-price">
                    Total:
                    <span class="price text-success"></span>
                </p>
                <div class="pay-btn">
                    <button class="btn btn-warning">Pay now!</button>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include('layout/Footer.php'); ?>