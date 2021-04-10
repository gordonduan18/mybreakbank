<?php 

if (isset($_POST['login-submit'])) {

	require 'dbh.inc.php';

	$uname = $_POST['uname'];
	$password = $_POST['pwd'];

	if (empty($uname) || empty($password)) {
		header("Location: ../index.php?error=emptyfields");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE userUname=? OR userEmail=?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../index.php?error=sqlerror");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "ss", $uname, $uname);
			mysqli_stmt_execute($stmt);

			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				$pwdCheck = password_verify($password, $row['userPwd']);
				if ($pwdCheck == false) {
					header("Location: ../index.php?error=wrongpw");
					exit();
				} else if ($pwdCheck == true) {
					session_start();
					$_SESSION['userId'] = $row['userId'];
					$_SESSION['userUname'] = $row['userUname'];

					header("Location: ../index.php?login=success");
					exit();
				} else {
					header("Location: ../index.php?error=wrongpw");
					exit();
				}
			} else {
				header("Location: ../index.php?error=nouser");
				exit();
			}
		}
	}

} else {
	header("Location: ../index.php");
	exit();
}