<?php
define('MAX', 1000000);
function encontrarNumerosEspeciales() {
$numerosEspeciales = array();

for ($i = 1; $i <= MAX; $i++) {
    $numero = (string)$i;
    $digitos = str_split($numero);
    $sumaCubos = 0;

    foreach ($digitos as $digito) {
    $sumaCubos += pow($digito, 3);
    }

    if ($sumaCubos == $i) {
    $numerosEspeciales[] = $i;
    }
}

return $numerosEspeciales;
}

function op3($A,$B,$C,$D){

    $Respuesta3=$A+($B*$C)-$D;
    return $Respuesta3;
}

function fibonacci($numTerminos) {
    $serie = array();
  
    // Caso base para los primeros dos términos
    $serie[] = 0;
    $serie[] = 1;
  
    // Generar la serie de Fibonacci
    for ($i = 2; $i < $numTerminos; $i++) {
      $serie[$i] = $serie[$i - 1] + $serie[$i - 2];
    }
  
    return $serie;
  }



function ejecutarMenu($opcion) {

    switch ($opcion) {
        case 0:
            echo '<style>.dos, .uno, .tres { display: none; }</style>';
            break;
        case 1:
            echo '<style>.uno { display: block; }</style>';
            echo '<style>.dos, .tres { display: none; }</style>';
            break;
        case 2:
            echo '<style>.dos { display: block; }</style>';
            echo '<style>.uno, .tres { display: none; }</style>';
            break;
        case 3:
            echo '<style>.tres { display: block; }</style>';
            echo '<style>.uno, .dos { display: none; }</style>';
            break;
        case 4:
            header("Location: ../index.html");
            exit();
        default:
        echo '<style>.dos, .uno, .tres { display: none; }</style>';
            break;

    }
}

