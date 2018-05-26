<?php
if (empty($session)) { session_start(); }
include('../config.php');
$loggedInUser = $_SESSION["user"];
$activeUser = mysql_fetch_array(mysql_query("select * from users where(email = '$loggedInUser')"));
$activeAdmin = mysql_fetch_array(mysql_query("select * from staff where(email = '$loggedInUser')"));
$role = $activeUser['role'];
$doctor = mysql_query("select * from staff where designation = 'doctor'");
$nurse = mysql_query("select * from staff where designation = 'nurse'");
$patient = mysql_query("select * from patients");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html>

    <head>
	<title>HEMKO HOSPITAL | BACKUP_RESTORE</title>
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

		<link rel="stylesheet" href="../css/font.css">

		<link href="../css/bayanno.css" media="screen" rel="stylesheet" type="text/css" />

        <script src="../js/bayanno.js" type="text/javascript"></script>
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

		<li class="dark-nav active">

			<span class="glow"></span>

            <a class="accordion-toggle  " data-toggle="collapse" href="#settings_submenu" >

                <i class="icon-wrench icon-2x"></i>

                <span>settings<i class="icon-caret-down"></i></span>

            </a>

            

            <ul id="settings_submenu" class="collapse in">

                <li class="">

                  <a href="manage_noticeboard.php">

                      <i class="icon-columns"></i> manage noticeboard
                  </a>

                </li>

                <li class="active">

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

                        Backup Restore </h3>

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

        

        

        
        <div class="container-fluid padded">

            <div class="box">

	<div class="box-header">

    

    	<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">

			<li class="active">

            	<a href="#backup" data-toggle="tab"><i class="icon-align-justify"></i> 

					backup
                    	</a></li>

			<li class="">

            	<a href="#restore" data-toggle="tab"><i class="icon-align-justify"></i> 

					restore
                    	</a></li>

		</ul>

    	<!------CONTROL TABS END------->

        

	</div>

	<div class="box-content padded">

		<div class="tab-content">            

            <!----TABLE LISTING STARTS--->

            <div class="tab-pane box active span7" id="backup">

				<center>

                <table cellpadding="0" cellspacing="0" border="0" class="table table-normal" >

                    <tbody>

                    	
							<tr>

								<td>doctor</td>

								<td align="center">

									<a href="http://localhost/hms/index.php?admin/backup_restore/create/doctor" 

										class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>

											</a>

									<a href="http://localhost/hms/index.php?admin/backup_restore/delete/doctor" 

										class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm('delete confirm?');"><i class="icon-trash"></i>

											</a>

								</td>

							</tr>

							
							<tr>

								<td>patient</td>

								<td align="center">

									<a href="http://localhost/hms/index.php?admin/backup_restore/create/patient" 

										class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>

											</a>

									<a href="http://localhost/hms/index.php?admin/backup_restore/delete/patient" 

										class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm('delete confirm?');"><i class="icon-trash"></i>

											</a>

								</td>

							</tr>

							
							<tr>

								<td>nurse</td>

								<td align="center">

									<a href="http://localhost/hms/index.php?admin/backup_restore/create/nurse" 

										class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>

											</a>

									<a href="http://localhost/hms/index.php?admin/backup_restore/delete/nurse" 

										class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm('delete confirm?');"><i class="icon-trash"></i>

											</a>

								</td>

							</tr>

							
							<tr>

								<td>pharmacist</td>

								<td align="center">

									<a href="http://localhost/hms/index.php?admin/backup_restore/create/pharmacist" 

										class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>

											</a>

									<a href="http://localhost/hms/index.php?admin/backup_restore/delete/pharmacist" 

										class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm('delete confirm?');"><i class="icon-trash"></i>

											</a>

								</td>

							</tr>

							
							<tr>

								<td>laboratorist,eo</td>

								<td align="center">

									<a href="http://localhost/hms/index.php?admin/backup_restore/create/laboratorist" 

										class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>

											</a>

									<a href="http://localhost/hms/index.php?admin/backup_restore/delete/laboratorist" 

										class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm('delete confirm?');"><i class="icon-trash"></i>

											</a>

								</td>

							</tr>

							
							<tr>

								<td>accountant</td>

								<td align="center">

									<a href="http://localhost/hms/index.php?admin/backup_restore/create/accountant" 

										class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>

											</a>

									<a href="http://localhost/hms/index.php?admin/backup_restore/delete/accountant" 

										class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm('delete confirm?');"><i class="icon-trash"></i>

											</a>

								</td>

							</tr>

							
							<tr>

								<td>appointment</td>

								<td align="center">

									<a href="http://localhost/hms/index.php?admin/backup_restore/create/appointment" 

										class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>

											</a>

									<a href="http://localhost/hms/index.php?admin/backup_restore/delete/appointment" 

										class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm('delete confirm?');"><i class="icon-trash"></i>

											</a>

								</td>

							</tr>

							
							<tr>

								<td>payment</td>

								<td align="center">

									<a href="http://localhost/hms/index.php?admin/backup_restore/create/payment" 

										class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>

											</a>

									<a href="http://localhost/hms/index.php?admin/backup_restore/delete/payment" 

										class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm('delete confirm?');"><i class="icon-trash"></i>

											</a>

								</td>

							</tr>

							
							<tr>

								<td>blood bank</td>

								<td align="center">

									<a href="http://localhost/hms/index.php?admin/backup_restore/create/blood_bank" 

										class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>

											</a>

									<a href="http://localhost/hms/index.php?admin/backup_restore/delete/blood_bank" 

										class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm('delete confirm?');"><i class="icon-trash"></i>

											</a>

								</td>

							</tr>

							
							<tr>

								<td>medicine</td>

								<td align="center">

									<a href="http://localhost/hms/index.php?admin/backup_restore/create/medicine" 

										class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>

											</a>

									<a href="http://localhost/hms/index.php?admin/backup_restore/delete/medicine" 

										class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm('delete confirm?');"><i class="icon-trash"></i>

											</a>

								</td>

							</tr>

							
							<tr>

								<td>report</td>

								<td align="center">

									<a href="http://localhost/hms/index.php?admin/backup_restore/create/report" 

										class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>

											</a>

									<a href="http://localhost/hms/index.php?admin/backup_restore/delete/report" 

										class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm('delete confirm?');"><i class="icon-trash"></i>

											</a>

								</td>

							</tr>

							
							<tr>

								<td>noticeboard</td>

								<td align="center">

									<a href="http://localhost/hms/index.php?admin/backup_restore/create/noticeboard" 

										class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>

											</a>

									<a href="http://localhost/hms/index.php?admin/backup_restore/delete/noticeboard" 

										class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm('delete confirm?');"><i class="icon-trash"></i>

											</a>

								</td>

							</tr>

							
							<tr>

								<td>language</td>

								<td align="center">

									<a href="http://localhost/hms/index.php?admin/backup_restore/create/language" 

										class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>

											</a>

									<a href="http://localhost/hms/index.php?admin/backup_restore/delete/language" 

										class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm('delete confirm?');"><i class="icon-trash"></i>

											</a>

								</td>

							</tr>

							
							<tr>

								<td>all</td>

								<td align="center">

									<a href="http://localhost/hms/index.php?admin/backup_restore/create/all" 

										class="btn btn-default" rel="tooltip" data-original-title="download backup"><i class="icon-download-alt" ></i>

											</a>

									<a href="http://localhost/hms/index.php?admin/backup_restore/delete/all" 

										class="btn btn-default" rel="tooltip" data-original-title="delete data" onclick="return confirm('delete confirm?');"><i class="icon-trash"></i>

											</a>

								</td>

							</tr>

							
                    </tbody>

                </table>

                </center>

			</div>

            <!----TABLE LISTING ENDS--->

            

            <!----RESTORE--->

            <div class="tab-pane box  span6" id="restore">



                <form action="http://localhost/hms/index.php?/admin/backup_restore/restore" method="post" accept-charset="utf-8" enctype="multipart/form-data"><div style="display:none">
<input type="hidden" name="authenticity_token" value="0b85e54e3c62e0be53b07b6148ffcb91" />
</div>
                    <input name="userfile" type="file" />

                    <br /><br />

                    <center><input type="submit" class="btn btn-blue" value="upload & restore from backup" /></center>

                    <br />

                </form>
			</div>

            <!----RESTORE ENDS--->

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