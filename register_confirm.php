<?php

$servername="localhost";
$username="root";
$password='';
$dbname="athleteyard";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if(!$conn)
{
     die("Connection failed:".mysqli_connect_error());
}
else
{
 //echo "connection estblished to database";

}


$fnameErr = $lnameErr = $passErr = $emailErr = "";
$x =0;

	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$email=$_POST["email"];
	$pass=$_POST["pass"];
	$username=$_POST["txt_uname"];
	$sex =$_POST["sex"];
	$course =$_POST["course"];
	$fees =$_POST["fees"];
	
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
		$sql = "INSERT INTO clients (Email,Fname,Lname,Password,Username,Sex,Course,Fees)
		VALUES ('$email', '$fname', '$lname', '$pass','$username','$sex','$course','$fees')";

		if ($conn->query($sql) === TRUE) 
		{
	    	echo "New record created successfully";
		}
		else 
		{
	    	echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}		

	//mail code

	require 'PHPMailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		$mail->isSMTP();                                   
		$mail->Host = 'smtp.gmail.com';                    
		$mail->SMTPAuth = true;                           
		$mail->Username = 'athleteyard@gmail.com';        //email id
		$mail->Password = 'athleteyard123';		  //password
		$mail->SMTPSecure = 'tls';                        
		$mail->Port = 587;                                 

		$mail->setFrom('  ', '  ');		//email id
		$mail->addReplyTo('  ', '  ');	//email id
		$mail->addAddress($email);   		//receiver email id $email is used to store receiver email
	

		$mail->isHTML(true);  

		$bodyContent = 'Thank You for choosing Athleteyard
                        You have Succeessfully Registered';
		
		$mail->Subject = 'Registration Confirmation';
		$mail->Body    = $bodyContent;

		if(!$mail->send()) 
        {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
			//  header('location:LoginError.php');
		} 
        else 
        {
			echo 'Message has been sent';
			header('location:index.html');
			
		}

			
?>