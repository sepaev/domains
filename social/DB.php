<?php
	$link = mysqli_connect("localhost","root","","SocialNetwork_pavlovsky");

  if (mysqli_connect_errno()) {
	echo "ERROR: #".mysqli_connect_errno()." - ".mysqli_connect_error();
}
?>