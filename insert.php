<?php 
include("DatabaseConnection.php");

$modeID = $_GET['modeID'];
if($modeID=='gbdaily')
{
$day_value = $_POST["greenbuttondaily_daily"];
mysql_query("UPDATE user_selection SET day_value = $day_value WHERE id = 1");
header('Location: greenbutton.php#daily');
}

if($modeID=='gbweekly')
{
$week_value = $_POST["greenbuttonweekly_week"];
mysql_query("UPDATE user_selection SET week_value = $week_value WHERE id = 1");
header('Location: greenbutton.php#weekly');
}

if($modeID=='andaily')
{
$day_value = $_POST["analyticsdaily_daily"];
mysql_query("UPDATE user_selection SET day_value = $day_value WHERE id = 1");
header('Location: analytics.php#daily');
}
if($modeID=='anweekly')
{
$week_value = $_POST["analyticsweekly_week"];
mysql_query("UPDATE user_selection SET week_value = $week_value WHERE id = 1");
header('Location: analytics.php#weekly');
}

?>