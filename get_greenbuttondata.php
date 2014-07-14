<?php
include("DatabaseConnection.php");

function formatDate($my_date)
{
	$newDate = date("Y, m-1 , d", strtotime($my_date)); 	
	return $newDate;
}

function formatTime($my_time)
{
	$newTime = date("H", strtotime($my_time)); 	
	return $newTime;
}

$modeID = $_GET['modeID'];
if($modeID=='daily')
{

$day_value = mysql_fetch_array(mysql_query("SELECT day_value FROM user_selection"));
$day_value = $day_value[0];
				
$result = mysql_query("SELECT *
  FROM dataset_by_day
  WHERE  day='$day_value'
  ORDER BY start_time ASC");

$reqID = 0;

}
else if($modeID=='weekly')
{

$week_value = mysql_fetch_array(mysql_query("SELECT week_value FROM user_selection"));
$week_value = $week_value[0];

$result = mysql_query("SELECT *
  FROM dataset_by_week
  WHERE  week ='$week_value'
  ORDER BY start_date ASC");

$reqID = 1;

}
else{

$result = mysql_query("SELECT *
  FROM dataset_by_month
  WHERE  `month` =6
  ORDER BY start_date ASC");

$reqID = 2;

}

if (!$result) {
    die("Query to show fields from table failed");
}

while($r = mysql_fetch_assoc($result)) {

   if(!isset($google_JSON)){    
     $google_JSON = "google.visualization.Query.setResponse({\"version\":\"0.6\",\"reqId\":".$reqID.",\"status\":\"ok\",\"sig\":\"1029305520\",\"table\": { \"cols\": [";    
     $column = array_keys($r);
     
		 $modeID = $_GET['modeID'];
		 if($modeID=='daily')
		 {
		 $google_JSON_cols[]="{ \"id\": \"2\", \"label\": \"Time\", \"type\": \"number\"}, { \"id\": \"1\", \"label\": \"Cost (USD)\", \"type\": \"number\"}, { \"id\": \"0\", \"label\": \"Usage (Kw-H)\", \"type\": \"number\"}";
		 }
		 else{
		 $google_JSON_cols[]="{ \"id\": \"2\", \"label\": \"Date\", \"type\": \"date\"}, { \"id\": \"1\", \"label\": \"Cost (USD)\", \"type\": \"number\"}, { \"id\": \"0\", \"label\": \"Usage (Kw-H)\", \"type\": \"number\"}";
		 }	 
		 $google_JSON .= implode(",",$google_JSON_cols)."], \"rows\": [";       
   }
   
		 $modeID = $_GET['modeID'];
		 if($modeID=='daily')
		 {
		 $time = $r['start_time'];
		 $time = formatTime($time);
		 $google_JSON_rows[] = "{ \"c\":[{ \"v\": [".$time."]}, { \"v\": ".$r['cost']."}, { \"v\": ".$r['usage']."}]}";
		 }
		 else{
		 $date = $r['start_date'];
		 $date = formatDate($date);
		 $google_JSON_rows[] = "{ \"c\":[{ \"v\": new Date(".$date.")}, { \"v\": ".$r['cost']."}, { \"v\": ".$r['usage']."}]}";
		 }
}    
// you may need to change the above into a function that loops through rows, with $r['id'] etc, referring to the fields you want to inject..

echo $google_JSON.implode(",",$google_JSON_rows)."]}});";

?>