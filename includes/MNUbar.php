<!--
<div class="menu">
    <div class="logo"><img src="img/fidelitas.png" class="imglogo w60"></div>
    <div class="menuitem ocultarnombre"><b>Bienvenido, <?php echo $_SESSION["nombreyapellido"]?></b></div>
    <div class="btnmenuitem"><button id="btnCerrarSesion" name="btnCerrarSesion" class="app-button-st"><i class="fas fa-power-off"></i>&nbsp;&nbsp;Cerrar Sesión</button></div>
</div>
-->
<header>
    <img src="img/fidelitas.png" class="imglogo w60">

    <div>
        <a class="ocultarnombre"><i class="fas fa-user"></i>&nbsp;</a> 
        <a class="ocultarnombre"><?php echo $_SESSION["nombreyapellido"]?>&nbsp;&nbsp;</a> 
        <button id="btnCerrarSesion" name="btnCerrarSesion" class="app-button-st"><i class="fas fa-power-off"></i>&nbsp;&nbsp;Cerrar Sesión</button>
    </div>
</header>    