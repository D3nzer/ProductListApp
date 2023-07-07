<?php
if (isset($_POST["mass_delete"])) {
    $skus = $_POST["delete"];
    $productList->deleteProducts($skus);

    echo "<script> window.location.href='';</script>";
    exit;
}
