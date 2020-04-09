<?php
require_once 'settings/connection.php';
	$opr = urldecode($_POST['opr']);
	//$opr="login";
	$err=null;
	$two = $one = array();
	$searchQuery ="";
	
	//login
	if($opr=="login"){
	$username = urldecode($_POST['userID']);$password = urldecode($_POST['userPassword']);
	//$username = "14/37139D/1";$password = "111";
	$stmt = $conn->prepare("SELECT * FROM userdetails where userRegNo =? and password =? Limit 1");		
	$stmt->execute(array($username,$password));
	$affected_rows = $stmt->rowCount();
	if($affected_rows >= 1){
		$row2 = $stmt->fetch(PDO::FETCH_ASSOC);
		$profile=$row2['userID'];
		$iteratepoint = 'resource/';
			$pics ="default_dp.jpg";
			$dir = new DirectoryIterator($iteratepoint);
			foreach ($dir as $fileinfo) 
			{
				$picky = $fileinfo->getFilename();
				if(substr_count($picky,$profile) > 0){
					$pics =$picky;
				}	
			}
			$pics_path = "http://192.168.230.1/androidReg/resource/".$pics;

		$one = array(
			"Error" => "None",
			"MyName" => $row2['fullName'],
			"MyDept" => $row2['userDept'],
			"MyId" => $row2['userID'],
			"MyLevel" => $row2['userLevel'],
			"MyPics" => $pics_path,
			"MyPassword"=>$row2['password'],
			"MyQoute"=>$row2['userQoute']
		  );
	}else{//14/8991700/1
		$one = array("Error" => "Error: Wrong Username Or Password !!!");
	}
	print(json_encode($one));
}
	
//change Password
if($opr=="changePassword"){
	$stat="";
	$username = urldecode($_POST['userID']);$password = urldecode($_POST['newPassword']);
	//$username = "14/37139D/1";$password = "111";
	$stmt = $conn->prepare("UPDATE userdetails SET password=? where userID =? Limit 1");		
	if($stmt->execute(array($password,$username))){
		$stat ="Successfully Updated !!!";
	}else{
		$stat = "Error: Fail To Update Password !!!";
	}
	print ($stat);
}
//change Passport
if($opr=="changePics"){
	$folder_name = $_POST['userID'];$encoded_string = $_POST['newPics'];;
	$decoded_string = base64_decode($encoded_string);
	$path = 'resource/'.$folder_name.".jpg";
	if(file_put_contents($path,$decoded_string)){
			echo "Successfully Changed !!!";
	}else{
		echo "Error: Fail To Upload Photo !!!";
	}
}

//change Qoute
if($opr=="changeQoute"){
	$stat="";
	$username = urldecode($_POST['userID']);$qoute = urldecode($_POST['newQoute']);
	$stmt = $conn->prepare("UPDATE userdetails SET userQoute=? where userID =? Limit 1");		
	if($stmt->execute(array($qoute,$username))){
		$stat ="Successfully Updated !!!";
	}else{
		$stat = "Error: Fail To Update Qoute !!!";
	}
	print ($stat);
}	
	
	if($opr=="search"){
			$username = urldecode($_POST['department']);
			//$username = "Mathematics";
			$stmt = $conn->prepare("SELECT * FROM userdetails where userDept =? ");		
			$stmt->execute(array($username));
			$affected_rows = $stmt->rowCount();
			if($affected_rows >= 1){
			$two== array();
			$pics="";
			while ($row2 = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$userID =$row2['userID'];
				//echo $row2['id']." - ".$row2['userID']."<br/>";
				set_values($row2['fullName'], $row2['userQoute'],$row2['userGender'],$row2['userDept'],$row2['userLevel'],$userID);
			}
			print(json_encode($two));
			
		}
	}


	function set_values($fullName,$userEmail,$userGender,$userDept,$userLevel,$profile){
			global $two;$pics="";
			$iteratepoint = 'resource/';
			$pics ="default_dp.jpg";
			$userEmail = substr($userEmail,0,100)." ... ";
			$dir = new DirectoryIterator($iteratepoint);
			foreach ($dir as $fileinfo) 
			{
				$picky = $fileinfo->getFilename();
				if(substr_count($picky,$profile) > 0){
					$pics =$picky;
				}	
			}
			$pics_path = "http://192.168.230.1/androidReg/resource/".$pics;
			$one = array(
				"fullName" => $fullName,
				"userEmail" => $userEmail,
				"userGender" => $userGender,
				"userDept" => $userDept, 
				"userLevel" => $userLevel,
				"userId" => $profile,
				"profile" => $pics_path
			  );
			array_push($two,$one);
	}
