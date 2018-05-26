<?php
if (empty($session)) { session_start(); }
include('../config.php');
$isClicked = false;
$loggedInUser = $_SESSION["user"];
$activeUser = mysql_fetch_array(mysql_query("select * from users where(email = '$loggedInUser')"));
$activeAccountant = mysql_fetch_array(mysql_query("select * from staff where(email = '$loggedInUser')"));
$role = $activeUser['role'];
$year = "20".date("y");
$month = date("m");
$day = date("d");
if(array_key_exists("submit", $_POST)){
$rowsql=mysql_query("select MAX(id) as max from `invoice`;");
$row =mysql_fetch_array($rowsql);
$invoiceid = $row['max']+1; 
$title = $_POST['title'];
$description = $_POST['description'];
$patient = $_POST['patient'];
$amount = $_POST['amount'];
$invoicedate = $month."/".$day."/".$year;
$status = $_POST['status'];
$accountant = $activeAccountant['staffid'];
$query = mysql_query("insert into invoice(id, title, description, patient, amount, invoicedate, status, accountant)values('$invoiceid', '$title', '$description', '$patient', '$amount', '$invoicedate', '$status', '$accountant')");
$isClicked = true;
if($query==1){	
$class = "alert alert-success";
$msg = "Invoice Recorded Successfully";
}else{
$class = "alert alert-danger";
$msg = "Error! Unable To Record Invoice";	
}	
}
if(array_key_exists("takecash", $_POST)){
$idinvoice = $_POST['idinvoice'];
$qwery = mysql_query("update invoice set status = 'paid' where id = '$idinvoice'");
$isClicked = true;
if($qwery==1){	
$class = "alert alert-success";
$msg = "Cash Payment Taken and Recorded Successfully";
}else{
$class = "alert alert-danger";
$msg = "Error! Unable To Take and Record Cash Payment";	
}	
}

$doctor = mysql_query("select * from staff where designation = 'doctor'");
$nurse = mysql_query("select * from staff where designation = 'nurse'");
$patient = mysql_query("select * from patients");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html>

    <head>
<title>HEMKO HOSPITAL | MANAGE INVOIVCE</title>
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
<?php if($role=="accountant"){ ?>
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

        

        <!------manage invoice ----->

		<li class="dark-nav active">

			<span class="glow"></span>

				<a href="manage_invoice.php" >

					<i class="icon-list-alt icon-2x"></i>

					<span>invoice / take payment</span>

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

                        Manage Invoice </h3>

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

					invoice list
                    	</a></li>

			<li>

            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>

					add invoice
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

                    		<th><div>title</div></th>
							
							<th><div>description</div></th>

                    		<th><div>amount</div></th>

                    		<th><div>patient</div></th>

                    		<th><div>date</div></th>

                    		<th><div>status</div></th>                   		

						</tr>

					</thead>

                    <tbody>
<?php 
	$sno = 1;
	$query = mysql_query("select * from invoice");
	while($view = mysql_fetch_array($query)){
	$idPat= $view['patient'];
	$patName = mysql_fetch_array(mysql_query("select * from patients where patientid = '$idPat'"));
$day_temp = $view['invoicedate'];
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

                            <td class="center"><?php echo $sno++;?></td>

                            <td><?php echo $view['title'];?></td>

                            <td><?php echo $view['description'];?></td>

							<td>&#8358 <?php echo $view['amount'];?></td>
							
							<td><?php echo $patName['fullname'];?></td>

                            <td><?php echo $newday." ".$newmonth.", ".$yr;?></td>

                            <td class="center">			
                            	<?php if($view['status'] == "paid") {?>
                            		<span class="label label-green">paid</span>
								<?php }else if($view['status'] == "unpaid"){?>
								<span class="label label-red">unpaid</span>
								
								<form action="" method="post" accept-charset="utf-8" onsubmit="return confirm('Confirm cash payment ? It will mark this invoice as paid')">

                                        	<input name="idinvoice" type="hidden" value="<?php echo $view['id'];?>" />
											
											<input name="takecash" type="submit" value="take cash payment" class="btn btn-gray btn-mini"/>

                                    </form>
								<?php } ?>
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

                                    <select class="chzn-select" name="patient">
									<?php 
										$query = mysql_query("select * from patients");
										while($view = mysql_fetch_array($query)){
									?>
                                        	<option value="<?php echo $view['patientid'];?>"><?php echo $view['fullname']." (".$view['patientid'].")";?></option>
                                    <?php } ?>                                        
									</select>
									</select>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Title</label>

                                <div class="controls">

                                    <input type="text" name="title" value=""/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Amount (&#8358;)</label>

                                <div class="controls">

                                    <input type="text" name="amount" value=""/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Description</label>

                                <div class="controls">

                                    <div class="box closable-chat-box">

                                        <div class="box-content padded">

                                                <div class="chat-message-box">

                                                <textarea name="description" id="ttt" rows="5" placeholder="add description"></textarea>

                                                </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Status</label>

                                <div class="controls">

                                    <select name="status" class="uniform">

                                       	<option value="unpaid">Unpaid</option>

                                       	<option value="paid">Paid</option>

									</select>

                                </div>

                            </div>

                        </div>

                        <div class="form-actions">

                            <button type="submit" name="submit" class="btn btn-blue">Add Invoice</button>

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