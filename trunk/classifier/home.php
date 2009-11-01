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
							<p>Last updated by <a href="#"><?php echo g_get_person_post_last_update_entry();?></a> <?php echo g_get_time_post_last_update();?></p>
				</div>

				<div class="entry">
					<p>
						<?php 
							echo g_get_section_content();
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
				<div class="section1"><?php 
						if (!$login){
								if (login_fail()){
										ui_show_login_warning();
								}
						echo '
								<h2>Login</h2>
								<form action="checkin.php" method="post">
									<input type="hidden" value="login" name="op">
										<table>
											<tr>
												<td>Username:</td> 
												<td><input type="text" name="user_name"></td>
												<td>Password:</td>
												<td><input type="password" name="password"></td>
											</tr>
											<tr>
												<td><input type="submit" value="Log in" style="width:50px"></td>
												<td><a href="registration.php">Register Here</a></td>	
											</tr>
										</table> 
								</form>';
			}	
		else
		{
		// section shown to login user
		$name = g_get_username();
		echo '<div class="welcome"><h2> Hello, '.$name.'!</h2>';
		echo '<form action="checkin.php" method="post">
					<input type="submit" value="Log out" style="width:70px">
				    <input type="hidden" value="logout" name="op">
				</form></div>';	
		$role=g_get_user_role();
		// roles:
		// 0: super user
		// 1: administrator
		// 2: normal user

	if($role=='0' || $role=='1'){			//super user
		echo'
						<div class="admin">
							<li><a href="grant_admin.php">Grant Admin Privilege</a></li>
							<li><a href="content_admin.php">Content Administration</a></li>
						</div>
							';
	}else if($role=='1'){	//admin
	}else if($role=='3'){	//normal user

	}
}
?>

</div>
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
													<a href="edit_category.php"><font color="#8b7d6b">Edit</font></a>
													
												</div>'; 
								?>
								
									<?php 
										echo g_formatter_sidebar_list_category();
									?>
								
						</li>
				</ul>
		</div>


		<div class="section4">
				<ul>
						<li>
								<h2 style="font-size:20px;">Tag</h2>
								<?php
									if($login && (($role = g_get_user_role()) == '1'))
											echo
											'<div>
												<a href="edit_tag.php"><font color="#8b7d6b">Edit</font></a>
										    </div>';
								?>
								
									<?php
										echo g_formatter_sidebar_list_tags();
									?>
								
						</li>
				</ul>
		</div>
</div>
<!-- sidebar end -->
<div class="clearfix">&nbsp;</div>

	<?php
	require_once('template/footer.php');
	?>