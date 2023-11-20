<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            background: url(login2.jpg);
	background-repeat:no-repeat;
	background-size: cover;
	display: flex;
	justify-content: center;
	align-items: center;
	min-height: 100vh;
	padding: 1rem;       
            
            
            font-family: lucida calligraphy, sans-serif;
            
        }
        .login-container {
            text-align:center;
            width: 20%;
            margin: 0 auto;
            padding:30px;
			
            border: 1px solid black;
            background-color: #fdfcfc; /* Set the background color for the login container */
			backdrop-filter:blur(15px);
            background:center;
        }
        input[type="text"], input[type="password"] {
            width: 70%;
            padding:10px;
            margin: 5px 0;
            border: 2px solid #ccc;
            border-radius: 8px;
        }
        input[type="submit"] {
            width: 80%;
            padding: 10px;
            margin: 5px 0;
            background-color: #0074d9;
            color: #fff;
            border: 1px solid #ccc;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            width: 80%;
            background-color: #f0f4f8;
            margin: 8px 0;
        }
		video{
    object-fit: cover;
    width: 100vw;
    height: 100vh;
    position:fixed;
    top:0;
    left:0;
    z-index: -1;
}
			
    </style>
</head>
<body>
 <video autoplay loop muted playsinline id="bgvideo"> 
            <source src="video.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
    <div class="login-container">
        <h2>Login</h2>
        <form action="./include/login.php" method="POST">
            
            <input type="text" id="username" name="username" placeholder="Username" required>
            <br>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>