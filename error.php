<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html>

    <head>
		<title>HEMKO HOSPITAL | Error</title>
		
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		
		<meta http-equiv="refresh" content="10;url=index.php" />
		
        <link rel="stylesheet" href="css/font.css">

		<link href="css/bayanno.css" media="screen" rel="stylesheet" type="text/css" />

        <script src="js/bayanno.js" type="text/javascript"></script>
		
		<script type="text/javascript">

window.onload = function(){

(function(){
  var counter = 10;

  setInterval(function() {
    counter--;
    if (counter >= 0) {
      span = document.getElementById("count");
      span.innerHTML = counter;
    }
    // Display 'counter' wherever you want to display it.
    if (counter === 0) {
        clearInterval(counter);
    }

  }, 1000);

})();

}

</script>
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

                        Error! This is a Secure Page?

                    </div>

                    <div class="message-big">

                        503

                    </div>

                    <div class="message-small">

                        You must log in to access this page

                    </div>

                    <div style="margin-top: 50px">
                        <a class="btn btn-blue" style="font-size:16px">
                        Redirecting you to log in page in <span id="count">10</span> seconds...</a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</html>