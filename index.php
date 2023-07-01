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
  $user_agent = $_SERVER['HTTP_USER_AGENT'];

  function getOS() { 

      global $user_agent;

      $os_platform = "Unknown OS Platform";

      $os_array = array(
        '/windows nt 10/i'      =>  'Windows 10',
        '/windows nt 6.3/i'     =>  'Windows 8.1',
        '/windows nt 6.2/i'     =>  'Windows 8',
        '/windows nt 6.1/i'     =>  'Windows 7',
        '/windows nt 6.0/i'     =>  'Windows Vista',
        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
        '/windows nt 5.1/i'     =>  'Windows XP',
        '/windows xp/i'         =>  'Windows XP',
        '/windows nt 5.0/i'     =>  'Windows 2000',
        '/windows me/i'         =>  'Windows ME',
        '/win98/i'              =>  'Windows 98',
        '/win95/i'              =>  'Windows 95',
        '/win16/i'              =>  'Windows 3.11',
        '/macintosh|mac os x/i' =>  'Mac OS X',
        '/mac_powerpc/i'        =>  'Mac OS 9',
        '/linux/i'              =>  'Linux',
        '/ubuntu/i'             =>  'Ubuntu',
        '/iphone/i'             =>  'iPhone',
        '/ipod/i'               =>  'iPod',
        '/ipad/i'               =>  'iPad',
        '/android/i'            =>  'Android',
        '/blackberry/i'         =>  'BlackBerry',
        '/webos/i'              =>  'Mobile'
      );

      foreach ($os_array as $regex => $value)
          if (preg_match($regex, $user_agent))
              $os_platform = $value;

      return $os_platform;
  }

  function getBrowser() {

      global $user_agent;

      $browser = "Unknown Browser";

      $browser_array = array(
        '/msie/i'      => 'Internet Explorer',
        '/firefox/i'   => 'Firefox',
        '/safari/i'    => 'Safari',
        '/chrome/i'    => 'Chrome',
        '/edge/i'      => 'Edge',
        '/opera/i'     => 'Opera',
        '/netscape/i'  => 'Netscape',
        '/maxthon/i'   => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i'    => 'Handheld Browser'
      );

      foreach ($browser_array as $regex => $value)
          if (preg_match($regex, $user_agent))
              $browser = $value;

      return $browser;
  }

  function getIPAddress() {  
      //whether ip is from the share internet  
      if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ip = $_SERVER['HTTP_CLIENT_IP']; 
      }
      //whether ip is from the proxy  
      elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
      }  
      //whether ip is from the remote address  
      else {  
        $ip = $_SERVER['REMOTE_ADDR'];  
      }  
      return $ip;  
  }

  function getIPAddessDetails($ip) {
    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    if (!empty($details->city)) {
      return $details->city;
    } else {
      return 'Not Found';
    }
  }

  function cleanupentries($entry) {
    $entry = trim($entry);
    $entry = stripslashes($entry);
    $entry = htmlspecialchars($entry);
  
    return $entry;
  }

  $user_os = getOS();
  $user_browser = getBrowser();
  $ip = getIPAddress();
  $ip_details = getIPAddessDetails($ip);

  $contents = file_get_contents('user_data.json');
  $contents = json_decode($contents, true);

  $fp = fopen('user_data.json', 'a');

  if ($contents == null || count($contents) <= 0) {
    $device_details = array(
      array(
        "Browser" => $user_browser,
        "Operating System" => $user_os,
        "IP Address" => $ip_details,
      ),
    );
    fwrite($fp, json_encode($device_details, JSON_PRETTY_PRINT));
    fclose($fp);
  } else {
    $device_details = array(
      "Browser" => $user_browser,
      "Operating System" => $user_os,
      "IP Address" => $ip_details,
    );
    array_push($contents, $device_details);
    file_put_contents('user_data.json', json_encode($contents, JSON_PRETTY_PRINT));
  }

  if(isset($_POST["name"]) && isset($_POST["phone_number"]) ) {
    $name = cleanupentries($_POST["name"]);
    $phone_number = cleanupentries($_POST["phone_number"]);

    $contents = file_get_contents('user_details.json');
    $contents = json_decode($contents, true);

    $fp = fopen('user_details.json', 'a');

    if ($contents == null || count($contents) <= 0) {
      $device_details = array(
        array(
          "Name" => $name,
          "Phone Number" => $phone_number,
        ),
      );
      fwrite($fp, json_encode($device_details, JSON_PRETTY_PRINT));
    } else {
      $device_details = array(
        "Name" => $name,
        "Phone Number" => $phone_number,
      );
      array_push($contents, $device_details);
      file_put_contents('user_details.json', json_encode($contents, JSON_PRETTY_PRINT));
    }
    echo '<script>
      document.getElementById("ajaxsuccess").style.display = "block"
    </script>';
  }
  ?>
	<div id="preloader">
		<div id="status">&nbsp;</div>
	</div>	
	
	<!-- Primary Page Layout
	================================================== -->
		<div id="home" class="active"> 
			<div class="social-top">
				<ul class="list-social">
					<li class="icon-soc"><a href="#">&#xf099;</a></li>
					<li class="icon-soc"><a href="#">&#xf09a;</a></li>
					<li class="icon-soc"><a href="#">&#xf09b;</a></li>
					<li class="icon-soc"><a href="#">&#xf0d5;</a></li>
				</ul>	
			</div>		
			<div class="logo"></div>
			<div id="wrapper-slider">
				<div id="controls">
					<div class="prev"></div>
					<div class="next"></div>
				</div>
			</div>
			<div class="home-text">
				<h1>INSPIRED BY TECHNOLOGY</h1>
				<h2>& </h2>
				<h2>BORN INTO CREATIVITY</h2>
		 	</div>
		</div>

		<div id="contact">
			<div class="container">
				<div class="sixteen columns"> 
					<h1>Contact</h1>
				</div>
				<div class="sixteen columns"> 
					<div class="sep"></div> 
				</div>
				<div class="sixteen columns"> 
					<div class="sub-text">
						<p>If you have a project you would like to discuss, get in touch with us.</p>
					</div>
				</div>
			</div>
			<div class="contact-grid">
				<div class="container">
					<div class="ten columns">
						<form name="ajax-form" id="ajax-form" action="" method="post">
							<label for="name">Your Name: * 
								<span class="error" id="err-name">please enter name</span>
							</label>
							<input name="name" id="name" type="text" />
							<label for="email">Phone Number: *</label>
							<input name="phone_number" type="text" />
							<label for="message">Tell Us Everything:</label>
							<textarea name="message" id="message"></textarea>
							<div id="button-con"><button class="send_message" id="send">Submit</button></div>	
							<div class="error text-align-center" id="err-form">There was a problem validating the form please check!</div>
							<div class="error" id="err-state"></div>
						</form>
						<div id="ajaxsuccess">Successfully sent!!</div>	 
					</div>
					<div class="six columns"> 
						<div class="contact-det"> 
							<h6>LOCATION</h6>
							<p>36000 Kraljevo</p> 
							<p>Nikole Tesle 41</p> 
							<p>Serbia</p> 
						</div>
						<div class="contact-det padding-top"> 
							<h6>EMPLOYEMENT</h6>
							<a><p>needmoney@something.rs</p></a>
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