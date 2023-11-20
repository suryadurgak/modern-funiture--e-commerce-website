<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "dbfurniture");

// Check if 'add_to_cart' form is submitted
if (isset($_POST['add_to_wishlist'])) {
    if (!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = [];
    }

    // Get the product ID and check if it already exists in the wishlist
    $id = $_GET['id'];
    $existingIds = array_column($_SESSION['wishlist'], 'id');

    if (!in_array($id, $existingIds)) {
        // If not, add the product to the wishlist
        $query = "SELECT * FROM wishlist WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $item = array(
                'id' => $row['id'],
                'itemname' => $row['itemname'],
                'itemprice' => $row['itemprice'],
                'quantity' => $_POST['quantity']
            );

            $_SESSION['wishlist'][] = $item;
        }
    }
}

// Remove item from wishlist if requested
if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['id'])) {
    $idToRemove = $_GET['id'];
    foreach ($_SESSION['wishlist'] as $key => $cartItem) {
        if ($cartItem['id'] === $idToRemove) {
            unset($_SESSION['wishlist'][$key]);
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping wishliat</title>
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
                    $query = "SELECT * FROM wishlist";
                    $result = mysqli_query($conn, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <div class="col-md-4">
                                <form method="post" action="wishlist.php?id=<?= $row['id'] ?>">
                                    <!-- Display product information -->
                                    <!-- Adjust image URL and other fields accordingly -->
                                    <img src="<?= $row['imageurl'] ?>" style="height: 150px;">
                                    <h5 class="text-center"><?= $row['itemname']; ?></h5>
                                    <h5 class="text-center">₹<?= number_format($row['itemprice'], 2); ?></h5>
                                    <input type="number" name="quantity" value="1" class="form-control">
                                    <input type="submit" name="add_to_wishlist" class="btn btn-warning btn-block my-2" value="Add to wishlist">
                                </form>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- wishlist Section -->
            <div class="col-md-6">
                <h2 class="text-center">Shopping wishlist</h2>
                <!-- Display items in the wishlist -->
                <?php
                $total = 0;
                if (!empty($_SESSION['wishlist'])) {
                    foreach ($_SESSION['wishlist'] as $key => $value) {
                ?>
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title"><?= $value['itemname']; ?></h5>
                                <p class="card-text">Price: ₹<?= $value['itemprice']; ?></p>
                                <p class="card-text">Quantity: <?= $value['quantity']; ?></p>
                                <p class="card-text">Total: ₹<?= number_format($value['itemprice'] * $value['quantity'], 2); ?></p>
                                <a href="wishlist.php?action=remove&id=<?= $value['id']; ?>" class="btn btn-danger">Remove</a>
							
                            </div>
                        </div>
                <?php
                        $total += $value['itemprice'] * $value['quantity'];
                    }
                ?>
                    <h4>Total: ₹<?= number_format($total, 2); ?></h4>
                <?php
                } else {
                    echo "<p>Your wishlist is empty.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
