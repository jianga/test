<?php
include_once('database.php');

//NEED TO CHANGE CODE BASED ON LABELS OF OUR DATABASE

function validate($username, $password){
	
	if (mysql_select_db("gyang8+users")) { //MADE NEW DATABASE TO STORE USER INFO
		$query ="SELECT `password` FROM `registrants` WHERE `username` = '$username';";
		$result = mysql_query($query);
	} else {
		die("error when connecting to database");
	}
	
	if (!$result) {
		return false;
	}
	
	$row = mysql_fetch_assoc($result);
	return (md5($password) == $row['password']);
}

function getInfoByName($username) {
	if (mysql_select_db("gyang8+users")) {
		$query ="SELECT * FROM `registrants` WHERE `username` = '$username';";
		$result = mysql_query($query);
	} else {
		die("error when connecting to database");
	}
	
	if (!$result) {
		return NULL;
	}
	
	return mysql_fetch_assoc($result);
}

function getInfoByID($userID) {
	if (mysql_select_db("gyang8+users")) {
		$query ="SELECT * FROM `registrants` WHERE `ID` = '$userID';";
		$result = mysql_query($query);
	} else {
		die("error when connecting to database");
	}
	
	if (!$result) {
		return NULL;
	}
	
	return mysql_fetch_assoc($result);
}

function isUsed($username) {
	if (mysql_select_db("gyang8+users")) {
		$query ="SELECT * FROM `registrants` WHERE `username` = '$username';";
		$result = mysql_query($query);
		return mysql_num_rows($result);
	} else {
		die("error when connecting to database");
	}
}

function register($username, $password) {
	if (mysql_select_db("gyang8+users") && !isUsed($username)) {
		$query = "INSERT INTO `gyang8+users`.`registrants` (`username`, `password`) VALUES ('$username' , '".md5($password)."');";
		if (mysql_query($query)) {
			return true;
		} else {
			echo "An error occured during your registration. Please try again.";
			return false;
		}
	}
	echo "Please try again.";
	return false;
}


?>