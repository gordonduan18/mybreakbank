<?php 

if (isset($_POST['signup-submit'])) {

	require 'dbh.inc.php';

	$username = $_POST['uname'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$password2 = $_POST['pwd2'];

	if (empty($username) || empty($email) || empty($password) || empty($password2)) {
		header("Location: ../index.php?error=emptyfields");
		exit();
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../index.php?error=invalidmail");
		exit();
	} else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../index.php?error=invaliduname");
		exit();
	} else if ($password !== $password2) {
		header("Location: ../index.php?error=passwordcheck");
		exit();
	} else {

		$sql = "SELECT userUname FROM users WHERE userUname=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../index.php?error=sqlerror");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
				header("Location: ../index.php?error=userTaken");
				exit();
			} else {
				$sql = "INSERT INTO users (userUname, userEmail, userPwd) VALUES (?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location: ../index.php?error=sqlerror");
					exit();
				} else {
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
					mysqli_stmt_execute($stmt);
					header("Location: ../index.php?signup=success");
					exit();
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
} else {
	header("Location: ../index.php");
	exit();
}