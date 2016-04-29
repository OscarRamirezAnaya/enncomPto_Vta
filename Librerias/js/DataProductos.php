<?php
class AnexGrid
{
    public $limite = 0;
    public $pagina = 0;
    public $columna = '';
    public $columna_orden = '';
    public $filtros = array();
    public $parametros = array();
    
    public function __CONSTRUCT()
    {
        /* Cantidad de registros por página */
        $this->limite = $_REQUEST['limite'];
        if(!is_numeric($this->limite)) return;
        
        /* Desde que número de fila va a paginar */
        $this->pagina = $_REQUEST['pagina'] - 1;
        if(!is_numeric($this->pagina)) return;
        
        if( $this->pagina > 0) $this->pagina = $this->pagina * $this->limite;
        
        /* Ordenamiento de las filas */
        $this->columna = $_REQUEST['columna'];
        $this->columna_orden = $_REQUEST['columna_orden'];
        
        /* Filtros */
        if(isset($_REQUEST['filtros']))
            $this->filtros = $_REQUEST['filtros'];
        
        /* Parametros adicionales */
        if(isset($_REQUEST['parametros']))
            $this->parametros = $_REQUEST['parametros'];
    }
    
    public function responde($data, $total)
    {
        return json_encode(array(
            'data' => $data,
            'total' => $total
        ));
    }
}

try
{
    $anexGrid = new AnexGrid();
    
    /* Si es que hay filtro, tenemos que crear un WHERE dinámico */
    $wh = "id > 0";
    
    foreach($anexGrid->filtros as $f)
    {
        if($f['columna'] == 'nombreProducto') $wh .= " AND nombreProducto LIKE '%" . addslashes ($f['valor']) . "%'";
        if($f['columna'] == 'precio') $wh .= " AND a.precio LIKE '%" . addslashes ($f['valor']) . "%'";
        if($f['columna'] == 'costo') $wh .= " AND a.costo LIKE '%" . addslashes ($f['valor']) . "%'";
        if($f['columna'] == 'nombreCliente') $wh .= " AND nombreCliente LIKE '%" . addslashes ($f['valor']) . "%'";
        //if($f['columna'] == 'Sexo' && $f['valor'] != '') $wh .= " AND Sexo = '" . addslashes ($f['valor']) . "'";
       // if($f['columna'] == 'Profesion_id' && $f['valor'] != '') $wh .= " AND Profesion_id = '" . addslashes ($f['valor']) . "'";
    }
    
    /* Nos conectamos a la base de datos */
    $db = new PDO("mysql:dbname=pto_vta;host=localhost;charset=utf8", "root", "" );
    //$db = new PDO("mysql:dbname=anexsoft_anexgrid;host=localhost;charset=utf8", "anexsoft_admin", "aspodiaowpdas234" );
    
    /* Nuestra consulta dinámica */
    $registros = $db->query("
        SELECT 
           *
        FROM V_PRODUCTOS 
        WHERE $wh ORDER BY $anexGrid->columna $anexGrid->columna_orden
        LIMIT $anexGrid->pagina,$anexGrid->limite")->fetchAll(PDO::FETCH_ASSOC
     );

    
    $total = $db->query("
        SELECT COUNT(*) Total
        FROM V_PRODUCTOS 
        WHERE $wh
    ")->fetchObject()->Total;
    
    // foreach($registros as $k => $r)
    // {
    //     $profesion = $db->query("SELECT * FROM Productos p WHERE p.id = " . $r['Profesion_id'])
    //                     ->fetch(PDO::FETCH_ASSOC);
        
    //     $registros[$k]['Productos'] = $profesion;
    // }

    header('Content-type: application/json');
    print_r($anexGrid->responde($registros, $total));
}
catch(PDOException $e)
{
    echo $e->getMessage();
}