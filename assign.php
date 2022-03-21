<!DOCTYPE html>
<html>

<head>
    <!--meta name="viewport" content="width=device-width, initial-scale=1"--->
    
    <!-- Title Page-->
    <title>Assign Project | Admin Panel</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<style>
    body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #c108ff;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 10%;
  border-radius: 15%;
}

.container {
  padding: 66px;
  background-color: white;
  background-image: linear-gradient(rgba(87, 222, 240, 0.466), rgba(172, 41, 233, 0.39));
  background-size: 12px;
  margin: 76px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>

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
				        <li><a class="homered" href="assign.php">Assign Project</a></li>
				        <li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				        <li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				        <li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				        <li><a class="homeblack" href="alogin.html">Log Out</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="divider"></div>

    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <center>
                    <h1 class="title">Assign Project</h1>

                    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Individual</button>
                    <!--button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Grouping</button--->
                    </center>

                <!---individual--->
                    <form action="process/assignp.php" method="POST" enctype="multipart/form-data">
                        <div id="id01" class="modal">
                          <form class="modal-content animate" action="/action_page.php" method="post">
                            <div class="imgcontainer">
                              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                              <img src="assets/individual.jpg" alt="Avatar" class="avatar">
                            </div>
                            <div class="container">
                              <label for="eid"><b>Employee ID</b></label>
                              <input type="text" placeholder="Employee ID" name="eid" required>
                              <label for="pname"><b>Project Name</b></label><br>
                              <input type="text" placeholder="Project Name" name="pname" required> 
                              <label for="duedate"><b>Deadline</b></label><br>
                              <input type="date" placeholder="date" name="duedate" required><br><br>
                              <label for="rmark"><b>Remarks</b></label><br>
                              <input type="text" placeholder="Remarks" name="remark">
                              <label for="file"><b>Files</b></label><br>
                              <input type="file" placeholder="Files" name="file"><br>
                              <button type="submit">Assign</button>
                            </div>
                            <!--div class="container" style="background-color:#f1f1f1" align="center">
                              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                            </div-->
                          </form>
                        </div>
                    </form>

                    <!---grouping>
                        <form action="process/assignp.php" method="POST" enctype="multipart/form-data">
                            <div id="id02" class="modal">
                              <form class="modal-content animate" action="/action_page.php" method="post">
                                <div class="imgcontainer">
                                  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                                  <img src="assets/grouping.png"" alt="Avatar" class="avatar">
                                </div>
                                <div class="container">
                                  <label for="eid"><b>Leader Employee ID</b></label>
                                  <input type="text" placeholder="Employee ID" name="eid" required>
                                  <label for="eid"><b>Employee ID Member</b></label>
                                  <input type="text" placeholder="Employee ID Member" name="eid" required>
                                  <input type="text" placeholder="Employee ID Member" name="eid">
                                  <input type="text" placeholder="Employee ID Member" name="eid">
                                  <input type="text" placeholder="Employee ID Member" name="eid">
                                  <input type="text" placeholder="Employee ID Member" name="eid">
                                  <label for="pname"><b>Project Name</b></label><br>
                                  <input type="text" placeholder="Project Name" name="pname" required> 
                                  <label for="duedate"><b>Deadline</b></label><br>
                                  <input type="date" placeholder="date" name="duedate" required><br><br>
                                  <label for="rmark"><b>Remarks</b></label><br>
                                  <input type="text" placeholder="Remarks" name="rmark">
                                  <label for="file"><b>Files</b></label><br>
                                  <input type="file" placeholder="Files" name="file"><br>
                                  <button type="submit">Assign</button>
                                </div>
                                <div class="container" style="background-color:#f1f1f1" align="center">
                                  <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                                </div>
                              </form>
                            </div>
                        </form--->

                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Get the modal
        var modal = document.getElementById('id02');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>
</html>