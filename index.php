<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="author" content="Surya Astawan" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Diary Note</title>
		<link rel="stylesheet" href="assets/css/style.css" />
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
			integrity="sha512-znmTf4HNoF9U6mfB6KlhAShbRvbt4CvCaHoNV0gyssfToNQ/9A0eNdUbvsSwOIUoJdMjFG2ndSvr0Lo3ZpsTqQ=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
			integrity="sha512-9BwLAVqqt6oFdXohPLuNHxhx36BVj5uGSGmizkmGkgl3uMSgNalKc/smum+GJU/TTP0jy0+ruwC3xNAk3F759A=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>
	</head>

	<body>
		<div class="container">
			<!-- Login Form Start -->
			<div class="row justify-content-center wrapper" id="login-box">
				<div class="col-lg-10 my-auto">
					<div class="card-group myShadow">
						<div class="card rounded-left p-4" style="flex-grow: 1.4">
							<h1 class="text-center font-weight-bold text-primary">Sign in to Account</h1>
							<hr class="my-3" />
							<form action="#" method="post" class="px-3" id="login-form">
								<!-- email-form-start -->
								<div class="input-group input-group-lg form-group">
									<div class="input-group-prepend">
										<span class="input-group-text rounded-0">
											<i class="far fa-envelope fa-lg"></i>
										</span>
									</div>
									<input type="email" name="email" id="email" class="form-control rounded-0" placeholder="E-Mail" required />
								</div>
								<!-- email-form-end -->
								<!-- password-form-start -->
								<div class="input-group input-group-lg form-group">
									<div class="input-group-prepend">
										<span class="input-group-text rounded-0">
											<i class="fas fa-key fa-lg"></i>
										</span>
									</div>
									<input
										type="password"
										name="password"
										id="password"
										class="form-control rounded-0"
										placeholder="Password"
										required
									/>
								</div>
								<!-- password-form-end -->
								<div class="form-group">
									<div class="custom-control custom-checkbox float-left">
										<input type="checkbox" name="rem" class="custom-control-input" id="customCheck" />
										<label for="customCheck" class="custom-control-label">Remember me</label>
									</div>
									<div class="forgot float-right">
										<a href="#" id="forgot-link">Forgot Password?</a>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="form-group">
									<input type="submit" value="Sign In" id="login-btn" class="btn btn-primary btn-lg btn-block myBtn" />
								</div>
							</form>
						</div>
						<div class="card justify-content-center rounded-right myColor p-4">
							<h1 class="text-center font-weight-bold text-white">Hello Friends!</h1>
							<hr class="my-3 bg-light myHr" />
							<p class="text-center font-weight-bolder text-light lead">Enter your personal details and start your journey with us!</p>
							<button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="register-link">
								Sign Up
							</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Login Form End -->
			<!-- Register Form Start -->
			<div class="row justify-content-center wrapper" id="register-box" style="display: none">
				<div class="col-lg-10 my-auto">
					<div class="card-group myShadow">
						<div class="card justify-content-center rounded-right myColor p-4">
							<h1 class="text-center font-weight-bold text-white">Welcome Back!</h1>
							<hr class="my-3 bg-light myHr" />
							<p class="text-center font-weight-bolder text-light lead">
								To keep connected with us please login with your personal info.
							</p>
							<button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="login-link">
								Sign In
							</button>
						</div>
						<div class="card rounded-left p-4" style="flex-grow: 1.4">
							<h1 class="text-center font-weight-bold text-primary">Create Account</h1>
							<hr class="my-3" />
							<form action="#" method="post" class="px-3" id="register-form">
								<div class="input-group input-group-lg form-group">
									<div class="input-group-prepend">
										<span class="input-group-text rounded-0">
											<i class="far fa-user fa-lg"></i>
										</span>
									</div>
									<input type="text" name="name" id="name" class="form-control rounded-0" placeholder="Username" required />
								</div>
								<!-- email-form-start -->
								<div class="input-group input-group-lg form-group">
									<div class="input-group-prepend">
										<span class="input-group-text rounded-0">
											<i class="far fa-envelope fa-lg"></i>
										</span>
									</div>
									<input type="email" name="email" id="remail" class="form-control rounded-0" placeholder="E-Mail" required />
								</div>
								<!-- email-form-end -->
								<!-- password-form-start -->
								<div class="input-group input-group-lg form-group">
									<div class="input-group-prepend">
										<span class="input-group-text rounded-0">
											<i class="fas fa-key fa-lg"></i>
										</span>
									</div>
									<input
										type="password"
										name="password"
										id="rpassword"
										class="form-control rounded-0"
										placeholder="Password"
										required
										minlength="5"
									/>
								</div>
								<!-- password-form-end -->
								<div class="input-group input-group-lg form-group">
									<div class="input-group-prepend">
										<span class="input-group-text rounded-0">
											<i class="fas fa-key fa-lg"></i>
										</span>
									</div>
									<input
										type="password"
										name="cpassword"
										id="cpassword"
										class="form-control rounded-0"
										placeholder="Confirm Password"
										required
										minlength="5"
									/>
								</div>
								<div class="form-group">
									<input type="submit" value="Sign Up" id="register-btn" class="btn btn-primary btn-lg btn-block myBtn" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Register Form End -->

			<!-- Forgot Password Form Start -->
			<div class="row justify-content-center wrapper" id="forgot-box" style="display: none">
				<div class="col-lg-10 my-auto">
					<div class="card-group myShadow">
						<div class="card justify-content-center rounded-left myColor p-4">
							<h1 class="text-center font-weight-bold text-white">Reset Password</h1>
							<hr class="my-3 bg-light myHr" />
							<button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="back-link">
								Back
							</button>
						</div>
						<div class="card rounded-right p-4" style="flex-grow: 1.4">
							<h1 class="text-center font-weight-bold text-primary">Forgot Your Password</h1>
							<hr class="my-3" />
							<p class="lead text-center text-secondary">
								To reset your password, enter the registered e-mail address and we will send you the reset instructions on your
								e-mail!
							</p>
							<form action="#" method="post" class="px-3" id="forgot-form">
								<!-- email-form-start -->
								<div class="input-group input-group-lg form-group">
									<div class="input-group-prepend">
										<span class="input-group-text rounded-0">
											<i class="far fa-envelope fa-lg"></i>
										</span>
									</div>
									<input type="email" name="email" id="femail" class="form-control rounded-0" placeholder="E-Mail" required />
								</div>
								<!-- email-form-end -->
								<div class="form-group">
									<input type="submit" value="Reset Password" id="forgot-btn" class="btn btn-primary btn-lg btn-block myBtn" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Forgot Password Form End -->
		</div>

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
			});
		</script>
	</body>
</html>
