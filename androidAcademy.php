<?php
session_start();
if(!isset($_SESSION['app_id']) || !isset($_SESSION['regno'])){
	header("location: androidLogin.php");
}
require_once 'settings/all_header.php';
require_once 'settings/connection.php';
$errPL=$dept=$txtEmail=$sname=$level="";

$txtfname="";
$txtlevel="Select Level"; $txtreligion="Select Religion";$txtgender="Select Gender"; $txtdept="Select Department" ;
$stmt_in = $conn->prepare("SELECT * FROM userDetails where userRegNo=? And userID=? And fullName<>? Limit 1");
$stmt_in->execute(array($_SESSION['regno'],$_SESSION['app_id'],""));
$affected_rows_in = $stmt_in->rowCount();
if($affected_rows_in >= 1) 
{		
	$row = $stmt_in->fetch(PDO::FETCH_ASSOC);
	$txtdept=$dept=$row['userDept'];
	$txtEmail=$row['userEmail'];
	$txtfname=$sname=$row['fullName'];
	$txtlevel=$level=$row['userLevel'];
	$txtreligion=$row['userReligion'];
	$txtgender=$row['userGender'];	
}else{
	$txtfname="";
	$txtlevel="Select Level"; $txtreligion="Select Religion";$txtgender="Select Gender"; $txtdept="Select Department" ;
}	
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit']))
{		
	$txtdept=$_POST['txtdept'];
	$txtreligion=$_POST['txtreligion'];$txtgender=$_POST['txtgender'];
	$txtlevel=$_POST['txtlevel'];
	$txtfname=$_POST['txtfname'];
	
	if( $txtfname=="" || $txtreligion=="Select Religion" || $txtgender=="Select Gender" || $txtdept=="Select Department" || $txtlevel=="Select Level" )
		{
			$errPL = "Unable to Save and Preview Your Application.. Please Verify Your Entries to Ensure they are all Provided !!";
		}else{
			$stmt_in = $conn->prepare("UPDATE userDetails SET userDept=?, fullName=?, userLevel=?, userReligion=?, userGender=? where userRegNo=? And userID=? Limit 1");
			if($stmt_in->execute(array($txtdept,$txtfname,$txtlevel,$txtreligion,$txtgender,$_SESSION['regno'],$_SESSION['app_id']))) 
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
						<label for="txtfname">Enter Your Full Name : </label>
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
							<input type="text" class="form-control" onkeypress="wipeboxeror('4')" id="txtfname" name="txtfname" value="<?php  echo $txtfname;?>" required="true" placeholder="First Name  Other Name" />
						</div>
				</div>
				<div class="form-group">
					<label for="txtgender"> Gender: </label>
					<select class="form-control js-example-basic-single" name="txtgender" id="txtgender">
						<option value="<?php echo $txtgender; ?>" ><?php echo $txtgender; ?></option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
				<div class="form-group">
					<label for="txtreligion"> Religion : </label>
					<select class="form-control js-example-basic-single"  name="txtreligion"   id="txtreligion">
						<option value="<?php echo $txtreligion; ?>" ><?php echo $txtreligion; ?></option>
						<option value="Islam">Islam</option>
						<option value="Christianity">Christianity</option>
						<option value="Others">Others</option>
					</select>
				</div>
				
				<div class="form-group">
					<label for="department"> Department : </label>
					<select class="form-control js-example-basic-single" id="department" name="txtdept">
						<option value="<?php echo $txtdept; ?>" ><?php echo $txtdept; ?></option>
						<option value="Computer Science" >Computer Science</option>
						<option value="Mathematics" >Mathematics</option>
						<option value="Statistics" >Statistics</option>
					</select>
				</div>
				<div class="form-group">
					<label for="txtlevel"> Level : </label>
					<select class="form-control js-example-basic-single" name="txtlevel" id="txtlevel">
						<option value="<?php echo $txtlevel; ?>" ><?php echo $txtlevel; ?></option>
						<option value="100">100</option>
						<option value="200">200</option> 
						<option value="300">300</option> 
						<option value="400">400</option> 
						<option value="500">500</option> 
					</select>
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
