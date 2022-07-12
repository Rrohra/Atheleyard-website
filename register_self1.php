
<!doctype>
<html>
<head>
<title>Login Form Design</title>
    <link rel="stylesheet" type="text/css" href="tempo.css">
    <link rel="stylesheet" type="text/css" href="ham1.css">
  
<body>

						 <div id="nav" class="nav">
					            <a href="javascript:void(0)" id="close" class="close" onclick="closenav()">&times;</a>
					            <a href="category.html">CATEGORY</a>
					            <a href="gallery.html">COMMUNITY</a>
					            <a href="career.html">CAREERS</a>
					            <a href="register_self1.php">MEMBERSHIP</a>
					            <a href="aboutus.html">OUR  STORY</a>
					        </div>

						 <div id="navbar">
					  		<a href="index.html"><img src="hlogo.png"></a>
					         <div id="open" class="open" onclick="opennav()">&#9776;<br>
					         
					        </div>
					       
						 </div>


	
			 
    <div class="loginbox" style="width:500px;">
    <img src="avatar.png" class="avatar">
        <h1>Register Here</h1>
        <form method="post" action="register_confirm.php">
            <div class="regbox">
            	
				<label class="label_class" for="fname">First-name</label>
            	<input type="text" id="fname" name="fname" placeholder="Enter First-name" required="true" maxlength="25">
				<!-- <span class="error"><?php  $fnameErr;?></span> -->


            	<label class="label_class" for="lname">Last-name</label>
            	<input type="text" id="lname" name="lname" placeholder="Enter Last-name" required="true" maxlength="25"><br>
				<!-- <span class="error"><?php  $lnameErr;?></span> -->

<!--             	<label class="label_class" for="pass">Password</label>
            	<input type="password" id="pass" name="pass" placeholder="Enter Password" required="true" maxlength="25"> -->
				<!-- <span class="error"><?php  $passErr;?></span> -->

				<label class="label_class"  for="email">Email</label><br>
				<input type="email" id="email" name="email" placeholder="Enter Your Email" required="true" maxlength="50">
				<!-- <span class="error"><?php  $emailErr;?></span> -->

				<label class="label_class" for="txt_uname">Username</label>
				<input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username"  required="true" maxlength="25">
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
					<option value="9000"> 9 Months</option>
					<option value="6000"> 6 Months</option>
					<option value="3000"> 3 Months</option>
				</select><br>
				<label for="fees">Fees : </label>
				<input type="text" id="fees" name="fees" value="10000" style="width: 10%" readonly="readonly">
				<br><br>
            	<input type="submit" name="submit" value="Register">
	
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

</script>




		<script type="text/javascript">
		function opennav()
		{
			document.getElementById('open').style.display="none";
			document.getElementById('nav').style.width="100%";
		}
		function closenav()
		{
			document.getElementById('nav').style.width="0";
			document.getElementById('open').style.display="block";
		}
		
		// When the user scrolls the page, execute myFunction
		window.onscroll = function() {myFunction()};

		// Get the navbar
		var navbar = document.getElementById("navbar");
		
		// Get the offset position of the navbar
		var sticky = navbar.offsetTop;
		
		// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
		function myFunction() {
		  if (window.pageYOffset >= sticky) {
		    navbar.classList.add("sticky");
		    content.classList.add("sticky1") ;
		  } else {
		    navbar.classList.remove("sticky");
             content.classList.remove("sticky1") ;
		    
		  }
		  
		} 
	</script>

<!-- 
		<footer class="footer">
    <div class="con" >
            <p id="para"> Subscribe  Our Newsletter <b>:-</b></p> 
            <form method="post" action="subscribe.php">
            <input type="text" placeholder="Email address" name="email" id="email" required max="50" required="true">
            <input type="submit"  name="button" >
            </form>
          </div>
    <div class="contain">
      
          <div class="social-icon">
            <a href="#"><i class="fa fa-facebook-f" aria-hidden="true"></i></a>
            <a href="#"> <i class="fa fa-twitter"  aria-hidden="true" ></i></a>
            <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"> <i class="fa fa-google-plus" aria-hidden="true"></i></a>
            <a href="#"> <i class="fa fa-linkedin" aria-hidden="true"></i></a>
          </div>
          
          

        </div>
      </div>
    </div>
  </footer> -->


</body>
</head>
</html>
