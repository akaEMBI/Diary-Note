<?php 
    require_once 'assets/php/header.php';
?>
    <h1><?= basename($_SERVER['PHP_SELF']); ?></h1>
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
			integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		></script>
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"
			integrity="sha512-c4wThPPCMmu4xsVufJHokogA9X4ka58cy9cEYf5t147wSw0Zo43fwdTy/IC0k1oLxXcUlPvWZMnD8be61swW7g=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		></script>
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"
			integrity="sha512-xd+EFQjacRjTkapQNqqRNk8M/7kaek9rFqYMsbpEhTLdzq/3mgXXRXaz1u5rnYFH5mQ9cEZQjGFHFdrJX2CilA=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#register-link').click(function () {
					$('#login-box').hide();
					$('#register-box').show();
				});
				$('#login-link').click(function () {
					$('#login-box').show();
					$('#register-box').hide();
				});
				$('#forgot-link').click(function () {
					$('#login-box').hide();
					$('#forgot-box').show();
				});
				$('#back-link').click(function () {
					$('#login-box').show();
					$('#forgot-box').hide();
				});

				// Register Ajax Request
				$('#register-btn').click(function (e) {
					if ($('#register-form')[0].checkValidity()) {
						e.preventDefault();
						$('#register-btn').val('Please Wait...');
						if ($('#rpassword').val() != $('#cpassword').val()) {
							$('#passError').text('* Password did not matched!');
							$('#register-btn').val('Sign Up');
						} else {
							$('#passError').text('');
							$.ajax({
								url: 'assets/php/action.php',
								method: 'post',
								data: $('#register-form').serialize() + '&action=register',
								success: function (response) {
									$('#register-btn').val('Sign Up');
									if (response === 'register') {
										window.location = 'home.php';
									} else {
										$('#regAlert').html(response);
									}
								},
							});
						}
					}
				});

				//Login Ajax Request
				$('#login-btn').click(function (e) {
					if ($('#login-form')[0].checkValidity()) {
						e.preventDefault();

						$('#login-btn').val('Please Wait...');
						$.ajax({
							url: 'assets/php/action.php',
							method: 'post',
							data: $('#login-form').serialize() + '&action=login',
							success: function (response) {
								console.log(response);
								$('#login-btn').val('Sign In');
								if (response === 'login') {
									window.location = 'home.php';
								} else {
									$('#loginAlert').html(response);
								}
							},
						});
					}
				});

				//Forgot Password Ajax Request
				$('#forgot-btn').click(function (e) {
					if ($('#forgot-form')[0].checkValidity()) {
						e.preventDefault();

						$('#forgot-btn').val('Please Wait...');

						$.ajax({
							url: 'assets/php/action.php',
							method: 'post',
							data: $('#forgot-form').serialize() + '&action=forgot',
							success: function (response) {
								$('#forgot-btn').val('Reset Password');
								$('#forgot-form')[0].reset();
								$('#forgotAlert').html(response);
							},
						});
					}
				});
			});
		</script>
	</body>
</html>
