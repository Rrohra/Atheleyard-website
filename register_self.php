
<!doctype>
<html>
<head>
<title>Login Form Design</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
else
{
 echo "connection estblished to database";

}


$fnameErr = $lnameErr = $passErr = $emailErr = "";
$x =0;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$email=$_POST["email"];
	$pass=$_POST["pass"];
	$sex =$_POST["sex"];
	
	if(empty($_POST["fname"]))
	{
		$fnameErr="*Name is Required <br>";
		$x=1;
	}
	else
	{
		if (!preg_match("/^[a-zA-Z ]*$/",$fname))
		{
			$fnameErr = "*Only letters and white space allowed";
			$x=1;
		}
	}





	if(empty($_POST["lname"]))
	{
		$lnameErr="*Surame is Required <br>";
		$x=1;
	}
	else
	{
		if(!preg_match("/^[a-zA-Z]*$/", $lname))
		{
			$lnameErr = "*Only letters and white space allowed";
			$x=1; 
		}
	}




	if(empty($_POST["email"]))
	{
		 $emailErr= "*Valid Email is Required <br>";
		 $x=1;
	}



	if(empty($_POST["pass"]))
	{
		$passErr="*Password is Required <br> ";
		$x=1;
	}
	else
	{
		if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])$/', $password)) 
		{
    		$passErr = "requirements not mached<br>";
    		$x=1;
		}
	}

	if($x == 0)
	{
		$sql = "INSERT INTO clients (Email,Fname,Lname,Password,Sex)
		VALUES ('$email', '$fname', '$lname', '$pass', '$sex')";

		if ($conn->query($sql) === TRUE) 
		{
	    	echo "New record created successfully";
		}
		else 
		{
	    	echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}		
}
$uname = $_POST['uname'];

/* Query */
$query = "select count(*) as cntUser from clients where Username='".$uname."'";

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_array($result);

$count = $row['cntUser'];

return $count;


?>
    <div class="loginbox" style="width:500px;">
    <img src="avatar.png" class="avatar">
        <h1>Register Here</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="regbox">
            	
				<label class="label_class" for="fname">First-name</label>
            	<input type="text" id="fname" name="fname" placeholder="Enter First-name">
				<span class="error"><?php echo $fnameErr;?></span>


            	<label class="label_class" for="lname">Last-name</label>
            	<input type="text" id="lname" name="lname" placeholder="Enter Last-name">
				<span class="error"><?php echo $lnameErr;?></span>

            	<label class="label_class" for="pass">Password</label>
            	<input type="password" id="pass" name="pass" placeholder="Enter Password">
				<span class="error"><?php echo $passErr;?></span>

				<label class="label_class"  for="email">Email</label><br>
				<input type="email" id="email" name="email" placeholder="Enter Your Email">
				<span class="error"><?php echo $emailErr;?></span>

				<label class="label_class" for="txt_uname">Username</label>
				<input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username"  />
				<div id="uname_response" class="error"></div>

				<label class="label_class" for="radio"> Gender:</label>
				<input type="radio" id="sex" name="sex" value="M">Male
				<input type="radio" id="sex" name="sex" value="F">Female
				<br>
				<label class="label_class" for="select" > Course : </label>
				<select id="course" name="course" onchange="myfunction(event)" >
					<option value="12000" selected="selected">Cricket</option>
					<option value="24000"> Football</option>
					<option value="36000" >Badminton</option>
					<option value="48000" >Basketball</option>

				</select>
				<label class="label_class" for="select" > Duration : </label>
				<select id="duration" name="duration" onchange="myfunction2(event)">
					<option value="0" selected="selected"> 12 Months</option>
					<option value="9000"> 3 Months</option>
					<option value="6000"> 6 Months</option>
					<option value="3000"> 9 Months</option>
				</select><br>
				<label for="fees">Fees : </label>
				<input type="text" id="fees" name="fees" value="10000" style="width: 10%" readonly="readonly">
				<br><br>
            	<input type="submit" name="submit" value="Login">
	
                </div>
        </form>
        
    </div>

<script>

	function myfunction(e)
	{
		window.global = e.target.value;
		document.getElementById("fees").value = global;
	}
		
	function myfunction2(e)
	{
		document.getElementById("fees").value = window.global - e.target.value;
	}


	//ajax//
$(document).ready(function()
{

   $("#txt_uname").keyup(function()
   {

      var uname = $("#txt_uname").val().trim();

      if(uname != ''){

         $("#uname_response").show();

         $.ajax({
            url: 'uname_check.php',
            type: 'post',
            data: {uname:uname},
            success: function(response){

                if(response > 0)
                    $("#uname_response").html("<span class='not-exists'>* Username Already in use.</span>");
                }else{
                    $("#uname_response").html("<span class='exists'>Available.</span>");
                }

             }
          });
      }else{
         $("#uname_response").hide();
      }

    });

 });




</script>

</body>
</head>
</html>
