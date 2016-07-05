<?php
session_start();
	
if(empty($_SESSION['user']))
{
	header("location:https://health-connect.site/report_login.php");
}
	
	
// Database Connection
$link = mysql_connect('localhost', 'healgvnf_reader', 'Raaso2016');
if (!$link) {
	die('Could not connect: ' . mysql_error());
}

//echo 'Connected successfully';

$selected = mysql_select_db("healgvnf_wp766", $link)
	or die("Could not select examples");


// --------------Total Amount of Users----------------
$sql = "SELECT * FROM wp_swpm_members_tbl";
$result = mysql_query($sql);
$total_count = mysql_num_rows($result);

//echo 'Sum: '.$total_count.' Registed Users';
//echo '<hr>';


// --------------Amount Users of Current year Month----------------
$current_year = date("Y");
$sql = 'SELECT * FROM wp_swpm_members_tbl where member_since like "'.$current_year.'-01%"';
$result = mysql_query($sql);
$month_01 = mysql_num_rows($result);

$sql = 'SELECT * FROM wp_swpm_members_tbl where member_since like "'.$current_year.'-02%"';
$result = mysql_query($sql);
$month_02 = mysql_num_rows($result);

$sql = 'SELECT * FROM wp_swpm_members_tbl where member_since like "'.$current_year.'-03%"';
$result = mysql_query($sql);
$month_03 = mysql_num_rows($result);

$sql = 'SELECT * FROM wp_swpm_members_tbl where member_since like "'.$current_year.'-04%"';
$result = mysql_query($sql);
$month_04 = mysql_num_rows($result);

$sql = 'SELECT * FROM wp_swpm_members_tbl where member_since like "'.$current_year.'-05%"';
$result = mysql_query($sql);
$month_05 = mysql_num_rows($result);

$sql = 'SELECT * FROM wp_swpm_members_tbl where member_since like "'.$current_year.'-06%"';
$result = mysql_query($sql);
$month_06 = mysql_num_rows($result);

$sql = 'SELECT * FROM wp_swpm_members_tbl where member_since like "'.$current_year.'-07%"';
$result = mysql_query($sql);
$month_07 = mysql_num_rows($result);

$sql = 'SELECT * FROM wp_swpm_members_tbl where member_since like "'.$current_year.'-08%"';
$result = mysql_query($sql);
$month_08 = mysql_num_rows($result);

$sql = 'SELECT * FROM wp_swpm_members_tbl where member_since like "'.$current_year.'-09%"';
$result = mysql_query($sql);
$month_09 = mysql_num_rows($result);

$sql = 'SELECT * FROM wp_swpm_members_tbl where member_since like "'.$current_year.'-10%"';
$result = mysql_query($sql);
$month_10 = mysql_num_rows($result);

$sql = 'SELECT * FROM wp_swpm_members_tbl where member_since like "'.$current_year.'-11%"';
$result = mysql_query($sql);
$month_11 = mysql_num_rows($result);

$sql = 'SELECT * FROM wp_swpm_members_tbl where member_since like "'.$current_year.'-12%"';
$result = mysql_query($sql);
$month_12 = mysql_num_rows($result);

// --------------For Aliments----------------
// For Alcohol
$sql = "SELECT * FROM wp_swpm_members_tbl where address_street like 'Alcohol Abuse'";
$result = mysql_query($sql);
$alcohol_count = mysql_num_rows($result);

//echo '<br>{Alcohol Abuse} Sum: '.$alcohol_count;
//echo '<br>----------------------------------------<br>';

// For Cancer
$sql = "SELECT * FROM wp_swpm_members_tbl where address_city like 'Cancer'";
$result = mysql_query($sql);
$cancer_count = mysql_num_rows($result);

//echo '<br>{Cancer} Sum: '.$cancer_count;
//echo '<br>----------------------------------------<br>';

