<?php
if (isset($_POST['submit'])) {
    header("Location: addproduct.php");
    exit();
}
class Product
{
    private $sku;
    private $name;
    private $price;
    private $value;

    public function __construct($sku, $name, $price, $value)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->value = $value;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function toHtml()
    {
        $sku = $this->getSku();
        $name = $this->getName();
        $price = $this->getPrice();
        $value = $this->getValue();

        return "<div class='product'>
                    <input type='checkbox' class='delete-checkbox' name='delete[]' value='$sku'>
                    <br>
                    <p>$sku<br>
                    $name<br>
                    $price $<br>
                    $value</p>
                   
                </div>";
    }
}



class ProductList
{
    private $products;

    public function __construct()
    {
        $servername = "localhost";
        $username = "id20567262_kamil";
        $password = "4Zob$/EfTU7JsB_g";
        $dbname = "id20567262_juniortest";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $this->products = array();
            while ($row = $result->fetch_assoc()) {
                $product = new Product(
                    $row["sku"],
                    $row["name"],
                    $row["price"],
                    $row["value"]
                );
                $this->products[] = $product;
            }
        } else {
            echo "";
        }

        $conn->close();
    }

    public function toHtml()
    {
        $html = "<form method='post'>";
        $conn = new mysqli("localhost", "id20567262_kamil", "4Zob$/EfTU7JsB_g", "id20567262_juniortest");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            foreach ($this->products as $product) {
                $html .= $product->toHtml();
            }
            $html .= "</form>";
            return $html;
        } else
            echo "";
    }
    public function deleteProducts($skus)
    {
        $servername = "localhost";
        $username = "id20567262_kamil";
        $password = "4Zob$/EfTU7JsB_g";
        $dbname = "id20567262_juniortest";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        foreach ($skus as $sku) {
            $sql = "DELETE FROM products WHERE sku='$sku'";
            $conn->query($sql);
        }

        $conn->close();
    }
}

$productList = new ProductList();
echo $productList->toHtml();
