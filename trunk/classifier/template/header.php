<?php 
	session_start();
	$css_update = 1111;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CS2102 Devlopment Site</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

<link href="static/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="static/register.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<!-- start wrapper -->
<div id="wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">My Development Site</a></h1>
			<p>Proudly brought you by br,pwx,zd,zxl,zc</p>
		</div>
		<div id="menu">
			<div class="search_box">
				<form action="home.php" method="post">
					<table>
						<tr><td>
							<div>
								<input type="text" name="search_text"/>
							</div>
							</td>
							<td>
							<div class="search_btn">
								<input type="submit" name="searchtext" value="Search"/>
								<input type="hidden" name="op" value="show_search_result"/>
							</div>
							</td>
						</tr>
					</table>
				</form>	
			</div>
			<div>
			<ul>
				<li class="active"><a href="home.php">Home</a></li>
				<li><a href="#">Profile</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
			</div>	
		</div>
	</div>
	<!-- start page -->
	<div id="page" class="container">