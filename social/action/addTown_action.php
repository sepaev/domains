<?php
include_once "config.php";
include_once "DB.php";
$tmp = $_FILES['file']['tmp_name'];
if (!$tmp){
 	$arr[0] = $_POST['town'];
} else {
	$text = file_get_contents($tmp);
	$text = iconv("WINDOWS-1251", "UTF-8", $text);
	$text = preg_replace ('/\r\n|\n|\r/', ',', $text);
	$arr = explode(',', $text);
	// $text = array_pop($arr);
	// if($text) {$arr[] = $text;}
}
foreach ($arr as $town) {
	if($town){
	$sql = "SELECT * FROM `Town` WHERE `townName` = '$town'";

		$result = mysqli_query($link, $sql);
		if(mysqli_num_rows($result)>0){
			$err++;
		}else{

			$sql = "INSERT INTO `Town`(`townName`) VALUES ('$town')";	
			if(mysqli_query($link, $sql)){
				$add++;
			}	else{
				$s_err++;
			}
		}
	}
}
if($err){$text=$text."err=$err&";}
if($s_err){$text=$text."sql=$s_err&";}
if($add){$text=$text."add=$add&";}
	header ("location:".SITE."addTown?".$text);
?>