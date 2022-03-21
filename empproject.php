<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	 
	$sql = "SELECT * FROM `project` where eid = '$id'";
	$result = mysqli_query($conn, $sql);
	
?>

<html>
<head>
	<title>Employee Panel | Tapau Food</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	
	<header>
		<nav>
			<h1>TapauFood</h1>
			<ul id="navli">
				<li><a class="homeblack" href="edash.php?id=<?php echo $id?>"">HOME</a></li>
                <li><a class="homeblack" href="ehome.php?id=<?php echo $id?>"">Dashboard</a></li>
				<li><a class="homeblack" href="eloginwel.php?id=<?php echo $id?>"">Leaderboard</a></li>
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
				<li><a class="homered" href="empproject.php?id=<?php echo $id?>"">My Projects</a></li>
				<li><a class="homeblack" href="applyleave.php?id=<?php echo $id?>"">Apply Leave</a></li>
				<li><a class="homeblack" href="elogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">

		<table>
			<tr>
				<th align = "center">Project ID</th>
				<th align = "center">Project Name</th>
				<th align = "center">Due Date</th>
				<th align = "center">Sub Date</th>
				<!--th align = "center">File</th-->
				<th align = "center">Remark</th>
				<th align = "center">Mark</th>
				<th align = "center">Status</th>
				<th align = "center">Option</th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['pid']."</td>";
					echo "<td>".$employee['pname']."</td>";
					echo "<td>".$employee['duedate']."</td>";
					echo "<td>".$employee['subdate']."</td>";
					//echo "<td>".$employee['file']."</td>";
					echo "<td>".$employee['remark']."</td>";
					echo "<td>".$employee['mark']."</td>";
					echo "<td>".$employee['status']."</td>";

					echo "<td><a href=\"psubmit.php?pid=$employee[pid]&id=$employee[eid]\" onClick=\"return confirm('Are you sure you want to Submit Project?')\"><hi>Submit</a></hi> | <a href=\"cancelproject.php?pid=$employee[pid]&id=$employee[eid]\" onClick=\"return confirm('Are you sure you want to Unsubmmit Project?')\"><hi>Cancel</a></hi></td>";
				}
			?>
		</table>

</body>
</html>