<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<div id="body">
		<form action="<?php echo base_url();?>login/masuk" method="post">
			<div id="login">
				<div class="input">
					<input type="text" name="name">
				</div>
				<div class="input">
					<input type="password" name="password">
				</div>
				<div>
					<input type="submit" value="login">
				</div>
			</div>	
		</form>
			<?php echo $this->session->userdata('user_id');?>
	</div>
</body>
</html>