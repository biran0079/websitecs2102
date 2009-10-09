<?php
require_once("template/header.php");
require_once("include/init.php");
$login = check_logged_in();
$page_section = g_get_section();
$page_entry_title = g_get_entry_title();
?>

<!-- content start -->
<div id="content">
<div class="post">
<div class="title">
<h2><?php echo $page_entry_title;?></h2>
<p>Last updated by <a href="#">admin</a> 4 hours 8 minutes ago</p>
</div>
<div class="entry">
	<p>
		<?php 
			if ($page_section == DEFAULT_KEY_WORD)
				echo g_formatter_list_add_recently();
		?>
	</p>
</div>

<div class="meta">
	<p><a href="nodes.php" class="more">Add More</a></p>
</div>
</div>
</div>
<!-- content end -->
<!-- sidebar start -->
<div id="sidebar">
<div class="section1">
<?php 
	if (!$login){
		if (login_fail()){
			echo '<span class="warning">Authorization Failed, Please verify your username & password</span>';
		}

		echo '
						<h2>Login</h2>
						<form action="checkin.php" method="post">
						<input type="hidden" value="login" name="op">
						<table><tr>
									<td>Username:</td> 
									<td><input type="text" name="user_name"></td>
									<td>Password:</td>
									<td><input type="password" name="password"></td>
								</tr>
								<tr>
									<td><input type="submit" value="Log in" style="width:50px"></td>
									<td><a href="registration.php">Register Here</a></td>	
									<td colspan="2"><a href="#">Forget Password?</a></td>
								</tr>
						</table> 
						</form>';
	}
	else
	{
	// section shown to login user	
	$name = g_get_username();
	echo "<div><h2> Hello, $name!</h2></div>";
	echo '<form action="checkin.php" method="post">
					<input type="submit" value="Log out" style="width:70px">
				    <input type="hidden" value="logout" name="op">
							<td><a href="edit_user_profile.php">edit profile</a></td>
							&nbsp
							<td><a href="deactive_profile_confirmation.php">deactive profile</a></td>	
		</form>';	
	$role=g_get_user_role();
	// roles:
	// 0: super user
	// 1: administrator
	// 2: normal user
	
	if($role=='0' || $role=='1'){			//super user
		echo'
						<table>
								<tr>
									<td><a href="grant_admin.php">Grant admin privilege</a></td>
								</tr>
						</table> ';
	}else if($role=='1'){	//admin
	}else if($role=='3'){	//normal user

	}
}
?></div>
<div class="section2">
<ul>
	<li>
	<h2>Most Popular</h2>
	<ul>
		<?php 
			echo g_formatter_sidebar_list_most_popular_node();
		?>
	</ul>
	</li>
	<li>
	<h2>Newly Added</h2>
	<ul>
		<?php 
			echo g_formatter_sidebar_list_newly_added_node();
		?>
	</ul>
	</li>
</ul>
</div>
	<div class="section3">
				<ul>
					<li>
						<h2>Category</h2>
						<?php 
							if($login && ($role == '1' || $role == '0'))
								echo '
									<div>
										<a href="add_category.php">add</a>
										<a href="edit_category.php">edit</a>
									</div>'; 
							?>	
							<ul>
								<?php 
									echo g_formatter_sidebar_list_category();
								?>
							</ul>
					</li>
				</ul>
			</div>
	

<div class="section3">
			<ul>
					<li>
						<h2>Tag</h2>
						<?php 
							if($login && (($role = g_get_user_role()) == '1'))
								echo 
									'<a href="add_tag.php">add</a>
									 <a href="edit_tag.php">edit</a>';
						?>
						<ul>
							<?php 
								echo g_formatter_sidebar_list_tags();
							?>
						</ul>
					</li>	
				</ul>	
			</div>
</div>
<!-- sidebar end -->
<div class="clearfix">&nbsp;</div>
<?php
require_once('template/footer.php');
?>