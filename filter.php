<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Image Gallery</title>

    <style>
        /* Apply a fixed width and height to the images */
        .image-gallery a img {
            width: 200px; /* Adjust the width as needed */
            height: 150px; /* Adjust the height as needed */
        }
    </style>
	  <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>


 <div class="wishlist-icon" onclick="toggleWishlist()"></div>
 <script src="script.js"></script>
  
    <h1>Furniture Image Gallery</h1>
	
	
    <div class="image-gallery">
    <div class="row">
        <a href="form.php?image=c1.jpg">
            <img src="c1.jpg" alt="chair">
			<h2>Modern Chair</h2>
			<div class="cost">₹899</div>
             <button class="order-button">Order Now</button>
             </a>
            
      
        <a href="form.php?image=c2.jpg">
            <img src="c2.jpg" alt="chair">
			<h2>Wooden Chair</h2>
			<div class="cost">₹999</div> 
             <button class="order-button">Order Now</button>
			</a>
         
       
        <a href="form.php?image=c3.jpg">
            <img src="c3.jpg" alt="chair">
			<h2>modern Chair</h2>
			<div class="cost">₹1,099</div>
             <button class="order-button">Order Now</button>
			 </a>
           
    </div>
</div>

		
		
		<div class="row">
		 <a href="form.php?image=d1.jpg">
		        <img src="d1.jpg" alt="Dressing table">
		 		<h2>Dressing table</h2>
                <div class="cost">₹3,000</div>
                <button class="order-button">Order Now</button>
				 </a>
		
		 <a href="form.php?image=d2.jpg">
		        <img src="d2.jpg" alt="Dressing table">
		 		<h2>Dressing table</h2>
                <div class="cost">₹5,000</div>
                <button class="order-button">Order Now</button>
				</a>
		
		  <a href="form.php?image=d3.jpg">
		        <img src="d3.jpg" alt="Dressing table">
		 		<h2>Dressing table</h2>
                <div class="cost">₹2,500</div>
                <button class="order-button">Order Now</button>
				</a>
		</div>
		
		
		<div class="row">
		 <a href="form.php?image=s1.jpg">
		        <img src="s1.jpg" alt="Study table">
		 		<h2>Wooden Study table</h2>
                <div class="cost">₹5,999</div>
                <button class="order-button">Order Now</button>
				
                </a>
		
		 <a href="form.php?image=s2.jpg">
		        <img src="s2.jpg" alt="Study table">
		 		<h2>Modern Study table</h2>
                <div class="cost">₹10,999</div>
                <button class="order-button">Order Now</button>
                </a>
				
		 <a href="form.php?image=s3.jpg">
		        <img src="s3.jpg" alt="Study table">
		 		<h2>Wooden Study table</h2>
                <div class="cost">₹3,999</div>
                <button class="order-button">Order Now</button>
				</a>
				
         </div>
		 
		 
		 <div class="row">
        <a href="form.php?image=ss1.jpg">
		        <img src="ss1.jpg" alt="Sofa">
		 		<h2>Sofa</h2>
                <div class="cost">₹10,999</div>
                <button class="order-button">Order Now</button>
               </a>

        <a href="form.php?image=ss2.jpg">
		        <img src="ss2.jpg" alt="Sofa">
		 		<h2>Sofa</h2>
                <div class="cost">₹12,999</div>
                <button class="order-button">Order Now</button>
				</a>
				
        <a href="form.php?image=ss3.jpg">
				 <img src="ss3.jpg" alt="Sofa">
                 <h2>Designer Sofa set</h2>
         <div class="cost">₹11,999</div>
                <button class="order-button">Order Now</button>
				</a>
				
		</div>
		
		
		<div class="row">
        <a href="form.php?image=b1.jpg">
			     <img src="b1.jpg" alt="Bed">
		         <h2>Wooden Bed</h2>
                 <div class="cost">₹9,999</div>
                 <button class="order-button">Order Now</button>
                 </a>

        <a href="form.php?image=b2.jpg">
			     <img src="b2.jpg" alt="Bed">
		         <h2>Wooden Bed</h2>
                 <div class="cost">₹15,999</div>
                 <button class="order-button">Order Now</button>
				</a>
		
        <a href="form.php?image=b3.jpg">
			     <img src="b3.jpg" alt="Bed">
		         <h2>Modern Bed</h2>
                 <div class="cost">₹11,999</div>
                 <button class="order-button">Order Now</button>
				 </a>
		</div>
		
		
		<div class="row">
        <a href="form.php?image=dd1.jpg">
			     <img src="dd1.jpg" alt="Dinning Table">
                 <h2>Wooden Dinning Table</h2>
                 <div class="cost">₹10,999</div>
                 <button class="order-button">Order Now</button>
		         </a>

        
            <a href="form.php?image=dd2.jpg">
			     <img src="dd2.jpg" alt="Dinning Table">
                 <h2>Solid Wood 6 Seater Dinning Table</h2>
                 <div class="cost">₹15,999</div>
                 <button class="order-button">Order Now</button>
				 </a>
				 
         <a href="form.php?image=dd3.jpg">
			     <img src="dd3.jpg" alt="Dinning Table">
                 <h2>Solid Wood 6 Seater Dinning Table</h2>
                 <div class="cost">₹9,999</div>
                 <button class="order-button">Order Now</button>
                 </a>
</div>
 </div>
 
	<style>
	.image-gallery,
    .new-gallery{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(300px, auto));
    gap: 2rem;
    margin: top 2rem;
	
}

.row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px; /* Add spacing between rows */
	 
	
}

.row a {
    width: 30%; /* Each image takes up 30% of the row */
    text-align: center; /* Center-align the images */
    margin: 5; /* Reset margin for the links */
	
}

.row a img {
    width: 106%; /* Fill the width of the link */
    height: 550px; /* Maintain aspect ratio */
	
}

.row {
    position: relative;
    box-shadow: 1px 4px 44px rgba(0, 0, 0, 0.1);
    border-radius: 44px 4px 44px 4px;
    overflow: hidden;
	

}
.box-img {
    width: 100%;
    height: 400px;
    overflow: hidden;
    border-radius: 44px 4px 0 0;
	gap: 5rem;
}

.box-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}
.cost {
    font-size: 25px;
    color: #555; /* Adjust the color to fit your design */
    margin-top: 5px; /* Adjust the spacing as needed */
    margin-center: 300px;
}
.order-button {
    padding: 8px 12px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none; /* Remove default link underline */
}

.order-button:hover {
    background-color: #2980b9;
}

</style>

</body>
</html>
