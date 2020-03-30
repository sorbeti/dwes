<?php
require_once('include/BD.php');
require_once('include/Juego.php');
require_once('include/Partida.php');
require_once('include/Equipo.php');
require_once('include/Prueba.php');
require_once('include/libs/Smarty.class.php');

// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])){ 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");
}
//Si venimos de Pag1 y opción Crear Nueva Partida:
if (isset($_SESSION['accionpartida']) && $_SESSION['accionpartida']=="crear"){
    $_SESSION['accion_pag4']='crear';
    //Se recibe Idjuego commoarray. Lo pasamos a valor
    foreach($_SESSION['idJuego'] as $arrayjuego){
        $juegorecibido=$arrayjuego;
        $_SESSION['juegorecibido']=$arrayjuego;
    };
    if(!isset($_SESSION['idJuego'])){$errorGuardarPartida='1';}    
}

//Si venimos de Pag2 y opción Editar Partida:
if (isset($_SESSION['accionpartida']) && $_SESSION['accionpartida']=="editar"){
    $_SESSION['accion_pag4']='editar';
    $accionrecibida=$_SESSION['accionpartida'];
    foreach($_SESSION['idJuego'] as $juegorecibido);
    foreach($_SESSION['idPartida'] as $partidarecibida); 
    $_SESSION['juegopag4']=$juegorecibido;
    $_SESSION['partidapag4']=$partidarecibida; 
}


// Cargamos la librería de Smarty
$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';

//Si venimos de uno de los botones de acción de la propia página
// Si venimos de AÑADIR
if (isset( $_POST['partida_bt']) && $_POST['partida_bt']=='anadir'){
//Comprobamos que existe POST con el campo nombre del equipo a añadir y no está en blanco   
    if (isset($_POST['nombre_equipo']) && $_POST['nombre_equipo']<>''){
        $smarty->assign('creaequipo', BD::creaEquipo());
        
}else{
    echo "<script>alert('Para Añadir equipo a la partida debe introducir \\nNuevo Nombre de Equipo \\nen la celda de texto correspondiente');</script>";

}
}
//Si venimos de uno de los botones de acción de la propia página
// Si venimos de EDITAR

if (isset($_POST['partida_bt']) && $_POST['partida_bt']=='guardar' && isset($_POST['celdatiempo']) && $_SESSION['accion_pag4']=='editar' ){
    if (isset($_POST['celdatiempo'])){
        if ($_POST['celdatiempo']==null){$_POST['celdatiempo']='0';}
        $checktime=ctype_digit(str_replace(":","",$_POST['celdatiempo']));
        if ($checktime==false){
            $errorGuardarPartida='1'; 
            echo "<script>alert('El valor de la celda tiempo de Partida \\ndebe ser numérico');</script>";
        }else{
            $smarty->assign('actualizarTiempo', BD::actualizaTiempo()); 
        }   
    }    
}




// Si venimos de los botones de acción de la propia página y la acción es crear partida
if (isset($_POST['partida_bt']) && $_SESSION['accion_pag4']=='crear'){
    $errorGuardarPartida=0;
    $nombrespartidas =(BD::arrayNombrePartidas());
     

    //comprobamos que la celda nombre no está vacía
    if (isset($_POST['celdanombrepartida']) && $_POST['celdanombrepartida']==''){
        $errorGuardarPartida='1';    
        echo "<script>alert('Para Guardar Nueva Partida el campo \\nNombre de la Partida \\nno puede estar vacío');</script>";
    }

    //comprobamos si el nombre de la nueva partida ya existe
    if (isset($nombrespartidas)){
        $micheck=$_POST['celdanombrepartida'];
        foreach($nombrespartidas as $checkpartida);
        foreach($checkpartida as $checknombre){
            if ($checknombre==$micheck && $errorGuardarPartida!=='1'){
                $errorGuardarPartida='1';
                echo "<script>alert('Nombre de Partida repetido \\nDebe elegir un Nombre de Partida\\nque no exista');</script>";
            }        
        }
    }
        
    //comprobamos si el contenido de tiempo es numérico    
    if (isset($_POST['celdatiempo'])){
        if ($_POST['celdatiempo']==null){$_POST['celdatiempo']='0';}
        $checktime=ctype_digit(str_replace(":","",$_POST['celdatiempo']));
        if ($checktime==false){
            $errorGuardarPartida='1'; 
            echo "<script>alert('El valor de la celda tiempo de Partida \\ndebe ser numérico');</script>";
        }
    }
    
    
    if($errorGuardarPartida=='0'){
        $smarty->assign('equipos', BD::creaPartidaNueva());
    }else{
        echo "<script>alert('No se ha podido completar el proceso \\nde guardar Partida');</script>";
    }
}
// Si venimos de los botones de acción de la propia página refrescamos datos
// O si la acción recibida es EDITAR los cargamos por primera vez
// Recuperamos datos de partida y equipos
if (isset($_POST['partida_bt']) || $_SESSION['accionpartida']=='editar'){
$smarty->assign('partida4', BD::obtienePartida4($partidarecibida));
$smarty->assign('equipos4', BD::obtieneEquiposPag4($partidarecibida));
$smarty->assign('accion_pag4',  $accionrecibida);
}

// En caso contrario CREAR, muestra los campos vacíos, salvo Nombre del juego
// Si venimos de los botones de acción de la propia página refrescamos datos
// O si la acción recibida es EDITAR los cargamos por primera vez
// Recuperamos datos de partida y equipos
if ($_SESSION['accion_pag4']=='editar'){
$smarty->assign('accion_pag4','editar');

}
if ($_SESSION['accion_pag4']=='crear'){
$smarty->assign('accion_pag4','crear');
$crear="terminado";
}
if ($juegorecibido==''){
    $smarty->assign('nombrejuego',"No hay Juego Seleccionado");
}else{
    $smarty->assign('nombrejuego',  BD::nombrejuego($juegorecibido));
}
// Mostramos la plantilla
$smarty->display('partida_pag4.tpl'); 
?>