<?php 
	require_once("template/header.php");
	require_once("include/init.php");
	$login = check_logged_in();
?>
	
	<!-- content start -->	
		<div id="content">
			<div class="post">
				<div class="title">
					<h2>Sports</h2>
					<p>Last updated by <a href="#">admin</a> 4 hours 8 minutes ago</p>
				</div>
				<div class="entry">
					<p>
						<a href="#">Google Sport</a> 
						<a href="#">mysport</a>
						<a href="#">Singapore GP</a>
						<a href="#">ESPN</a>
						<a href="#">Yahoo!</a>
						<a href="#">mysport</a>
						<a href="#">网球</a>
						<a href="#">Tennis Live</a>
						<a href="#">极限体育</a>
						<a href="#">mysport</a>
						<a href="#">新浪网球</a>
						<a href="#">ESPN</a>
					</p>	
				</div>
				
				<div class="meta">
					<p><a href="#" class="more">Add More</a> </p>
				</div> 
			</div>
		</div>
		<!-- content end -->	
		<!-- sidebar start -->	
		<div id="sidebar">
			<div class="section1">
			<?php 
				if (!$login){
					$name = g_get_username();
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
					$name = g_get_username();
					echo "<div><h2> Hello, $name!</h2></div>";
					echo '<form action="checkin.php" method="post">
							<input type="submit" value="Log out" style="width:70px">
							<input type="hidden" value="logout" name="op">
						  </form>';	
				}
				?>	
			</div>
			<div class="section2">
				<ul>
					<li>
						<h2>Most Popular</h2>
						<ul>
							<li><a href="#">F1</a></li>
							<li><a href="#">Tennis</a></li>
							<li><a href="#">Football</a></li>
							<li><a href="#">Nascar</a></li>
							<li><a href="#">Golf</a></li>
							<li><a href="#">Basketball</a></li>
						</ul>
					</li>
					<li>
						<h2>Newly Added</h2>
						<ul>
							<li><a href="#">yahoo sport!</a></li>
							<li><a href="#">mysport</a></li>
							<li><a href="#">新浪网球</a></li>
							<li><a href="#">ESPN</a></li>
							<li><a href="#">动感体育</a></li>
							<li><a href="#">BBC F1</a></li>
							<li><a href="#">US Open 2009</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="section3">
				<ul>
					<li>
						<h2>Category</h2>
						<ul>
							<li><a href="#">Sports</a></li>
							<li><a href="#">Books</a></li>
							<li><a href="#">IT</a></li>
							<li><a href="#">Culture</a></li>
							<li><a href="#">Photograph</a></li>
							<li><a href="#">Life</a></li>
							<li><a href="#">Animal</a></li>
							<li><a href="#">Fun</a></li>
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
