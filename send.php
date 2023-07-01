<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]>
<!--><html class="no-js" lang="en"><!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>KPF.ai</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="css/base.css"/>
	<link rel="stylesheet" href="css/skeleton.css"/>
	<link rel="stylesheet" href="css/layout.css"/>
	<link rel="stylesheet" href="css/font-awesome.css" />
	
    <!--[if lte IE 8]>
        <script src="js/html5.js"></script>
    <![endif]-->		
		
	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.png">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="./apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="./apple-touch-icon-114x114.png">
</head>
<body>
  <div id="contact">
    <div class="container">
      <div class="sixteen columns"> 
        <h1>Send Email</h1>
      </div>
      <div class="sixteen columns"> 
        <div class="sep"></div> 
      </div>
    </div>
    <div class="contact-grid">
      <div class="container">
        <div class="ten columns">
          <form name="ajax-form" id="ajax-form" action="mail-it.php" method="post">
            <label for="email">E-Mail: * 
              <span class="error" id="err-email">please enter e-mail</span>
              <span class="error" id="err-emailvld">e-mail is not a valid format</span>
            </label>
            <input name="email" id="email" type="text" />
            <div id="button-con"><button class="send_message" id="send">Send</button></div>	
            <div class="error text-align-center" id="err-form">There was a problem validating the form please check!</div>
            <div class="error text-align-center" id="err-timedout">The connection to the server timed out!</div>
            <div class="error" id="err-state"></div>
          </form>
          <div id="ajaxsuccess">Successfully sent!!</div>	 
        </div>
      </div>
    </div>
  </div>
  <!-- JAVASCRIPT ================================================== -->
  <script type="text/javascript" src="js/contact.js"></script>
  <script type="text/javascript" src="js/template.js"></script>	  
<!-- End Document
================================================== -->
</body>
</html>