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
}
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit']))
{		
	$txtcPermadd=$_POST['txtcPermadd'];
	if($txtcPermadd=="" )
		{
			$errPL = "Unable to Update Your Best Moment.. Please Verify Your Entries to Ensure they are all Provided !!";
		}else{
			$stmt_in = $conn->prepare("INSERT INTO userPhone (phone,userID) VALUES (?,?)");
			if($stmt_in->execute(array($txtcPermadd,$_SESSION['app_id']))) 
			{					
				//header("location: androidAppHome.php");
			}else{
				$errPL="Error: The RegNo Or Password Provided is Not Valid . Contact ICT !!!";
			}
		}
}
if (isset($_GET['derem'])){
	if($_GET['derem'] !=""){
		$stmt_in = $conn->prepare("DELETE FROM userPhone WHERE phone=? and userID=?");
		$stmt_in->execute(array($_GET['derem'],$_SESSION['app_id']));
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
			<div class="col-xs-12">
				<form role="form"  name="reg_form"  id="form" class="form-vertical" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="POST">
					<div class="form-group">
						<label for="txtcPermadd">Add More Mobile Phone Number : </label>
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
							<input type="phone" class="form-control" id="txtcPermadd" value="<?php echo $txtcPermadd;?>" onkeydown="return noNumbers(event,this)" name="txtcPermadd" required="true" placeholder="Enter A Valid Phone Number"> </input>
						</div>
					</div>
					<div class="form-group pull-right">
						<div class="input-group" style="color:red">
							<?php echo $errPL;?>
						</div>
					</div>
					<div class="form-group pull-right">
						<div class="input-group">
							<input type="submit" name="submit" style="margin-bottom:10px;padding:5px 20px 5px 20px" value="Add Phone No" class="btn btn-primary btn-md"></input>
						</div>
					</div>
				</form>
			</div>
			<div class="col-xs-12" style="background-color:white;">
				<?php
					
					$stmt_in = $conn->prepare("SELECT * FROM userPhone where userID=? order by id desc");
					$stmt_in->execute(array($_SESSION['app_id']));
					$affected_rows_in = $stmt_in->rowCount();
					if($affected_rows_in >= 1) 
					{	
						echo "<table class='table table-hover'>
								<thead>
									<th>SNo.</th>
									<th>Phone No.</th>
									<th></th>
								</thead>
								<tbody>";
								$count = 1;
						while($row = $stmt_in->fetch(PDO::FETCH_ASSOC)){
							echo "<tr>
									<td>".$count."</td>
									<td>".$row['phone']."</td>
									<td><a href=androidPhone.php?derem=".$row['phone'].">Remove</a></td>
								</tr>";
								$count =$count + 1;
						}
						echo "</tbody></table>";
					}
					
				?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-top:15px;margin-bottom:15px;">
			<?php require_once("settings/androidNavLeft.php");?>
		</div>
	</div>
 </div>
</body>
</html>  