// For Diabetes
$sql = "SELECT * FROM wp_swpm_members_tbl where address_state like 'Diabetes'";
$result = mysql_query($sql);
$diabetes_count = mysql_num_rows($result);

//echo '<br>{Diabetes} Sum: '.$diabetes_count;
//echo '<br>----------------------------------------<br>';

// For Drug abuse
$sql = "SELECT * FROM wp_swpm_members_tbl where address_zipcode like 'Drug abuse'";
$result = mysql_query($sql);
$drug_count = mysql_num_rows($result);

//echo '<br>{Drug abuse} Sum: '.$drug_count;
//echo '<br>----------------------------------------<br>';

// For Obesity
$sql = "SELECT * FROM wp_swpm_members_tbl where company_name like 'Obesity'";
$result = mysql_query($sql);
$obesity_count = mysql_num_rows($result);;

//echo '<br>{Obesity} Sum: '.$obesity_count;
//cho '<br>----------------------------------------<br>';


// --------------For Suburb----------------
// For Inner City
$sql = "SELECT * FROM wp_swpm_members_tbl where country like 'Inner City'";
$result = mysql_query($sql);

$CBD_count = 0;
$CBD_alcohol = 0;
$CBD_cancer = 0;
$CBD_diabetes = 0;
$CBD_drug = 0;
$CBD_obesity = 0;

while ($row = mysql_fetch_array($result)) {
	if ($row{'address_street'} != '')
	{
		$CBD_alcohol++;
	}
	
	if ($row{'address_city'} != '')
	{
		$CBD_cancer++;
	}
	
	if ($row{'address_state'} != '')
	{
		$CBD_diabetes++;
	}
	
	if ($row{'address_zipcode'} != '')
	{
		$CBD_drug++;
	}
	
	if ($row{'company_name'} != '')
	{
		$CBD_obesity++;
	}
	
	//echo " Name: ".$row{'country'};
	$CBD_count++;
}
//echo '<br>{Inner City} Sum: '.$CBD_count;
//echo '<br>----------------------------------------<br>';

// For Northern
$sql = "SELECT * FROM wp_swpm_members_tbl where country like 'Northern'";
$result = mysql_query($sql);
$North_count = 0;
$North_alcohol = 0;
$North_cancer = 0;
$North_diabetes = 0;
$North_drug = 0;
$North_obesity = 0;

while ($row = mysql_fetch_array($result)) {
	if ($row{'address_street'} != '')
	{
		$North_alcohol++;
	}
	
	if ($row{'address_city'} != '')
	{
		$North_cancer++;
	}
	
	if ($row{'address_state'} != '')
	{
		$North_diabetes++;
	}
	
	if ($row{'address_zipcode'} != '')
	{
		$North_drug++;
	}
	
	if ($row{'company_name'} != '')
	{
		$North_obesity++;
	}
	
	//echo " Name: ".$row{'country'};
	$North_count++;
}

//echo '<br>{Northern} Sum: '.$North_count;
//echo '<br>----------------------------------------<br>';


// For South Eastern
$sql = "SELECT * FROM wp_swpm_members_tbl where country like 'South Eastern'";
$result = mysql_query($sql);
$South_count = 0;
$Sorth_alcohol = 0;
$Sorth_cancer = 0;
$Sorth_diabetes = 0;
$Sorth_drug = 0;
$Sorth_obesity = 0;

while ($row = mysql_fetch_array($result)) {
	if ($row{'address_street'} != '')
	{
		$Sorth_alcohol++;
	}
	
	if ($row{'address_city'} != '')
	{
		$Sorth_cancer++;
	}
	
	if ($row{'address_state'} != '')
	{
		$Sorth_diabetes++;
	}
	
	if ($row{'address_zipcode'} != '')
	{
		$Sorth_drug++;
	}
	
	if ($row{'company_name'} != '')
	{
		$Sorth_obesity++;
	}
	
	//echo " Name: ".$row{'country'};
	$South_count++;
}

