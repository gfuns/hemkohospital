<?php
if (empty($session)) { session_start(); }
include('../config.php');
$isClicked = false;
$loggedInUser = $_SESSION["user"];
$activeUser = mysql_fetch_array(mysql_query("select * from users where(email = '$loggedInUser')"));
$activeNurse = mysql_fetch_array(mysql_query("select * from staff where(email = '$loggedInUser')"));
$role = $activeUser['role'];
if(array_key_exists("submit", $_POST)){
$deptid = $_POST['department'];
$bedtype = $_POST['bedtype'];	
$quantity = $_POST['quantity'];
$query = mysql_query("insert into beds(deptid, bedtype, quantity)values('$deptid', '$bedtype', '$quantity')");
$isClicked = true;
if($query==1){	
$class = "alert alert-success";
$msg = "Bed(s) Added Successfully";
}else{
$class = "alert alert-danger";
$msg = "Error! Unable To Add Bed(s)";	
}	
}
$doctor = mysql_query("select * from staff where designation = 'doctor'");
$nurse = mysql_query("select * from staff where designation = 'nurse'");
$patient = mysql_query("select * from patients");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html>

    <head>
<title>HEMKO HOSPITAL | MANAGE BED</title>
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

                <li class="active">

                  <a href="manage_bed.php">

                      <i class="icon-hdd"></i> manage bed
                  </a>

                </li>

                <li class="">

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

                        Manage Bed </h3>

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

					bed list
                    	</a></li>

			<li>

            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>

					add bed
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

                    		<th><div>allocated department</div></th>

                    		<th><div>type of bed</div></th>
							
							<th><div>quantity allocated</div></th>
							
							<th><div>quantity occupied</div></th>
							
							<th><div>quantity free</div></th>

                    		<th><div>options</div></th>

						</tr>

					</thead>

                    <tbody>
<?php 
	$sno = 1;
	$query = mysql_query("select * from beds");
	while($view = mysql_fetch_array($query)){
	$idDept = $view['deptid'];	
	$findDept = mysql_fetch_array(mysql_query("select * from department where deptid='$idDept'"));
		?>
                    	
                        <tr>

                            <td><?php echo $sno++;?></td>

							<td><?php echo $findDept['name'];?></td>
							
							<td><?php echo $view['bedtype'];?></td>

							<td><?php echo $view['quantity'];?></td>
							<?php
							$findQty = mysql_num_rows(mysql_query("select * from bedallotment where ward = '$idDept' and status = 'Admitted'"));
							?>
							<td><?php echo $findQty;?></td>
							
							<td><?php echo ($view['quantity'] - $findQty)?></td>

							<td align="center">

                            	<a href="edit_bed.php?id=<?php echo $view['deptid'];?>"

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

            

            

			<!----CREATION FORM STARTS---->

			<div class="tab-pane box" id="add" style="padding: 5px">

                <div class="box-content">

                    <form action="" method="post" accept-charset="utf-8" class="form-horizontal validatable">
                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label">Allocated Department</label>

                                <div class="controls">

                                    <select name="department" class="uniform" style="width:100%;">
									<?php 
									$query = mysql_query("select * from department");
									while($view = mysql_fetch_array($query)){?>
                                    	<option value="<?php echo $view['deptid']; ?>"><?php echo $view['name']; ?></option>                                    	
									<?php } ?>
                                    </select>

                                </div>

                            </div>
							
							<div class="control-group">

                                <label class="control-label">Type Of Bed</label>

                                <div class="controls">

                                    <select name="bedtype" class="uniform" style="width:100%;">
									<option value="ICU">ICU</option>
									<option value="Ward Bed">Ward Bed</option>									
									</select>

                                </div>

                            </div>
							
							<div class="control-group">

                                <label class="control-label">New Quantity Added</label>

                                <div class="controls">

                                    <input type="number" class="" name="quantity" placeholder="0"/>

                                </div>

                            </div>

                        </div>

                        <div class="form-actions">

                            <button type="submit" name="submit" class="btn btn-blue">Add Bed</button>

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