<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $description = $_POST["description"];
 

    // You can perform validation on the data here if needed

    // Database connection parameters (adjust these)
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "dbfurniture";

    // Create a connection to the database
    $connection = new mysqli($host, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Insert form data into the database
    $sql = "INSERT INTO furniture_booking (name, email, address, description) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $address, $description);

    if ($stmt->execute()) {
        echo "Booking submitted successfully! your order will be delivered in 5 days";
    } else {
        echo "Failed to submit the booking. Please try again later.";
    }

    // Close the database connection
    $connection->close();
} else {
    // If the form was not submitted via POST request
    echo "Invalid request.";
}
?>
<style>
/* styles.css */
form {
    text-align: center;
}

button {
    background-color: #007BFF;
    color: #FFF;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

</style>
<!-- Add a button to redirect to pmnt.php -->
<form method="post" action="pmnt.php">
    <button type="submit" name="submitRedirect" value="1">payment</button>
</form>
