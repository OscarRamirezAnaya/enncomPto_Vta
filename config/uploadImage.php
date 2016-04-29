<?php

if(isset($_REQUEST['func']) && $_REQUEST['func']=="uploadfile")
{
	$Main = new Main();
	$Main->fileupload($_FILES);
}

class Main 
{
	function fileupload($file_array)
	{
		$response  = array();
		/*BEGIN FILE UPLOADING CODE */
			$uploaded_files = array();
			if(isset($file_array['demo_file']) && $file_array['demo_file']['name']!="")
			{
				$currentfile_extension = end(@explode(".",$file_array['demo_file']['name']));
				$filename = date("YmdHis").rand(1000,9999).".".$currentfile_extension;
				//validamos la extension del archivo 
					if ($currentfile_extension != "jpg" 
					&& $currentfile_extension  != "png" 
					&& $currentfile_extension  != "jpeg"
					&& $currentfile_extension  != "gif" 
					) 
				{
						$response['file_name']="";
						$response['message'] = "Error el archivo no es valido .";
						$response['response_html'] = "";
				
				} else {
					
					if(@move_uploaded_file($_FILES['demo_file']['tmp_name'], "../images/product/".$filename))
					{
						$response['file_name']     = $filename;
						$response['message']       = "La imagen a sido guardada.";
						$response['response_html'] = "<img src='http://localhost:8/enncom/images/product/".$filename."' width='100'>";
						$response['response_name'] = "http://localhost:8/enncom/images/product/".$filename;
						
						
					} else {
						$response['file_name']     = "";
						$response['message']       = "Error al cargar.";
						$response['response_html'] = "";
					}
				}	
			}
		/*END FILE UPLOADING CODE */	
		echo json_encode($response);
	}
}
?>