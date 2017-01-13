<html>
<head>
<title>Delete Dropbox File</title>
</head>
<body>
<?php
require_once "lib.php";

if (isset($_POST['confirm'])) 
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$domain = $_POST['domain'];
	$dbid = $_POST['dropboxid'];
	$fileid = $_POST['fileid'];
	
	$scf = getSession($username, $password, $domain);
	
	echo deleteDropboxFile($dbid, $fileid, $scf['session'], $scf['token'], $domain);
}
?>
<form action="" method="POST">
<input type="text" name="username" placeholder="Login"><br>
<input type="password" name="password" placeholder="Password"><br>
<input type="text" name="domain" placeholder="Domain"><br>
<input type="text" name="dropboxid" placeholder="Dropbox ID" autocomplete="off"><br>
<input type="text" name="fileid" placeholder="File ID" autocomplete="off"><br>
<input type="submit" name="confirm" value="Delete File">
</form>
</body>
</html>