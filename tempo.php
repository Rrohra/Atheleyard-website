<html>
<head>
<title>Login Form Design</title>
    <link rel="stylesheet" type="text/css" href="tempo.css">
<body>

    <?php
    $servername="localhost";
    $username="root";
    $password='';
    $dbname="ay";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn)
    {
        die("Connection failed:".mysqli_connect_error());
    }
    else{
        echo "connection estblished to database";
    }

    ?>     
        <div class="loginbox">
    <img src="avatar.png" class="avatar">
        <h1>Login Here</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label class="label_class"  for="b">Email</label><br>
            <input type="email" id="b" name="email" placeholder="Enter Registered Email"><br>
            <label class="label_class"  for="a">Password</label>
            <input type="password" id="a" name="password" placeholder="Enter Password"><br><br>
            <input type="submit" name="sumbit" value="Login"><br>
            <a href="register_self.php">Don't have an account?</a>
			
        </form>
        
    </div>

</body>
</head>
</html>
