<?php

require_once ('process/dbh.php');

//$sql = "SELECT * from `employee`";
$sql = "SELECT employee.id, employee.firstName WHERE employee.id = employee.eid ORDER BY employee.token";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>

<html>
<head>
	<title>Tracer |  Admin Panel | Tapau Food</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
</head>
<body>
	
	<header>
		<nav>
			<h1>TapauFood</h1>
			<ul id="navli">
				<li><a class="homeblack" href="home.php">HOME</a></li>
                <li><a class="homeblack" href="aloginwel.php">Leaderboard</a></li>
				<li><a class="homered" href="tracer.php">Tracer</a></li>
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homeblack" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>
	<div id="divimg">
		<table>
			<tr>
				<th>Token</th>
				<th>Emp. ID</th>
				<th>Name</th>
				<th>Ip Address</th>
				<th>Login Time</th>

			</tr>
			
			<?php
				while ($employee = mysqli_fetch_all ($result)) {

					echo "<tr>";
					echo "<td>".$employee['token']."</td>";
					echo "<td>".$employee['eid']."</td>";																
					echo "<td>".$employee['firstName']."</td>";	
					echo "<td>".$employee['userIp']."</td>";
					echo "<td>".$employee['loginTime']."</td>";
				}
			?>

			<?php 

				$query=mysqli_query($conn,"Select * from userlog where eid='".$_SESSION['id']."'");
				$cnt=1;
				while($row=mysqli_fetch_array($query)){
					echo "<td>".$employee['eid']."</td>";
					//$cnt+=1;
					$cnt=$cnt+1; 
				}
			?>

			<tr>
			<td><?php echo $cnt;?></td>
			<td><?php echo $row['eid'];?></td>
			<td><?php echo $row['firstName'];?></td>
			<td><?php echo $row['userIp'];?></td>
			<td><?php echo $row['loginTime'];?></td>
			</tr>
	
			<!---?php 
				$cnt=$cnt+1; 
			?--->

		</table>			
	</div>

</body>
</html>