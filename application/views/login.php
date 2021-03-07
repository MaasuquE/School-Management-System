<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($user)){echo $user;}else{echo 'login';}; ?></title>

	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<!-- boostrap theme -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap-theme.min.css') ?>">

	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('custom/css/custom.css') ?>">	

	<!-- jquery -->
	<script type="text/javascript" src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
	<!-- boostrap js -->
	<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>

</head>
<body>


<div class="col-md-6 col-md-offset-3 vertical-off-4">
	<div class="login_logo">
	<img src="<?php echo base_url('assets/images/sms_black.png') ?>" alt="">
	</div>
	<div class="panel panel-default login-form">
	  	<div class="panel-body">
	  		<form method="post" action="<?php echo base_url('login/'.$auth_type); ?>" >
		    	<fieldset>
		    		<legend>
		    			Login <span style="color:green">as</span>
		    		</legend>
					<div class="auth_list">
						<a href="<?php echo base_url('login?user=').'student'; ?>"><li <?php if($auth_type=='student'){ echo 'class="active"';} ?> >Student</li></a>
						<a href="<?php echo base_url('login?user=').'teacher'; ?>"><li <?php if($auth_type=='teacher'){ echo 'class="active"';} ?>>Teacher</li></a>
						<a href="<?php echo base_url('login?user=').'admin'; ?>"><li <?php if($auth_type=='admin' || $auth_type==''){ echo 'class="active"';} ?>>Admin</li></a>
					</div>
					<?php  echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
		    		<?php if(isset($messages)){echo '<div class="alert alert-danger">'.$messages.'</div>';}; ?>
					<?php if($auth_type=='student'){ ?>
					<div class="form-group">
				    	<label for="username">Student Id</label>
				    	<input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter your id" autofocus required>
				  	</div>
					<?php  }elseif($auth_type=='teacher'){ ?>
					<div class="form-group">
				    	<label for="username">Teacher Id</label>
				    	<input type="text" class="form-control" id="username" name="teacher_id" placeholder="teacher id" autofocus required>
				  	</div>
					<?php }else{ ?>
					<div class="form-group">
				    	<label for="username">Username</label>
				    	<input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus required>
				  	</div>
					  <?php } ?>
					  <div class="form-group">
				    	<label for="password">Password</label>
				    	<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				  	</div>
					
				  	
					  				  						 
				  	
					<input type="submit" class="col-md-12 btn btn-primary login-button" value="Submit">
				  	<!-- <button type="submit" class="col-md-12 btn btn-primary login-button">Submit</button> -->
					<!-- <div class="register_part"><?php  if($auth_type!=''){ ?>
						<span>Havn't Account? <a href="<?php echo base_url('register/'.$auth_type); ?>">Register</a> as <?php echo $auth_type; ?></span>
						<?php } ?>
					</div>				 -->
		    	</fieldset>
		    </form>
	  	</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('custom/js/login.js') ?>"></script>

</body>
</html>