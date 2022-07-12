<?php
//PHPMailer Object
		$email=$_POST["email"];
		

        require 'PHPMailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		$mail->isSMTP();                                   
		$mail->Host = 'smtp.gmail.com';                    
		$mail->SMTPAuth = true;                           
		$mail->Username = 'athleteyard@gmail.com';        //email id
		$mail->Password = 'athleteyard123';		  //password
		$mail->SMTPSecure = 'tls';                        
		$mail->Port = 587;                                 

		// $mail->setFrom('  ', '  ');		//email id
		// $mail->addReplyTo('  ', '  ');	//email id
		$mail->addAddress($email);   		//receiver email id $email is used to store receiver email
	

		$mail->isHTML(true);  

		$bodyContent = 'Thank You for choosing Sports Academy
                        You have Succeessfully Applied for the Course';
		
		$mail->Subject = 'Course Application Confirmation';
		$mail->Body    = $bodyContent;

		if(!$mail->send()) 
        {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} 
        else 
        {
			header('location:index.html');
			
		}

            
?>
