<?php
if (empty($session)) { session_start(); }
include('../config.php');
$loggedInUser = $_SESSION["user"];
$activeUser = mysql_fetch_array(mysql_query("select * from users where(email = '$loggedInUser')"));
$role = $activeUser['role'];
$doctor = mysql_query("select * from staff where designation = 'doctor'");
$nurse = mysql_query("select * from staff where designation = 'nurse'");
$patient = mysql_query("select * from patients");
$id=$_GET['id'];
if(!empty($id)){
$view = mysql_fetch_array(mysql_query("select * from medicine where(medid = '$id')"));
}
if(array_key_exists("submit", $_POST)){
$description = $_POST['description'];
$price = $_POST['price'];
$manufcompany = $_POST['manufcompany'];
$qty = $_POST['qty'];
$quantity = $_POST['quantity'];
$newQty = $qty + $quantity;
$query = mysql_query("update medicine set description = '$description', price = '$price', manufcompany = '$manufcompany', quantity = '$newQty' where medid = '$id'");
$isClicked = true;
if($query==1){	
$class = "alert alert-success";
$msg = "Medicine Information Edited Successfully";
}else{
$class = "alert alert-danger";
$msg = "Error! Unable To Edit Medicine Information)";	
}	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html>

    <head>

		<title>HEMKO HOSPITAL | EDIT MEDICINE</title>
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

		<li class="dark-nav active">

			<span class="glow"></span>

				<a href="manage_medicine.php" >

					<i class="icon-medkit icon-2x"></i>

					<span>manage medicine</span>

				</a>

		</li>

        

        <!------prescription----->

		<li class="">

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

                        Edit Medicine </h3>

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

					edit medicine
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

                                <label class="control-label">Medicine Name</label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="medname" value="<?php echo $view['name'];?>" readonly="readonly"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Medicine Category</label>

                                <div class="controls">
						<?php
						$idCat = $view['category'];
						$medCat = mysql_fetch_array(mysql_query("select * from medcat where id = '$idCat'"));	
						?>
                                    <input type="text" class="validate[required]" name="category" value="<?php echo $medCat['category'];?>" readonly="readonly"/>										

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Description</label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="description" value="<?php echo $view['description'];?>"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Price Per Card (&#8358;)</label>

                                <div class="controls">

                                    <input type="text" class="" name="price" value="<?php echo $view['price'];?>"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label">Manufacturing Company</label>

                                <div class="controls">

                                    <input type="text" class="" name="manufcompany" value="<?php echo $view['manufcompany'];?>"/>

                                </div>

                            </div>
							
							<div class="control-group">

                                <label class="control-label">Quantity In Stock</label>

                                <div class="controls">

                                    <input type="text" class="" name="qty" value="<?php echo $view['quantity'];?>" readonly="readonly"/>

                                </div>

                            </div>
							
							<div class="control-group">

                                <label class="control-label">Quantity To Be Added/Removed</label>

                                <div class="controls">

                                    <input type="number" class="" name="quantity"/>

                                </div>

                            </div>
                            
                        </div>

                        <div class="form-actions">

                            <button type="submit" name="submit" class="btn btn-blue">Edit Medicine</button>

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