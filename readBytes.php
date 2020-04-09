<?php
require_once 'settings/connection.php';	
	echo '<table border="2">
			<thead >
				<th>Sno.</th>
				<th>ID</th>
				<th>Bytes.</th>
			</thead><tbody>';

	$stmt = $conn->prepare("SELECT * FROM userdetails");		
	$stmt->execute();
	$affected_rows = $stmt->rowCount();
	if($affected_rows >= 1){
	$j=1;
		While($row2 = $stmt->fetch(PDO::FETCH_ASSOC)){
			$iteratepoint = 'resource/';
			$pics ="default_dp.jpg";
			$profile = $row2['userID'];
			$dir = new DirectoryIterator($iteratepoint);
			foreach ($dir as $fileinfo) 
			{
				$picky = $fileinfo->getFilename();
				if(substr_count($picky,$profile) > 0){
					$pics =$picky;
				}	
			}
			$pics_path = "resource/".$pics;
			
			/**$file = fopen($pics_path,'rb');
			$content = fread($file,filesize($pics_path));
			fclose($file);**/
			$content = "Ok";
			echo '<tr>
					<td>'.$j.'</td>
					<td>'.$row2['userID'].'</td>
					<td><img src="'.$pics_path.'"/></td></tr>';
					$j = $j +1;
		}
		echo '</tbody></table>';
	}
 ?>