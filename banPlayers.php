<?php
    session_start();
    require "./header.php";
    require "./connection.php";
?>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="./php/ban.php">/
				    <span class="login100-form-title p-b-48">
						<img src="./images/icons/HTU Logo200.png" alt="">
					</span>

                    <span class="login100-form-title p-b-26">
						HTU Gaming Lounge - Ban Players
					</span>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@htu.edu.jo">
						<label class="" data-placeholder="Email">Email</label>
						<input class="input100" type="text" name="email" required>
					</div>

                    <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Ban
							</button>
						</div>
					</div>
										
				</form>
			</div>
		</div>
	</div>
<?php
require "./footer.php";    
?>