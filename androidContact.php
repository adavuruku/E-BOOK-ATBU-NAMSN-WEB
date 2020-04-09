<?php
session_start();
if(!isset($_SESSION['app_id']) || !isset($_SESSION['regno'])){
	header("location: androidLogin.php");
}
require_once 'settings/all_header.php';
require_once 'settings/connection.php';
$errPL=$dept=$txtEmail=$sname=$level="";
$txtPermadd=$txtcPermadd="";
$txtstate="Select State" ;$txtlgov="Select Local Government";
$txtcstate="Select State" ;$txtclgov="Select Local Government";

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
	
	$txtstate=$row['userState'];
	$txtlgov=$row['userLgov'];
	$txtcstate=$row['userCState'];
	$txtclgov=$row['userCLgov'];	
	$txtPermadd=$row['userPermAdd'];$txtcPermadd=$row['userCPermAdd'];
	if($txtcstate ==""){
		$txtPermadd=$txtcPermadd="";
		$txtstate="Select State" ;$txtlgov="Select Local Government";
		$txtcstate="Select State" ;$txtclgov="Select Local Government";
	}
}
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit']))
{		
	$txtcPermadd=$_POST['txtcPermadd'];
	$txtPermadd=$_POST['txtPermadd'];
	$txtstate=$_POST['txtstate'];
	$txtlgov=$_POST['txtlgov'];
	$txtcstate=$_POST['txtcstate'];$txtclgov=$_POST['txtclgov'];
	
	if( $txtPermadd=="" || $txtcPermadd=="" || $txtstate=="Select State" || $txtlgov=="Select Local Government" || $txtcstate=="Select State" || $txtclgov=="Select Local Government" )
		{
			$errPL = "Unable to Update Your Application.. Please Verify Your Entries to Ensure they are all Provided !!";
		}else{
			$stmt_in = $conn->prepare("UPDATE userDetails SET userCPermAdd=?, userPermAdd=?, userState=?, userLgov=?, userCState=?, userCLgov=? where userRegNo=? And userID=? Limit 1");
			if($stmt_in->execute(array($txtcPermadd,$txtPermadd,$txtstate,$txtlgov,$txtcstate,$txtclgov,$_SESSION['regno'],$_SESSION['app_id']))) 
			{					
				header("location: androidAppHome.php");
			}else{
				$errPL="Error: The RegNo Or Password Provided is Not Valid . Contact ICT !!!";
			}
		
		}

}

								

?>

