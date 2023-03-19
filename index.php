<?php
session_start();  
require "./header.php";
if(isset($_SESSION['verified']) && $_SESSION['verified'] == 1){
	header("location: ./arena.php");
	exit();
}
?>	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="./php/login.php">
				    <span class="login100-form-title p-b-48">
						<img src="./images/icons/HTU Logo200.png" alt="">
					</span>

                    <span class="login100-form-title p-b-26">
						Welcome To HTU Gaming Lounge - Login
					</span>
					

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<label class="" data-placeholder="Email">Email</label>
						<input class="input100" type="text" name="email" required>
						<?php
							if(isset($_SESSION['email_error'])){
								echo " <p style='color:red;'>".$_SESSION['email_error']."</p>";
								unset($_SESSION['email_error']);
							}
						?>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<label class="" data-placeholder="Password">Password</label>
						<input class="input100" type="password" name="password" required>
						<?php
							if(isset($_SESSION['password_error'])){
								echo "<p style='color:red;'>".$_SESSION['password_error']."</p>";
								unset($_SESSION['password_error']);
							}
						?>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Don't have an account?
						</span>

						<a class="txt2" href="./signup.php">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php
require "./footer.php";
?>