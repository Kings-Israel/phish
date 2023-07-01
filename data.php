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
  <?php
  $user_data = json_decode(file_get_contents('user_data.json'), true);
  $user_details = json_decode(file_get_contents('user_details.json'), true);

  // print_r($user_data);
  // foreach ($user_data as $key => $data) {
  //   print_r($data['Browser']);
  // }
  ?>
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>	
	
	<!-- Primary Page Layout
	================================================== -->
		<div id="contact">
			<div class="container">
				<div class="sixteen columns"> 
					<h1>Collected Data</h1>
				</div>
			</div>
			<div class="contact-grid">
				<div class="container">
					<div class="eight columns">
            <div class="contact-det">
              <div class="container">
                <div class="six columns">
                  <h4 style="text-align: left">Browser</h4>
                </div>
                <div class="four columns">
                  <h4 style="text-align: left">IP Address</h4>
                </div>
                <div class="six columns">
                  <h4 style="text-align: left">Operating System</h4>
                </div>
                <?php foreach ($user_data as $data) { ?>
                  <p class="six columns" style="margin-left: 10px;"><?php echo $data['Browser'] ?></p>
                  <p class="four columns" style="margin-left: 10px;"><?php echo $data['IP Address'] ?></p>
                  <p class="six columns" style="margin-left: 10px;"><?php echo $data['Operating System'] ?></p>
                <?php } ?>
              </div>
						</div>
					</div>
				</div>
			</div>
		</div>
    <div class="contact-grid">
      <div class="container">
        <div class="eight columns">
          <div class="eight columns"> 
            <div class="contact-det"> 
              <div class="container">
                <div class="eight columns">
                  <h4 style="text-align: left">Name</h4>
                </div>
                <div class="eight columns">
                  <h4 style="text-align: left">Phone Number</h4>
                </div>
                <?php foreach ($user_details as $data) { ?>
                  <p class="eight columns" style="margin-left: 10px;"><?php echo $data['Name'] ?></p>
                  <p class="eight columns" style="margin-left: 10px;"><?php echo $data['Phone Number'] ?></p>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

		<div id="footer">
			<div class="container">
				<div class="sixteen columns">
					<div class="social-footer">
						<ul class="footer-social">
							<li class="icon-footer"><a href="#">&#xf099;</a></li>
							<li class="icon-footer"><a href="#">&#xf09a;</a></li>
							<li class="icon-footer"><a href="#">&#xf09b;</a></li>
							<li class="icon-footer"><a href="#">&#xf0d5;</a></li>
						</ul>	
					</div>
					<p>© 2014 All rights reserved.</p> 
				</div>
			</div>
		</div>
	
	<!-- JAVASCRIPT
    ================================================== -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/mb.bgndGallery.js"></script>
<script type="text/javascript" src="js/contact.js"></script>
<script type="text/javascript" src="js/template.js"></script>	  
<!-- End Document
================================================== -->
</body>
</html>