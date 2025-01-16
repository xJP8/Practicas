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
            echo "<td>{$mueble['precio']}.00€</td>";
            echo "</tr>";
        }
       ?>
     </TABLE>
    </TD>
   </TR>
  </TABLE>
 </BODY>
</HTML>
