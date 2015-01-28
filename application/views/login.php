<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login</title>
<link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/login.css" rel="stylesheet">
</head>
<body>

	<div class="container">
        <?php
        $message = $this->session->flashdata('message');
        $error = $this->session->flashdata('error');
        ?>
        <?php if (!empty($message)):?>
        <div><?php echo $message?></div>
        <?php endif;?>
        
        <?php if (!empty($error)):?>
        <div><?php echo $error?></div>
        <?php endif;?>
        <div>

			<form class="form-signin" method='POST' action='<?php echo base_url() ?>login'>
				<h2 class="form-signin-heading">Please sign in</h2>
				<label for="inputUsername" class="sr-only">Username</label>
				<input type="text" name='username' id="inputUsername" class="form-control" placeholder="Username" required autofocus>
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" name='password' id="inputPassword" class="form-control" placeholder="Password" required>
				<!-- 
			<div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me">
					Remember me
				</label>
			</div>
			 -->
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			</form>

		</div>
		<script src='<?php echo base_url() ?>assets/jquery/jquery.min.js'></script>
		<script src='<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js'></script>

</body>
</html>