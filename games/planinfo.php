<?php
include_once('database.php');

//NEED TO CHANGE CODE BASED ON LABELS OF OUR DATABASE

function getAllPlans(){
	if (mysql_select_db("gyang8+users")) {
		$query ="SELECT * FROM plans WHERE date > CURRENT_DATE();";
		$result = mysql_query($query);
	}
	if (!$result) {
		die("invalid query");
	}
	return $result;
}

function getPlans($from, $perpage){
	if (mysql_select_db("gyang8+users")) {
		$query ="SELECT * FROM plans WHERE date >= CURRENT_DATE() ORDER BY date LIMIT $from, $perpage;";
		$result = mysql_query($query);
	}
	if (!$result) {
		die("invalid query");
	}
	return $result;
}

function getPlansFromID($restID) {
	if (mysql_select_db("gyang8+users")) {
		$query ="SELECT * FROM plans WHERE restaurant = $restID;";
		$result = mysql_query($query);
	}
	if (!$result) {
		die("invalid query");
	}
	return $result;
}

function requested($userID) {
	if (empty($userID)) {return array();}
	if (mysql_select_db("gyang8+users")) {
		$query ="SELECT plan FROM requests WHERE requester = $userID;";
		$result = mysql_query($query);
	}
	if (!$result) {
		die("invalid query");
	}
	$requested = array();
	$i = 0;
	while ($row = mysql_fetch_assoc($result)) {
		$requested[$i] = $row['plan'];
		$i++;
	}
	return $requested;
}

function formatPlan($row) {
	session_start();
	if (isset($_SESSION['userinfo'])) {
		$userID = $_SESSION['userinfo']['ID'];
		$requested = requested($userID);
	} else {
		$requested = array();
	}
	$ID = $row['ID'];
	$submitTime = $row['timestamp'];
	$initID = $row['initiator'];
	$openings = $row['openings'];
	$meal = $row['meal'];
	$date = $row['date'];
	$restID = $row['restaurant'];
	$comment = $row['comment'];
	
	if (mysql_select_db("gyang8+games")) {
		$query = "SELECT * from restaurants WHERE `ID` = $restID;";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
		$restName = $row['name'];
	}
	
	if (mysql_select_db("gyang8+users")) {
		$query = "SELECT * from registrants WHERE `ID` = $initID;";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
		$initName = $row['firstname'];
	}
	
	$temp = array('b' => 'breakfast', 'l' => 'lunch', 'd' => 'dinner');
	
	
	if (!empty($requested)) {
		$request = in_array($ID, $requested) ? "Request Has Been Sent" : "<a href='request.php?planID=$ID'><p>Request to Join</p></a>";
	} else {
		$request = "<a href='request.php?planID=$ID'><p>Request to Join</p></a>";
	}
	
	
	$str = <<<STR
<h1>$initName&#39;s Plans</h1>
<a href='view_restaurant.php?restID=$restID'><p>$restName</p></a>
<p>$date for $temp[$meal]</p>
$request
</form>
<br/>
STR;
	return $str;

}

?>