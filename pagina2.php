<?php
    require_once('include/BD.php');
    require_once('include/Partida.php');
    require_once('include/Equipo.php');
    require_once('include/libs/Smarty.class.php');

    // Recuperamos la información de la sesión
    session_start();

    // Y comprobamos que el usuario se haya autentificado
    if (!isset($_SESSION['usuario'])) 
        die("Error - debe <a href='login.php'>identificarse</a>.<br />");
    else {
        $seleccionado = $_SESSION['idJuego'];
        $idJuego = $seleccionado['idJuego'];
    }
    
    // Botones
    if (isset($_POST['editarpartida'])) {
        $partida['idPartida'] = $_POST['idPartida'];
        // Incluímos los valores en la sesión
        $_SESSION['idPartida'] = $partida;
        $_SESSION['accionpartida']=null;
        $_SESSION['accionpartida']="editar";
        if (isset($_SESSION['accion_pag4'])) {$_SESSION['accion_pag4']=null;}        
        // Redirige a la página 4
        header("Location: pagina4.php");                    
    }elseif (isset($_POST['estadisticas'])) {
        $partida['idPartida'] = $_POST['idPartida'];
        // Incluímos los valores en la sesión
        $_SESSION['idPartida'] = $partida;
        // Redirige a la página 7
        header("Location: pagina7.php");  
    }elseif (isset($_POST['eliminarpartida'])) {
        $partida['idPartida'] = $_POST['idPartida'];
        $partida = $_POST['idPartida'];
        BD::eliminaPartida($partida);
        header("Location: pagina2.php");
    }

    // Cargamos la librería de Smarty
    $smarty = new Smarty;
    $smarty->template_dir = 'smarty/templates/';
    $smarty->compile_dir = 'smarty/templates_c/';
    $smarty->config_dir = 'smarty/configs/';
    $smarty->cache_dir = 'smarty/cache/';
    
    // obtiene num Equipos por partida de la clase DB pasando como parámetro el código del juego recibido 
    $partidas = BD::obtieneEquipos($idJuego); 
    
    
    // Obtiene las partidas
    //$partidas = BD::muestraPartidas($idJuego);
    // Obtiene el nombre del juego
    $mijuego = BD::nombrejuego($idJuego);
    
    // Ponemos a disposición de la plantilla los datos necesarios
    $smarty->assign('usuario', $_SESSION['usuario']);
    //$smarty->assign('equipos', $equipos);
    $smarty->assign('partidas', $partidas);
    $smarty->assign('cod', $idJuego);
    $smarty->assign('mijuego', $mijuego);
    
    // Mostramos la plantilla
    $smarty->display('partidas.tpl');     
?>