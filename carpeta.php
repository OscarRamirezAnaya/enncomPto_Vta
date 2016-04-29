    <?php
     
		set_time_limit(0);




$ruta = "ftp://lserrano:sandia130@172.20.239.202/ftplety/";


	leer_archivos_y_directorios('.');





    function leer_archivos_y_directorios($ruta)
    {
        // comprobamos si lo que nos pasan es un direcotrio
        if (is_dir($ruta))
        {
            // Abrimos el directorio y comprobamos que
            if ($aux = opendir($ruta))
            {
                while (($archivo = readdir($aux)) !== false)
                {

                		$ruta_completa = $ruta . '/' . $archivo;

                        if (is_dir($ruta_completa))
                        {

                        $num = count(scandir($ruta_completa));

                        echo $ruta_completa. '<br>';
                            
                            leer_archivos_y_directorios($ruta_completa . "/");
                        }

              

                }
            }
        }
     
                closedir($aux);
    
    }
