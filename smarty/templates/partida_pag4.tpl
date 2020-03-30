<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 6 : Aplicación completa CrimeBook -->
<!-- crimeBook: pagina4 -->
<html>
    <head>
	<title>Listado de Juegos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>
    <body class="pagpruebas">
        <div class="topnav" id="myTopnav">
            <a href="pagina1.php">Listado de Juegos</a>
            <a href="pagina2.php">Listado de Partidas</a>
            <a href="pagina3.php">Listado de Pruebas</a>
            <a href="pagina4.php" class="active">Partida Nueva/Editar</a>
            <a href="pagina5.php">Juego Nuevo/Editar</a>
            <a href="pagina6.php">Prueba Nueva/Editar</a>
            <a href="pagina7.php">Estadísticas</a>
            <a href="pagina8.php">Crear pista</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
            </a>
	</div>

{assign var="export_accion" value=$accion_pag4}
<p align="center">
{if $accion_pag4 == 'editar'}
    {* Si la entrada es como 'EDITAR' se muestra: *}
    {foreach from=$partida4 item=partida}
        {assign var="partidanombre" value=$partida->getnombre()}
        {assign var="partidaduracion" value=$partida->getduracion()}
    {/foreach}
    {assign var="equipos4" value=$equipos4}
    {$textoboton1="Añadir Equipo a la Partida Cargada"}
    {$textoboton2="Actualizar Tiempo para esta Partida"}
    {$aviso1="Puede modificar el 'Tiempo de Partida' en la celda 'Duración de la Partida'"}
    Acceso para Editar una partida<br>
    Si desea Crear una partida nueva, acceda desde la Página  <a href="pagina1.php">Listado de Juegos</a> y pulse 'Nueva Partida'
{/if}
{if $accion_pag4==  'crear'}
    {* Si la entrada es como 'CREAR' se muestra: *}
    {$textoboton1="Antes de Añadir Equipo debe guardar la Partida Nueva"}
    {$textoboton2="Guardar Nueva Partida"}
    {$aviso1="Para Guardar Nueva Partida rellene celdas de Nombre y Duración<br> y Pulse Botón Guardar Nueva Partida"}
    Acceso para Crear una Nueva Partida<br>
    Si desea Editar una Partida en uso, acceda desde la Página <a href="pagina2.php">Listado de Partidas</a> y pulse 'Editar Partida'
{/if}
<br>
{if $nombrejuego=='No hay Juego Seleccionado'}
   <h2 style="color:#ff0000" align="center">No hay Juego Seleccionado</h2>
{else}
    <div align="center"><h2><p>Juego seleccionado: {$nombrejuego}</h2></p></div>
{/if}
<h2 align="center">Duración de la partida</h2>
<form name="partida" action="pagina4.php" method="post">
<div id="partidas">
    {include file="listapartida.tpl"}
</div>

<h2 align="center">Datos sobre los Equipos</h2>
<div id="equipos">
    {include file="listaequipos.tpl"}
</div>
<br>
{if $accion_pag4 == "editar"}
<p align="center">
Nombre del Equipo:<input type="text" align="center" name="nombre_equipo" placeholder="Introduzca el nombre"><br/>
</p>
{/if}
{if $accion_pag4 == "crear"}
<p align="center">
Nombre del Equipo:<input disabled="true" type="text" align="center" name="nombre_equipo" placeholder="Introduzca el nombre"><br/>
</p>
<p align="center">
Para añadir Equipo a la Partida Creada, primero debe rellenar Tabla 'Duración de la Partida'
</p>
<p align="center">
Y después pulse 'Guardar Nueva Partida'
</p>
{/if}
<div align="center">
    <button {if $accion_pag4 == "crear"} disabled="true" {/if} class="button" name='partida_bt' value='anadir'>{$textoboton1}</button>
    <button class="button" name='partida_bt' value='guardar'>{$textoboton2}</button>
</div>
<br>
</form>
    <div id="pie">
        <form action='logoff.php' method='post'>
            <input type='submit' name='desconectar' value='Desconectar usuario'/>
        </form>
    </div>
</body>    
</html>