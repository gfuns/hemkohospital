<?php
if (empty($session)) { session_start(); }
include('../config.php');
$loggedInUser = $_SESSION["user"];
$activeUser = mysql_fetch_array(mysql_query("select * from users where(email = '$loggedInUser')"));
$activeAdmin = mysql_fetch_array(mysql_query("select * from staff where(email = '$loggedInUser')"));
$role = $activeUser['role'];
$isClicked = false;
$id=$_GET['id'];
if(!empty($id)){
$pickUp = mysql_fetch_array(mysql_query("select email from staff where staffid = '$id'"));
$email = $pickUp['email'];
$logindel = mysql_query("delete from users where email = '$email'");
$del = mysql_query("delete from staff where staffid = '$id'");
$isClicked = true;
if($del==1){
$class = "alert alert-success";
$msg = "Laboratorist Deleted Successfully";
}else{
$class = "alert alert-danger";
$msg = "Error! Unable To Delete Laboratorist";	
}	
}
if(array_key_exists("submit", $_POST)){
$rowsql=mysql_query("select MAX(staffid) as max from `staff`;");
$row =mysql_fetch_array($rowsql);
$staffid = $row['max']+1;
$email = $_POST['email'];	
$fullname = $_POST['name'];	
$sex = $_POST['sex'];
$phone = $_POST['phone'];	
$address = $_POST['address'];
$query = mysql_query("insert into staff(staffid, email, fullname, sex, phone, address, department, designation, specialty)values('$staffid','$email', '$fullname', '$sex', '$phone', '$address', 'Laboratory', 'laboratorist', 'Clinical Biology')");
$isClicked = true;
if($query==1){	
$class = "alert alert-success";
$msg = "Laboratorist Added Successfully";

$reclogin = mysql_query("insert into users(email, password, role)values('$email','laboratorist','laboratorist')");	
}else{
$class = "alert alert-danger";
$msg = "Error! Unable To Add Laboratorist";	
}	
}
$doctor = mysql_query("select * from staff where designation = 'doctor'");
$nurse = mysql_query("select * from staff where designation = 'accountant'");
$patient = mysql_query("select * from patients");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html>

    <head>
<title>HEMKO HOSPITAL | MANAGE LABORATORIST</title>
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

		<link rel="stylesheet" href="../css/font.css">

		<link href="../css/bayanno.css" media="screen" rel="stylesheet" type="text/css" />

        <script src="../js/bayanno.js" type="text/javascript"></script>
	
<!--<script>
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

		<li class="dark-nav active">

			<span class="glow"></span>

				<a href="manage_laboratorist.php" >

					<i class="icon-beaker icon-2x"></i>

					<span>laboratorist</span>

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

		<li class="">

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

                        Manage Laboratorist </h3>

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

					Laboratorists List
                    	</a></li>

			<li>

            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>

					Add Laboratorist
                    	</a></li>

		</ul>

    	<!------CONTROL TABS END------->

        

	</div>

	<div class="box-content padded">

		<div class="tab-content">

        	<!----EDITING FORM STARTS---->

        	
            <!----EDITING FORM ENDS--->

            

            <!----TABLE LISTING STARTS--->

            <div class="tab-pane box active" id="list">

				

                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">

                	<thead>

                		<tr>

                    		<th><div>#</div></th>

                    		<th><div>Laboratorist's Name</div></th>

                    		<th><div>Email Address</div></th>
							
							<th><div>Phone Number</div></th>

                    		<th><div>options</div></th>

						</tr>

					</thead>

                    <tbody>
<?php 
	$sno = 1;
	$query = mysql_query("select * from staff where designation = 'laboratorist'");
	while($view = mysql_fetch_array($query)){
		
	?>
                    	
                        <tr>

                            <td><?php echo $sno++;?></td>

							<td><?php echo $view['fullname'];?></td>

							<td><?php echo $view['email'];?></td>
							
							<td><?php echo $view['phone'];?></td>

							<td align="center">

                            	<a href="edit_laboratorist.php?id=<?php echo $view['staffid'];?>"

                                	rel="tooltip" data-placement="top" data-original-title="edit" class="btn btn-blue">

                                		<i class="icon-wrench"></i>

                                </a>

                            	<a href="manage_laboratorist.php?id=<?php echo $view['staffid'];?>" onclick="return confirm('delete?')"

                                	rel="tooltip" data-placement="top" data-original-title="delete" class="btn btn-red">

                                		<i class="icon-trash"></i>

                                </a>

        					</td>

                        </tr>

                        <?php } ?>
                    </tbody>

                </table>

			</div>

            <!----TABLE LISTING ENDS--->

            

            

			<!----CREATION FORM STARTS---->

			<div class="tab-pane box" id="add" style="padding: 5px">

                <div class="box-content">

                    <form action="" method="post" accept-charset="utf-8" class="form-horizontal validatable">
					
                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label">Laboratorist's Name</label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="name"/>

                                </div>

                            </div>
							
													
							<div class="control-group">

                                <label class="control-label">Email Address</label>

                                <div class="controls">

                                    <input type="email" class="validate[required]" name="email"/>

                                </div>

                            </div>
							
													
							<div class="control-group">

                                <label class="control-label">Phone Number</label>

                                <div class="controls">

                                    <input type="phone" class="validate[required]" name="phone"/>

                                </div>

                            </div>
							
							<div class="control-group">

                                <label class="control-label">Sex</label>

                                <div class="controls">

                                    <select name="sex" class="uniform" style="width:100%;">

                                    	<option value="Male">Male</option>

                                    	<option value="Female">Female</option>

                                    </select>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Residential Address</label>

                                <div class="controls">

                                    <div class="box closable-chat-box">

                                        <div class="box-content padded">

                                                <div class="chat-message-box">

                                                <textarea name="address" id="ttt" rows="5" placeholder="Add Description"></textarea>

                                                </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
						</div>

                        <div class="form-actions">

                            <button name="submit" type="submit" class="btn btn-blue">Add Laboratorist</button>

                        </div>

                    </form>                

                </div>                

			</div>

			<!----CREATION FORM ENDS--->

            

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