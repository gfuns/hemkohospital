<?php
if (empty($session)) { session_start(); }
include('../config.php');
$isClicked = false;
$loggedInUser = $_SESSION["user"];
$activeUser = mysql_fetch_array(mysql_query("select * from users where(email = '$loggedInUser')"));
$activeNurse = mysql_fetch_array(mysql_query("select * from staff where(email = '$loggedInUser')"));
$role = $activeUser['role'];
$id=$_GET['id'];
if(!empty($id)){
$fetch = mysql_fetch_array(mysql_query("select * from bedallotment where(allotid = '$id')"));
}
if(array_key_exists("submit", $_POST)){
$healthstatus = $_POST['healthstatus'];
$comment = $_POST['comment'];
$checked = $_POST['checked'];
if(!empty($checked)){
$datedischarged = $_POST['datedischarged'];
$status = "Discharged";
}else{
$datedischarged = "N/A";
$status = "Admitted";	
}
$query = mysql_query("update bedallotment set healthstatus = '$healthstatus', datedischarged = '$datedischarged', status = '$status', comment = '$comment' where allotid = '$id'");
$isClicked = true;
if($query==1){	
$class = "alert alert-success";
$msg = "Allocation Information Edited Successfully";
}else{
$class = "alert alert-danger";
$msg = "Error! Unable To Eedit Allocation Information";	
}	
}
$doctor = mysql_query("select * from staff where designation = 'doctor'");
$nurse = mysql_query("select * from staff where designation = 'nurse'");
$patient = mysql_query("select * from patients");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html>

    <head>
