<?php 
		include_once('config/DataBaseClass.php');
		$db = new  dbconnection();


		$query = 'SELECT  
                    c.name as nombre,
                    sum(v.total) as debe,
                   (select sum(total) from h_venta where v.estatus_cta = 1 and  fechapago is null) - sum(v.total) as ctr,
                  ((select sum(total) from h_venta where v.estatus_cta = 1 and  fechapago is null) + sum(v.total) ) / 10 as sum
                 from clientes as c
                inner join h_venta as v
                on c.id = v.idcliente
                where v.estatus_cta = 1
                and  fechapago is null  
                group by c.id';


		$rows = $db->query($query);

	     var_dump($rows);



 ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);


      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Cliente', 'CTR', 'TOTAL' , 'KPIs'],
                <?php while($array = mysql_fetch_object($rows))
        {   ?>
         ['<?php echo $array->nombre; ?>',  <?php echo  $array->ctr ; ?>,    <?php echo $array->debe ; ?>,    <?php echo $array->sum ; ?>],
        <?php } ?>

         ['',  0,    0 , 0]
      ]);

    var options = {
      title : 'Monthly Coffee Production by Country',
      vAxis: {title: 'Vanta / Ganancia'},
      hAxis: {title: 'Clientes'},
      seriesType: 'bars',
      series: {1: {type: 'line'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
    </script>

    <div id="chart_div"></div>

