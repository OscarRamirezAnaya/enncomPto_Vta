
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<script src="Librerias/js/jquery.anexgrid.js"></script> 
<script src="Librerias/js/bootstrap.js"></script> 
<script src="Librerias/js/bootstrap-datepicker.js"></script> 
<script src="Librerias/js/jquery.js"></script> 
<script src="Librerias/js/jquery-ui.js"></script> 
<link rel="stylesheet" href="Librerias/css/bootstrap.minlig.css">
<!--     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="Librerias/css/bootstrap-datepicker.css">
<!-- <link rel="stylesheet" href="Librerias/css/bootstrap-theme.css"> -->
<link rel="stylesheet" href="Librerias/css/jquery-ui.css">
<link rel="stylesheet" href="Librerias/css/jquery-ui.structure.css">
<link rel="stylesheet" href="Librerias/css/jquery-ui.theme.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
	
<script>
function nobackbutton(){
	
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button" //chrome
   window.onhashchange=function(){window.location.hash="no-back-button";}

						}


// $(document).ready(function() {
//     $('#datat').DataTable();
// } );



</script>

		<style  type="text/css">
		::-webkit-scrollbar{
		width: 10px;
		background: #dbe8ec;
		}
		::-webkit-scrollbar-button{
		width:8px;
		height: 5px;
		}
		::-webkit-scrollbar-track{
		background:#3c454e;
		border:thin solid #1a1f25;
		-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
		-webkit-border-radius: 10px;
		border-radius: 10px;
		}
		::-webkit-scrollbar-thumb{
		background: -webkit-linear-gradient(top, #5aafb0, #4ca06d);
		-webkit-box-shadow:   inset 0 1px 0 rgba(255,255,225,.5),
		inset 1px 0 0 rgba(255,255,255,.4),
		inset 0 1px 2px rgba(255,255,255,.3);

		border:thin solid #232c34;
		border-radius: 10px;
		-webkit-border-radius: 10px;
		}
		::-webkit-scrollbar-thumb:hover{
		background: -webkit-linear-gradient(top, #4ca06d, #5aafb0);
		}
		/* Pseudo-clase */
		::-webkit-scrollbar-thumb:window-inactive {
		background: rgba(77,161,112,.6);
		}
		</style>

		<script type="text/javascript">
	$(document).ready(function(){
	  	/*BEGIN */
		 	$('.file-upload-ajax').on('change',function(){
		 	 	if(confirm("Desea cargar la imagen ?")) {
		 	 		$(this).after('<span class="temp-message">Cargando.....</span>');
		            var formdata = new FormData($("#myform")[0]);
		            $.ajax({
		                type: "POST",
		                url: "config/uploadImage.php?func=uploadfile",
		                enctype: 'multipart/form-data',
		                data: formdata,
		                async: false,
				        contentType: false,
				        processData: false,
				        cache: false,
		               	success: function(msg)
		                {
		                	$response = $.parseJSON(msg);
		               	 	$('.temp-message').text($response.message);
		               	 	$('.file-upload-ajax').val('');
		               	 	$('.uploaded-files').append($response.response_html);
		               	 	$('.uploaded-name').append($response.response_name);
		               	 	document.getElementById('img').value= $response.response_name;

		                }
		                
						//success ends
		            });

		 	 	} else {
		 	 		$('.file-upload-ajax').val('');
		 	 	}
		 	});
	  	/*END */
	});
</script>

