<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="order">
        <h2>Your Order</h2>
        <button id="cancelButton">Cancel Order</button>
    </div>
	<style>
	body {
		background: url(cancel.jpg);
	background-repeat:no-repeat;
	background-size: cover;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	padding: 1rem;
	
    font-family: Arial, sans-serif;
}

.order {
    border: 3px solid black;
    padding: 20px;
    text-align: center;
    width: 300px;
    margin: 0 auto;
	backdrop-filter:blur(10px);
}

h2 {
    color: #333;
}

button#cancelButton {
    background-color: #f00;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
}

button#cancelButton:hover {
    background-color: #ff0000;

}
</style>
</body>
<script>
document.getElementById("cancelButton").addEventListener("click", function() {
    if (confirm("Are you sure you want to cancel this order?")) {
        // You can add code to handle the cancellation here
        alert("Order canceled!");
    } else {
        // Cancel action
        alert("Order not canceled.");
    }
});
</script>
</html>