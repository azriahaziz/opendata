<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Apurba / Surety Connection Project</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
  body {
	padding-top: 60px;
	padding-bottom: 40px;
  }
</style>
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="../assets/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

<script type='text/javascript' src='https://www.google.com/jsapi'></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script type="text/javascript" src='https://www.google.com/jsapi?autoload={"modules":[{"name":"visualization","version":"1"}]}'>
</script>
	
<script type="text/javascript">
  google.setOnLoadCallback(drawVisualization);

  function drawVisualization() {
  
	var greenbutton_daily = new google.visualization.ChartWrapper({
	   chartType:'LineChart',
	   dataSourceUrl:'get_greenbuttondata.php?modeID=daily',
	   containerId:'greenbutton_daily_chart',
	   options: {'width': 800,'height': 400,
	   'hAxis': {title: 'Time (Hour)', viewWindow: { min: 0,max: 24}, ticks: [0, 4, 8, 12, 16, 20, 24]}, 
	   'seriesType': 'line',
	   'series': {1: {type: 'bars'}}}  
	   });
	greenbutton_daily.draw();
  
	var greenbutton_weekly = new google.visualization.ChartWrapper({
	   chartType:'ComboChart',
	   dataSourceUrl:'get_greenbuttondata.php?modeID=weekly',
	   containerId:'greenbutton_weekly_chart',
	   options: {'width': 800,'height': 400,
	   'hAxis': {title: 'Date (Day)'}, 
	   'seriesType': 'line',
	   'series': {1: {type: 'bars'}}} 
	   });
	greenbutton_weekly.draw();
	
	var greenbutton_monthly = new google.visualization.ChartWrapper({
	   chartType:'ComboChart',
	   dataSourceUrl:'get_greenbuttondata.php?modeID=monthly',
	   containerId:'greenbutton_monthly_chart',
	   options: {'width': 800,'height': 400,
	   'hAxis': {title: 'Date (Day)'}, 
	   'seriesType': 'line',
	   'series': {1: {type: 'bars'}}} 
	   });
	greenbutton_monthly.draw();
  
  }
</script>

<script type="text/javascript">
    $(function () {
        var navTabs = $('.nav-tabs a');
        var hash = window.location.hash;
        hash && navTabs.filter('[data-value="' + hash + '"]').tab('show');

        navTabs.on('shown', function (e) {
            var newhash = $(e.target).attr('data-value');
            window.location.hash = newhash;
        });
    })
</script>

</head>

<body>

<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
	<div class="container-fluid">
	  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </a>
	  <a class="brand" href="index.php">Apurba / Surety Connection Project</a>
	</div>
  </div>
</div>

<div class="container">
	<div class="navbar">
			<div class="container">
				
				<table width="80%" cellpadding="0" cellspacing="1" border="0" align="center">
				<tr class="navigationRow">
					<td class="navigationMenuItemTd"><a href="index.php">Taxonomy</a></td>
					<td class="divider"></td>
					<td class="navigationMenuItemTd"><a href="project.php">Project</a></td>
					<td class="divider"></td>
					<td class="navigationMenuItemTd navigationMenuItemSelected"><a href="greenbutton.php#daily">Green Button</a></td>
					<td class="divider"></td>					
					<td class="navigationMenuItemTd" ><a href="analytics.php#daily">Analytics</a></td>								
				</tr>
				</table>
				
				</div>
	</div>
</div>

