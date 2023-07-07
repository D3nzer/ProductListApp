<!DOCTYPE html>
<html>

<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form id="product_form" method="post">
        <div class='headline'>
            <h2>Add Product</h2>
        </div>
        <div class='xx'>
            <div class="headline2">
                <button type="submit">Save</button>
            </div>
            <div class="headline3">
                <button type="button" onclick="window.location.href='index.php'">Cancel</button>
            </div>
        </div>
        <div class='main'>
            <hr />
            <div class='paddInp'>
                <label for="sku">SKU:</label>
                <input type="text" id="sku" name="sku" required>
            </div>
            <div class='paddInp'>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class='paddInp'>
                <label for="price">Price ($):</label>
                <input type="number" step="0.01" id="price" name="price" required>
            </div>
            <div class='paddInp'>
                <label for="productType">Product Type:</label>
                <select id="productType" name="productType" required>
                    <option value="">Select a type</option>
                    <option value="DVD">DVD</option>
                    <option value="Book">Book</option>
                    <option value="Furniture">Furniture</option>
                </select>
            </div>
            <div id="productAttribute">
            </div>
        </div>
    </form>
    <?php
    include('script_addproduct.php');
    ?>
    <script>
        // Define product attribute fields
        const sizeField = `<div><label for="size">Size (MB):</label><input type="number" id="size" name="size" required><p>Please, provide size</p></div>`;
        const weightField = `<div><label for="weight">Weight (Kg):</label><input type="number" id="weight" name="weight" required><p>Please, provide weight</p></div>`;
        const dimensionsFields = `<div class='paddInp'>
                                    <label for="height">Height (CM):</label>
                                    <input type="number" id="height" name="height" required>
                                </div>
                                <div class='paddInp'>
                                    <label for="width">Width (CM):</label>
                                    <input type="number" id="width" name="width" required>
                                </div>
                                <div class='paddInp'>
                                    <label for="length">Length (CM):</label>
                                    <input type="number" id="length" name="length" required>
                                    <p>Please, provide dimensions</p>
                                </div>`;

        // Handle product type switcher
        const productType = document.querySelector('#productType');
        const productAttribute = document.querySelector('#productAttribute');
        productType.addEventListener('change', function() {
            const type = this.value;
            switch (type) {
                case 'DVD':
                    productAttribute.innerHTML = sizeField;
                    break;
                case 'Book':
                    productAttribute.innerHTML = weightField;
                    break;
                case 'Furniture':
                    productAttribute.innerHTML = dimensionsFields;
                    break;
                default:
                    productAttribute.innerHTML = '';
                    break;
            }
        });
    </script>
    <div class="footer">
        <hr />
        <p id="footerP">Kamil Kotkowski</p>
    </div>
</body>

</html>