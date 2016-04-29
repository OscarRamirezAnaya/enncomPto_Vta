<?php 
    include_once('config/DataBaseClass.php');
    $db = new  dbconnection();


        $query = 'SELECT 
                p.name as nombre,
                sum(cantidad) as cant
                FROM l_venta as v 
                inner join productos as p 
                on v.idproducto = p.id
                group by p.name
              ';


    $rows = $db->query($query);
  

 ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([

            ['Productos', 'Cantidad Vendida'],

 <?php while($array = mysql_fetch_object($rows))
        { 

      ?>

        [<?php echo "'". $array->nombre ."'"; ?>, <?php echo $array->cant; ?>],


        <?php } ?>

         ['aqui', 0]

      ]);


        var options = {
          title: 'Venta de Productos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <div id="piechart"></div>

