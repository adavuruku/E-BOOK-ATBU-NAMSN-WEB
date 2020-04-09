<?php
session_start();
require_once 'settings/all_header.php';
require_once 'settings/connection.php';
$errPL=$dept=$txtEmail=$sname=$level="";
$txtdept=$txtreligion=$txtgender=$txtlevel=$txtregno=$txtemail=$txtfname="";

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit']))
{		
	$txtdept=$_POST['txtdept'];
	$txtreligion=$_POST['txtreligion'];$txtgender=$_POST['txtgender'];
	$txtlevel=$_POST['txtlevel'];
	$txtregno=$_POST['txtregno'];
	$txtemail=$_POST['txtemail'];
	$txtfname=$_POST['txtfname'];
	$numL=mt_rand(340057180,990029567);
	$app_id = "NAMS".$numL;
	//save in details table
	$stmt_in = $conn->prepare("INSERT INTO userDetails (userDept,fullName,userLevel,userReligion,userGender,userQoute,userState,userLgov,userPermAdd,userCState,userCLgov,userCPermAdd,userBestMoment,userRegNo,userEmail,userID,password) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
	$stmt_in->execute(array($txtdept,$txtfname,$txtlevel,$txtreligion,$txtgender,"We all Have a starting point that we cant determined but an end we can determined","Kaduna",
						"Kaduna South","No.35 Kad Street Kaduna","Kaduna",
						"Kaduna South","No.35 Kad Street Kaduna","My Registration Date",$txtregno,$txtemail,$app_id,"111"));
	
				$tmpName  = $_FILES['image-file']['tmp_name'];
				$extension = substr(strrchr($_FILES['image-file']['name'], "."), 1);
				$newpath= $app_id.".$extension";
				$moveto= "resource/".$newpath;
				move_uploaded_file($tmpName,$moveto);
			//courses
				$stmt_in = $conn->prepare("INSERT INTO usercourse (bestCourses,userID) VALUES (?,?)");
				$stmt_in->execute(array("File Processing",$app_id));
				$stmt_in->execute(array("Introduction to Probability Theory",$app_id));
				$stmt_in->execute(array("Set Theory Analysis",$app_id));
				
				$stmt_in = $conn->prepare("INSERT INTO userPhone (phone,userID) VALUES (?,?)");
				$stmt_in->execute(array("0810651122",$app_id)); 
				$stmt_in->execute(array("07065114352",$app_id)); 
				
				$stmt_in = $conn->prepare("INSERT INTO userlecturer (bestLecturer,userID) VALUES (?,?)");
				$stmt_in->execute(array("Prof. Adams Kabir",$app_id)); 
				$stmt_in->execute(array("Dr. Adinoyi Ahmed",$app_id));
				
				$stmt_in = $conn->prepare("INSERT INTO userbest (bestFriend,userID) VALUES (?,?)");
				$stmt_in->execute(array("Karim Salihu",$app_id)); 
				$stmt_in->execute(array("John Adama K",$app_id)); 
}

								

?>

 
</head>
<body style="width:80%;margin:auto">


<div class="container-fluid" >
	
	<!-- middle content starts here where vertical nav slides and news ticker statr -->
	<div class="row" style="margin-top:10px;background-color:#CCFFFF;">
		<!-- middle content ends here where vertical nav slides and news ticker ends -->
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-top:15px;margin-bottom:15px;">
			<?php //require_once("settings/androidDetails.php");?>
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-top:15px;margin-bottom:15px;">
			<form role="form"  name="reg_form"  id="form" class="form-vertical" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="POST">
				<div class="imageupload panel panel-primary" id="my-imageupload">
					<div class="panel-heading clearfix">
						<h3 class="panel-title pull-left">Upload Passport - jpg / jpeg - <= 500kb - 250 X 250</h3>
					</div>
					<div class="file-tab panel-body">
						<label class="btn btn-default btn-file">
							<span>Browse</span>
							<!-- The file is stored here. -->
							<input type="file" name="image-file">
						</label>
						<button type="button" class="btn btn-default">Remove</button>
					</div>
				</div>
				<script src="settings/js/bootstrap-imageupload.js"></script>
				<script>
					var $imageupload = $('.imageupload');
					$imageupload.imageupload();
					$('#my-imageupload').imageupload({
						allowedFormats: [ 'jpg','jpeg' ],
						maxFileSizeKb: 500,
						maxWidth: auto,
						maxHeight: 250
					});
				</script>
				<div class="form-group">
						<label for="txtfname">Enter Your Registration No : </label>
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
							<input type="text" class="form-control" onkeypress="wipeboxeror('4')" id="txtregno" name="txtregno" value="<?php  echo $txtregno;?>" required="true" placeholder="First Name  Other Name" />
						</div>
				</div>
				<div class="form-group">
						<label for="txtfname">Email : </label>
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
							<input type="email" class="form-control" onkeypress="wipeboxeror('4')" id="txtemail" name="txtemail" value="<?php  echo $txtemail;?>" required="true" placeholder="First Name  Other Name" />
						</div>
				</div>
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
