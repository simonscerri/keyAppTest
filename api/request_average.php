<?php
		header('Content-Type: application/json');
		require("../includes/db_connection.php");
		
		function line ($data){
			$line = $data .chr(13).chr(10);
			return ($line);
		}

		function send_response ($av_temp, $av_overall, $batt)
		{
			echo line ("{"); // Start

			
			echo line (' 	"av_temp": "'.$av_temp.'",');
			echo line (' 	"av_overall": "'.$av_overall.'",');
			echo line (' 	"battery": "'.$batt.'"');
			echo line (' 	"av_battery": "'.$batt.'"');
			

			echo line ("}"); // end
		
		}	

		$date_yesterday = date("Y-m-d");
		$date_yesterday .= "%";
		
		$temp_total = 0;
		$total_count = 0;
		
		$sql = "SELECT * FROM keyappsensor WHERE date_time LIKE '$date_yesterday'";
		$result = mysql_query ($sql);
		if ($result){
			$total_count = mysql_num_rows($result);
			while ($row = mysql_fetch_object($result)){
				$temp_total = $temp_total + $row->temperature;
			}
			$av_temperature = $temp_total / $total_count;
			$av_temperature = round($av_temperature, 2);
		}
		$temp_total = 0;
		$total_count = 0;
		
		$sql = "SELECT * FROM keyappsensor";
		$result = mysql_query ($sql);
		if ($result){
			$total_count = mysql_num_rows($result);
			while ($row = mysql_fetch_object($result)){
				$temp_total = $temp_total + $row->temperature;
				$batter_level = $row->battery / 1000;
			}
			$overall_av = $temp_total / $total_count;
			$overall_av = round($overall_av, 2);
		}
		
		send_response ($av_temperature, $overall_av, $batter_level);
		

?>