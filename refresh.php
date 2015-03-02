<!DOCTYPE html>
<html>
<head>
<script src="js/jquery.min.js"></script>

</head>
<body>

<script>
	
	var auto_refresh = setInterval(
		function (){
			$.getJSON("api/request_data.php", function(result){
				$.each(result, function(i, field){
					//alert("value of i is : " + i);
					$("#"+i).text(field + " ");
				});
			});
		}, 5000); // refresh every 10000 milliseconds
	
</script>

<div id="temperature"></div>
<br/>
<div id="battery"></div>
<br/>
<div id="timestamp"></div>


</body>
</html>
