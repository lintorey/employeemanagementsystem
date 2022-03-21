<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	$sql = "SELECT * FROM `employee` where id = '$id'";
	$result = mysqli_query($conn, $sql);
	$employee = mysqli_fetch_array($result);
	$empName = ($employee['firstName']);
	//echo "$id";
?>

<html>
<head>
	<title>Apply Leave | Employee Panel | Tapau Food</title>
	<link rel="stylesheet" type="text/css" href="styleapply.css">
</head>
<body bgcolor="#F0FFFF">
	
	<header>
		<nav>
			<h1>TapauFood</h1>
			<ul id="navli">
				<li><a class="homeblack" href="edash.php?id=<?php echo $id?>"">HOME</a></li>
                <li><a class="homeblack" href="ehome.php?id=<?php echo $id?>"">Dashboard</a></li>
				<li><a class="homeblack" href="eloginwel.php?id=<?php echo $id?>"">Leaderboard</a></li>
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
				<li><a class="homeblack" href="empproject.php?id=<?php echo $id?>"">My Projects</a></li>
				<li><a class="homered" href="applyleave.php?id=<?php echo $id?>"">Apply Leave</a></li>
				<li><a class="homeblack" href="elogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Apply Leave Form</h2>
                    <form action="process/applyleaveprocess.php?id=<?php echo $id?>" method="POST">									
						
						<div class="input-group">
							<div class="input--style-1">
							<select name="reason">
                                            <option disabled="disabled" selected="selected" required="required">Reason Apply Leave</option>
                                            <option value="Destress">Destress</option>
                                            <option value="Family Commitments">Family Commitments</option>
											<option value="Mental Health Day">Mental Health Day</option>
                                            <option value="Enjoy The Weather">Enjoy The Weather</option>
											<option value="Vacation">Vacation</option>
                                            <option value="Difficulty In Concentrating">Difficulty In Concentrating</option>
											<option value="Family Emergency">Family Emergency</option>
                                            <option value="Medical Emergency">Medical Emergency</option>
											<option value="Bereavement Leave">Bereavement Leave</option>
                                            <option value="Religious Reason">Religious Reason</option>
											<option value="Parental Duties">Parental Duties</option>
                                            <option value="Doctor’s Appointment">Doctor’s Appointment</option>
											<option value="Menstrual Cramps">Menstrual Cramps</option>
											<option value="Other Reason<">Other Reason</option>

											<?php
												if(isset($_GET["other"])){
													'<input class="input--style-1" type="text" placeholder="Other Reason" name="reason"></input>';
												}
											?>		

							</select>
							<div class="select-dropdown"></div>
							<br>			
											<!--input class="input--style-1" type="text" placeholder="Other Reason" name="reason"></input-->
							</div>
						</div>

						

                        <div class="row row-space">
                            <div class="col-2">
                            	<p>Start Date</p>
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="start" name="start" required="required">
                                </div>

                            </div>
                            <div class="col-2">
                            	<p>End Date</p>
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="end" name="end" required="required"> 
                                </div>
                            </div>
                        </div>

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<table>
			<tr>
				<th align = "center">Emp. ID</th>
				<th align = "center">Name</th>
				<th align = "center">Start Date</th>
				<th align = "center">End Date</th>
				<th align = "center">Total Days</th>
				<th align = "center">Reason</th>
				<th align = "center">Status</th>
			</tr>


			<?php

				$sql = "Select employee.id, employee.firstName, employee.lastName, employee_leave.start, employee_leave.end, employee_leave.reason, employee_leave.status From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token";
				$result = mysqli_query($conn, $sql);
				while ($employee = mysqli_fetch_assoc($result)) {
					$date1 = new DateTime($employee['start']);
					$date2 = new DateTime($employee['end']);
					$interval = $date1->diff($date2);
					$interval = $date1->diff($date2);

					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";	
					echo "<td>".$employee['start']."</td>";
					echo "<td>".$employee['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$employee['reason']."</td>";
					echo "<td>".$employee['status']."</td>";
				}

			?>

		</table>

</body>
</html>