<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'id20567262_kamil');
define('DB_PASS', '4Zob$/EfTU7JsB_g');
define('DB_NAME', 'id20567262_juniortest');

class Product
{
    private $sku;
    private $name;
    private $price;
    private $productType;
    private $value;

    public function __construct($sku, $name, $price, $productType, $value)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->productType = $productType;
        $this->value = $value;
    }

    public function save()
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM products WHERE sku = '{$this->sku}'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "Product with the same SKU already exists.";
            return;
        }

        $sql = "INSERT INTO products (sku, name, price, type, value) 
                VALUES ('{$this->sku}', '{$this->name}', '{$this->price}', '{$this->productType}', '{$this->value}')";
        if ($conn->query($sql) === TRUE) {
            echo "Product added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


        $conn->close();
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['productType'];

    switch ($type) {
        case 'DVD':
            $sizeDvd = trim($_POST['size']);
            $value = "Size: {$sizeDvd} MB";
            break;
        case 'Book':
            $weight = trim($_POST['weight']);
            $value = "Weight: {$weight} Kg";
            break;
        case 'Furniture':
            $height = trim($_POST['height']);
            $width = trim($_POST['width']);
            $length = trim($_POST['length']);
            $value = "Dimensions: {$height} x {$width} x {$length}";
            break;
        default:
            echo "Please, provide the data of indicated type";
            exit;
    }

    $product = new Product($sku, $name, $price, $type, $value);
    $product->save();
    echo "<script> window.location.href='index.php';</script>";
    exit;
}
