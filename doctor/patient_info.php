<?php
if (empty($session)) { session_start(); }
include('../config.php');
$loggedInUser = $_SESSION["user"];
$activeUser = mysql_fetch_array(mysql_query("select * from users where(email = '$loggedInUser')"));
$activeDoctor = mysql_fetch_array(mysql_query("select * from staff where(email = '$loggedInUser')"));
$role = $activeUser['role'];
$year = "20".date("y");
if(array_key_exists("submit", $_POST)){
$rowsql=mysql_query("select MAX(caseid) as max from `casehistory`;");
$row =mysql_fetch_array($rowsql);
$caseid = $row['max']+1;
$doctor = $activeDoctor['staffid'];
$patient = $_GET['id'];	
$diagnosis = $_POST['diagnosis'];	
$medication = $_POST['medication'];
$medpharm = "Patient did not visit the pharmacy";
$pharmacist = "";	
$comment = "<b>Doctor:</b> ".$_POST['comment'];
$dateofdiag = $_POST['dateofdiag'];
$query = mysql_query("insert into casehistory(caseid, patient, doctor, diagnosis, medication, medpharm, pharmacist, comment, dateofdiag, status)values('$caseid', '$patient', '$doctor', '$diagnosis', '$medication', '$medpharm', '$pharmacist', '$comment', '$dateofdiag', '0')");
$isClicked = true;
if($query==1){	
$class = "alert alert-success";
$msg = "Diagnosis Added Successfully";
}else{
$class = "alert alert-danger";
$msg = "Error! Unable To Add Diagnosis";	
}	
}
$doctor = mysql_query("select * from staff where designation = 'doctor'");
$nurse = mysql_query("select * from staff where designation = 'nurse'");
$patient = mysql_query("select * from patients");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html>

    <head>
<title>HEMKO HOSPITAL | PATIENT</title>
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

		<link rel="stylesheet" href="../css/font.css">

		<link href="../css/bayanno.css" media="screen" rel="stylesheet" type="text/css" />

        <script src="../js/bayanno.js" type="text/javascript"></script>
		
	<!--	<script>
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
</script>
-->

		
</head>
<?php
 include("../session.php");
