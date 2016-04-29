<?php 
    include_once('config/DataBaseClass.php');
    $db = new  dbconnection();


        $query = 'SELECT  
                    c.name as nombre,
                    sum(v.total) as debe,
                  substring(sum(v.total)  / ((select sum(total) from h_venta where v.estatus_cta = 1 and  fechapago is null) *.01 ) ,1,4) as ctr
                 from clientes as c
                inner join h_venta as v
                on c.id = v.idcliente
                where v.estatus_cta = 1
                and  fechapago is null  
                group by c.id
              ';


    $rows = $db->query($query);
  

 ?>

<div class="panel" >
    <table class="table table-bordered table-striped table-hover table-responsive" id="datat">
        <thead >
            <th>Cliente</th>
             <th>Deuda</th>
             <th>CTR</th>
        </thead>
      <tbody>
  <?php while($array = mysql_fetch_object($rows))
        {  ?>
        <tr>
            <td><?php  echo $array->nombre;?></td>
             <td><?php echo $array->debe; ?></td>
             <td> % <?php echo $array->ctr; ?></td>
        </tr>

  <?php  }?>
  </tbody>
    </table>
</div>

