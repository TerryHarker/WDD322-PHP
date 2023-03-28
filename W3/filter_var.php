<?php
$meineEmail = 'terry@bytekultur.net';
$emailTest = filter_var($meineEmail, FILTER_VALIDATE_EMAIL);

var_dump( $emailTest );

if( $emailTest == false ){
	echo 'Bitte gültige E-Mail angeben';
}
?>