<?php
include_once "config.php";
include_once "DB.php";

 $question = $_GET['question'];

 $sql = "SELECT * FROM `secretQuestion` WHERE `question` = '$question'";

	$result = mysqli_query($link, $sql);
	if(mysqli_num_rows($result)>0){
		$status = 3;
	}else{
		$sql = "INSERT INTO `secretQuestion`(`question`) VALUES ('$question')";	
		if(mysqli_query($link, $sql)){
			$status = 1;
		}	else{
			$status = 2;
		}
	}
		header ("location:".SITE."addQuestion?status=".$status."&question=".$town);

?>