<?php
$passwort = 'test1234';
$falsches_passwort = 'test12345';
$md5_passwort = md5($passwort);
$sha1_passwort = sha1($passwort);
$sicherer_passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
$pw_pruefung = password_verify($passwort, $sicherer_passwort_hash);
$pw_pruefung_falschespw = password_verify($falsches_passwort, $sicherer_passwort_hash);
?>
<html>
<head>
	<style>
		body { font-family:Arial, Helvetica, sans-serif; }
		td { padding:3px 10px; }
		tr:nth-child(even) {background-color: #f2f2f2;}
	</style>
</head>
<body>
<h3>Hashing im Vergleich</h3>
<p>Dieses Demo zeigt, wieso password_hash() die empfohlene Methode ist, um ein Passwort zu verschleiern</p>
<table>
	<tr>
		<td>Das Passwort</td><td><?php echo $passwort; ?></t>
	</tr>
	<tr>
		<td><a href="https://www.php.net/manual/de/function.md5.php" target="blank">MD5 Hash</a></td><td><?php echo $md5_passwort; ?></t>
	</tr>
	<tr>
		<td><a href="https://www.php.net/manual/de/function.sha1.php" target="blank">SHA1 Hash</a></td><td><?php echo $sha1_passwort; ?></t>
	</tr>
	<tr>
		<td><a href="https://www.php.net/manual/de/function.password-hash.php" target="blank">PasswordHash</a></td><td><?php echo $sicherer_passwort_hash; ?></t>
	</tr>
	<tr>
		<td><a href="https://www.php.net/manual/de/function.password-verify" target="blank">PasswordVerify</a> (<?php echo $passwort; ?>)</td><td><?php var_dump( $pw_pruefung ); ?></t>
	</tr>
	<tr>
		<td><a href="https://www.php.net/manual/de/function.password-verify" target="blank">PasswordVerify</a> (<?php echo $falsches_passwort; ?>)</td><td><?php var_dump( $pw_pruefung_falschespw ); ?></t>
	</tr>
</table>
</body>
</html>