<?php
if (empty($session)) { session_start(); }
include('../config.php');
$isClicked = false;
$loggedInUser = $_SESSION["user"];
$activeUser = mysql_fetch_array(mysql_query("select * from users where(email = '$loggedInUser')"));
$activeAdmin = mysql_fetch_array(mysql_query("select * from staff where(email = '$loggedInUser')"));
$role = $activeUser['role'];
$userPass = $activeUser['password'];
if(array_key_exists("submit", $_POST)){
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$query = mysql_query("update staff set phone='$phone', address = '$address' where email = '$loggedInUser'");
$isClicked = true;
if($query==1){	
$class = "alert alert-success";
$msg = "Profile Edited Successfully";
}else{
$class = "alert alert-danger";
$msg = "Error! Unable To Edit Profile";	
}	
}

if(array_key_exists("change", $_POST)){
$password = $_POST['password'];
$newpassword = $_POST['newpassword'];
$confirmnewpassword = $_POST['confirmnewpassword'];
$isClicked = true;
if($userPass == $password){
if($newpassword == $confirmnewpassword){	
$quary = mysql_query("update users set password='$newpassword' where email = '$loggedInUser'");
if($quary==1){	
$class = "alert alert-success";
$msg = "Password Changed Successfully";
}else{
$class = "alert alert-danger";
$msg = "Error! Unable To Change Password";	
}	
}else{
$class = "alert alert-danger";
$msg = "Error! Unable To Change Password. Password Mismatch(New Password and Confirm New Password should be a match)";	
}
}else{
$class = "alert alert-danger";
$msg = "Error! Unable To Change Password. Please Provide Correctly Your Current Password";		
}
}
$doctor = mysql_query("select * from staff where designation = 'doctor'");
$nurse = mysql_query("select * from staff where designation = 'nurse'");
$patient = mysql_query("select * from patients");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html>

    <head>

	<title>HEMKO HOSPITAL | MANAGE PROFILE</title>
	
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

		<link rel="stylesheet" href="../css/font.css">

		<link href="../css/bayanno.css" media="screen" rel="stylesheet" type="text/css" />

        <script src="../js/bayanno.js" type="text/javascript"></script>

    <!-- <script>
var timeoutID;

function setup() {
    this.addEventListener("mousemove", resetTimer, false);
    this.addEventListener("mousedown", resetTimer, false);
    this.addEventListener("keypress", resetTimer, false);
    this.addEventListener("DOMMouseScroll", resetTimer, false);
    this.addEventListener("mousewheel", resetTimer, false);
    this.addEventListener("touchmove", resetTimer, false);
    this.addEventListener("MSPointerMove", resetTimer, false);

    startTimer();
}
setup();

function startTimer() {
	// wait for 1 minute before calling goInactive
    timeoutID = window.setTimeout(goInactive, 10000);
}

function resetTimer(e) {
    window.clearTimeout(timeoutID);

    goActive();
}

function goInactive() {
	// do something
         window.location.href="../logout.php";
}

function goActive() {
	// do something
	    
    startTimer();
}
</script>-->
   

    </head>

    
<?php
 include("../session.php");
?> 
    

