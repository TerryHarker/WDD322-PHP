<?php
// echo $_SERVER['SCRIPT_NAME']; // testausgabe
$script_name = $_SERVER['SCRIPT_NAME']; // Name des Scripts (wenn diese Date eingebunden wird, ist dies der Name des einbindenden Scripts
$letzter_slash = strrpos($script_name, '/')+1; // 1. pos NACH dem Slash: deswegen strrpos()+1
// echo $letzter_slash; // testausgabe
$dateiname = substr($script_name, $letzter_slash);
// echo $dateiname; // testausgabe
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" vocab="http://schema.org/">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<title>Admin</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/theme.css">
	</head>
	<body>
		<header class="navbar navbar-expand-md navbar-dark bd-navbar">
			<nav class="container flex-wrap flex-md-nowrap" aria-label="Main navigation">
				<a class="navbar-brand p-0 me-2" href="/">ADMIN<a>
				
				<ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
					<?php if($isLoggedIn===true && isset($navdaten) ) { ?>
					<?php foreach( $navdaten as $menuitem ){ ?>
					<li class="nav-item col-6 col-md-auto">
						<a class="nav-link p-2 <?php if($dateiname == $menuitem['link']) { echo 'active'; } ?>" href="<?php echo $menuitem['link'] ?>">
							<?php echo $menuitem['text'] ?>
						</a>
					</li>
					<?php } ?>
					<?php } ?>
				</ul>

			</nav>
		</header>