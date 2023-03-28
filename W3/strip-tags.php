<?php
$meinTextMitHTML = 'Schau auf <test> meine <b>Seite</b> <script>location.href="http://www.bytekultur.net"</script>';

// Filtern
$meinTextGesichert = strip_tags($meinTextMitHTML, '<test><b>'); // test / b zulassen durch zweiten freiwilligen Parameter


echo '<p>'.$meinTextGesichert.'</p>';

// Validierung
if( $meinTextMitHTML !== $meinTextGesichert ){
	echo 'Bitte kein Code einfügen!!!';
}

?>