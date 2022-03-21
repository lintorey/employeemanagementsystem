<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	
    //EMP
	$sqlR = "SELECT firstName, lastName FROM employee WHERE id='$id'";
	$resultR = mysqli_query($conn, $sqlR);

    //PIC
    $sql = "SELECT pic FROM employee WHERE id='$id"; // fetch data from database
    $records = mysqli_query($conn, $sql);

?>
  

<html>
<head>
	<title>Employee Panel | Tapau Food</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
</head>
<body>
	
	<header>
		<nav>
			<h1>TapauFood</h1>
			<ul id="navli">
                <li><a class="homered" href="edash.php?id=<?php echo $id?>"">HOME</a></li>
                <li><a class="homeblack" href="ehome.php?id=<?php echo $id?>"">Dashboard</a></li>
				<li><a class="homeblack" href="eloginwel.php?id=<?php echo $id?>"">Leaderboard</a></li>
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
				<li><a class="homeblack" href="empproject.php?id=<?php echo $id?>"">My Projects</a></li>
				<li><a class="homeblack" href="applyleave.php?id=<?php echo $id?>"">Apply Leave</a></li>
				<li><a class="homeblack" href="elogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg"></div>
	<div>
		
    <body>

    <h1>
        <h2 style="text-align: center;"> Malaysia's Time Zone (GMT+0800) :  <span id='ct7' style="font-size: 30px;"></span></h2>    
    </h1>


    <div class="maindiv">
    <div class="divA">
    <div class="title">
    <h2>PERSONAL DETAILS</h2>
    </div>
    <div class="divB">
    <div class="divD">

    <p>PROFILE</p>
    <?php
        $img = mysqli_query($conn, "SELECT pic FROM employee WHERE id='$id'");
        while ($row = mysqli_fetch_array($img)) {     	
      	    echo "<center><img src='process/images/".$row['pic']."' style= 'width:100px; height:100px; border-radius:10px;' ></center><br>";   
        } 
    ?>

    <?php     
        //MySQL Query to read data
        $query = mysqli_query($conn, "SELECT firstName, lastName FROM employee WHERE id='$id");
            if (mysqli_num_rows($resultR)) {
                while ($employee = mysqli_fetch_array($resultR)) {
                    echo $employee['firstName']." ".$employee['lastName'];	
                }
            }   
    ?>

    </div>

    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query1 = mysqli_query( $conn, "SELECT * FROM employee WHERE id=$id");
            while ($row1 = mysqli_fetch_array($query1)) {
        ?>
        <div class="form">
        <h2>---Details---</h2>
        <!-- Displaying Data Read From Database -->
        <span>Employee ID:</span> <?php echo $row1['id']; ?><br>
        <span>Name:</span> <?php echo $row1['firstName']." ".$row1['lastName']; ?><br>
        <span>E-mail:</span> <?php echo $row1['email']; ?><br>
        <span>Contact No: </span> <?php echo $row1['contact']; ?><br>
        <span>Address:</span> <?php echo $row1['address']; ?><br>
        <span>Department:</span> <?php echo $row1['dept']; ?><br>
        </div>
    <?php
        }
        }
    ?>
        <div class="clear"></div>
        </div>
        <div class="clear"></div>
        </div>
        </div>
</center>



 

    </div>

    <!--Jam-->
    <script>function display_ct7() {
            var x = new Date()
            var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
            hours = x.getHours( ) % 12;
            hours = hours ? hours : 12;
            hours=hours.toString().length==1? 0+hours.toString() : hours;

            var minutes=x.getMinutes().toString()
            minutes=minutes.length==1 ? 0+minutes : minutes;

            var seconds=x.getSeconds().toString()
            seconds=seconds.length==1 ? 0+seconds : seconds;

            var month=(x.getMonth() +1).toString();
            month=month.length==1 ? 0+month : month;

            var dt=x.getDate().toString();
            dt=dt.length==1 ? 0+dt : dt;

            var x1= dt + "/" + month + "/" +  x.getFullYear(); 
            x1 = x1 + " - " +  hours + ":" +  minutes + ":" +  seconds + " " + ampm;
            document.getElementById('ct7').innerHTML = x1;
            display_c7();
        }

        function display_c7(){
            var refresh=1000; // Refresh rate in milli seconds
            mytime=setTimeout('display_ct7()',refresh)
        }

        display_c7()
    </script>

</body>
</html>