//echo '<br>{South Eastern} Sum: '.$North_count;
//echo '<br>----------------------------------------<br>';


// For Western
$sql = "SELECT * FROM wp_swpm_members_tbl where country like 'Western'";
$result = mysql_query($sql);
$Western_count = 0;
$Western_alcohol = 0;
$Western_cancer = 0;
$Western_diabetes = 0;
$Western_drug = 0;
$Western_obesity = 0;

while ($row = mysql_fetch_array($result)) {
	if ($row{'address_street'} != '')
	{
		$Western_alcohol++;
	}
	
	if ($row{'address_city'} != '')
	{
		$Western_cancer++;
	}
	
	if ($row{'address_state'} != '')
	{
		$Western_diabetes++;
	}
	
	if ($row{'address_zipcode'} != '')
	{
		$Western_drug++;
	}
	
	if ($row{'company_name'} != '')
	{
		$Western_obesity++;
	}
	
	//echo " Name: ".$row{'country'};
	$Western_count++;
}

//echo '<br>{Western} Sum: '.$Western_count;
//echo '<br>----------------------------------------<br>';


// --------------For Gender----------------
// For male
$sql = "SELECT * FROM wp_swpm_members_tbl where gender like 'male'";
$result = mysql_query($sql);
$male_count = mysql_num_rows($result);
$male_alcohol = 0;
$male_cancer = 0;
$male_diabetes = 0;
$male_drug = 0;
$male_obesity = 0;

while ($row = mysql_fetch_array($result)) {
	if ($row{'address_street'} != '')
	{
		$male_alcohol++;
	}
	
	if ($row{'address_city'} != '')
	{
		$male_cancer++;
	}
	
	if ($row{'address_state'} != '')
	{
		$male_diabetes++;
	}
	
	if ($row{'address_zipcode'} != '')
	{
		$male_drug++;
	}
	
	if ($row{'company_name'} != '')
	{
		$male_obesity++;
	}
}

//echo '<br>{Male} Sum: '.$male_count;
//echo '<br>----------------------------------------<br>';


// For female
$sql = "SELECT * FROM wp_swpm_members_tbl where gender like 'female'";
$result = mysql_query($sql);
$female_count = mysql_num_rows($result);
$female_alcohol = 0;
$female_cancer = 0;
$female_diabetes = 0;
$female_drug = 0;
$female_obesity = 0;

while ($row = mysql_fetch_array($result)) {
	if ($row{'address_street'} != '')
	{
		$female_alcohol++;
	}
	
	if ($row{'address_city'} != '')
	{
		$female_cancer++;
	}
	
	if ($row{'address_state'} != '')
	{
		$female_diabetes++;
	}
	
	if ($row{'address_zipcode'} != '')
	{
		$female_drug++;
	}
	
	if ($row{'company_name'} != '')
	{
		$female_obesity++;
	}
}

//echo '<br>{Female} Sum: '.$female_count;
//echo '<br>----------------------------------------<br>';

// --------------For Age----------------
$sql = "SELECT * FROM wp_swpm_members_tbl";
$result = mysql_query($sql);
$group_15to24 = 0;
$group_25to44 = 0;
$group_45to64 = 0;
$group_over65 = 0;

$current_year = date("Y");

while ($row = mysql_fetch_array($result)) {
	//echo (2016-$row{'phone'}).' ';
	if ($row{'phone'} != '')
	{
		if ($current_year - $row{'phone'} <= 24)
		{
			$group_15to24++;
		}
		else if ($current_year - $row{'phone'} >= 25 && $current_year - $row{'phone'}<= 44)
		{
			$group_25to44++;
		}
		else if ($current_year - $row{'phone'} >= 45 && $current_year - $row{'phone'} <= 64)
		{
			$group_45to64++;
		}
		else
		{
			$group_over65++;
		}
	}
}

