<?php

require_once ('process/dbh.php');

//$sql = "SELECT * from `employee_leave`";
$sql = "Select employee.id, employee.firstName, employee.lastName, employee_leave.start, employee_leave.end, employee_leave.reason, employee_leave.status, employee_leave.token From employee, employee_leave Where employee.id = employee_leave.id order by employee_leave.token";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>

<html>
<head>
	<title>Employee Leave | Admin Panel | Tapau Food</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	
	<header>
		<nav>
			<h1>TapauFood</h1>
			<ul id="navli">
				<li><a class="homeblack" href="home.php">HOME</a></li>
                <li><a class="homeblack" href="aloginwel.php">Leaderboard</a></li>
				<!---li><a class="homeblack" href="tracer.php">Tracer</a></li--->
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homeblack" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homered" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>

	<!--div>
		<input type="text" id="input" onkeyup="search()" placeholder="Search Name ...">
	</div-->

	<div id="divimg">
		<table id="myTable">
			<tr>
				<th>Emp. ID</th>
				<th>Token</th>
				<th>Name</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Total Days</th>
				<th>Reason</th>
				<th>Status</th>
				<th>Options</th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {

				$date1 = new DateTime($employee['start']);
				$date2 = new DateTime($employee['end']);
				$interval = $date1->diff($date2);
				$interval = $date1->diff($date2);
				//echo "difference " . $interval->days . " days ";

					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td>".$employee['token']."</td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['start']."</td>";
					echo "<td>".$employee['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$employee['reason']."</td>";
					echo "<td>".$employee['status']."</td>";
					echo "<td><a href=\"approve.php?id=$employee[id]&token=$employee[token]\" onClick=\"return confirm('Are you sure you want to Approve the request?')\"><hi>Approve</a></hi> <a href=\"cancel.php?id=$employee[id]&token=$employee[token]\" onClick=\"return confirm('Are you sure you want to Cancel the request?')\"><hi>Cancel</a></hi></td>";
				}
			?>

		</table>
		
	</div>

	<!--script>
		function search() {
			//declare var
			var input, filter, table, td, tr, th;
			input= document.getElementById("input");
			filter=input.value.textContent ();
			table= document.getElementById("myTable");
			td= table.getElementsByTagName("td");

			//loop all
			for (i=0; i<td.length; i++) {
				tr = td[i].getElementsByTagName("tr")[0];
				if (tr) {
					txtValue = tr.textContent || tr.innerText;
					if (txtValue.textContent().indexOf(filter)> -1) {
						td[i].style.display = " ";
					}
					else {
						td[i].style.display = "none";
					}
				}
			}
		}
	</script-->

</body>
</html>