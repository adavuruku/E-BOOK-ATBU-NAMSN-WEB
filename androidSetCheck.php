<?php
session_start();
if(!isset($_SESSION['app_id']) || !isset($_SESSION['regno'])){
	header("location: androidLogin.php");
}
require_once 'settings/all_header.php';
require_once 'settings/connection.php';
$errPL=$regno=$txtEmail="";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$txtEmail =trim($_POST['txtEmail']); 
	$regno =trim($_POST['txtUsername']);
	if($txtEmail!="" && $regno!=""){
		if($txtEmail == $regno){
			$stmt_in = $conn->prepare("UPDATE userDetails SET password=? where userRegNo=? And userID=? Limit 1");
			if($stmt_in->execute(array($regno,$_SESSION['regno'],$_SESSION['app_id']))) 
			{					
				header("location: androidAppHome.php");
			}else{
				$errPL="Error: The RegNo Or Password Provided is Not Valid . Contact ICT !!!";
			}
		}else{
			$errPL="Error: Invalid Data's Provided !!!";
		}									
	}else{
			$errPL="Error: Empty Data's Provided !!!";
		}
}
?>

 
</head>
<body style="width:80%;margin:auto">


<div class="container-fluid" >
	
	<!-- middle content starts here where vertical nav slides and news ticker statr -->
	<div class="row" style="margin-top:10px;background-color:#CCFFFF;">
		<!-- middle content ends here where vertical nav slides and news ticker ends -->
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8"></div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<form role="form"  name="reg_form"  id="form" class="form-vertical" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="POST">
				<h4 style="margin-bottom:20px;background-color:#CCFF33;padding:10px">Set / Update Password - <a href="androidLogin.php">Click</a> To Login </h4>
			<hr/>
				<div class="form-group">
					<label for="txtPasswordC2">Choose Password N<u>o</u> : </label>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span> 
						<input type="password" class="form-control" onkeypress="wipeboxeror('4')" id="txtUsername" name="txtUsername" value="<?php echo $regno;?>" required="true" placeholder="Enter Password" />
					</div>
				</div>
				<div class="form-group">
					<label for="txtPasswordC2">Re-type Password : </label>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span> 
						<input type="password" onkeypress="wipeboxeror('4')" class="form-control" id="txtEmail" name="txtEmail" required="true" value="<?php echo $txtEmail;?>" placeholder="Re Enter Your Password" />
					</div>
					<span class="help-block" id="result4" style="color:brown;text-weight:bold;text-align:center;"><?php echo $errPL;?></span>
				</div>
				<div class="form-group">
					<div class="input-group">
						<input type="submit" name="proceed" style="margin-bottom:10px;padding:5px 20px 5px 20px" value="Update Details" class="btn btn-primary btn-md"></input>
					</div>
				</div>
				
			</form>
		</div>
	</div>
 </div>
</body>
</html>  
