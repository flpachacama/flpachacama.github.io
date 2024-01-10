<?php


function factorial($valor1) {
    global $resultadoFactorial;
    $total = 1;
    for ($i = $valor1; $i > 1; $i--) {
        $total *= $i;
    }
    $resultadoFactorial = "El factorial del número $valor1 da como resultado $total";
    return $resultadoFactorial;
}


function primo($valor2){

    if($valor2==1 || $valor2==2 || $valor2==3)
        return $bandera=true;

    for($bandera=true , $i=2; $i <=  sqrt ($valor2) ; $i++){
        if($valor2%$i==0){
            $bandera = false;
            break;
        }
    return $bandera;
    }
    
}
function serie($n) {
    $serie = array();
    
    for ($i = 1; $i <= $n; $i++) {
        $factorial = 1;
        
        // Calcular el factorial de $i
        for ($j = 1; $j <= $i; $j++) {
            $factorial *= $j;
        }
        
        // Calcular el término de la serie
        $termino = pow($i, 2) / $factorial;
        
        // Agregar el término a la serie
        $serie[] = $termino;
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
        $resultadoFactorial =" ";
        $resultadoprimo=" ";
        $resultadoserie=" ";
        $opcion =isset($_POST['opcion']) ? $_POST['opcion'] : 0 ;
        ejecutarMenu($opcion);
        }
    
   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        if (isset($_POST['submit_factorial'])) {
            $valor1 = isset($_POST['num1']) ? $_POST['num1'] : 0;
            $opcion=1;
            ejecutarMenu($opcion);
            $resultadoFactorial = factorial($valor1);
        }
        if (isset($_POST['submit_primo'])) {
            $valor2 = isset($_POST['num2']) ? $_POST['num2'] : 0;
            $opcion=2;
            ejecutarMenu($opcion);
            $resultadoprimo=(primo($valor2)) ? "El numero $valor2  es Primo" : "El numero $valor2  no es Primo ";
        }
        if (isset($_POST['submit_serie'])) {
            $valor3 = isset($_POST['num3']) ? $_POST['num3'] : 0;
            $opcion=3;
            ejecutarMenu($opcion);
            $resultadoserie=(implode("+",serie($valor3)));
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
                <h4><p style="color:#1f1450; margin-left: 25px";>Integrante: Freddy Leonel Pachacama Quishpe</p></h4>
                <h4><p style="color:#1f1450; margin-left: 25px";>NRC: 14365</p></h4>
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
                                <h3>Menu 1</h3>
                            </th>
                        </tr>
                        <tr>
                            <th>0</th>
                            <th>REINICIAR</th>
                        </tr>
                        <tr>
                            <th>1</th>
                            <th>FACTORIAL</th>
                        </tr>
                        <tr>
                            <th>2</th>
                            <th>PRIMO</th>
                        </tr>
                        <tr>
                            <th>3</th>
                            <th>SERIE MATEMATICA</th>
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
                        Ingrese el número a calcular el factorial<br><br>
                        <form class="form-group" action="" method="post" style="padding-left:20px;">
                            <!-- Número entre 10 y 50, de 5 en 5. Valor por defecto: 25 -->
                            <input type="number" name="num1" id="numid1" value="0" min="0" max="1000" step="1" />

                            <button type="submit" name="submit_factorial">Submit</button>


                            <br><br>

                        </form>
                        <div><p>'.$resultadoFactorial.'</p></div>
                    </div>
                    <div class="dos">
                    Ingrese el número a calcular el si es primo<br><br>
                    <form class="form-group" action="" method="post" style="padding-left:20px;">
                        <!-- Número entre 10 y 50, de 5 en 5. Valor por defecto: 25 -->
                        <input type="number" name="num2" id="numid2" value="0" min="0" max="1000" step="1" />

                        <button type="submit" class="btn btn-primary" name="submit_primo">Submit</button>


                        <br><br>

                    </form>
                    <div><p>'.$resultadoprimo.'</p></div>
                    </div>
                    <div class="tres">
                    Ingrese el número a calcular la serie metematica<br><br>
                    <form class="form-group" action="" method="post" style="padding-left:20px;">
                        <!-- Número entre 10 y 50, de 5 en 5. Valor por defecto: 25 -->
                        <input type="number" name="num3" id="numid3" value="0" min="0" max="1000" step="1" />

                        <button type="submit" class="btn btn-primary" name="submit_serie">Submit</button>


                        <br><br>

                    </form>
                    </div>
                    <div><p>'.$resultadoserie.'</p></div>

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
