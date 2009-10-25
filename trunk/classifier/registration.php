<?php
// for every single file, include this file
require_once("./include/init.php");
require_once('template/header.php');
?>

<div class="register">
	<div><h2>Registration</h2></div>
	<div class="clearfix">&nbsp;</div>
	<div id="signupwrap" style="margin-left:40px;">
      		<form id="signupform" autocomplete="off" action="midman/submit_registration_form.php" method="post">
	  		  <table>
	  		  <tr>
	  			<td class="label"><label id="lusername" for="username">Username</label></td>
	  			<td class="field"><input id="username" name="name" type="text" value="" maxlength="50" /></td>
	  			<td class="status"></td>
	  		  </tr>
	  		  <tr>
	  			<td class="label"><label id="lpassword" for="password">Password</label></td>
	  			<td class="field"><input id="password" name="password" type="password" maxlength="50" value="" /></td>
	  		  </tr>
	  		  <tr>
	  			<td class="label"><label id="lpassword_confirm" for="password_confirm">Confirm Password</label></td>
	  			<td class="field"><input id="password_confirm" name="password_confirm" type="password" maxlength="50" value="" /></td>
	  			<td class="status"></td>
	  		  </tr>
	  		  <tr>
	  		  	<td class="label"><label id="lpassword_confirm" for="password_confirm">Email</label></td>
	  			<td class="field"><input id="email" name="email" type="text" maxlength="50" value="" /></td>
	  			<td/>
	  		  </tr>
	  		  <tr>
	  			<td class="label"><label id="lsignupsubmit" for="signupsubmit">Signup</label></td>
	  			<td class="field" colspan="2">
	            <input id="signupsubmit" name="signup" type="submit" value="Signup" />
	  			</td>
	  		  </tr>

	  		  </table>
          </form>
	</div>
</div>

<?php 
require_once('template/footer.php');
?>

