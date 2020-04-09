<?php
session_start();
if(isset($_SESSION['app_id']) || isset($_SESSION['regno']) || isset($_SESSION['email_id'])){
	unset($_SESSION['regno']);
	unset($_SESSION['email_id']);
	unset($_SESSION['app_id']);

}
require_once 'settings/all_header.php';
require_once 'settings/connection.php';
$errPL=$regno=$txtEmail="";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$txtEmail =trim($_POST['txtEmail']); 
	$regno =trim($_POST['txtUsername']);
	if($txtEmail!="" && $regno!=""){
		$stmt_in = $conn->prepare("SELECT * FROM userDetails where userRegNo=? OR userEmail=? Limit 1");
		$stmt_in->execute(array($regno,$txtEmail));
		$affected_rows_in = $stmt_in->rowCount();
		if($affected_rows_in >= 1) 
		{	
			$errPL="Error: The RegNo Or Password Provided is Not Valid . Contact ICT !!!";
			
		}else{
			$numL=mt_rand(340057180,990029567);
			$app_id = "NAMS".$numL;
			$sth = $conn->prepare ("INSERT INTO userDetails (userRegNo, userEmail, userID) VALUES (?,?,?)");	
			$sth->bindValue (1, $regno);
			$sth->bindValue (2, $txtEmail);
			$sth->bindValue (3, $app_id);
			if($sth->execute()){
				$_SESSION['app_id'] = $app_id;
				$_SESSION['regno'] = $regno;
				$_SESSION['email_id'] = $txtEmail;
				header("location: androidSetCheck.php");
			}
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
				<h4 style="margin-bottom:20px;background-color:#CCFF33;padding:10px">Login To Update Information - <a href="index.php">Click</a> To Create New Account </h4>
			<hr/>
				<div class="form-group">
					<label for="txtPasswordC2">Matriculation / Registration N<u>o</u> : </label>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" class="form-control" onkeypress="wipeboxeror('4')" id="txtUsername" name="txtUsername" value="<?php echo $regno;?>" required="true" placeholder="Enter Matriculation / Registration No" />
					</div>
				</div>
				<div class="form-group">
					<label for="txtPasswordC2">Email Address : </label>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span> 
						<input type="Email" onkeypress="wipeboxeror('4')" class="form-control" id="txtEmail" name="txtEmail" required="true" value="<?php echo $txtEmail;?>" placeholder="Enter Your Email Address" />
					</div>
					<span class="help-block" id="result4" style="color:brown;text-weight:bold;text-align:center;"><?php echo $errPL;?></span>
				</div>
				<div class="form-group">
					<div class="input-group">
						<input type="submit" name="proceed" style="margin-bottom:10px;padding:5px 20px 5px 20px" value="Login" class="btn btn-primary btn-md"></input>
					</div>
				</div>
				
			</form>
		</div>
	</div>
 </div>
</body>
</html>  