<body>
<?php if($role=="admin"){ ?>
    <div class="navbar navbar-top navbar-inverse">

	<div class="navbar-inner">

		<div class="container-fluid">

			<a class="brand" href="">HEMKO HOSPITAL, MAKURDI</a>

			<!-- the new toggle buttons -->

			<ul class="nav pull-right">

				<li class="toggle-primary-sidebar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-primary"><button type="button" class="btn btn-navbar"><i class="icon-th-list"></i></button></li>

				

			</ul>

			
		</div>

	</div>

</div>
    <div class="sidebar-background">

	<div class="primary-sidebar-background">

	</div>

</div>

<div class="primary-sidebar">

	

	<ul class="nav nav-collapse collapse nav-collapse-primary">

    

        

        <!------dashboard----->

		<li class="">

			<span class="glow"></span>

				<a href="dashboard.php" >

					<i class="icon-desktop icon-2x"></i>

					<span>dashboard</span>

				</a>

		</li>

        

        <!------department----->

		<li class="">

			<span class="glow"></span>

				<a href="manage_department.php" >

					<i class="icon-sitemap icon-2x"></i>

					<span>department</span>

				</a>

		</li>

        

        <!------doctor----->

		<li class="">

			<span class="glow"></span>

				<a href="manage_doctor.php" >

					<i class="icon-user-md icon-2x"></i>

					<span>doctor</span>

				</a>

		</li>

        

        <!------patient----->

		<li class="">

			<span class="glow"></span>

				<a href="manage_patient.php" >

					<i class="icon-user icon-2x"></i>

					<span>patient</span>

				</a>

		</li>

        

        <!------nurse----->

		<li class="">

			<span class="glow"></span>

				<a href="manage_nurse.php" >

					<i class="icon-plus-sign-alt icon-2x"></i>

					<span>nurse</span>

				</a>

		</li>

        

        <!------pharmacist----->

		<li class="">

			<span class="glow"></span>

				<a href="manage_pharmacist.php" >

					<i class="icon-medkit icon-2x"></i>

					<span>pharmacist</span>

				</a>

		</li>

        

        <!------laboratorist----->

		<li class="">

			<span class="glow"></span>

				<a href="manage_laboratorist.php" >

					<i class="icon-beaker icon-2x"></i>

					<span>laboratorist,eo</span>

				</a>

		</li>

        

        <!------accountant----->

		<li class="">

			<span class="glow"></span>

				<a href="manage_accountant.php" >

					<i class="icon-money icon-2x"></i>

					<span>accountant</span>

				</a>

		</li>

        

        

		<!------manage hospital------>

		<li class="dark-nav ">

			<span class="glow"></span>

            <a class="accordion-toggle  " data-toggle="collapse" href="#view_hospital_submenu" >

                <i class="icon-screenshot icon-2x"></i>

                <span>monitor hospital<i class="icon-caret-down"></i></span>

            </a>

            

            <ul id="view_hospital_submenu" class="collapse ">

                <li class="">

                  <a href="view_appointment.php">

                      <i class="icon-exchange"></i> view appointment
                  </a>

                </li>

                <li class="">

                  <a href="view_payment.php">

                      <i class="icon-money"></i> view payment
                  </a>

                </li>

                <li class="">

                  <a href="view_bed_status.php">

                      <i class="icon-hdd"></i> view bed status
                  </a>

                </li>

                <li class="">

                  <a href="view_blood_bank.php">

                      <i class="icon-tint"></i> view blood bank
                  </a>

                </li>

                <li class="">

                  <a href="view_medicine.php">

                      <i class="icon-medkit"></i> view medicine
                  </a>

                </li>

                <li class="">

                  <a href="operation.php">

                      <i class="icon-reorder"></i> view operation
                  </a>

                </li>

                <li class="">

                  <a href="birth.php">

                      <i class="icon-github-alt"></i> view birth report
                  </a>

                </li>

                <li class="">

                  <a href="death.php">

                      <i class="icon-user"></i> view death report
                  </a>

                </li>

            </ul>

		</li>

        <!------system settings------>

		<li class="dark-nav ">

			<span class="glow"></span>

            <a class="accordion-toggle  " data-toggle="collapse" href="#settings_submenu" >

                <i class="icon-wrench icon-2x"></i>

                <span>settings<i class="icon-caret-down"></i></span>

            </a>

            

            <ul id="settings_submenu" class="collapse ">

                <li class="">

                  <a href="manage_noticeboard.php">

                      <i class="icon-columns"></i> manage noticeboard
                  </a>

                </li>

                <li class="">

                  <a href="backup_restore.php">

                      <i class="icon-download-alt"></i> backup restore
                  </a>

                </li>

            </ul>

		</li>


		<!------manage own profile--->

		<li class="dark-nav active">

			<span class="glow"></span>

				<a href="manage_profile.php" >

					<i class="icon-lock icon-2x"></i>

					<span>profile</span>

				</a>

		</li>
		
		<!------log out--->
		
		<li class="">

			<span class="glow"></span>

				<a href="../logout.php" >

					<i class="icon-key icon-2x"></i>

					<span>log out</span>

				</a>

		</li>

	</ul>

</div>
    <div class="main-content">

		        <div class="container-fluid" >

            <div class="row-fluid">

                <div class="area-top clearfix">

                    <div class="pull-left header">

                        <h3 class="title">

                        <i class="icon-info-sign"></i>

                        Manage Profile </h3>

                    </div>

                    <ul class="inline pull-right sparkline-box">

                        <li class="sparkline-row">

                            <h4 class="green">

                                <span>doctor</span> 

                                <?php echo mysql_num_rows($doctor);?>
                            </h4>

                        </li>

                        <li class="sparkline-row">

                            <h4 class="red">

                                <span>patient</span> 

                                <?php echo mysql_num_rows($patient);?>
                            </h4>

                        </li>

                        <li class="sparkline-row">

                            <h4 class="green">

                                <span>nurse</span> 

                               <?php echo mysql_num_rows($nurse);?>
                            </h4>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

        

        <!--------FLASH MESSAGES--->

        

		<!---->

        <?php if($isClicked == true){ ?>
		<div style="text-align:center;" class="<?php echo $class; ?>">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong><?php echo $msg;?></strong>
  </div>
		<?php } ?>

        

        
        <div class="container-fluid padded">

            <div class="box">

	<div class="box-header">

    

    	<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">



			<li class="active">

            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

					Manage Profile
                    	</a></li>

		</ul>

    	<!------CONTROL TABS END------->

        

	</div>

	<div class="box-content padded">

		<div class="tab-content">

        	<!----EDITING FORM STARTS---->

			<div class="tab-pane box active" id="list" style="padding: 5px">

                <div class="box-content padded">

					
                        <form action="" method="post" accept-charset="utf-8" class="form-horizontal validatable">
                                <div class="control-group">

                                    <label class="control-label">Name</label>

                                    <div class="controls">

                                        <input type="text" class="" name="name" value="<?php echo $activeAdmin['fullname'];?>" readonly="readonly"/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label">Email Address</label>

                                    <div class="controls">

                                        <input type="text" class="" name="email" value="<?php echo $activeAdmin['email'];?>" readonly="readonly"/>

                                    </div>

                                </div>
								
								<div class="control-group">

                                    <label class="control-label">Phone Number</label>

                                    <div class="controls">

                                        <input type="text" class="" name="phone" value="<?php echo $activeAdmin['phone'];?>"/>

                                    </div>

                                </div>

                                <div class="control-group">

                                <label class="control-label">Residential Address</label>

                                <div class="controls">

                                    <div class="box closable-chat-box">

                                        <div class="box-content padded">

                                                <div class="chat-message-box">

                                                <textarea name="address" id="ttt" rows="5" placeholder="Enter Residential Address"><?php echo $activeAdmin['address'];?></textarea>

                                                </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
							<div class="control-group">

                                    <label class="control-label">&nbsp;</label>

                                    <div class="controls">

                                        <b>Note: To Edit Your Name And Email Address Contact The Administrator</b>

                                    </div>

                                </div>

                                <div class="form-actions">

                            		<button type="submit" name ="submit" class="btn btn-blue">Edit Profile</button>

                        		</div>

                        </form>
						
                </div>

			</div>

            <!----EDITING FORM ENDS--->

            

		</div>

	</div>

</div>





<!--password-->

<div class="box">

	<div class="box-header">

    

    	<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">



			<li class="active">

            	<a href="#list" data-toggle="tab"><i class="icon-lock"></i> 

					change password
                    	</a></li>

		</ul>

    	<!------CONTROL TABS END------->

        

	</div>

	<div class="box-content padded">

		<div class="tab-content">

        	<!----EDITING FORM STARTS---->

			<div class="tab-pane box active" id="list" style="padding: 5px">

                <div class="box-content padded">

					
                                                <form action="" method="post" accept-charset="utf-8" class="form-horizontal validatable">
                                <div class="control-group">

                                    <label class="control-label">Password</label>

                                    <div class="controls">

                                        <input type="password" class="" name="password"/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label">New Password</label>

                                    <div class="controls">

                                        <input type="password" class="" name="newpassword"/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label">Confirm New Password</label>

                                    <div class="controls">

                                        <input type="password" class="" name="confirmnewpassword"/>

                                    </div>

                                </div>

                                <div class="form-actions">

                            		<button type="submit" name="change" class="btn btn-blue">Change Password</button>

                        		</div>

                        </form>
						
                </div>

			</div>

            <!----EDITING FORM ENDS--->

            

		</div>

	</div>

</div>
        </div>        

	    <div style="clear:both;color:#aaa; padding:20px;">

    	<hr /><center>&copy; 2017 <a href="">HEMKO HOSPITAL, MAKURDI</a></center>

    </div>
    </div>
<?php }else{ 
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=../error_page.php\">";
  exit;
  } ?>
    

</body>

</html>