$qoute=$moment=$friends=$lectures=$courses=$phone=$email_tx=$permState=$permAdd=$currenttate=$currentAdd="";
if($opr=="retrieve"){
	
	$username = urldecode($_POST['userID']);
	//$username = "NAMS668920570";
	//user details
	$stmt = $conn->prepare("SELECT * FROM userdetails where userID =? Limit 1");		
	$stmt->execute(array($username));
	$affected_rows = $stmt->rowCount();
	if($affected_rows >= 1){
		While($row2 = $stmt->fetch(PDO::FETCH_ASSOC)){
			$qoute=$row2['userQoute'];
			$moment=$row2['userBestMoment'];
			$email_tx=$row2['userEmail'];
			$permState=$row2['userState']." - ".$row2['userLgov'];
			$permAdd=$row2['userPermAdd'];
			$currenttate=$row2['userCState']." - ".$row2['userCLgov'];
			$currentAdd=$row2['userCPermAdd'];
		}
	}
	
	//courses
	$stmt = $conn->prepare("SELECT * FROM usercourse where userID =? ");		
	$stmt->execute(array($username));
	$affected_rows = $stmt->rowCount();
	if($affected_rows >= 1){
		$j = 1;
		While($row2 = $stmt->fetch(PDO::FETCH_ASSOC)){
			if($j==1){
				$courses = $row2['bestCourses'];
			}else{
				$courses = $courses.",".$row2['bestCourses'];
			}
			$j =$j +1;
		}
	}
	//friends
	$stmt = $conn->prepare("SELECT * FROM userbest where userID =? ");		
	$stmt->execute(array($username));
	$affected_rows = $stmt->rowCount();
	if($affected_rows >= 1){
		$j = 1;
		While($row2 = $stmt->fetch(PDO::FETCH_ASSOC)){
			if($j==1){
				$friends = $row2['bestFriend'];
			}else{
				$friends = $friends.",".$row2['bestFriend'];
			}
			$j =$j +1;
		}
	}
	//lectures
	$stmt = $conn->prepare("SELECT * FROM userlecturer where userID =?");		
	$stmt->execute(array($username));
	$affected_rows = $stmt->rowCount();
	if($affected_rows >= 1){
		$j = 1;
		While($row2 = $stmt->fetch(PDO::FETCH_ASSOC)){
			if($j==1){
				$lectures = $row2['bestLecturer'];
			}else{
				$lectures = $lectures.",".$row2['bestLecturer'];
			}
			$j =$j +1;
		}
	}
	
	//phone
	$stmt = $conn->prepare("SELECT * FROM userphone where userID =?");		
	$stmt->execute(array($username));
	$affected_rows = $stmt->rowCount();
	if($affected_rows >= 1){
		$j = 1;
		While($row2 = $stmt->fetch(PDO::FETCH_ASSOC)){
			if($j==1){
				$phone = $row2['phone'];
			}else{
				$phone = $phone.",".$row2['phone'];
			}
			$j =$j +1;
		}
	}
	
		$one = array(
			"qoute" => $qoute,
			"moment" => $moment,
			"friends" => $friends,
			"lectures" => $lectures,
			"courses" => $courses, 
			"phone" => $phone,
			"email" => $email_tx, 
			"permState" => $permState,
			"permAdd" => $permAdd,
			"currentstate" => $currenttate,
			"currentAdd"=>$currentAdd
		  );
	print(json_encode($one));
}	
 ?>