<?php

session_start();
include_once('sections.php');

if (!isset($_SESSION['userinfo'])) {
	$login = false;
}
else {
	$login = true;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
//<title>WEBSITE NAME</title>
<link href="css/style.css" type="text/css" rel="stylesheet">

</head>
<body>
	<table cellspacing="0" cellpadding="0" border="0" width= "100%" height= "100%">
		<tbody>
			<tr>
				<td align="center">
					<?php echo getTop();?>
					<?php echo getNav();?>
					<div id="main_bottom">
						<table cellspacing="0" cellpadding="0" border="0" width="890" style="margin-top: 1px">
							<tbody>
								<tr>
									<?php echo getLeftCol($login);?>
									<?php echo getCenterCol($login);?>
									<?php echo getRightCol($login);?>
								</tr>
							</tbody>
						</table>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>