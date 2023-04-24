<?php
/* navigationspunkte */
$menuArray = array(
	array(
		'link' => 'index.php',
		'title' => 'Home'
	),
	array(
		'link' => 'about-me.php',
		'title' => 'Über mich',
		'subnav' => array(
			array(
				'link' => 'history.php',
				'title' => 'Über mich > History'
			)
		)
	),	
	array(
		'link' => 'contact.php',
		'title' => 'Kontakt'
	)
);