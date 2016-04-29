

	<meta charset="UTF-8">
	<title>Document</title>
	
	<script src="Librerias/js/jquery.anexgrid.js"></script> 
	
	  <script>
            $(document).ready(function(){
                $("#list").anexGrid({
                    class: 'table-striped table-bordered table-condensed',
                    columnas: [
                        { leyenda: '', style: 'width:40px;', class: 'text-center'},
                        // { leyenda: 'Tipo', style: 'width:200px;', columna: 'Profesion_id', ordenable: true, filtro: function(){
                        //     return anexGrid_select({
                        //         data: [
                        //             { valor: '', contenido: 'Todos' },
                        //             { valor: '1', contenido: 'Abogado' },
                        //             { valor: '2', contenido: 'Bombero' },
                        //             { valor: '3', contenido: 'Doctor' },
                        //             { valor: '4', contenido: 'Ingeniero Civil' },
                        //             { valor: '5', contenido: 'Ingeniero de Sistemas' },
                        //             { valor: '6', contenido: 'Músico' },
                        //         ]
                        //     });
                        // } },
                        { leyenda: 'Nombre', class: '', ordenable: true, columna: 'name', filtro: true },
                        { leyenda: 'Correo', style: 'width:300px;', ordenable: true, filtro: true, columna: 'email' },
                        { leyenda: 'Telefono', style: 'width:300px;', ordenable: true, filtro: true, columna: 'tel' },
                        // { leyenda: 'Sexo', style: 'width:120px;', columna: 'Sexo', filtro: function(){
                        //     return anexGrid_select({
                        //         data: [
                        //             { valor: '', contenido: 'Todos' },
                        //             { valor: '1', contenido: 'Masculino' },
                        //             { valor: '2', contenido: 'Femenino' },
                        //         ]
                        //     });
                        // } },
                       // { leyenda: 'Saldo', style: 'width:100px;', ordenable: true, columna: 'Sueldo' },
                        { leyenda: 'Registro', style: 'width:100px;', ordenable: true, columna: 'Recorddate' },
                        { leyenda: 'Productos', style: 'width:100px;', ordenable: true, columna: 'Recorddate' },
                    ],
                    modelo: [
                        { class: 'text-center', formato: function(tr, obj, valor)
                        {
                            return anexGrid_dropdown({
                                contenido: '<i class="glyphicon glyphicon-cog"></i>',
                                class: 'btn btn-primary btn-xs',
                                target: '_blank',
                                id: 'editar-' + obj.id,
                                data: [
                                    { href: '?m=Clientes&s=controller&v=edit&q='+ obj.id, contenido: 'Editar' },
                                    { href: 'javascript:Eliminar('+ obj.id +');', contenido: 'Eliminar' }
                                ]
                            });
                            }
                        },
                        //{ propiedad: 'Profesion.Nombre' },
                        { style: '', class: '', formato: function(tr, obj, valor){
                            return obj.name + ' ' + obj.app;
                        }},
                        { propiedad: 'email' },
                        { propiedad: 'tel' 

                      //  formato: function(tr, obj, valor){
                      //  return contenido: '<a href="#"><i class="glyphicon glyphicon-cog">'+obj.tel+'</i></a>';
                     //     } 
                      },
                       // { propiedad: 'Sexo', formato: function(tr, obj, valor){
                         //   return obj.Sexo == '1' ? 'Masculino' : 'Femenino';
                        //}},
                       // { propiedad: 'saldo', class: 'text-right', },
                        { propiedad: 'recorddate', class: 'text-right', },
                         { class: 'text-center', formato: function(tr, obj, valor)
                        {
                            return anexGrid_dropdown({
                                contenido: '<i class="glyphicon glyphicon-cog"></i>',
                                class: 'btn btn-primary btn-xs',
                                target: '_blank',
                                id: 'Prod-' + obj.id,
                                data: [
                                    { href: '?m=Clientes&s=controller&v=edit&q='+ obj.id, contenido: 'Productos' }
                                ]
                            });
                            }
                        }
                    ],
                    url: 'Clientes/DataClientes.php',
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

                    window.location='?m=Clientes&s=controller&v=delete&q='+id;
                }


            }



        </script>

<div class="well col-md-6">
    <?php include_once("analisis.php"); ?>
</div>
<div class="col-md-6" style="max-height:239px; min-height:239px; overflow: scroll;">
<?php include_once("matriz.php"); ?>
</div>

<div id="list" class="col-md-12"></div>