<div class="container-fluid">

		<div class="tab-content">
			
			<div class="span3">
			
				<div class="plainBox">
					<div class="boxHeading">Green Button Sample Data</div>	
					<div class="boxContent">
						<div><a href="data/html/TestGBDataoneMonthBinnedDailyWCost.xml">View Data in XML format</a></div><br>
						<div><a href="data/csv/TestGBDataoneMonthBinnedDailyWCost.xml">View Data in CSV format</a></div>
					  </div>
							
				</div>
			
			</div><!--/.span3 -->
			
			<div class="span9">
			
				<div class="plainBox">
					<div class="boxHeading">Display Green Button Data</div>
					  <div class="boxContent">
						<div class="tabbable">
							<ul class="nav nav-tabs">
								<li><a href="#greenbuttondaily" data-toggle="tab" data-value="#daily">Daily</a></li>
								<li><a href="#greenbuttonweekly" data-toggle="tab" data-value="#weekly">Weekly</a></li>
								<li><a href="#greenbuttonmonthly" data-toggle="tab" data-value="#monthly">Monthly</a></li>
							</ul>
							
							<div class="tab-content">
								<div class="tab-pane" id="greenbuttondaily">
								<div align="left">
								
								<form id="greenbuttondaily_day_form" name="greenbuttondaily_day_form" method="POST" action ="insert.php?modeID=gbdaily">
								
								  <?php 
										include("DatabaseConnection.php");
										$SQL1 = "SELECT distinct day FROM dataset_by_day"; 
										$Result = mysql_query($SQL1) or die(mysql_error());
										
										$day_value = mysql_fetch_array(mysql_query("SELECT day_value FROM user_selection")); 
								
								  ?> 
								  <select id="greenbuttondaily_daily" name="greenbuttondaily_daily" style="width: 80px" class="date_picker">       
								  <?php 
										while($row = mysql_fetch_array($Result))
										{       
											  echo "<option value=\"".$row["day"]."\"";
											  if ($day_value[0] == $row["day"]){
											  	echo " selected"; 
											  }
											  echo ">".$row["day"]."</option>";        
										}  
								  ?>
								  </select>	
																	
								<select name="greenbuttondaily_month" style="width: 80px" class="date_picker">
									<option>June</option>
								</select>
								<select name="greenbuttondaily_year" style="width: 60px" class="date_picker">
									<option>2014</option>
								</select>
							
								<input class="btn" type="submit" value="Submit" >
								</form>
								
								</div>
								
								<div id="greenbutton_daily_chart"></div> 
								
								<div id="greenbutton_daily_data">
									
								<?php
								include("DatabaseConnection.php");
								
								$day_value = mysql_fetch_array(mysql_query("SELECT day_value FROM user_selection"));
								$day_value = $day_value[0];
								
								$result = mysql_query("SELECT * FROM dataset_by_day WHERE day='$day_value' ORDER BY start_time ASC") or die(mysql_error());
								
								echo '<table width="100%" class="table table-striped">
								<tr>
								<th>Date</th>
								<th>Time (Hour)</th>
								<th>Cost (US Dollar)</th>
								<th>Usage (Kilowatt-hour)</th>
								</tr>';

								while($row = mysql_fetch_array($result)) {
								  echo '<tr>';
								  echo '<td>' . $row['start_date'] . '</td>';
								  echo '<td>' . $row['start_time'] . '</td>';
								  echo '<td>' . $row['cost'] . '</td>';
								  echo '<td>' . $row['usage'] . '</td>';
								  echo '</tr>';
								}

								echo '</table>';

								?>
								</div> 
								
								</div>
								
								<div class="tab-pane" id="greenbuttonweekly">
								<div align="left">
								
								<form id="greenbuttonweekly_week_form" name="greenbuttonweekly_week_form" method="POST" action ="insert.php?modeID=gbweekly">
																
								 <?php 
										include("DatabaseConnection.php");
										$SQL1 = "SELECT distinct week FROM dataset_by_week"; 
										$Result = mysql_query($SQL1) or die(mysql_error());
										
										$week_value = mysql_fetch_array(mysql_query("SELECT week_value FROM user_selection")); 
								
								  ?> 
								  <select id="greenbuttonweekly_week" name="greenbuttonweekly_week" style="width: 80px" class="date_picker">       
								  <?php 
										while($row = mysql_fetch_array($Result))
										{       
											  echo "<option value=\"".$row["week"]."\"";
											  if ($week_value[0] == $row["week"]){
											  	echo " selected"; 
											  }
											  echo "> Week ".$row["week"]."</option>";        
										}  
								  ?>
								  </select>	
								
								
								<select id="greenbuttonweekly_month" style="width: 80px" class="date_picker">
									<option>June</option>
								</select>
								<select id="greenbuttonweekly_year" style="width: 60px" class="date_picker">
									<option>2014</option>
								</select>
								
								<input class="btn" type="submit" value="Submit" >
								</form>
								
								</div>
								
								<div id="greenbutton_weekly_chart"></div> 
								
								<div id="greenbutton_weekly_data">
								<?php
								include("DatabaseConnection.php");
								
								$week_value = mysql_fetch_array(mysql_query("SELECT week_value FROM user_selection"));
								$week_value = $week_value[0];

								$result = mysql_query("SELECT * FROM dataset_by_week WHERE  `week` ='$week_value' ORDER BY start_date ASC");

								echo '<table width="100%" class="table table-striped">
								<tr>
								<th>Date (Day)</th>
								<th>Cost (US Dollar)</th>
								<th>Usage (Kilowatt-hour)</th>
								</tr>';

								while($row = mysql_fetch_array($result)) {
								  echo '<tr>';
								  echo '<td>' . $row['start_date'] . '</td>';
								  echo '<td>' . $row['cost'] . '</td>';
								  echo '<td>' . $row['usage'] . '</td>';
								  echo '</tr>';
								}

								echo '</table>';

								?>
								</div> 

								</div>
								
								<div class="tab-pane" id="greenbuttonmonthly">
								<div align="left">
								<select id="greenbuttonmonthly_month" style="width: 80px" class="date_picker">
									<option>June</option>
								</select>
								<select id="greenbuttonmonthly_year" style="width: 60px" class="date_picker">
									<option>2014</option>
								</select>
								
								</div>
								
								<div id="greenbutton_monthly_chart"></div>
								
								<div id="greenbutton_monthly_data">
								<?php
								include("DatabaseConnection.php");

								$result = mysql_query("SELECT * FROM dataset_by_month WHERE  `month` =6 ORDER BY start_date ASC");

								echo '<table width="100%" class="table table-striped">
								<tr>
								<th>Date (Day)</th>
								<th>Cost (US Dollar)</th>
								<th>Usage (Kilowatt-hour)</th>
								</tr>';

								while($row = mysql_fetch_array($result)) {
								  echo '<tr>';
								  echo '<td>' . $row['start_date'] . '</td>';
								  echo '<td>' . $row['cost'] . '</td>';
								  echo '<td>' . $row['usage'] . '</td>';
								  echo '</tr>';
								}

								echo '</table>';

								?>
								</div> 
								
								</div>
							</div>
						
						</div>
					</div>
					
				</div>
			
			</div> <!--/.span9 -->

		</div>
 
  <hr>


</div><!--/.fluid-container-->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap-transition.js"></script>
<script src="assets/js/bootstrap-alert.js"></script>
<script src="assets/js/bootstrap-modal.js"></script>
<script src="assets/js/bootstrap-dropdown.js"></script>
<script src="assets/js/bootstrap-scrollspy.js"></script>
<script src="assets/js/bootstrap-tab.js"></script>
<script src="assets/js/bootstrap-tooltip.js"></script>
<script src="assets/js/bootstrap-popover.js"></script>
<script src="assets/js/bootstrap-button.js"></script>
<script src="assets/js/bootstrap-collapse.js"></script>
<script src="assets/js/bootstrap-carousel.js"></script>
<script src="assets/js/bootstrap-typeahead.js"></script>
<script src="assets/js/highcharts.js"></script>
<script src="assets/js/highcharts-more.js"></script>

</body>
</html>
