<?php

if (empty($db)) {
	function dbquery($strSQL) {
		global $db;

		if (!$queryValue = $db->query($strSQL)) {
			//If (!$queryValue = $db->query($strSQL)) {
			die("<p><font color='red'>DB Query Error: ".$db->error);
		} else {
			return $queryValue;
		}
	}
	function dbinsert($strSQL) {
		global $db;
	
		if (!$queryValue = $db->query($strSQL)) {
			//If (!$queryValue = $db->query($strSQL)) {
			die("<p><font color='red'>DB Query Error: ".$db->error);
		} else {
			return $db->insert_id;
		}
	}
	function dbqueryWithAlert($strSQL, $adminEmail, $errorMessage) {
		global $db, $strError, $criticalTransactionError;
		if (!$queryValue = mysqli_query($db, $strSQL)) {
			//If (!$queryValue = $db->query($strSQL)) {
			//mail($adminEmail, "Critical Error: ".date("m-d-Y"), $errorMessage);
			$strError = $errorMessage;
			$criticalTransactionError = TRUE;
		} else {
			return $queryValue;
		}
	}
	//$db = mysql_connect('localhost','root','Kiran5july');
	//mysql_select_db('mycompany', $db);
	$db = new mysqli('localhost', 'km', 'km@1234', 'mycompany');
	//if (!$db) {
	if (mysqli_connect_errno()) {
		echo "<p><font color='red'><b>Error:<b> Could not connect to database.  Please try again later.</font></p>";
		throw new Exception('Could not connect to database. Check server & network.');
		exit;
	}

}

/*
function db_connect() {
   $result = new mysqli('localhost', 'km', 'km@1234', 'mycompany');
   if (!$result) {
     throw new Exception('Could not connect to database server');
   } else {
     return $result;
   }
}*/
?>
