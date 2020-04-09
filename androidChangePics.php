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
	if( $_FILES['image-file']['name']=="" )
		{
			$errPL = "Unable to Update Your Passport.. Please Verify Your Select A Valid File !!";
		}else{
			$tmpName  = $_FILES['image-file']['tmp_name'];
			$extension = substr(strrchr($_FILES['image-file']['name'], "."), 1);
			$newpath= $_SESSION['app_id'].".$extension";
			$moveto= "resource/".$newpath;
			move_uploaded_file($tmpName,$moveto);
		
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
				<div class="form-group">
					<?php
						$iteratepoint = 'resource/';
						$dir = new DirectoryIterator($iteratepoint);
						foreach ($dir as $fileinfo) 
						{
							if (!$fileinfo->isDot()) 
							{
								$picky = $fileinfo->getFilename();
								if(substr_count($picky,$_SESSION['app_id']) > 0){
									echo '<img  style="height:300px;" class="img-responsive img-thumbnail" src="resource/'.$picky.'" />';
								}
							}
						}
					
					?>
				</div>
				<div class="form-group">
					<div class="input-group" style="color:red">
						<?php echo $errPL;?>
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
				<div class="form-group pull-right">
					<div class="input-group">
						<input type="submit" name="submit" style="margin-bottom:10px;padding:5px 20px 5px 20px" value="Change Passport" class="btn btn-primary btn-md"></input>
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