<title>HEMKO HOSPITAL | EDIT BED ALLOTMENT</title>
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
<?php if($role=="nurse"){ ?>
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

        

        <!------patient----->

		<li class="">

			<span class="glow"></span>

				<a href="manage_patient.php" >

					<i class="icon-user icon-2x"></i>

					<span>patient</span>

				</a>

		</li>

        

        

        <!------bed/ward------>

		<li class="dark-nav active">

			<span class="glow"></span>

            <a class="accordion-toggle  " data-toggle="collapse" href="#bed_submenu" >

                <i class="icon-hdd icon-2x"></i>

                <span>bed ward<i class="icon-caret-down"></i></span>

            </a>

            

            <ul id="bed_submenu" class="collapse in">

                <li class="">

                  <a href="manage_bed.php">

                      <i class="icon-hdd"></i> manage bed
                  </a>

                </li>

                <li class="active">

                  <a href="manage_bed_allotment.php">

                      <i class="icon-wrench"></i> manage bed allotment
                  </a>

                </li>

            </ul>

		</li>

        

        <!------blood bank------>

		<li class="dark-nav ">

			<span class="glow"></span>

            <a class="accordion-toggle  " data-toggle="collapse" href="#blood_submenu" >

                <i class="icon-tint icon-2x"></i>

                <span>blood bank<i class="icon-caret-down"></i></span>

            </a>

            

            <ul id="blood_submenu" class="collapse ">

                <li class="">

                  <a href="manage_blood_bank.php">

                      <i class="icon-tint"></i> manage blood bank
                  </a>

                </li>

                <li class="">

                  <a href="manage_blood_donor.php">

                      <i class="icon-user"></i> manage blood donor
                  </a>

                </li>

            </ul>

		</li>

		<!-------report-------->

		<li class="">

			<span class="glow"></span>

				<a href="manage_report.php" >

					<i class="icon-hospital icon-2x"></i>

					<span>report</span>

				</a>

		</li>

<!------manage own profile--->

		<li class="">

			<span class="glow"></span>

				<a href="nurse_profile.php" >

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

                        Manage Bed Allotment </h3>

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

            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 

					edit bed allocation
                    	</a></li>

         </ul>

    	<!------CONTROL TABS END------->

        

	</div>

	<div class="box-content padded">

		<div class="tab-content">

        	<!----EDITING FORM STARTS---->

        	
			<div class="tab-pane box active" id="edit" style="padding: 5px">

                <div class="box-content">

                	<form action="" method="post" accept-charset="utf-8" class="form-horizontal validatable">
                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label">Patient</label>

                                <div class="controls">
									<?php 
									$idPat = $fetch['patientid']; 
									$pat = mysql_fetch_array(mysql_query("select * from patients where patientid = '$idPat'"));
									?>
                                    <input type="text" class="" name="patient" value="<?php echo $pat['fullname'];?>" readonly="readonly"/>									

                                </div>

                            </div>
							
							<div class="control-group">

                                <label class="control-label">Ward Admitted Into</label>

                                <div class="controls">
									<?php 
									$idWard = $fetch['ward']; 
									$ward = mysql_fetch_array(mysql_query("select * from department where deptid = '$idWard'"));
									?>
                                    <input type="text" class="" name="ward" value="<?php echo $ward['name'];?>" readonly="readonly"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Allocated Bed</label>

                                <div class="controls">

                                    <input type="text" class="" name="bedno" value="<?php echo $fetch['bedno'];?>" readonly="readonly"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Date Admitted</label>

                                <div class="controls">
<?php
$day_temp = $fetch['dateadmitted'];
$arr = explode("/", $day_temp, 3);
$day = $arr[1];
switch ($day) { 
case 01:  $newday = $day."st"; break; case 02:  $newday = $day."nd"; break; case 03:  $newday = $day."rd"; break; case 21:  $newday = $day."st"; break; 
case 22:  $newday = $day."nd"; break; case 23:  $newday = $day."rd"; break; case 31:  $newday = $day."st"; break; default:  $newday = $day."th"; break;
         }
$yr = $arr[2];
$month = $arr[0];
switch($month){
case 01: $newmonth = "Jan"; break; case 02: $newmonth = "Feb"; break; case 03: $newmonth = "Mar"; break; case 04: $newmonth = "Apr"; break; 
case 05: $newmonth = "May"; break; case 06: $newmonth = "Jun"; break; case 07: $newmonth = "Jul"; break; case 08: $newmonth = "Aug"; break; 
case 09: $newmonth = "Sep"; break; case 10: $newmonth = "Oct"; break; case 11: $newmonth = "Nov"; break; case 12: $newmonth = "Dec"; break; 
default: $newmonth = ""; break;
}	
?>
                                    <input type="text" class="" name="bedno" value="<?php echo $newday." ".$newmonth.", ".$yr;?>" readonly="readonly"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Health Status</label>

                                <div class="controls">

                                    <select class="uniform" name="healthstatus">
									
											<option value="<?php echo $fetch['healthstatus'];?>"><?php echo $fetch['healthstatus'];?></option>
											<?php if($fetch['healthstatus'] == "Critical"){}else{?>
											<option value="Critical">Critical</option>
											<?php } 
											   if($fetch['healthstatus'] == "Severe"){}else{
											?>	
                                          	<option value="Severe">Severe</option>
											<?php } 
											   if($fetch['healthstatus'] == "Moderate"){}else{
											?>
											<option value="Moderate">Moderate</option>
											   <?php } ?>
									</select>

                                </div>

                            </div>
							
							<div class="control-group">

                                <label class="control-label">Comment</label>

                                <div class="controls">

                                    <div class="box closable-chat-box">

                                        <div class="box-content padded">

                                                <div class="chat-message-box">

                                                <textarea name="comment" id="ttt" rows="5" placeholder="Enter Comment"><?php echo $fetch['comment'];?></textarea>

                                                </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
							
							<div class="control-group">

                                <label class="control-label">&nbsp;</label>

                                <div class="controls">

                                    <input type="checkbox" class="" name="checked" value="selected"/> <span style="font-size:13px;">This Patient Has Fully Recovered and has been discharged.</span>

                                </div>

                            </div>
							
							<div class="control-group">

                                <label class="control-label">Date Discharged</label>

                                <div class="controls">

                                    <input type="text" class="datepicker fill-up" name="datedischarged"/>

                                </div>

                            </div>

                        </div>

                        <div class="form-actions">

                            <button type="submit" name="submit" class="btn btn-blue">Edit Allocation Information</button>

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