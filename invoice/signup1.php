<?php
	session_start();
	require('dbconfig/config.php');
	//phpinfo();
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
		margin: 0;
		background-image:url(../img/download4.jpeg);
		background-size:cover;
		background-repeat:no-repeat,repeat;
		margin:0 auto;
		color: white;

	}

ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		width: 15%;
		background-color: #f1f1f1;
		position: fixed;
		height: 100%;
		overflow: auto;
	}

li a{
		display: block;
		color: #000;
		padding: 8px 16px;
		text-decoration: none;
	}

li a.active {
				background-color: #4CAF50;
				color: white;
			}

li a:hover:not(.active) {
							background-color: #555;
							color: white;
						}
.inner_container
{
	background:rgba(44,62,80,0.7);
	padding:40px;
	width:350px;
	margin:auto;
	margin-top:2%;
	height:450px;
	margin-left:800px;
	border-radius:15px;
	height: auto;
}
.inputvalues1
{
	width:240px;
	text-align:center;
	background:transparent;
	border:none;
	border-bottom:1px solid #fff;
	font-family:'play',sans-serif;
	font-size:16px;
	font-weight:200px;
	padding:10px 0;
	transition:border 0.5s;
	outline:none;
	color:#fff;
}
.sub
{
	border:none;
	width:190px;
	background:white;
	color:#000;
	font-size:16px;
	line-height:25px;
	padding:10px 0;
	border-radius:15px;
	cursor:pointer;
}
.sub:hover
{
	color:#fff;
	background-color:black;
}


.logo img
{ 
	float: center;
	width: 190px;
	height: 160px;
	margin-left:15%;
	margin-top:-20%;
	margin-left:15%;
}
.dropbtn {
  background-color:#4CAF50;
  color: black;
  padding: 10px 15px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display:outline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #4CAF50;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover 
{
	
	background-color: #4CAF50;
	color: white;
}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #4CAF50; color: white;}




</style>
</head>
<body >

<ul>
  <li ><a   href="welcome.php">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
  <div  class="dropdown">
  		<li class="dropbtn"> Account</li>
        <div class="dropdown-content">
   			 <a href="signup.php">Sign Up</a>
  		</div>
  </div>
</ul>
 
<div style="margin-left:-15%;padding:8% 300px;height:525px; background-image:url('https://images.all-free-download.com/images/graphiclarge/real_estate_transaction_background_hands_money_building_icons_6835809.jpg'); background-size:1750px 800px;  background-repeat:no-repeat,no-repeat;background-attachment: fixed ;">
  <form action="signup1.php" method="post">

			 			<div class="inner_container">
			<center>
			<h1>SIGN UP</h1>
			</center>
			<label style="color:white"><b>FIRSTNAME:</b></label><br>
			<input name="firstname"type="text" class="inputvalues1" placeholder="enter FIRSTNAME"/><br><b
			<label style="color:white"><b>LASTNAME:</b></label><br>
			<input name="lastname"type="text" class="inputvalues1" placeholder="enter LASTNAME"/><br><br>
			<label style="color:white"><b>PHONENUMBER:</b></label><br>
			<input name="phonenum"type="text" class="inputvalues1" placeholder="enter PHONENUMBER"/><br><br>
			<label style="color:white"><b>EMAIL :</b></label><br>
			<input name="email"type="text" class="inputvalues1" placeholder="enter EMAIL"/><br><br>
			<center><input class="sub" name="submit" type="submit" id="button" value="SUBMIT"/><br></center>
			<br>
				
			</div>
			
		</form>
		<?php
					$con=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error());
					mysqli_select_db ($con,'invoice');
				?>
		<?php
			
			if(isset($_POST['submit']))
				{ 
				$user=$_SESSION['username'];
				$firstname=$_POST['firstname'];
				$lastname=$_POST['lastname'];
				$phonenum=$_POST['phonenum'];
				$email=$_POST['email'];
						$query1="insert into signup values('$user','$firstname','$lastname','$email','$phonenum')";
						$query_run1=mysqli_query($con,$query1);
						if($query_run1)
						{
							echo'<script type"text/javascript"> alert("INSERTION SUCCESS FULL")</script>';
						
						    header('Location:home.php');
						}
						else
						{
							echo'<script type"text/javascript"> alert("database error!.....")</script>';
						}
					}
				
			
				
			
			?>
			
<script>
</div>

</body>
</html>
