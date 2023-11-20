<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "dbfurniture");

// Check if 'add_to_cart' form is submitted
if (isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Get the product ID and check if it already exists in the cart
    $id = $_GET['id'];
    $existingIds = array_column($_SESSION['cart'], 'id');

    if (!in_array($id, $existingIds)) {
        // If not, add the product to the cart
        $query = "SELECT * FROM cart WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $item = array(
                'id' => $row['id'],
                'itemname' => $row['itemname'],
                'itemprice' => $row['itemprice'],
                'quantity' => $_POST['quantity']
            );

            $_SESSION['cart'][] = $item;
        }
    }
}

// Remove item from cart if requested
if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['id'])) {
    $idToRemove = $_GET['id'];
    foreach ($_SESSION['cart'] as $key => $cartItem) {
        if ($cartItem['id'] === $idToRemove) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Product Display Section -->
            <div class="col-md-6">
                <h2 class="text-center">Products</h2>
                <div class="row">
                    <!-- Display products from the database -->
                    <?php
                    $query = "SELECT * FROM cart";
                    $result = mysqli_query($conn, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="col-md-4">
                                <form method="post" action="cart.php?id=<?= $row['id'] ?>">
                                    <!-- Display product information -->
                                    <!-- Adjust image URL and other fields accordingly -->
                                    <img src="<?= $row['imageurl'] ?>" style="height: 150px;">
                                    <h5 class="text-center"><?= $row['itemname']; ?></h5>
                                    <h5 class="text-center">₹<?= number_format($row['itemprice'], 2); ?></h5>
                                    <input type="number" name="quantity" value="1" class="form-control">
                                    <input type="submit" name="add_to_cart" class="btn btn-warning btn-block my-2" value="Add to Cart">
                                </form>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Cart Section -->
            <div class="col-md-6">
                <h2 class="text-center">Shopping Cart</h2>
                <!-- Display items in the cart -->
                <?php
                $total = 0;
                if (!empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                ?>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title"><?= $value['itemname']; ?></h5>
                                <p class="card-text">Price: ₹<?= $value['itemprice']; ?></p>
                                <p class="card-text">Quantity: <?= $value['quantity']; ?></p>
                                <p class="card-text">Total: ₹<?= number_format($value['itemprice'] * $value['quantity'], 2); ?></p>
                                <a href="cart.php?action=remove&id=<?= $value['id']; ?>" class="btn btn-danger">Remove</a>
								  <a href="forms.php" class="btn btn-success">Book Now</a>
                            </div>
                        </div>
                <?php
                        $total += $value['itemprice'] * $value['quantity'];
                    }
                ?>
                    <h4>Total: ₹<?= number_format($total, 2); ?></h4>
                    <a href="cart.php?action=clearall" class="btn btn-warning">Clear Cart</a>
                <?php
                } else {
                    echo "<p>Your cart is empty.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
