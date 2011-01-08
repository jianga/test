<?php
session_start();

function getTop(){
	$topBox = <<<BOX
	<div id="main_top">
	
		//NEED HTML CODE FOR TOP OF WEBPAGE -- name, logo, etc.
		
	</div>
BOX;
return $topBox;

}

function getNav() {
	$nav = <<<NAV
	<div id="navigation_bar">

		//NEED HTML CODE FOR NAVIGATION BAR -- links to different pages

	</div>
NAV;
return $nav;
}

function getLeftCol($login) { //need $login as input if column depends on if you are signed in
	//$loginBox = $login ? getLoggedInBox() : getLoggedOutBox();
	
	$basic = <<<LEFT
	
		//NEED HTML CODE FOR LEFT COLUMN -- probably signin/join
		
LEFT;
return $basic;
}


function getCenterCol($login) {

/*	$center = <<<CENTER
<td id="centercolumn" align="center" valign="top">
	<table>
		<tbody>
			<tr>
				<h1>View People's Plans</h1>
			</tr>
CENTER;
	
			
	$plans = getPlans(0, 10);
	$i = 0;
	while (($plan = mysql_fetch_assoc($plans)) && $i < 10) {
		$formatted = formatPlan($plan);
		$center .= "<tr>" . $formatted . "<br/></tr>";
		$i++;
	}	
			
	$end = <<<END
			<tr>
				<td>
				<a href="browse_plan.php">Browse For More</a>
				</td>
			</tr>
		</tbody>
	</table>
</td>
END;
	$center .= $end;
	return $center; */
	
}

function getRightCol($login) {
	
	$right = <<<RIGHT

		//DO WE WANT A RIGHT COLUMN?????

RIGHT;
return $right;
}

function getLoggedOutBox() {
$loggedOut = <<<LOGGEDOUT

<tr>
	<td>
		<form name="login" action="login.php" method="post">
			<table>
				<tbody>
					<tr>
						<td>
							<label>Log In</label>
							<br/>
							<br/>
						</td>
					</tr>
					<tr>
						<td>
							Username: <br /> <input type="text" name="username" class="text"/>
							<br/>
						</td>
					</tr>
					<tr>
						<td>
							Password: <br/> <input type="password" name="password" class="text"/>
							<br/>
						</td>
					<tr>
						<td>
							<input type="submit" name="login" value="Login" class="button"/>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
		<tr>
			<td>
				<form name="register" action="register.php">
				<input type="submit" value="Register" class="button" />
				</form>
			</td>
		</tr>
	</td>
</tr>
LOGGEDOUT;

return $loggedOut;
}

function getLoggedInBox() {
	
$welcome_name = $_SESSION['userinfo']['firstname'];

$loggedIn = <<<LOGGEDIN
<tr>
	<h1>Welcome $welcome_name</h1>
	<a href="registration.html">Edit Profile</a>
	<br/>
	<br/>
</tr>
<tr>
	<form name="logout" action="logout.php">
	<input type="submit" value="Log Out" class="button" />
	</form>
</tr>
LOGGEDIN;

return $loggedIn;
}

function getSearchBar() {
	$searchBox = <<<SEARCH
	<form action="browse_game.php" method="get" enctype="multipart/form-data">
	
	//FILL IN - combine search for people, game, plans? make dropdown menu or search all
	
		<input type="submit" value="Search" class="button"/>
	</form>
SEARCH;
	return $searchBox;
}

?>