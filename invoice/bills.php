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
			if(isset($_POST['del']))
			{
				$del=$_POST['del'];
				$query1="DELETE FROM bill WHERE billnum='$del';";
						$query_run1=mysqli_query($con,$query1);
						if($query_run1)
						{
							echo'<script type"text/javascript"> alert("deletion SUCCESS FULL")</script>';
							 header('Location:bills.php');
						   
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
		body:white;

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
	width:60%;
	margin:auto;
	margin-top:8%;
	height:450px;
	margin-left:39%;
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

.dropdown:hover .dropbtn {background-color: #4CAF50; color: white;
}

.button
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
.button:hover
{
	color:#fff;
	background-color:black;
}


table{
    width:90%;
    margin: 30px auto;
	column-width:5%;
    border-collapse: collapse;
    text-align:center;
	 border: 1px;
	 color:white;
}
table, th, td {
  border: 1px solid black;
   font-size: 18px;
}
tr {
    border-bottom: 1px solid #cbcbcb;
}
th, td{
    border: none;
    height: 30px;
    padding: 2px;
}
.edit_btn {
    text-decoration: none;
    padding: 2px 5px;
    background: #2E8B57;
    color: white;
    border-radius: 3px;
}

.del_btn {
    text-decoration: none;
    padding: 2px 5px;
    color: white;
    border-radius: 3px;
    background: #800000;
}




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
  <form action="bills.php" method="post">
 <center>  
	<h1 style="color:black; margin-left:35%;margin-top:-8%">BILLS</h1>
</center>
   <?php $user=$_SESSION['username'];?>
			 <div class="inner_container">
			<?php $results = mysqli_query($con, "SELECT * FROM bill"); ?>	
			<table >
				<thead style="color:black">
					<tr><b>
						<th>BILL NUMBER</th>
						<th>CUSTOMER NAME</th>
						<th>PRODUCT NAME</th>
						<th>AMOUNT</th>
						<th>REMARKS</th>
						<th >Action</th></b>
					</tr>
				</thead>
	
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					<tr>
						<td><?php echo $row['billnum']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['product']; ?></td>
						<td><?php echo $row['amount']; ?></td>
						<td><?php echo $row['remarks']; ?></td>
						
						<td>
							
							<button name="del" class="del_btn" type="submit" value="<?php echo $row['billnum']; ?>">DELETE</button>
						</td>
					</tr>
				<?php } ?>
			</table>
			<center><button class="button" name="button" type="button" onclick="location.href='billadd.php'">ADD NEW BILL</button></center><br><br>
			
			<CENTER>	<a href="home.php"><font size="3px" color="khaki">GO BACK</font></a></CENTER>
		</form>
		
		
		
</div>

</body>
</html>

		