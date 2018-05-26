<?php
if (empty($session)) { session_start(); }
include('config.php');
$loggedInUser = $_SESSION["user"];
$activeUser = mysql_fetch_array(mysql_query("select * from users where(email = '$loggedInUser')"));
$role = $activeUser['role'];
if($role=="laboratorist"){
$href = "http://localhost/abchospital/lab/dashboard.php";
}else if($role=="doctor"){
$href = "http://localhost/abchospital/doctor/dashboard.php";
}else if($role=="nurse"){
$href = "http://localhost/abchospital/nurse/dashboard.php";
}else if($role=="pharmacist"){
$href = "http://localhost/abchospital/pharmacist/dashboard.php";
}else if($role=="accountant"){
$href = "http://localhost/abchospital/accountant/dashboard.php";
}else if($role=="admin"){
$href = "http://localhost/abchospital/admin/dashboard.php";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html>

    <head>
		<title>HEMKO HOSPITAL | Page not found</title>
		
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

        <link rel="stylesheet" href="css/font.css">

		<link href="css/bayanno.css" media="screen" rel="stylesheet" type="text/css" />

        <script src="js/bayanno.js" type="text/javascript"></script>
</head>

<body>

    <div class="navbar navbar-top navbar-inverse">

        <div class="navbar-inner">

            <div class="container-fluid">

                <a class="brand" href="">HEMKO HOSPITAL, MAKURDI</a>

            </div>

        </div>

    </div>

    <div class="container">

        <div class="row-fluid">

            <div class="span8 offset2">

                <div class="error-box">

                    <div class="message-small">

                        Whoa! What are you doing here?

                    </div>

                    <div class="message-big">

                        404

                    </div>

                    <div class="message-small">

                        You are not where you're supposed to be

                    </div>

                    <div style="margin-top: 50px">

                        <a class="btn btn-blue" href="<?php echo $href;?>">

                        <i class="icon-arrow-left"></i> Back to dashboard </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</html>