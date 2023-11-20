<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Booking Form</title>
 <!-- Add Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Furniture Booking Form</h1>

        <div class="row">
            <div class="col-md-6">
                <!-- Move the selected image code here -->
                <div class="selected-image">
                    <?php
                    $image = $_GET['image'];
                    echo '<img src="' . $image . '" alt="Selected Image" class="img-fluid">';
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <form action="submit_booking.php" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
					 
					<div class="form-group">
                        <label for="Address">Address:</label>
                        <input type="text" id="address" name="address" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" class="form-control" required></textarea>
                    </div>
					

                   
                    <button type="submit" class="btn btn-primary">Order Now</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JavaScript (optional, for some features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
