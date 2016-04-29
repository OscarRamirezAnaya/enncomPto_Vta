<?php 
    include_once('config/DataBaseClass.php');
    $db = new  dbconnection();


        $query = 'SELECT 
                p.name as nombre,
                sum(cantidad) as cant,
                sum(monto) as monto,
                sum(p.precio * cantidad)-sum(p.costo * cantidad) as ganancia,
                substring((sum(p.precio * cantidad)-sum(p.costo * cantidad))  * 1 /  (select sum(monto) *.01 from l_venta)   ,1,3) as ctr
                FROM l_venta as v 
                inner join productos as p 
                on v.idproducto = p.id
                group by p.id
                order by sum(p.precio * cantidad)-sum(p.costo * cantidad) desc;
              ';


    $rows = $db->query($query);
  

 ?>

<div class="panel" >
    <table class="table table-bordered table-striped table-hover table-responsive" id="datat">
        <thead >
            <th>Producto</th>
             <th>Cantidad</th>
             <th>Monto</th>
             <th>Utilidad</th>
             <th>CTR</th>
        </thead>
      <tbody>
  <?php while($array = mysql_fetch_object($rows))
        {  ?>
        <tr>
            <td><?php  echo $array->nombre;?></td>
             <td><?php echo $array->cant; ?></td>
             <td> $ <?php echo $array->monto; ?></td>
             <td> $ <?php echo $array->ganancia; ?></td>
             <td> % <?php echo $array->ctr; ?></td>
        </tr>

  <?php  }?>
  </tbody>
    </table>
</div>

