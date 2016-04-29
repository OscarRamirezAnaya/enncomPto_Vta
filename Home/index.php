	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2013',  1000,      400],
          ['2014',  1170,      460],
          ['2015',  660,       1120],
          ['2016',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);


      }
    </script>








<div class="col-md-12">
	
	<div class="col-md-4">    <div id="chart_div"></div></div>
	<div class="col-md-4">    <div id="chart_div"></div></div>
	<div class="col-md-4">    <div id="chart_div"></div></div>
	<div class="col-md-4">    <div id="chart_div"></div></div>
	<div class="col-md-4">    <div id="chart_div"></div></div>
	<div class="col-md-4">    <div id="chart_div"></div></div>

</div>