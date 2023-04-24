<?php
// echo $_SERVER['SCRIPT_NAME']; // testausgabe
$script_name = $_SERVER['SCRIPT_NAME']; // Name des Scripts (wenn diese Date eingebunden wird, ist dies der Name des einbindenden Scripts
$letzter_slash = strrpos($script_name, '/')+1; // 1. pos NACH dem Slash: deswegen strrpos()+1
// echo $letzter_slash; // testausgabe
$dateiname = substr($script_name, $letzter_slash);
echo $dateiname; // testausgabe


?>
<ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
	<?php foreach( $navdaten as $menuitem ){ ?>
	<li class="nav-item col-6 col-md-auto">
		<a class="nav-link p-2 <?php if($dateiname == $menuitem['link']) { echo 'active'; } ?>" href="<?php echo $menuitem['link'] ?>">
			<?php echo $menuitem['text'] ?>
		</a>
	</li>
	<?php } ?>
</ul>




