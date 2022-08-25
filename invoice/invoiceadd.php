<?php
	session_start();
	require('dbconfig/config.php');
	//phpinfo();
?>
<?php
					$con=mysqli_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error());
					mysqli_select_db ($con,'invoice');
				?>
		<?php
			
			if(isset($_POST['submit']))
				{ 
				$invoicenum=$_POST['invoicenum'];
				$name=$_POST['name'];
				$product=$_POST['product'];
				$cost=$_POST['cost'];
				$tax=$_POST['tax'];
				$remarks=$_POST['remarks'];
				$total=$cost+((($cost) * ($tax))/100);
						$query1="insert into invoice values('$invoicenum','$name','$product','$cost','$remarks','$tax','$total')";
						$query_run1=mysqli_query($con,$query1);
						if($query_run1)
						{
							echo'<script type"text/javascript"> alert("INSERTION SUCCESS FULL")</script>';
						
						    header('Location:invoice.php');
						}
						else
						{
							echo'<script type"text/javascript"> alert("database error!.....")</script>';
						}
					}
				
			
				
			
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
	width:33%;
	margin:auto;
	margin-top:-7%;
	margin-left:50%;
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
.inputvalues2
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
	cols="40";
	rows="5;
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
  <form action="invoiceadd.php" method="post">

			 			<div class="inner_container">
			<center>
			<h1>ENTER THE INVOICE</h1>
			</center>
			<BR>
			<label style="color:white"><b>INVOICE NUMBER:</b></label><br>
			<input name="invoicenum"type="text" class="inputvalues1" placeholder="enter BILLNUMBER"/><br><br>
			<label style="color:white"><b>CUSTOMER NAME:</b></label><br>
			<input name="name"type="text" class="inputvalues1" placeholder="enter CUSTOMERS NAME"/><br><br>
			<label style="color:white"><b>PRODUCT NAME:</b></label><br>
			<input name="product"type="text" class="inputvalues1" placeholder="enter PRODUCT NAME"/><br><br>
			<label style="color:white"><b>PRODUCT COST:</b></label><br>
			<input name="cost"type="text" class="inputvalues1" placeholder="enter PRODUCT COST"/><br><br>
			<label style="color:white"><b>PRODUCT TAX PERCENT:</b></label><br>
			<input name="tax"type="text" class="inputvalues1" placeholder="enter PRODUCT TAX"/><br><br>
			<label style="color:white"><b>REMARKS:</b></label><br>
			<input name="remarks"type="text"  class="inputvalues2" placeholder="enter REMARKS"/><br><br>
			<center><input class="sub" name="submit" type="submit" id="button" value="SUBMIT"/><br></center>
			<br>
				
			</div>
			
		</form>
		
			
<script>
</div>

</body>
</html>
