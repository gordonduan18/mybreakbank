<footer>
	<div class="signinDiv">
		<?php 

		if (isset($_SESSION['userId'])) {
			echo '<form action="includes/logout.inc.php" method="post">
			<button type="submit" name="logout-submit" class="signoutBtn">Logout</button>
			</form>';
		} else {
			echo '<form action="includes/login.inc.php" method="post" class="signinForm">
			<input type="text" name="uname" class="signin" placeholder="Username/E-mail">
			<input type="password" name="pwd" class="signin" placeholder="Password">
			<button type="submit" name="login-submit" class="signinBtn">Login</button>
			</form>
			<span data-target="#signupModal" data-toggle="modal" class="registerBtn">Register</span>';
		}
		?>
	</div>
</footer>

</body>
</html>