<link rel="stylesheet" type="text/css" href="settings/css/select2.css"/>
<link rel="stylesheet" type="text/css" href="settings/css/select2.min.css"/>
<script type="text/javascript" src="settings/js/select2.js"></script>
<script type="text/javascript" src="settings/js/select2.min.js"></script> 
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
					<label for="cmbstate"> State: </label>
					<select class="form-control js-example-basic-single" id="cmbstate" name="txtstate" onchange="stateComboChange();">
						
						<option value="<?php echo $txtstate; ?>" ><?php echo $txtstate; ?></option>
						<option value="Abuja" title="Abuja">Abuja</option>
						<option value="Abia" title="Abia">Abia</option>
						<option value="Adamawa" title="Adamawa">Adamawa</option>
						<option value="Akwa Ibom" title="Akwa Ibom">Akwa Ibom</option>
						<option value="Anambra" title="Anambra">Anambra</option>
						<option value="Bauchi" title="Bauchi">Bauchi</option>
						<option value="Bayelsa" title="Bayelsa">Bayelsa</option>
						<option value="Benue" title="Benue">Benue</option>
						<option value="Bornu" title="Bornu">Bornu</option>
						<option value="Cross River" title="Cross River">Cross River</option>
						<option value="Delta" title="Delta">Delta</option>
						<option value="Ebonyi" title="Ebonyi">Ebonyi</option>
						<option value="Edo" title="Edo">Edo</option>
						<option value="Ekiti" title="Ekiti">Ekiti</option>
						<option value="Enugu" title="Enugu">Enugu</option>
						<option value="Gombe" title="Gombe">Gombe</option>
						<option value="Imo" title="Imo">Imo</option>
						<option value="Jigawa" title="Jigawa">Jigawa</option>
						<option value="Kaduna" title="Kaduna">Kaduna</option>
						<option value="Kano" title="Kano">Kano</option>
						<option value="Katsina" title="Katsina">Katsina</option>
						<option value="Kebbi" title="Kebbi">Kebbi</option>
						<option  value="Kogi" title="Kogi">Kogi</option>
						<option value="Kwara" title="Kwara">Kwara</option>
						<option value="Lagos" title="Lagos">Lagos</option>
						<option value="Nassarawa" title="Nassarawa">Nassarawa</option>
						<option value="Niger" title="Niger">Niger</option>
						<option value="Ogun" title="Ogun">Ogun</option>
						<option value="Ondo" title="Ondo">Ondo</option>
						<option value="Osun" title="Osun">Osun</option>
						<option value="Oyo" title="Oyo">Oyo</option>
						<option value="Plateau" title="Plateau">Plateau</option>
						<option value="Rivers" title="Rivers">Rivers</option>
						<option value="Sokoto" title="Sokoto">Sokoto</option>
						<option value="Taraba" title="Taraba">Taraba</option>
						<option value="Yobe" title="Yobe">Yobe</option>
						<option value="Zamfara" title="Zamfara">Zamfara</option>
					</select>
				</div>
				<div class="form-group">
					<label for="cmblgov"> Local Government: </label>
					<select class="form-control js-example-basic-single" id="cmblgov" name="txtlgov">
						<option value="<?php echo $txtlgov; ?>" ><?php echo $txtlgov; ?></option>
					</select>
				</div>
				<div class="form-group">
					<label for="txtPermadd">Permanent Address : </label>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
						<textarea class="form-control"  rows="2" id="txtPermadd" name="txtPermadd" required="true" placeholder="Enter Permanent Address">
							<?php echo $txtPermadd;?>
						</textarea>
					</div>
				</div>
				<div class="form-group">
					<input type="checkbox" id="samedetails" OnClick="samedetails1()" >Click here If Current Contact Details is same with Permanent Contact</input>
				</div>
				
				
				<div class="form-group">
					<label for="cmbstate"> Current State: </label>
					<select class="form-control js-example-basic-single" id="cmbcstate" name="txtcstate" onchange="stateCombo();">
						
						<option value="<?php echo $txtcstate; ?>" ><?php echo $txtcstate; ?></option>
						<option value="Abuja" title="Abuja">Abuja</option>
						<option value="Abia" title="Abia">Abia</option>
						<option value="Adamawa" title="Adamawa">Adamawa</option>
						<option value="Akwa Ibom" title="Akwa Ibom">Akwa Ibom</option>
						<option value="Anambra" title="Anambra">Anambra</option>
						<option value="Bauchi" title="Bauchi">Bauchi</option>
						<option value="Bayelsa" title="Bayelsa">Bayelsa</option>
						<option value="Benue" title="Benue">Benue</option>
						<option value="Bornu" title="Bornu">Bornu</option>
						<option value="Cross River" title="Cross River">Cross River</option>
						<option value="Delta" title="Delta">Delta</option>
						<option value="Ebonyi" title="Ebonyi">Ebonyi</option>
						<option value="Edo" title="Edo">Edo</option>
						<option value="Ekiti" title="Ekiti">Ekiti</option>
						<option value="Enugu" title="Enugu">Enugu</option>
						<option value="Gombe" title="Gombe">Gombe</option>
						<option value="Imo" title="Imo">Imo</option>
						<option value="Jigawa" title="Jigawa">Jigawa</option>
						<option value="Kaduna" title="Kaduna">Kaduna</option>
						<option value="Kano" title="Kano">Kano</option>
						<option value="Katsina" title="Katsina">Katsina</option>
						<option value="Kebbi" title="Kebbi">Kebbi</option>
						<option  value="Kogi" title="Kogi">Kogi</option>
						<option value="Kwara" title="Kwara">Kwara</option>
						<option value="Lagos" title="Lagos">Lagos</option>
						<option value="Nassarawa" title="Nassarawa">Nassarawa</option>
						<option value="Niger" title="Niger">Niger</option>
						<option value="Ogun" title="Ogun">Ogun</option>
						<option value="Ondo" title="Ondo">Ondo</option>
						<option value="Osun" title="Osun">Osun</option>
						<option value="Oyo" title="Oyo">Oyo</option>
						<option value="Plateau" title="Plateau">Plateau</option>
						<option value="Rivers" title="Rivers">Rivers</option>
						<option value="Sokoto" title="Sokoto">Sokoto</option>
						<option value="Taraba" title="Taraba">Taraba</option>
						<option value="Yobe" title="Yobe">Yobe</option>
						<option value="Zamfara" title="Zamfara">Zamfara</option>
					</select>
				</div>
				<div class="form-group">
					<label for="cmblgov">Current Local Government: </label>
					<select class="form-control js-example-basic-single" id="cmbclgov" name="txtclgov">
						<option value="<?php echo $txtclgov; ?>" ><?php echo $txtclgov; ?></option>
					</select>
				</div>
				<div class="form-group">
					<label for="txtcPermadd">Current Address : </label>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
						<textarea class="form-control"  rows="2" id="txtcPermadd" name="txtcPermadd" required="true" placeholder="Enter Current Address">
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
 <script type="text/javascript">
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});
</script>
</body>
</html>  
