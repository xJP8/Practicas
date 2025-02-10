<HTML>
 <HEAD>
  <TITLE>
	Acceso de clientes
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
    <H1>Identif&iacute;quese
    </H1>
    <!-- Formulario de identificación -->
  <FORM NAME="" ACTION="?controller=User" METHOD="POST">
    <TABLE>
      <TR>
    <TD ALIGN="RIGHT">
  Usuario:
      </TD>
      <TD>
  <INPUT TYPE="TEXT" NAME="user" required>
      </TD>
      </TR>
      <TR>
      <TD ALIGN="RIGHT">
  Contrase&ntilde;a:
      </TD>
      <TD>
  <INPUT TYPE="password" NAME="pass" required>
      </TD>
      </TR>
      <TR>
      <TD>
      </TD>
      <TD>
  <INPUT TYPE="SUBMIT" NAME="SUBMIT" VALUE="Enviar">
      </TD>
      </TR>
    </TABLE>
    </FORM>
    <!-- Fin del formulario de identificación -->
  </TD>
  </TR>
  </TABLE>
 </BODY>
</HTML>
