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
     @include('partials.nav')	
    </TD>
    <TD WIDTH=85% ALIGN=CENTER VALIGN=CENTER>
     <H1>
	Informaci&oacute;n de la pieza seleccionada
     </H1>
          @if ($pieza->unidades <= 0) 
               No se han encontrado unidades en el almacén.
          @else
               Hay {{ $pieza->unidades }} unidades en almacén de la pieza con nombre: {{ $pieza->unidades }}.
          @endif
     <BR>
    </TD>
   </TR>
  </TABLE>
 </BODY>
</HTML>
