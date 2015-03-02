<?php
		header('Content-Type: application/json');
		require("../includes/db_connection.php");
		
		function line ($data){
			$line = $data .chr(13).chr(10);
			return ($line);
		}

		function send_response ($time, $rssi)
		{
			echo line ("{"); // Start
			echo line (' "date_time": "'.$time.'",');
			echo line (' "rssi": "'.$rssi.'"');
			

			echo line ("}"); // end
		
		}	

		$temp_counter = 0;
		$sql = "SELECT * FROM (SELECT * FROM keyappsensor ORDER BY date_time DESC LIMIT 10) sub ORDER BY date_time ASC";
		$result = mysql_query($sql);
		$counter = mysql_num_rows($result);
		
		echo line("[");
		
		while ($row = mysql_fetch_object($result)){
			$temp_counter = $temp_counter + 1;
			$y = $row->rssi;			
			$x = $row->date_time;
			send_response($x, $y);
			
			if ($temp_counter < $counter){
				echo line(",");
			}
		}
		
		echo line ("]");
					


?>

