<?php

$duser = 'admin';
$dpass = '1234';

if (isset($_POST['user'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	if ($user == $duser && $pass == $dpass) {
	
	echo "success";
	
	} else if ($user && $pass) {
		echo "ERROR: User or Password not Found.";
	}
} else {
?>
<center>
<form method="post">
User: <input type="text" name="user">
Password: <input type="password" name="pass"><br>
<button type="submit">ยืนยัน</button>
<button type="clear">ยกเลิก</button><br>
</form>
</center>
<?php
}
?>