?>
<body>
<?php if($role=="doctor"){ ?>
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

		<li class="dark-nav active">

			<span class="glow"></span>

				<a href="manage_patient.php" >

					<i class="icon-user icon-2x"></i>

					<span>patient</span>

				</a>

		</li>

        

        <!------appointment----->

		<li class="">

			<span class="glow"></span>

				<a href="manage_appointment.php" >

					<i class="icon-edit icon-2x"></i>

					<span>manage appointment</span>

				</a>

		</li>

        <!------manage own profile--->

		<li class="">

			<span class="glow"></span>

				<a href="manage_profile.php">

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

                        Diagonise Patient </h3>

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

            	<a href="#edit" data-toggle="tab"><i class="icon-search"></i> 

					patient's information
                    	</a></li>

            
			<li class="">

            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

					patient's case history
                    	</a></li>

			<li>

            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>

					add diagnosis
                    	</a></li>

		</ul>

    	<!------CONTROL TABS END------->

        

	</div>

	<div class="box-content padded">

		<div class="tab-content">

        	<!----VIEWING FORM STARTS---->

        	
			<div class="tab-pane box active" id="edit" style="padding: 5px">

                <div class="box-content">

<?php $id=$_GET['id'];
if(!empty($id)){
$query = mysql_fetch_array(mysql_query("select * from patients where(patientid = '$id')"));
}?>
                    <form action="" method="post" accept-charset="utf-8" class="form-horizontal validatable">
                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label">Patient's Name</label>

                                <div class="controls" style="padding-top:7px;">

                                    <?php echo $query['fullname']; ?>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Sex</label>

                                <div class="controls" style="padding-top:6px;">

                                    <?php echo $query['sex']; ?>

                                </div>

                            </div>
							
							<div class="control-group">

                                <label class="control-label">Date Of Birth</label>
<?php 
$day_temp = $query['dob'];
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
                                <div class="controls" style="padding-top:6px;">

                                    <?php echo $newday." ".$newmonth.", ".$yr;?>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Phone Number</label>

                                <div class="controls" style="padding-top:6px;">

                                    <?php echo $query['phone']; ?>

                                </div>

                            </div>
							
							<div class="control-group">

                                <label class="control-label">Residential Address</label>

                                <div class="controls" style="padding-top:6px;">

                                    <?php echo $query['address']; ?>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Contact Person</label>

                                <div class="controls" style="padding-top:6px;">

                                    <?php echo $query['contactperson']; ?>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Contact's Phone Number</label>

                                <div class="controls" style="padding-top:8px;">

                                <?php echo $query['contactphone']; ?>

                                </div>

                            </div>
						</div>                       

                    </form>
                    
                    
                </div>

			</div>

            
            <!----EDITING FORM ENDS--->

            

            <!----TABLE LISTING STARTS--->

            <div class="tab-pane box " id="list">

				

                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">

                	<thead>

                		<tr>

                    		<th><div>#</div></th>

                    		<th><div>date</div></th>

                    		<th><div>patient</div></th>

                    		<th><div>doctor</div></th>

                    		<th><div>options</div></th>

						</tr>

					</thead>

                    <tbody>
                    	<?php 
	$sno = 1;
	$query = mysql_query("select * from casehistory where patient  = '$id' ORDER BY `caseid` DESC");
	while($view = mysql_fetch_array($query)){
		$idPat= $view['patient'];
		$patName = mysql_fetch_array(mysql_query("select * from patients where patientid = '$idPat'"));
		$idDoc = $view['doctor'];
		$docName = mysql_fetch_array(mysql_query("select * from staff where staffid = '$idDoc'"));
$day_temp = $view['dateofdiag'];
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
                        <tr>

                            <td><?php echo $sno++;?></td>

                            <td><?php echo $newday." ".$newmonth.", ".$yr;?></td>

							<td><?php echo $patName['fullname'];?></td>

							<td><?php echo $docName['fullname'];?></td>

							<td align="center">

                            	<a href="case_history.php?id=<?php echo $view['caseid']?>"

                                	rel="tooltip" data-placement="top" data-original-title="edit" class="btn btn-blue">

                                		<i class="icon-search"></i>

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

                                <label class="control-label">Patient</label>

                                <div class="controls">
								<?php $pid=$_GET['id'];
								if(!empty($pid)){
								$qwery = mysql_fetch_array(mysql_query("select * from patients where(patientid = '$pid')"));
								}?>
								<input type="text" name="pat" value="<?php echo $qwery['fullname']; ?>" readonly="readonly"/>                                    
								</div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Diagnosis</label>

                                <div class="controls">

                                    <div class="box closable-chat-box">

                                        <div class="box-content padded">

                                                <div class="chat-message-box">

                                                <textarea name="diagnosis" id="ttt" rows="5" placeholder="add description"></textarea>

                                                </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Medication</label>

                                <div class="controls">

                                    <div class="box closable-chat-box">

                                        <div class="box-content padded">

                                                <div class="chat-message-box">

                                                <textarea name="medication" id="ttt" rows="5" placeholder="add description"></textarea>

                                                </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Comment</label>

                                <div class="controls">

                                    <div class="box closable-chat-box">

                                        <div class="box-content padded">

                                                <div class="chat-message-box">

                                                <textarea name="comment" id="ttt" rows="5" placeholder="add comment"></textarea>

                                                </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Date</label>

                                <div class="controls">

                                    <input type="text" class="datepicker fill-up" name="dateofdiag"/>

                                </div>

                            </div>

                        </div>

                        <div class="form-actions">

                            <button type="submit" name="submit" class="btn btn-blue">Add Diagnosis</button>

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