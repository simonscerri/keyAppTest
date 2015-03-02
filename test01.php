<?php
			
			//$ip = "";
			//$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
			
			date_default_timezone_set('Europe/London');
			
			function check_host(){
				if ($_SERVER['SERVER_ADDR']){
					$localaddress = $_SERVER['SERVER_ADDR'];
				} else {
					$localaddress = "0.0.0.0";
				}
				$tmp = explode(".", $localaddress);
				$location = $tmp[1];
				
				if ($location == "53"){
					$post_url = "http://app-cc.arqiva.tv/pay/cross_site_request.php";
				} else if ($location == "175"){
					$post_url = "http://app-mh.arqiva.tv/pay/cross_site_request.php";
				} else {
					$post_url = "http://app.arqiva.tv/pay/cross_site_request.php";
				}
				return $post_url;
				
			}
			
			function api_request ($url, $fields){	
				$fields_string="";
				

				foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
				rtrim($fields_string, '&');
				
				$ch = curl_init();

				//set the url, number of POST vars, POST data
				curl_setopt($ch,CURLOPT_URL, $url);
				curl_setopt($ch,CURLOPT_POST, count($fields));
				curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);	
				curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

				//execute post
				$result = curl_exec($ch);


				curl_close ($ch); 

				
				return ($result);
				
			}


	//header('Content-Type: application/json');
	//$base_url = check_host();

	require("includes/db_connection.php");
	$debug = 1;
	$device = "";
	if (isset ($_POST["device"]))
	{
		$device = htmlentities ($_POST["device"]);
	}

	$data = "";
	if (isset ($_POST["data"]))
	{
		$data = htmlentities ($_POST["data"]);
	}
	
	$devCheck = "";
	if (isset ($_POST["devCheck"]))
	{
		$devCheck = htmlentities ($_POST["devCheck"]);
	}
	$rssi = "";
	if (isset ($_POST["rssi"]))
	{
		$rssi = htmlentities ($_POST["rssi"]);
	}

	
	if ($debug == 1)
	{
		if (isset ($_GET["device"]))
		{
			$device = htmlentities ($_GET["device"]);
		}

		if (isset ($_GET["data"]))
		{
			$data = htmlentities ($_GET["data"]);
		}

		if (isset ($_GET["devCheck"]))
		{
			$devCheck = htmlentities ($_GET["devCheck"]);
		}
		if (isset ($_GET["rssi"]))
		{
			$rssi = htmlentities ($_GET["rssi"]);
		}
	}


	if ($devCheck == "arQTeSt"){
		
		if ($device == "16941" || $device == "84EF" || $device == "854C"){
	
			echo "condition 1 met";
		
			$date_time = date("YmdHis");
		
			$temp1 = substr($data, -4);
			$temp2 = substr($data, -8, 4);
		
			$battery = hexdec($temp1);
			$temperature = hexdec($temp2);
		
			echo "battery value is " . $battery;
			echo "<br/>";
			echo "temperature value is " . $temperature;
			echo "<br/>";
			echo "timestamp is " . $date_time;
			
		
		
			$sql = "insert into keyappsensor (date_time, temperature, battery, rssi, device_id) VALUES ('$date_time', '$temperature', '$battery', '$rssi', '$device')";
			$result = mysql_query($sql);
			if (!$result){
				echo mysql_error();
			}
		}
	}
	
	
	
?>