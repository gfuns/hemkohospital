<?php
if (empty($session)) { session_start(); }
include('config.php');
$isClicked = false;
if(array_key_exists("submit", $_POST)){
$isClicked = true;	
$email=$_POST['email'];
$password=$_POST['password']; 
$query=mysql_query("select * from users where email='$email'");
$qwerty = mysql_query("select * from users where email='$email' and password = '$password'");
$qwerty2 = mysql_num_rows($qwerty);
$query2 = mysql_num_rows($query);
if($email=="" || $password==""){
$msg="Enter Email And Password"; 
$class = "alert alert-danger";
}else if($query2==0){
$msg="Incorrect Email Address";
$class = "alert alert-danger";
}else if($query2>0 && $qwerty2==0){
$msg="Incorrect Password";
$class = "alert alert-danger";
}else{
while($check=mysql_fetch_array($query)){
$user1=$check['email'];
$pw1=$check['password'];
$role=$check['role'];
}

if($email==$user1 && $password==$pw1){
$_SESSION['user'] = $email;
if($role=="laboratorist"){
header("Location: http://localhost/abchospital/lab/dashboard.php");
}else if($role=="doctor"){
header("Location: http://localhost/abchospital/doctor/dashboard.php");
}else if($role=="nurse"){
header("Location: http://localhost/abchospital/nurse/dashboard.php");
}else if($role=="pharmacist"){
header("Location: http://localhost/abchospital/pharmacist/dashboard.php");
}else if($role=="accountant"){
header("Location: http://localhost/abchospital/accountant/dashboard.php");
}else if($role=="admin"){
header("Location: http://localhost/abchospital/admin/dashboard.php");
}else{
$msg="Invalid Combination";
$class = "alert alert-danger";
}
} 
}
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<link rel="stylesheet" href="css/font.css">
		<link href="css/bayanno.css" media="screen" rel="stylesheet" type="text/css" />
        <script src="js/bayanno.js" type="text/javascript"></script>
        <title>Login | HEMKO HOSPITAL</title>

    </head>

	<body>

		
        <div class="navbar navbar-top navbar-inverse">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="brand" href="index.html">HEMKO HOSPITAL, MAKURDI</a>                                       

                </div>

            </div>

        </div>

        <div class="container">

            <div class="span4 offset4">

                <div class="">
<br><br>
                    <center>

                        <img src="images/logo.png" style="height:150px;" />

                    </center>
					
					<?php if($isClicked == true){ ?>
<div style="text-align:center;" class="<?php echo $class; ?>">
    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong><?php echo $msg;?></strong>
  </div>
  <?php } ?>

                    <div class="login box" style="margin-top: 10px;">

                        <div class="box-header">

                            <span class="title">Login Page</span>

                        </div>

                        <div class="box-content padded">

                        <i class="m-icon-swapright m-icon-white"></i>

                        	<form action="" method="post" accept-charset="utf-8" class="separate-sections">
							
                                <div class="input-prepend">

                                    <span class="add-on" href="#">

                                    <i class="icon-envelope"></i>

                                    </span>

                                    <input name="email" type="email" placeholder="Email">

                                </div>

                                <div class="input-prepend">

                                    <span class="add-on" href="#">

                                    <i class="icon-key"></i>

                                    </span>

                                    <input name="password" type="password" placeholder="Password">

                                </div>

                                <div>

                                    <button type="submit" name="submit" class="btn btn-blue btn-block" >

                                        Login
                                    </button>

                                </div>

                            </form>
                            <div>

                                <a  data-toggle="modal" href="#modal-simple">

                                    Forgot Password?
                                </a>

                            </div>

                        </div>

                    </div>

                        <div style="clear:both;color:#aaa; padding:20px;">

    	<hr /><center>&copy; 2017 <a href="index.html">HEMKO HOSPITAL, MAKURDI</a></center>

    </div>
                </div>

            </div>

        </div>

        

        

        <!-----------password reset form ------>

        <div id="modal-simple" class="modal hide fade">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            <h6 id="modal-tablesLabel">Reset Password</h6>

          </div>

          <div class="modal-body">

            <form action="" method="post" accept-charset="utf-8">
			<center>
            	<input type="email" name="email"  placeholder="Email"  style="margin-bottom: 0px !important;"/>

                <input type="submit" value="Reset Password"  class="btn btn-blue btn-medium"/>
			</center>
            </form>
          </div>

          <div class="modal-footer">

            <button class="btn btn-default" data-dismiss="modal">Close</button>

          </div>

        </div>

        <!-----------password reset form ------>

        

        

	</body>

</html>