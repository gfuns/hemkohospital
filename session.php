<html>
<head>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<style type="text/css">
.searcherror{
color: #FF0000;
	font-weight: bold;
	font-size:18px;
}
</style>
</head>
<body>
<div class="container">
<?php
error_reporting();
if (empty($_SESSION['user'])) {?>
<?php echo "<meta http-equiv=\"refresh\" content=\"0;URL=../error.php\">";
exit;
}
$user =  $_SESSION['user'];
if (!$user) { ?>
<?php echo "<meta http-equiv=\"refresh\" content=\"0;URL=../error.php\">";
exit;
}
?>
</div>
</body>
</html>