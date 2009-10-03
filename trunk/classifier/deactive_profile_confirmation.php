<?php 
	require_once("template/header.php");
	require_once("include/init.php");
	$login = check_logged_in();
?>
<h2>Are your sure you want to deactive your user profile?</h2>
						<form action="deactive_profile.php" method="post">
						<table>
								<tr>
									<td><input type="submit" value="confirm" style="width:50px"></td>
								</tr>
						</table> 
						</form>';
<?php 
require_once('template/footer.php');
?>	
