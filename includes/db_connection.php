<?php //create a connection to the database
    
	require("constants.php");
    $connection1 = mysql_connect(DB_SERVER1, DB_USER1, DB_PASSWORD1);
    if (!$connection1){
        die("Database connection failed:" . mysql_error());
    }
	
	//select a database to use
    $db_select = mysql_select_db(DB_NAME1, $connection1);
    if(!$db_select){
	die("Database connection failed: " . mysql_error());
	
	
    }
	 
	/*
	$link = mysql_connect('akretecom.ipagemysql.com', 'arq_test_m2m', 'Arq_l0g!n'); 
	if (!$link) { 
		die('Could not connect: ' . mysql_error()); 
	} 
	
	mysql_select_db(arqtestm2m); 
	*/
	
?> 
    