<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Add a New Product</h1>
    <form action="insertproduct.php" method="post">
	
	<label for="productid">productid:</label>
        <input type="text" id="productid" name="productid" required><br><br>
		
        <label for="productname">productname:</label>
        <input type="text" id="productname" name="productname" required><br><br>

        <label for="description">description:</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="price">price:</label>
        <input type="number" id="price" name="price" required><br><br>

        <label for="categoryid">categoryid:</label>
        <select id="categoryid" name="categoryid" required>
            
            <!-- Add more options as needed -->
        </select><br><br>

        <label for="imageurl">imageurl:</label>
        <input type="text" id="imageurl" name="imageurl" required><br><br>

        <input type="submit" value="Add Product">
    </form>
</body>
</html>