// Alcohol Group
$sql = "SELECT * FROM wp_swpm_members_tbl where address_street like 'Alcohol Abuse'";
$result = mysql_query($sql);
$alcohol_group_15to24 = 0;
$alcohol_group_25to44 = 0;
$alcohol_group_45to64 = 0;
$alcohol_group_over65 = 0;

$current_year = date("Y");

while ($row = mysql_fetch_array($result)) {
	if ($row{'phone'} != '')
	{
		if ($current_year - $row{'phone'} <= 24)
		{
			$alcohol_group_15to24++;
		}
		else if ($current_year - $row{'phone'} >= 25 && $current_year - $row{'phone'} <= 44)
		{
			$alcohol_group_25to44++;
		}
		else if ($current_year - $row{'phone'} >= 45 && $current_year - $row{'phone'} <= 64)
		{
			$alcohol_group_45to64++;
		}
		else
		{
			$alcohol_group_over65++;
		}
	}
}

// Cancer Group
$sql = "SELECT * FROM wp_swpm_members_tbl where address_city like 'Cancer'";
$result = mysql_query($sql);
$cancer_group_15to24 = 0;
$cancer_group_25to44 = 0;
$cancer_group_45to64 = 0;
$cancer_group_over65 = 0;

$current_year = date("Y");

while ($row = mysql_fetch_array($result)) {
	if ($row{'phone'} != '')
	{
		if ($current_year - $row{'phone'} <= 24)
		{
			$cancer_group_15to24++;
		}
		else if ($current_year - $row{'phone'} >= 25 && $current_year - $row{'phone'} <= 44)
		{
			$cancer_group_25to44++;
		}
		else if ($current_year - $row{'phone'} >= 45 && $current_year - $row{'phone'} <= 64)
		{
			$cancer_group_45to64++;
		}
		else
		{
			$cancer_group_over65++;
		}
	}
}

// Diabetes Group
$sql = "SELECT * FROM wp_swpm_members_tbl where address_state like 'Diabetes'";
$result = mysql_query($sql);
$diabetes_group_15to24 = 0;
$diabetes_group_25to44 = 0;
$diabetes_group_45to64 = 0;
$diabetes_group_over65 = 0;

$current_year = date("Y");

while ($row = mysql_fetch_array($result)) {
	if ($row{'phone'} != '')
	{
		if ($current_year - $row{'phone'} <= 24)
		{
			$diabetes_group_15to24++;
		}
		else if ($current_year - $row{'phone'} >= 25 && $current_year - $row{'phone'} <= 44)
		{
			$diabetes_group_25to44++;
		}
		else if ($current_year - $row{'phone'} >= 45 && $current_year - $row{'phone'} <= 64)
		{
			$diabetes_group_45to64++;
		}
		else
		{
			$diabetes_group_over65++;
		}
	}
}

// Drug abuse Group
$sql = "SELECT * FROM wp_swpm_members_tbl where address_zipcode like 'Drug abuse'";
$result = mysql_query($sql);
$drug_group_15to24 = 0;
$drug_group_25to44 = 0;
$drug_group_45to64 = 0;
$drug_group_over65 = 0;

$current_year = date("Y");

while ($row = mysql_fetch_array($result)) {
	if ($row{'phone'} != '')
	{
		if ($current_year - $row{'phone'} <= 24)
		{
			$drug_group_15to24++;
		}
		else if ($current_year - $row{'phone'} >= 25 && $current_year - $row{'phone'} <= 44)
		{
			$drug_group_25to44++;
		}
		else if ($current_year - $row{'phone'} >= 45 && $current_year - $row{'phone'} <= 64)
		{
			$drug_group_45to64++;
		}
		else
		{
			$drug_group_over65++;
		}
	}
}

// Obesity Group
$sql = "SELECT * FROM wp_swpm_members_tbl where company_name like 'Obesity'";
$result = mysql_query($sql);
$obesity_group_15to24 = 0;
$obesity_group_25to44 = 0;
$obesity_group_45to64 = 0;
$obesity_group_over65 = 0;

