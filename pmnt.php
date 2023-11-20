<html lang="en"><head>
    <meta charset="UTF-8">
    
    <title>Checkout</title>
    <style>
                body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh;
            margin: 0;
			top:0;
			left:0;
            background-color: #f0f0f0; 
			background: url(pay.jpg);
			background-repeat: no-repeat;
			background-size: cover;
            background-position: 50%;
			/* Background color for the entire page */
            width: 90%; /* Make the body as wide as the viewport */
        }
        form {
            text-align: center;
            border: 4px solid black;
            padding: 10px;
			margin-right: 70px;;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff; /* Background color for the form */
            width: 30%;
			/* Adjust the form width as needed */
        }
        h2 {
            color: #007bff; /* Heading color */
        }
        #name, #amt {
            width: 50%;
            padding: 5px;
            margin: 2px 1px;
            border: 1px solid #ccc; /* Border for input fields */
        }
        #btn {
            width: 50%;
            padding: 5px;
            background-color: #007bff; /* Background color for the button */
            color: #fff;
            border: none;
            cursor: pointer;
        }
        #btn:hover {
            background-color: #0056b3; /* Hover color for the button */
        }
    </style>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"><meta name="theme-color" content=""></head>
<body style="overflow: hidden;">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <form>
        <h2>Checkout</h2>
        <input type="text" name="name" id="name" placeholder="Enter your name"><br><br>
        <input type="text" name="amt" id="amt" placeholder="Enter amount"><br><br>
        <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()">
    </form>
	
<script>
    function pay_now(){
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        key: "rzp_test_YMAeHqyBZV5LNP", 
                        amount: amt*100, 
                        urrency: "INR",
                        name: "Furniture",
                        description: "Test Transaction",
                        image: "dist/img/logo.jpg",
                        handler:function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>
</body>
</html>