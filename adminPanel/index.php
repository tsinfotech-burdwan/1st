<?php
	session_start();
	include "base/publicVariable.php";

	if(isset($_GET['errMsg']) && $_GET['errMsg']!="")
	{
		$errMsg = $_GET['errMsg'];
	}
	else
	{
		$errMsg = "Sign In to your account";
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Login | <?php echo $rowOrganizationDetails['organization_name'];?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/<?php echo $rowOrganizationDetails['organization_favicon'];?>">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="loginAssets/css/style.css"> 
	</head> 
	<body>
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-4">
						<h2 class="heading-section"><?php echo $rowOrganizationDetails['organization_name'];?></h2> 
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-7 col-lg-5">
						<div class="wrap">
							<div class="login-wrap p-4 p-md-5">
								<div class="d-flex">
									<div class="w-100">
										<h3 class="mb-2">Sign In</h3> 
									</div>									
								</div>
								<div class="d-flex align-items-center justify-content-center">
									<p style="color:red;"><?php echo $errMsg;?></p>
								</div>
								<form action="loginValidation" method="POST" class="signin-form" id="loginForm">
									<div class="form-group mt-3 mb-2">
										<input type="number" class="form-control" name="contactNumber" id="contactNumber" value="<?php if(isset($_COOKIE[$rowOrganizationDetails['cookie_user_name']]) && $_COOKIE[$rowOrganizationDetails['cookie_user_name']]!=""){echo $_COOKIE[$rowOrganizationDetails['cookie_user_name']];}?>" required>
										<label class="form-control-placeholder" for="username">Username</label>
									</div>
									<div class="form-group mt-3">
										<input id="password-field" type="password" class="form-control" name="password" value="<?php if(isset($_COOKIE[$rowOrganizationDetails['cookie_user_password']]) && $_COOKIE[$rowOrganizationDetails['cookie_user_password']]!=""){echo $_COOKIE[$rowOrganizationDetails['cookie_user_password']];}?>" required>
										<label class="form-control-placeholder" for="password">Password</label> 
										<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> 
									</div>
									<div class="form-group mt-3 mb-2">
										<img src="phpcaptcha/captcha1" id='captchaimg'>
									</div>
									<div class="form-group mt-3 mb-2">
										<input class="form-control" id="captchaCode" name="captchaCode" placeholder="Captcha Code" type="password">
										<label class="form-control-placeholder" for="username">Captcha</label>
									</div>
									<div class="form-group">
										<button type="button" onclick="submitForm();" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
									</div>
									<div class="form-group d-md-flex">
										<div class="w-50 text-left">
											<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
												<input type="checkbox" name="rememberMeOption" checked> <span class="checkmark"></span> 
											</label>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> 
		<script src="loginAssets/js/jquery.min.js"></script>
		<script src="loginAssets/js/popper.js"></script>
		<script src="loginAssets/js/bootstrap.min.js"></script>
		<script src="loginAssets/js/main.js"></script>
		<script type="text/javascript">
			function submitForm()
			{
				password = document.getElementById("password-field").value;
				captchaCode = document.getElementById("captchaCode").value;
				captchaCode = captchaCode.replaceAll("+","~");
				
				if(password!="" && captchaCode!="")
				{
					var datastring = "password="+password+"&captchaCode="+captchaCode;
					$.ajax({
						type: 'POST',
						url: 'backendFilesFolders/updateCodeLoginBackend',
						data: datastring,
						success: function (result)
						{
							str1=result;
							str1=str1.trim();
							document.getElementById("captchaCode").value = str1;
							document.getElementById("loginForm").submit();
						}
					});
				}
			}
		</script>
	</body>
</html> 