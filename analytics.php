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
  
	var analytics_daily = new google.visualization.ChartWrapper({
	   chartType:'LineChart',
	   dataSourceUrl:'get_analyticsdata.php?modeID=daily',
	   containerId:'analytics_daily_chart',
	   options: {'width': 800,'height': 400,
	   'hAxis': {title: 'Time (Hour)', viewWindow: { min: 0,max: 24}, ticks: [0, 4, 8, 12, 16, 20, 24]}, 
	   'vAxis': {title: 'Demand (Kilowatt-hours)', viewWindow: { min: 0,max: 3}, ticks: [0, 1, 2, 3]} } 
	   });
	analytics_daily.draw();
	
	var analytics_weekly = new google.visualization.ChartWrapper({
	   chartType:'LineChart',
	   dataSourceUrl:'get_analyticsdata.php?modeID=weekly',
	   containerId:'analytics_weekly_chart',
	   options: {'width': 800,'height': 400,
	   'hAxis': {title: 'Date (Day)'}, 
	   'vAxis': {title: 'Demand (Kilowatt-hours)', viewWindow: { min: 0,max: 40}, ticks: [0, 10, 20, 30, 40]}} 
	   });
	analytics_weekly.draw();
	
	var analytics_monthly = new google.visualization.ChartWrapper({
	   chartType:'BubbleChart',
	   dataTable: [['ID', 'Project End Date (Day)', 'Demand (Kilowatt-hours)', 'Project Status Completion (%)',     'Project Severity'],
	   ['Project 1',    5,               25,                          98,                     0.02],
	   ['Project 2',    10,              30,                          20 ,                    0.8],
	   ['Project 3',    17,              18,                          60,                     0.4],
	   ['Project 4',    25,              21,                          80,                     0.2]],
	   containerId:'analytics_monthly_chart',
	   options: {'width': 800,'height': 400,
	   'hAxis': {title: 'Project End Date (Day)', viewWindow: { min: 1,max: 31}, ticks: [1, 5, 10, 15, 20, 25, 30]}, 
	   'vAxis': {title: 'Demand (Kilowatt-hours)', viewWindow: { min: 0,max: 60}, ticks: [0, 20, 40, 60]}, 
	   'colorAxis': {colors: ['red', 'yellow', 'green'], minValue: 0, maxValue: 100}, 
	   'is3D': true}
	   });
	analytics_monthly.draw();
	
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
					<td class="navigationMenuItemTd"><a href="greenbutton.php#daily">Green Button</a></td>
					<td class="divider"></td>					
					<td class="navigationMenuItemTd navigationMenuItemSelected" ><a href="analytics.php#daily">Analytics</a></td>								
				</tr>
				</table>
				
				</div>
	</div>
</div>

<div class="container-fluid">

		<div class="tab-content">

			<div class="span3">
			
				<div class="plainBox">
					<div class="boxHeading">Analytics</div>	
					<div class="boxContent">
						<div>Import Data</div>
					  </div>
							
				</div>
			
			</div><!--/.span3 -->
			
			<div class="span9">
			
				<div class="plainBox">
					<div class="boxHeading">Analytics</div>
					  <div class="boxContent">
						<div class="tabbable">
							<ul class="nav nav-tabs">
								<li><a href="#analyticsdaily" data-toggle="tab" data-value="#daily">Daily</a></li>
								<li><a href="#analyticsweekly" data-toggle="tab" data-value="#weekly">Weekly</a></li>
								<li><a href="#analyticsmonthly" data-toggle="tab" data-value="#monthly">Monthly</a></li>
							</ul>
							
							<div class="tab-content">
								<div class="tab-pane" id="analyticsdaily">
								<div align="left">
								
								<form id="analyticsdaily_day_form" name="analyticsdaily_day_form" method="POST" action ="insert.php?modeID=andaily">
								
								  <?php 
										include("DatabaseConnection.php");
										$SQL1 = "SELECT distinct day FROM dataset_by_day"; 
										$Result = mysql_query($SQL1) or die(mysql_error());
										
										$day_value = mysql_fetch_array(mysql_query("SELECT day_value FROM user_selection")); 
								
								  ?> 
								  <select id="analyticsdaily_daily" name="analyticsdaily_daily" style="width: 80px" class="date_picker">       
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
								
								<div id="analytics_daily_chart"></div>

								<div id="analytics_daily_data">
								<?php
								include("DatabaseConnection.php");
								
								$day_value = mysql_fetch_array(mysql_query("SELECT day_value FROM user_selection"));
								$day_value = $day_value[0];

								$result = mysql_query("SELECT * FROM dataset_by_day WHERE  day ='$day_value' ORDER BY start_time ASC");

								echo '<table width="100%" class="table table-striped">
								<tr>
								<th>Date (Day)</th>
								<th>Time (Hour)</th>
								<th>Demand (Kilowatt-hour)</th>
								</tr>';

								while($row = mysql_fetch_array($result)) {
								  echo '<tr>';
								  echo '<td>' . $row['start_date'] . '</td>';
								  echo '<td>' . $row['start_time'] . '</td>';
								  echo '<td>' . $row['usage'] . '</td>';
								  echo '</tr>';
								}

								echo '</table>';

								?>
								</div> 
								
								</div>
								
								<div class="tab-pane" id="analyticsweekly">
								<div align="left">
								
								<form id="analyticsweekly_week_form" name="greenbuttonweekly_week_form" method="POST" action ="insert.php?modeID=anweekly">
								
								<?php 
										include("DatabaseConnection.php");
										$SQL1 = "SELECT distinct week FROM dataset_by_week"; 
										$Result = mysql_query($SQL1) or die(mysql_error());
										
										$week_value = mysql_fetch_array(mysql_query("SELECT week_value FROM user_selection")); 
								
								  ?> 
								  <select id="analyticsweekly_week" name="analyticsweekly_week" style="width: 80px" class="date_picker">       
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
								
								
								<select id="analyticsweekly_month" style="width: 80px" class="date_picker">
									<option>June</option>
								</select>
								<select id="analyticsweekly_year" style="width: 60px" class="date_picker">
									<option>2014</option>
								</select>
										
								<input class="btn" type="submit" value="Submit" >
								</form>
								
								</div>
								<div id="analytics_weekly_chart"></div> 
								
								<div id="analytics_weekly_data">
								<?php
								include("DatabaseConnection.php");
								
								$week_value = mysql_fetch_array(mysql_query("SELECT week_value FROM user_selection"));
								$week_value = $week_value[0];

								$result = mysql_query("SELECT * FROM dataset_by_week WHERE  `week` ='$week_value' ORDER BY start_date ASC");

								echo '<table width="100%" class="table table-striped">
								<tr>
								<th>Date (Day)</th>
								<th>Demand (Kilowatt-hour)</th>
								</tr>';

								while($row = mysql_fetch_array($result)) {
								  echo '<tr>';
								  echo '<td>' . $row['start_date'] . '</td>';
								  echo '<td>' . $row['usage'] . '</td>';
								  echo '</tr>';
								}

								echo '</table>';

								?>
								</div> 
								
								</div>
								
								<div class="tab-pane" id="analyticsmonthly">
								<div align="left">
								<select id="analyticsmonthly_month" style="width: 80px" class="date_picker">
									<option>June</option>
								</select>
								<select id="analyticsmonthly_year" style="width: 60px" class="date_picker">
									<option>2014</option>
								</select>
								</div>
								<div id="analytics_monthly_chart"></div>
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
