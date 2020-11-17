<?php

require_once('utilidades.php');

if (isset($_GET['url'])) {
    
    $var = $_GET['url'];

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        
        $numero = intval(preg_replace('/[^0-9]+/','',$var), 10);

        switch ($var) {
            case 'clientes_turismo':
                
                $resClientes_turismo = clientes_turismo();

                print_r( json_encode($resClientes_turismo) );

                break;

            case "clientes_turismo/$numero":
                
                $resClientes_turismo = clientes_turismoID($numero);

                print_r( json_encode($resClientes_turismo) );

                break;
            
            default:
                


                break;
        }

    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $postBody = file_get_contents('php://input');

        $convertir = json_decode($postBody, true);

        if (json_last_error() == 0) {

            switch ($var) {
                case 'clientes_turismo':
                    
                    echo AgregarCliente($convertir);
                    http_response_code(200);
    
                    break;
                
                default:
                    
    
    
                    break;
            }

        } else {

            http_response_code(400);

        }


    } else {
        
        http_response_code(405);

    }
 
} else {

    //Metadata
    ?>

    <link rel="stylesheet" href="css/styles.css">

    <div class="container">
        <h1>Metadata</h1>
        <div class="divbody">

            <p>Clientes Truismo</p>
            <code>
                POST /clientes_turismo
            </code>
            <code>
                GET /clientes_turismo
                <br/>
                GET /clientes_turismo/$id
            </code>

        </div>
    </div>

    <?php

}



?>