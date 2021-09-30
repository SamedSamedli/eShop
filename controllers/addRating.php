<?php
require_once '../utils/config.php';
if (isset($_POST['rating']) && isset($_POST['prodId']) && $_POST['rating'] <= 5 && $_POST['rating'] >= 0) {
    if (strpos($_SESSION['ratedProds'], "/" . $_POST['prodId'] . "/") === false) {
        require_once '../utils/connect.php';
        $sql = "Update Products Set RatingSum = RatingSum + " . $_POST['rating'] . ", RatingCount = RatingCount + 1 Where Id =" . $_POST['prodId'];
        mysqli_query($link, $sql);
        if (empty($_SESSION['ratedProds'])) {
            $_SESSION['ratedProds'] .= "/" . $_POST['prodId'] . "/";
        } else {
            $_SESSION['ratedProds'] .= $_POST['prodId'] . "/";
        }
        echo "Rating added successfully.";
    }
}
?>