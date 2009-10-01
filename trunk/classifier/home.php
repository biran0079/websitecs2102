<?php 
	require_once("template/header.php");
	$login = false;
?>
	<div id="page" class="container">
		<div id="content">
		 <!--  
			<div class="photo"> <a href="#"><img src="images/homepage02.jpg" width="442" height="84" alt="" /></a>
				<p class="caption"><strong>Random Macro Photo</strong> provided by <a href="http://pdphoto.org/">PDPhoto.org</a></p>
			</div>
		-->
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
			<!--  
			<div class="post">
				<div class="title">
					<h2>Lorem ipsum dolor sit amet</h2>
					<p>Posted by <a href="#">enks</a> 16 hours 23 minutes ago</p>
				</div>
				<div class="entry">
					<p>Volutpat at varius sed sollicitudin et, arcu. Vivamus viverra. Nullam turpis. Aenean felis. Quisque eros. Cras lobortis <a href="#">commodo metus</a>. Vestibulum vel purus. Vestibulum sed etiam. Lorem ipsum sit amet dolore. Nulla facilisi.</p>
				</div>
				<div class="meta">
					<p><a href="#" class="more">Read More</a> <a href="#" class="comments">Comments (42)</a></p>
				</div>
			</div> -->
		</div>
		<div id="sidebar">
			<div class="section1">
			<?php 
				if (!$login){
					$name = "Zhao Cong";
					echo '
						<h2>Login</h2>
						<form action="">
						<table><tr>
									<td>Username:</td> 
									<td><input type="text" name="user"></td>
									<td>Password:</td>
									<td><input type="password" name="password"></td>
								</tr>
								<tr>
									<td><input type="submit" value="Log in" style="width:50px"></td>
									<td><a href="#">Register Here</a></td>	
									<td colspan="2"><a href="#">Forget Password?</a></td>
								</tr>
						</table> 
						</form>';
				}
				else
				{
					$name = "Zhao Cong";
					echo "<div><h2> Hello, $name!</h2></div>";
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
		<div class="clearfix">&nbsp;</div>
	</div>
	<div id="footer" class="container">
		<p>(c) 2009 Sitename.com. Design by <a href="http://www.nodethirtythree.com/">nodethirtythree</a> and <a href="http://www.freecsstemplates.org/">Free CSS Templates</a></p>
	</div>
</div>
</body>
</html>
