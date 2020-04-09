<?php
session_start();
if(!isset($_SESSION['app_id']) || !isset($_SESSION['regno'])){
	header("location: androidLogin.php");
}
require_once 'settings/all_header.php';
require_once 'settings/connection.php';
$errPL=$dept=$txtEmail=$sname=$level="";
		$stmt_in = $conn->prepare("SELECT * FROM userDetails where userRegNo=? And userID=? Limit 1");
		$stmt_in->execute(array($_SESSION['regno'],$_SESSION['app_id']));
		$affected_rows_in = $stmt_in->rowCount();
		if($affected_rows_in >= 1) 
		{		
			$row = $stmt_in->fetch(PDO::FETCH_ASSOC);
			$dept=$row['userDept'];
			$txtEmail=$row['userEmail'];
			$sname=$row['fullName'];
			$level=$row['userLevel'];
			
		}else{
			$errPL="Error: The RegNo Or Password Provided is Not Valid . Contact ICT !!!";
		}									

?>

 
</head>
<body style="width:80%;margin:auto">


<div class="container-fluid" >
	
	<!-- middle content starts here where vertical nav slides and news ticker statr -->
	<div class="row" style="margin-top:10px;background-color:#CCFFFF;">
		<!-- middle content ends here where vertical nav slides and news ticker ends -->
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-top:15px;margin-bottom:15px;">
			<?php require_once("settings/androidDetails.php");?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-top:15px;margin-bottom:15px;">
			<a style="text-weight:bold;margin-top:10px" class="list-group-item" href="androidAcademy.php" >
				<span class="glyphicon glyphicon-pencil"></span> Update Accademic Information <span class="glyphicon glyphicon-circle-arrow-right pull-right"></span>
			</a>
			<a style="text-weight:bold;margin-top:10px" class="list-group-item" href="androidContact.php" >
				<span class="glyphicon glyphicon-pencil"></span> Update Address Contact <span class="glyphicon glyphicon-circle-arrow-right pull-right"></span>
			</a>
			<a style="text-weight:bold;margin-top:10px" class="list-group-item" href="androidChangePics.php" >
				<span class="glyphicon glyphicon-pencil"></span> Upload / Change Passport <span class="glyphicon glyphicon-circle-arrow-right pull-right"></span>
			</a>
			<a style="text-weight:bold;margin-top:10px" class="list-group-item" href="androidQoutes.php" >
				<span class="glyphicon glyphicon-pencil"></span> Upload / Edit Qoute <span class="glyphicon glyphicon-circle-arrow-right pull-right"></span>
			</a>
			<a style="text-weight:bold;margin-top:10px" class="list-group-item" href="androidPhone.php" >
				<span class="glyphicon glyphicon-pencil"></span> Update / Add More Phone <span class="glyphicon glyphicon-circle-arrow-right pull-right"></span>
			</a>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-top:15px;margin-bottom:15px;">
			<a style="text-weight:bold;margin-top:10px" class="list-group-item" href="androidBestMoment.php" >
				<span class="glyphicon glyphicon-pencil"></span> Upload / Edit Best Moment <span class="glyphicon glyphicon-circle-arrow-right pull-right"></span>
			</a>
			<a style="text-weight:bold;margin-top:10px" class="list-group-item" href="androidFriend.php" >
				<span class="glyphicon glyphicon-pencil"></span> Upload / Edit Best ATBU Friend <span class="glyphicon glyphicon-circle-arrow-right pull-right"></span>
			</a>
			<a style="text-weight:bold;margin-top:10px" class="list-group-item" href="androidCourses.php" >
				<span class="glyphicon glyphicon-pencil"></span> Upload / Edit Best Course <span class="glyphicon glyphicon-circle-arrow-right pull-right"></span>
			</a>
			<a style="text-weight:bold;margin-top:10px" class="list-group-item" href="androidLecturer.php" >
				<span class="glyphicon glyphicon-pencil"></span> Upload / Edit Best Lecturer <span class="glyphicon glyphicon-circle-arrow-right pull-right"></span>
			</a>
			
			<a style="color:red;text-weight:bold;margin-top:10px" class="list-group-item" href="androidLogin.php" >
				<span class="glyphicon glyphicon-pencil"></span> Sign Out <span class="glyphicon glyphicon-circle-arrow-right pull-right"></span>
			</a>
		</div>
	</div>
 </div>
</body>
</html>  