function mostrarMenu() {
   
      // Envío automático del formulario solo la primera vez
    if (!isset($_SESSION['formulario_enviado'])) {
        $_SESSION['formulario_enviado'] = true;
        $resultadoFibonacci =" ";
        $resultado2=" ";
        $resultado3=" ";
        $opcion =isset($_POST['opcion']) ? $_POST['opcion'] : 0 ;
        ejecutarMenu($opcion);
        }
    
   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        if (isset($_POST['submit_fibonaci'])) {
            $valor1 = isset($_POST['num1']) ? $_POST['num1'] : 0;
            $opcion=1;
            ejecutarMenu($opcion);
            $resultadoFibonacci =(implode(",",fibonacci($valor1)));
        }
        
        if (isset($_POST['submit_divicion'])) {
            $num1 = isset($_POST['numerador1']) ? $_POST['numerador1'] : 0;
            $den1 = isset($_POST['denominador1']) ? $_POST['denominador1'] : 0;
            $num2 = isset($_POST['numerador2']) ? $_POST['numerador2'] : 0;
            $den2 = isset($_POST['denominador2']) ? $_POST['denominador2'] : 0;
            $num3 = isset($_POST['numerador3']) ? $_POST['numerador3'] : 0;
            $den3 = isset($_POST['denominador3']) ? $_POST['denominador3'] : 0;
            $num4 = isset($_POST['numerador4']) ? $_POST['numerador4'] : 0;
            $den4 = isset($_POST['denominador4']) ? $_POST['denominador4'] : 0;
            $valor3=$num1 / $den1;
            $valor4=$num2 / $den2;
            $valor5=$num3 / $den3;
            $valor6=$num4 / $den4;
            $opcion=3;
            ejecutarMenu($opcion);
            $resultado3=op3($valor3,$valor4,$valor5,$valor6);
        }
        if (isset($_POST['submit_principal'])){
            $opcion = isset($_POST['opcion']) ? $_POST['opcion'] : 0;
            if($opcion==2){                
                $resultado2=" ";
                $resultado = encontrarNumerosEspeciales();
                foreach ($resultado as $numeroEspecial) {
                $resultado2.= $numeroEspecial . ",";
                }
            }
        }   
  
    }


    ob_start();
    echo '<!doctype html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <title>TAREA INDIVIDUAL</title>
        <style type="text/css">
            #background{position:absolute; width:99%; height:130%;}
            #fixed {position:absolute; top: 0px; left: 0px;}
            
        </style>
    </head>

    <body>
        <div>
            <img id="background" src="../Imagenes/fondo.jpg" />
        </div>
        <div id="fixed">
            </br></br></br>
            <div style="padding-left:510px;">
                <img src="../Imagenes/selloespe.jpg" alt="ESPE" height="100">
            </div>
            <div style="padding-left:395px;">
                <h2>
                    <p style="text-align: center";>DEPARTAMENTO DE CIENCIAS DE LA COMPUTACIÓN</p>
                    <p style="text-align: center";>INGENIERÍA EN TECNOLOGIAS</p>
                </h2>
                <h3>
                    <p style="text-align: center" style="color:#165014" ;>APLICACIONES DE TECNOLOGIAS WEB - PHP
                        BASICO</p>
                </h3>
            </div>
            <div style="padding-left:90px;">
                <h4><p style="color:#1f1450; margin-left: 25px";>Integrante: Freddy Lonel Pachacacama </p></h4>
                <h4><p style="color:#1f1450; margin-left: 25px";>NRC: 14365 </p></h4>
                <h4><p style="color:#1f1450; margin-left: 25px";>Fecha: 09/01/2024</p></h4>
            </div>
            <div style="padding-left:250px;">
                <h3>
                    <p style="text-align: center" style="color:#165014" ;>TAREA INDIVIDUAL</p>
                </h3>
            </div>
            <div class="contenedor_menu">
                <div style="padding-left:250px;">
                    <table border="3px" align="center">
                        <tr>
                            <th colspan="2">
                                <h3>Menu 2</h3>
                            </th>
                        </tr>
                        <tr>
                            <th>0</th>
                            <th>REINICIAR</th>
                        </tr>
                        <tr>
                            <th>1</th>
                            <th>FIBONACY</th>
                        </tr>
                        <tr>
                            <th>2</th>
                            <th>CUBO</th>
                        </tr>
                        <tr>
                            <th>3</th>
                            <th>FRACCIONARIOS</th>
                        </tr>
                        <tr>
                            <th>4</th>
                            <th>SALIR</th>
                        </tr>
                    </table>

                    <div style="padding-top:20px;" div="principal">
                        <form action="" method="post">
                            <label for="opcion">Opción:</label>
                            <input type="number" name="opcion" id="opcionid" value='."$opcion".' min="0" max="4" step="1" pattern="[^|]*"/>

                           
                            <button type="submit" name="submit_principal">Submit</button>
                        </form>


                    </div>
                    <div class="uno">
                        Ingrese el número de terminos de fibonacci<br><br>
                        <form class="form-group" action="" method="post" style="padding-left:20px;">
                            
                            <input type="number" name="num1" id="numid1" value="0" min="1" max="50" step="1" />

                            <button type="submit" name="submit_fibonaci">Submit</button>


                            <br><br>

                        </form>
                        <div><p>'.$resultadoFibonacci.'</p></div>
                    </div>
                    <div class="dos">
                
                    <div><p>'.$resultado2.'</p></div>
                    </div>
                    <div class="tres">
                    Ingrese el número a calcular la serie metematica<br><br>
                    <form class="form-group" action="" method="post" style="padding-left:20px;">

                    <table border="3px" align="center">
                    <tr>
                        <th></th>
                        <th>Numerador</th>
                        <th>Denominador</th>                            
                        </th>
                    </tr>
                    <tr>
                        <th>Primer valor</th>
                        <th><input type="number" name="numerador1" id="numerador1" value="0" min="-1000"  step="1" /></th>
                        <th><input type="number" name="denominador1" id="denominador1" value="1" min="1"  step="1" /></th>
                    </tr>
                    <tr>
                        <th>Segundo Valor</th>
                        <th><input type="number" name="numerador2" id="numerador2" value="0"  step="1" /></th>
                        <th><input type="number" name="denominador2" id="denominador2" value="1" min="1"  step="1" /></th>
                    </tr>
                    <tr>
                     <th>Tercer Valor</th>
                        <th><input type="number" name="numerador3" id="numerador3" value="0"   step="1" /></th>
                        <th><input type="number" name="denominador3" id="denominador3" value="1" min="1"  step="1" /></th>
                    </tr>
                    <tr>
                        <th>Cuarto valor</th>
                        <th> <input type="number" name="numerador4" id="numerador4" value="0"  step="1" /></th>
                        <th><input type="number" name="denominador4" id="denominador4" value="1" min="1"  step="1" /></th>
                    </tr>
                    </table>
                 </table>

                        <button type="submit" class="btn btn-primary" name="submit_divicion">Submit</button>


                        <br><br>

                    </form>
                    </div>
                    <div><p>'.$resultado3.'</p></div>

                    <div class="respuesta">
                    </div>
                </div>
            </div>
            <div class="respuesta">

            </div>

        </div>


    </body>

    </html>';
    $menu = ob_get_clean();
    echo $menu;
}

echo mostrarMenu();

?>
