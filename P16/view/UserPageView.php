<HTML>
 <HEAD>
  <TITLE>
	Clientes
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
     <?php
          echo "<H1>Bienvenido ".$_SESSION["user"]."</H1>";
     ?>
    </TD>
   </TR>
  </TABLE>
 </BODY>
</HTML>
