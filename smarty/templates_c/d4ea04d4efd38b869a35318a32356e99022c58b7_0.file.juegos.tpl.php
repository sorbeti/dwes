<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-27 12:10:25
  from '/home/etxea/NetBeansProjects/DWES/06/smarty/templates/juegos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7ddf2153c7a8_76609138',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4ea04d4efd38b869a35318a32356e99022c58b7' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/06/smarty/templates/juegos.tpl',
      1 => 1585305545,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:listajuegos.tpl' => 1,
  ),
),false)) {
function content_5e7ddf2153c7a8_76609138 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 6 : Aplicación completa CrimeBook -->
<!-- crimeBook: pagina1 -->
<html>
    <head>
	<title>Listado de Juegos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>
    <body class="pagpruebas">
        <div class="topnav" id="myTopnav">
            <a href="pagina1.php" class="active">Listado de Juegos</a>
            <a href="pagina2.php">Listado de Partidas</a>
            <a href="pagina3.php">Listado de Pruebas</a>
            <a href="pagina4.php">Partida Nueva/Editar</a>
            <a href="pagina5.php">Juego Nuevo/Editar</a>
            <a href="pagina6.php">Prueba Nueva/Editar</a>
            <a href="pagina7.php">Estadísticas</a>
            <a href="pagina8.php">Crear pista</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
            </a>
	</div>
        <div id="contenedor">
            <div id="encabezado">
                <h2 align="center">Listado de juegos</h2>
            </div>
            <div id="pruebas">
                <?php $_smarty_tpl->_subTemplateRender("file:listajuegos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
        </div>
        <div id="pie">
            <form action='logoff.php' method='post'>
                <input type='submit' name='desconectar' value='Desconectar usuario'/>
            </form>
        </div>
    </body>    
</html><?php }
}
