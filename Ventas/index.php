	<meta charset="UTF-8">
	<title>Document</title>
	
	<script src="Librerias/js/jquery.anexgrid.js"></script> 
	
	  <script>
            $(document).ready(function(){
                $("#list").anexGrid({
                    class: 'table-striped table-bordered table-condensed',
                    columnas: [

                        { leyenda: 'Cliente', class: '', ordenable: true, columna: 'name', filtro: true },
                        { leyenda: 'Total', style: 'width:300px;', ordenable: true, filtro: true, columna: 'total' },
                        { leyenda: 'Fecha', style: 'width:300px;', ordenable: true, filtro: true, columna: 'recorddate' },
                        { leyenda: 'Detalle', style: 'width:300px;'},
                    ],
                    modelo: [
                        { propiedad: 'name'  },
                        { propiedad: 'total' },
                        { propiedad: 'recorddate'  },
                        { class: 'text-center', formato: function(tr, obj, valor)
                        {
                            return anexGrid_dropdown({
                                contenido: '<i class="glyphicon glyphicon-plus"></i>',
                                class: 'btn btn-primary btn-xs',
                                target: '_blank',
                                id: 'Prod-' + obj.id,
                                data: [
                                    { href: 'javascript: VerDetalle('+ obj.id+');', contenido: 'Detalles' }
                                ]
                            });
                            }
                        }

                    ],
                    url: 'Ventas/DataVentas.php',
                    paginable: true,
                    filtrable: true,
                    limite: [5, 10, 15],
                    columna: 'id',
                    columna_orden: 'DESC'
                });
            });

        </script>



<div class="well">
    <?php include_once("analisis.php"); ?>
</div>
<div id="list"></div>

