<?php 
		include_once('config/DataBaseClass.php');
		$db = new  dbconnection();


		$query = 'select  
					c.name as nombre,
					sum(v.total) as total
					from h_venta as v 
					inner join Clientes as c 
					on v.idcliente = c.id
					group by c.name
          order by sum(v.total) desc';


		$rows = $db->query($query);

	



 ?>


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <div id="chart_div"></div>

    <script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['Clientes', 'Ventas Actual',],

        <?php while($array = mysql_fetch_object($rows))
		 		{ 
		  ?>

        [<?php echo "'". $array->nombre ."'"; ?>, <?php echo $array->total; ?>],


        <?php } ?>

         ['', 0]

      ]);

      var options = {
        title: 'Analisis de consumo por Cliente',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Ventas Totales',
          minValue: 0
        },
        vAxis: {
          title: 'Clientes'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
  </script>