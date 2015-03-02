<?php
	require("includes/db_connection.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>View list</title>
</head>

<body>
	<table border=1>
		<tr>
			<th align="left" width="200">Timestamp </th>
			<th align="left" width="100">Temperature</th>
			<th align="left" width="100">Battery</th>
			<th align="left" width="100">Signal</th>
			<th align="left" width="100">Device ID</th>
		</tr>
		<?php
			$sql = "SELECT * FROM keyappsensor";
			$result = mysql_query($sql);
			while ($row = mysql_fetch_object($result)){
				echo "<tr>";
					echo "<td>" . $row->date_time . "</td>";
					echo "<td>" . $row->temperature . "</td>";
					echo "<td>" . $row->battery . "</td>";
					echo "<td>" . $row->rssi . "</td>";
					echo "<td>" . $row->device_id . "</td>";
				echo "</tr>";
			}
		?>
	<table>

</body>

</html>
