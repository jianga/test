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
<title>About Us</title>
<link href="style.css" type="text/css" rel="stylesheet">
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
									
									<td id="centercolumn" align="center" valign="top">
										<table>
											<tbody>
												<tr>
													<h1>About Us</h1>

														//FILL IN ABOUT US INFO														
														
												</tr>
											</tbody>
										</table>
									</td>
									
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