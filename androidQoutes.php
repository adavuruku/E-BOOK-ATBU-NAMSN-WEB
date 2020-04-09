<?php
session_start();
if(!isset($_SESSION['app_id']) || !isset($_SESSION['regno'])){
	header("location: androidLogin.php");
}
require_once 'settings/all_header.php';
require_once 'settings/connection.php';
$errPL=$dept=$txtEmail=$sname=$level="";
$txtcPermadd="";
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
	
	$txtcPermadd=$row['userQoute'];
	if($txtcPermadd ==""){
		$txtcPermadd="";
	}
}
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit']))
{		
	$txtcPermadd=$_POST['txtcPermadd'];
	if($txtcPermadd=="" )
		{
			$errPL = "Unable to Update Your Qoutes.. Please Verify Your Entries to Ensure they are all Provided !!";
		}else{
			$stmt_in = $conn->prepare("UPDATE userDetails SET userQoute=? where userRegNo=? And userID=? Limit 1");
			if($stmt_in->execute(array($txtcPermadd, $_SESSION['regno'],$_SESSION['app_id']))) 
			{					
				header("location: androidAppHome.php");
			}else{
				$errPL="Error: The RegNo Or Password Provided is Not Valid . Contact ICT !!!";
			}
		}
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
			<form role="form"  name="reg_form"  id="form" class="form-vertical" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="POST">
				<div class="form-group">
					<label for="txtcPermadd">Enter Your Qoutes / Thoughts : </label>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
						<textarea class="form-control"  rows="20" id="txtcPermadd" name="txtcPermadd" required="true" placeholder="Enter Your Qoutes Or Thoughts">
							<?php echo $txtcPermadd;?>
						</textarea>
					</div>
				</div>
				<div class="form-group pull-right">
					<div class="input-group" style="color:red">
						<?php echo $errPL;?>
					</div>
				</div>
				<div class="form-group pull-right">
					<div class="input-group">
						<input type="submit" name="submit" style="margin-bottom:10px;padding:5px 20px 5px 20px" value="Update Application" class="btn btn-primary btn-md"></input>
					</div>
				</div>
			</form>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-top:15px;margin-bottom:15px;">
			<?php require_once("settings/androidNavLeft.php");?>
		</div>
	</div>
 </div>
</body>
</html>  
