<!-- Login Form Start -->
<div class="w2-container w3-animate-opacity">
	<div id="loginContainer_login" class="w3-modal w3-animate-opacity">
		<div class="w3-container w3-display-middle login_box">
			<div class="w3-card-4 w3-indigo login_box" id="loginCard">
				<div class="w3-container w3-blue" id="loginHeader">
					<span onclick="document.getElementById('loginContainer_login').style.display='none'" class="w3-button w3-right" id="login_close_button">&times;</span>
					<h2>Login</h2>
				</div>
				</br>
				<form class="w3-container" method="post" action="login.php">
					<label class="w3-text">
						<b>Username:</b></label>
					<input class="w3-input" type="text" name="username" id="username"/>
					</br>
					<label class="w3-text">
						<b>Password:</b></label>
					<input  class="w3-input" type="password" name="password" id="password"/>
					</br>
					<button class="w3-btn w3-blue w3-text" id="buttonLogin">
						<b>Login</b></button>

				</form>
				</br>
			</div>
		</div>
	</div>
</div>
<!-- Login Form End -->