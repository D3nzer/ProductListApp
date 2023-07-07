<!DOCTYPE html>
<html>

<head>
    <title>Product List</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="headline">
        <h2>Product List</h2>
    </div>
    <div class='xx'>
        <div class="headline2">
            <form action='addproduct.php'>
                <button type='submit' name="next">ADD</button>
            </form>
        </div>
        <div class="headline3">
            <form method='post'>
                <button type='submit' id='delete-product-btn' name='mass_delete'>MASS DELETE</button>
        </div>
    </div>
    <div class="main">
        <hr />
        <?php include('script.php');
        include('delete.php');
        ?>
        <script>
            // Get a reference to the button element
            const button = document.getElementById('reload-button');

            // Add a click event listener to the button
            button.addEventListener('click', () => {
                // Call the location.reload() method to reload the page from the server
                location.reload();
            });
        </script>
        <div class="footer">
            <hr />
            <p id="footerP">Scandiweb Test assignment</p>
        </div>
    </div>

</body>

</html>