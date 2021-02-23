<!DOCTYPE html>
<html>
<head>
	<title><?php echo $user; ?></title>

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
	<div class="panel panel-default login-form">
	  	<div class="panel-body">
	  		
                <?php if($user=='teacher'){ ?>
                    <form method="post" action="<?php echo base_url() ?>" id="RegisterForm">
                        <fieldset>
                            <legend>
                                Register <span style="color:green">as </span> <?php echo ucfirst($user); ?>
                            </legend>
                            <div id="message"></div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus  required>
                            </div>
                            <div class="form-group">
                                <label for="username">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" autofocus  required>
                            </div>
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="email" class="form-control" id="username" name="username" placeholder="Email" autofocus  required>
                            </div>
                            <div class="form-group">
                                <label for="username">Educational knowledge</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="example: M.Sc, B.Sc etc.." autofocus required>

                            </div>
                            <div class="form-group">
                                <label for="username">Date Of Birth: </label>
                                <input type="date" id="dob" name="dob" max="<?php echo date('Y-m-d');?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Apointment Subject: </label>
                                <!-- <input type="text" class="form-control" id="subject" name="username" placeholder="Username" autofocus> -->
                                
                                <input type="checkbox" class="form-check-input" name="sybject" id="" value="1">  English
                                <input type="checkbox" class="form-check-input" name="sybject" id="" value="1"> Mathematics
                                <input type="checkbox" class="form-check-input" name="sybject" id="" value="1"> Physics
                                <input type="checkbox" class="form-check-input" name="sybject" id="" value="1"> Chemeistry
                                <input type="checkbox" class="form-check-input" name="sybject" id="" value="1"> Biology
                            </div>
                            <div class="form-group">
                                <label for="password">Address</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="Address" required> 
                            </div>
                            <div class="form-group">
                                <label for="password">Contact</label>
                                <input type="number" class="form-control" id="password" name="password" placeholder="Address" required> 
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>		
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>			  						 
                            
                            <button type="submit" class="col-md-12 btn btn-primary login-button">Submit</button>
                            <div class="register_part">
                                <span>Already have account? <a href="<?php echo base_url('login'); ?>">Login</a> </span>
                            </div>				
                        </fieldset>
                    </form>
                <?php }
                elseif($user=='student'){?>
                    <form method="post" action="<?php echo base_url('user/insert_s') ?>" id="RegisterForm">
                        <fieldset>
                            <legend>
                                Register <span style="color:green">as </span> <?php echo ucfirst($user); ?>
                            </legend>
                            <div id="message"></div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="username">Student Name</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Full Name" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="email" class="form-control" id="username" name="username" placeholder="Email" autofocus required>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="username">Admission Class:</label>
                                    <!-- <input type="text" class="form-control" id="username" name="class" placeholder="example: 6, 7" autofocus> -->
                                    <select name="" id="" class="form-select" required>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                        <option value="5">Five</option>
                                        <option value="6">Six</option>
                                        <option value="7">Seven</option>
                                        <option value="8">Eight</option>
                                        <option value="9">Nine</option>
                                        <option value="10">Ten</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="dob">Date Of Birth: </label>
                                    <input type="date" id="dob" name="dob" max="<?php echo date('Y-m-d');?>">
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="password">Address</label>
                                <input type="test" class="form-control" id="password" name="password" placeholder="Address" required> 
                            </div>	
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>		
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            </div>			  						 
                            
                            <button type="submit" class="col-md-12 btn btn-primary login-button">Submit</button>
                            <div class="register_part">
                                <span>Already have account? <a href="<?php echo base_url('login'); ?>">Login</a> </span>
                            </div>				
                        </fieldset>
                    </form>
                <?php } ?>
		    
	  	</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('custom/js/login.js') ?>"></script>

</body>
</html>