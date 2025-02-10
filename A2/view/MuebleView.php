<HTML>
 <HEAD>
  <TITLE>
	Listado de muebles
  </TITLE>
 </HEAD>
 <BODY>
  <TABLE HEIGHT=15% WIDTH=100%>
   <TR>
    <TD BGCOLOR="FFFFDD" ALIGN=CENTER VALIGN=CENTER>
     <H1>
	Muebles Posada
     </H1>
    </TD>
   </TR>
  </TABLE> 
  <TABLE HEIGHT=85% WIDTH=100%>
   <TR>
    <TD WIDTH=15% BGCOLOR="DDFFFF" VALIGN=CENTER>
	<?php 
          require_once __DIR__ . '/Navegacion.php';
     ?>		
    </TD>
    <TD WIDTH=85% ALIGN=CENTER VALIGN=CENTER>
     <H1>
	Listado de muebles
     </H1>
     <BR>
     <TABLE BORDER=1>
       <TR>
        <TD ALIGN="CENTER" BGCOLOR=E7E7E7>
		<B>Nombre</B>
        </TD>
        <TD ALIGN="CENTER" BGCOLOR=E7E7E7>
		<B>Precio</B>
        </TD>
       </TR>
       <?php
          foreach ($mueblesBD as $mueble) {
            echo "<tr>";
            echo "<td>{$mueble['nombre']}</td>";
            echo "<td>".number_format($mueble['precio'], 2)."€</td>";
            echo "</tr>";
        }
       ?>
     </TABLE>
    <div style="margin-top: 20px;">
      <?php if($pagina > 1): ?>
      <a href="index.php?controller=Mueble&pagina=1" style="text-decoration: none; padding: 8px 16px; background-color: #4CAF50; color: white; border-radius: 5px;">&laquo; Primero</a>
      <?php endif; ?>
      <?php if($pagAnt >= 1): ?>
       <a href="index.php?controller=Mueble&pagina=<?php echo $pagAnt; ?>" style="text-decoration: none; padding: 8px 16px; background-color: #4CAF50; color: white; border-radius: 5px;">&lsaquo; Anterior</a>
      <?php endif; ?>
      <span style="padding: 8px 16px; background-color: #f1f1f1; border-radius: 5px;"><?php echo $pagina . "/" . $pagUlt; ?></span>
      <?php if($pagPos <= $pagUlt): ?>
       <a href="index.php?controller=Mueble&pagina=<?php echo $pagPos; ?>" style="text-decoration: none; padding: 8px 16px; background-color: #4CAF50; color: white; border-radius: 5px;">Siguiente &rsaquo;</a>
      <?php endif; ?>
      <?php if($pagina < $pagUlt): ?>
      <a href="index.php?controller=Mueble&pagina=<?php echo $pagUlt; ?>" style="text-decoration: none; padding: 8px 16px; background-color: #4CAF50; color: white; border-radius: 5px;">Último &raquo;</a>
      <?php endif; ?>
    </div>     
    </TD>
   </TR>
  </TABLE>
 </BODY>
</HTML>