$current_year = date("Y");

while ($row = mysql_fetch_array($result)) {
	if ($row{'phone'} != '')
	{
		if ($current_year - $row{'phone'} <= 24)
		{
			$obesity_group_15to24++;
		}
		else if ($current_year - $row{'phone'} >= 25 && $current_year - $row{'phone'} <= 44)
		{
			$obesity_group_25to44++;
		}
		else if ($current_year - $row{'phone'} >= 45 && $current_year - $row{'phone'} <= 64)
		{
			$obesity_group_45to64++;
		}
		else
		{
			$obesity_group_over65++;
		}
	}
}

mysql_close($link);
?>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar', "corechart"]});

      // Chart_1
      google.charts.setOnLoadCallback(drawChart_1);
      function drawChart_1() {
        var data_1 = google.visualization.arrayToDataTable([
          ['Ailments', 'Number of Users'],
          ['Alcohol abuse', <?php echo $alcohol_count?>],
          ['Cancer', <?php echo $cancer_count?>],
          ['Diabetes', <?php echo $diabetes_count?>],
          ['Drug abuse', <?php echo $drug_count?>],
		  ['Obesity', <?php echo $obesity_count?>]
        ]);

        var options_1 = {
          chart: {
            title: '',
          }
        };

        var chart_1 = new google.charts.Bar(document.getElementById('Chart_1'));

        chart_1.draw(data_1, options_1);
      }
	  
	  // Chart_2
	  google.charts.setOnLoadCallback(drawChart_2);
	  function drawChart_2() {
        var data_2 = google.visualization.arrayToDataTable([
          ['Territory', 'Alcohol Abuse', 'Cancer', 'Diabetes', 'Drug abuse', 'Obesity'],
          ['Inner City', <?php echo $CBD_alcohol?>, <?php echo $CBD_cancer?>, <?php echo $CBD_diabetes?>, <?php echo $CBD_drug?>, <?php echo $CBD_obesity?>],
          ['Northern', <?php echo $North_alcohol?>, <?php echo $North_cancer?>, <?php echo $North_diabetes?>, <?php echo $North_drug?>, <?php echo $North_obesity?>],
          ['South Eastern', <?php echo $Sorth_alcohol?>, <?php echo $Sorth_cancer?>, <?php echo $Sorth_diabetes?>, <?php echo $Sorth_drug?>, <?php echo $Sorth_obesity?>],
          ['Western', <?php echo $Western_alcohol?>, <?php echo $Western_cancer?>, <?php echo $Western_diabetes?>, <?php echo $Western_drug?>, <?php echo $Western_obesity?>]
        ]);

        var options_2 = {
          chart: {
            title: '',
          }
        };

        var chart_2 = new google.charts.Bar(document.getElementById('Chart_2'));

        chart_2.draw(data_2, options_2);
      }

      //Chart_3
      google.charts.setOnLoadCallback(drawChart_3);
	  function drawChart_3() {
        var data_3 = google.visualization.arrayToDataTable([
          ['Ailments', 'Male', 'Female'],
          ['Alcohol Abuse', <?php echo $male_alcohol?>, <?php echo $female_alcohol?>],
          ['Cancer', <?php echo $male_cancer?>, <?php echo $female_cancer?>],
          ['Diabetes', <?php echo $male_diabetes?>, <?php echo $female_diabetes?>],
          ['Drug abuse', <?php echo $male_drug?>, <?php echo $female_drug?>],
          ['Obesity', <?php echo $male_obesity?>, <?php echo $female_obesity?>]
        ]);

        var options_3 = {
          chart: {
            title: '',
          }
        };

        var chart_3 = new google.charts.Bar(document.getElementById('Chart_3'));

        chart_3.draw(data_3, options_3);
      }

      //Chart_4
      google.charts.setOnLoadCallback(drawChart_4);
	  function drawChart_4() {
        var data_4 = google.visualization.arrayToDataTable([
          ['Ailments', '15-24', '25-44', '45-64', '>65'],
          ['Alcohol Abuse', <?php echo $alcohol_group_15to24?>, <?php echo $alcohol_group_25to44?>, <?php echo $alcohol_group_45to64?>, <?php echo $alcohol_group_over65?>],
          ['Cancer', <?php echo $cancer_group_15to24?>, <?php echo $cancer_group_25to44?>, <?php echo $cancer_group_45to64?>, <?php echo $cancer_group_over65?>],
          ['Diabetes', <?php echo $diabetes_group_15to24?>, <?php echo $diabetes_group_25to44?>, <?php echo $diabetes_group_45to64?>, <?php echo $diabetes_group_over65?>],
          ['Drug abuse', <?php echo $drug_group_15to24?>, <?php echo $drug_group_25to44?>, <?php echo $drug_group_45to64?>, <?php echo $drug_group_over65?>],
          ['Obesity', <?php echo $obesity_group_15to24?>, <?php echo $obesity_group_25to44?>, <?php echo $obesity_group_45to64?>, <?php echo $obesity_group_over65?>]
        ]);

        var options_4 = {
          chart: {
            title: '',
          }
        };

        var chart_4 = new google.charts.Bar(document.getElementById('Chart_4'));

        chart_4.draw(data_4, options_4);
      }

      // Chart_5
      google.charts.setOnLoadCallback(drawChart_5);

      function drawChart_5() {
        var data_5 = google.visualization.arrayToDataTable([
          ['Month', 'Number of Users'],
          ['Jan', <?php echo $month_01?>],
          ['Feb', <?php echo $month_02?>],
          ['Mar', <?php echo $month_03?>],
          ['Apr', <?php echo $month_04?>],
          ['May', <?php echo $month_05?>],
          ['Jun', <?php echo $month_06?>],
          ['Jul', <?php echo $month_07?>],
          ['Aug', <?php echo $month_08?>],
          ['Sep', <?php echo $month_09?>],
          ['Oct', <?php echo $month_10?>],
          ['Nov', <?php echo $month_11?>],
          ['Dec', <?php echo $month_12?>]
        ]);

        var options_5 = {
          title: ''
        };

        var chart_5 = new google.visualization.LineChart(document.getElementById('Chart_5'));

        chart_5.draw(data_5, options_5);
      }
    </script>
  </head>
  <body>
	<div style="float:right; margin-right:50px; margin-top:10px">
		<a href="https://health-connect.site/report_logout.php">Logout</a>
	</div>
		
	<div align=center>

		<br>

		<h2>Health Connect Existing Users Report</h2>

		<br>

		<p>Total Registed Users: <font color="red"><?php echo $total_count?></font></p>

		<br>

		<hr width="70%";>
		
		<p><font size="4">Number of Registed Users Displayed by Month (<?php echo $current_year?>)</font></p>
		<div id="Chart_5" style="width: 900px; height: 500px;"></div>
		
		<br><br>

		<hr width="70%";>
		<br>
		<br>
		
		<p><font size="4">Number of Users that Exists for each Ailment Type</font></p>
		<div id="Chart_1" style="width: 900px; height: 500px;"></div>
		
		<br>
		<hr width="70%";>
		<br>
		<br>
		
		<p><font size="4"> Number of Users that lives in each Territory</font></p>
		<div id="Chart_2" style="width: 900px; height: 500px;"></div>

		<br>
		<hr width="70%";>
		<br>
		<br>

		<p><font size="4">Gender Distribution of Users for each Ailment Type</font></p>
		<div id="Chart_3" style="width: 900px; height: 500px;"></div>

		<br>
		<hr width="70%";>
		<br>
		<br>

		<p><font size="4">Number of Users Consolidated by Age Groups for each Ailment Type</font></p>
		<div id="Chart_4" style="width: 900px; height: 500px;"></div>
	</div>
  </body>
</html>