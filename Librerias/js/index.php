

	<meta charset="UTF-8">
	<title>Document</title>
	
	<script src="Librerias/js/jquery.anexgrid.js"></script> 
	
	  <script>
            $(document).ready(function(){
                $("#list").anexGrid({
                    class: 'table-striped table-bordered table-condensed',
                    columnas: [

                        { leyenda: 'Nombre', class: '', ordenable: true, columna: 'nombreProducto', filtro: true },
                        { leyenda: 'Precio', style: 'width:300px;', ordenable: true, filtro: true, columna: 'precio' },
                        { leyenda: 'Costo', style: 'width:300px;', ordenable: true, filtro: true, columna: 'Costo' },
                         { leyenda: 'Cliente', style: 'width:300px;', ordenable: true, filtro: true, columna: 'nombreCliente' },
                    ],
                    modelo: [
                        { propiedad: 'nombreProducto'  },
                        { propiedad: 'precio' },
                        { propiedad: 'costo'  },
                        { propiedad: 'nombreCliente'},

                    ],
                    url: 'Productos/DataProductos.php',
                    paginable: true,
                    filtrable: true,
                    limite: [5, 10, 15],
                    columna: 'id',
                    columna_orden: 'DESC'
                });
            });

            function Eliminar(id)
            {
                if(confirm("Desea Eliminar el Cliente?")){

                    window.location='?m=Productos&s=controller&v=delete&q='+id;
                }


            }



        </script>

<div id="list"></div>

