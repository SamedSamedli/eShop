<?php include('layout/Header.php'); ?>

<section id="products">
    <div class="container">
        <h2 class="mb-4">Products</h2>
        <div class="row">
            <?php
            require_once 'utils/connect.php';
            $sql = "SELECT * FROM Products";
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="col-6 col-md-3">';
                echo '<div class="product-item">';
                if (strpos($_SESSION['ratedProds'], "/" . $row['Id'] . "/") === false) {
                    echo '<div class="rating" data-id="' . $row['Id'] . '"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>';
                }
                echo '<img src="assets/img/products/' . $row['Image'] . '">';
                echo '<div class="product-item-inner">';
                echo '<h4>' . $row['Name'] . '</h4>';
                echo '<p>Price: ' . $row['UnitPrice'] . '$ per ' . (($row['UnitType'] == 1) ? 'item' : 'kg') . '</p>';
                if ($row['RatingCount'] != 0) {
                    echo '<p>Rating: ' . round($row['RatingSum'] / $row['RatingCount'], 1) . '</p>';
                } else {
                    echo '<p>No Rating</p>';
                }
                if (strpos($_SESSION['cart'], "/" . $row['Id'] . "/")!==false) {
                    echo '<span" class="btn btn-warning disabled">In the cart</span>';
                } else {
                    echo '<span" data-id="' . $row['Id'] . '" class="btn btn-warning add-to-cart-btn">Add to cart</span>';
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>

<?php include('layout/Footer.php'); ?>