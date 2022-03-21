<?php 
    require_once ('process/dbh.php');
	//show data
    $sql =" SELECT id FROM employee";
    $result = mysqli_query($conn, $sql);

	//leave
    $sqlL =" SELECT id FROM employee_leave";
    $resultL = mysqli_query($conn, $sqlL);

	//best emp rank
	$sqlR = "SELECT firstName, lastName FROM employee, rank WHERE rank.eid = employee.id ORDER BY rank.points DESC LIMIT 1";
	$resultR = mysqli_query($conn, $sqlR);
	
	//project due
	/*$sqlD = "SELECT COUNT(id) AS `count` FROM `project` WHERE status='Due'";
	$resultD = mysqli_query($conn, $sqlD);

	//project submit
	$sqlS = "SELECT COUNT(id) AS `count` FROM `project` WHERE status='Submitted'";
	$resultS = mysqli_query($conn, $sqlS);*/

	//project
    $sqlD = "SELECT id FROM project WHERE status='Due'";
    $resultD = mysqli_query($conn, $sqlD);

	$sqlS = "SELECT id FROM project WHERE status='Submitted'";
    $resultS = mysqli_query($conn, $sqlS);


?>

<html>
<head>
	<title>Admin Panel | Tapau Food</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
</head>
<body>
	
	<header>
		<nav>
			<h1>TapauFood</h1>
			<ul id="navli">
				<li><a class="homered" href="home.php">HOME</a></li>
                <li><a class="homeblack" href="aloginwel.php">Leaderboard</a></li>
				<!---li><a class="homeblack" href="tracer.php">Tracer</a></li--->
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
		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 35px; text-align: center;">DASHBOARD</h2>
    	<table>
            <div>

			<div class="content">
                <h1>
				<?php
					$resultR = mysqli_query($conn, "SELECT firstName, lastName FROM employee, rank WHERE rank.eid = employee.id ORDER BY rank.points DESC LIMIT 1");
					if (mysqli_num_rows($resultR)) {
						while ($employee = mysqli_fetch_array($resultR)) {
							echo $employee['firstName']." ".$employee['lastName'];	
						}
					}
				?>
                </h1>
                   <h1>BEST EMPLOYEE</h1>
            </div>

            <div class="content">
                <h1> 
                    <?php   

						$result = mysqli_query($conn, "SELECT COUNT(id) AS `count` FROM `employee`");
						$row = mysqli_fetch_array($result);
						$count = $row['count'];
						echo $count;
		            ?>
                </h1>
                    <h1>TOTAL EMPLOYEES</h1>
            </div>
		
            <div class="content">
                <h1>
                    <?php 
			            $result = mysqli_query($conn, "SELECT COUNT(id) AS `count` FROM `employee_leave` WHERE 	`status`='Approved'");
						$row = mysqli_fetch_array($result);
						$count = $row['count'];
						echo $count;
		            ?>
                </h1>
                   <h1>EMPLOYEES ON-LEAVE</h1>
            </div>

			<div class="content">
                <h1>
                    <?php 
			            $result = mysqli_query($conn, "SELECT COUNT(id) AS `count` FROM `employee_leave` WHERE status='Pending'");
						$row = mysqli_fetch_array($result);
						$count = $row['count'];
						echo $count;
		            ?>
                </h1>
                   <h1>LEAVE PENDING</h1>
            </div>

			<div class="content">
                <h1>
                    <?php 
			            $resultD = mysqli_query($conn, "SELECT COUNT(eid) AS `count` FROM `project` WHERE status='Due'");
						$row = mysqli_fetch_array($resultD);
						$count = $row['count'];
						echo $count;

						/*$resultD = "SELECT COUNT(eid) AS `count` FROM `project` WHERE status='Due'";
						$row = mysqli_query($conn,$resultD);
						$count = mysqli_fetch_array($row);
						print_r($count) ;*/
		            ?>
                </h1>
                   <h1>PROJECT ON-GOING</h1>
            </div>

			<div class="content">
                <h1>
                    <?php 

						$resultS = mysqli_query($conn, "SELECT COUNT(eid) AS `count` FROM `project` WHERE status='Submitted'");
						$row = mysqli_fetch_array($resultS);
						$count = $row['count'];
						echo $count;

			        	/*$resultS = "SELECT COUNT(eid) AS `count` FROM `project` WHERE status='Submitted'";
						$row = mysqli_query($conn,$resultS);
						$count = mysqli_fetch_array($row);
						print_r($count) ;*/
					?>
				</h1>
                   <h1>PROJECT SUBMITTED</h1>
            </div>

			<div class="content">
                <h1>
                    <?php 
			            $result = mysqli_query($conn, "SELECT COUNT(id) AS `count` FROM `employee_leave`");
						$row = mysqli_fetch_array($result);
						$count = $row['count'];
						echo $count;
		            ?>
                </h1>
                   <h1>TEST SPARE</h1>
            </div>

        </div>
        </table>

</div>

	
</body>
</html>