<?php
		header('Content-Type: application/json');
		require("../includes/db_connection.php");
		
		function line ($data){
			$line = $data .chr(13).chr(10);
			return ($line);
		}

		function send_response ($pass,$temp, $batt, $time)
		{
			echo line ("{"); // Start

			
			//echo line (' 	"temperature": "'.$temp.'",');
			echo line (' 	"battery": "'.$batt.'",');
			echo line (' 	"timestamp2": "'.$time.'"');
			

			echo line ("}"); // end
		
		}	


		
		$sql = "SELECT * FROM keyappsensor WHERE date_time=(SELECT MAX(date_time) FROM keyappsensor)";
		$result = mysql_query ($sql);
		if ($result){
			$row = mysql_fetch_object($result);
			$temperature = $row->temperature;
			$battery = round($row->battery/1000,2);
			$timestamp = $row->date_time;
			send_response (TRUE, $temperature, $battery, $timestamp);
		} else {
			$temperature = 0;
			$battery = 0;
			$timestamp = 0;
			send_response (FALSE, $temperature, $battery, $timestamp);
		}
					


?>