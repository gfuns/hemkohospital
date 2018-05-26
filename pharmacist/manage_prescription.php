<?php
if (empty($session)) { session_start(); }
include('../config.php');
$loggedInUser = $_SESSION["user"];
$activeUser = mysql_fetch_array(mysql_query("select * from users where(email = '$loggedInUser')"));
$role = $activeUser['role'];
$doctor = mysql_query("select * from staff where designation = 'doctor'");
$nurse = mysql_query("select * from staff where designation = 'nurse'");
$patient = mysql_query("select * from patients");
if(array_key_exists("submit", $_POST)){
$rowsql=mysql_query("select MAX(medid) as max from `medicine`;");
$row =mysql_fetch_array($rowsql);
$medid = $row['max']+1;
$medname = $_POST['medname'];	
$category = $_POST['category'];
$description = $_POST['description'];
$price = $_POST['price'];
$manufcompany = $_POST['manufcompany'];
$quantity = $_POST['quantity'];
$query = mysql_query("insert into medicine(medid, name, category, description, price, manufcompany, quantity)values('$medid', '$medname', '$category', '$description', '$price', '$manufcompany', '$quantity')");
$isClicked = true;
if($query==1){	
$class = "alert alert-success";
$msg = "Medicine Added Successfully";
}else{
$class = "alert alert-danger";
$msg = "Error! Unable To Add Medicine";	
}	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html>

    <head>

		<title>HEMKO HOSPITAL | MANAGE PRESCRIPTION</title>
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
<?php if($role=="pharmacist"){ ?>
    <div class="navbar navbar-top navbar-inverse">

	<div class="navbar-inner">

		<div class="container-fluid">

			<a class="brand" href="">HEMKO HOSPITAL, MAKURDI</a>

			<!-- the new toggle buttons -->

			<ul class="nav pull-right">

				<li class="toggle-primary-sidebar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-primary">
				<button type="button" class="btn btn-navbar"><i class="icon-th-list"></i></button></li>

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

        

        <!------medicine category----->

		<li class="">

			<span class="glow"></span>

				<a href="manage_medicine_category.php" >

					<i class="icon-edit icon-2x"></i>

					<span>medicine category</span>

				</a>

		</li>

        

        <!------manage medicine----->

		<li class="">

			<span class="glow"></span>

				<a href="manage_medicine.php" >

					<i class="icon-medkit icon-2x"></i>

					<span>manage medicine</span>

				</a>

		</li>

        

        <!------prescription----->

		<li class="dark-nav active">

			<span class="glow"></span>

				<a href="manage_prescription.php" >

					<i class="icon-stethoscope icon-2x"></i>

					<span>provide medication</span>

				</a>

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

                        Manage Prescription </h3>

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

					prescription list
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

                    		<th><div>date</div></th>

                    		<th><div>patient</div></th>

                    		<th><div>doctor</div></th>

                    		<th><div>options</div></th>

						</tr>

					</thead>

                    <tbody>

                    	<?php 
	$sno = 1;
	$query = mysql_query("select * from casehistory where status = '0' ORDER BY `caseid` DESC");
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

                            	<a href="edit_prescription.php?id=<?php echo $view['caseid']?>"

                                	rel="tooltip" data-placement="top" data-original-title="edit" class="btn btn-blue">

                                		<i class="icon-wrench"></i>

                                </a>
                            	
        					</td>

                        </tr>

						<?php } ?>
                    </tbody>

                </table>

			</div>

            <!----TABLE LISTING ENDS--->

            

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