<HTML>
 <HEAD>
  <TITLE>
	Disponibilidad de pieza
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
    @include('Navegacion')	
    </TD>
    <TD WIDTH=85% ALIGN=CENTER VALIGN=CENTER>
     <H1>
	Informaci&oacute;n de la pieza seleccionada
     </H1>
     <?php
          if ($piezasBD["total_unidades"] <= 0) {
               echo "No se han encontrado unidades en el almacén.";
          } else{
               echo "Hay ".$piezasBD["total_unidades"]." unidades en almacén de la pieza con nombre: ".$piezasBD["nombre"].".";
          }
     ?>
     <BR>
    </TD>
   </TR>
  </TABLE>
 </BODY>
</HTML>