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
    @include('partials.nav')	
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
      @foreach ($mueblesBD as $mueble)
      <tr>
        <td>{{ $mueble['nombre'] }}</td>
        <td>{{ number_format($mueble['precio'], 2) }}€</td>
      </tr>
      @endforeach
     </TABLE>
    <div style="margin-top: 20px;">
      @if($pagina > 1)
      <a href="{{ url('mueble/1') }}" style="text-decoration: none; padding: 8px 16px; background-color: #4CAF50; color: white; border-radius: 5px;">&laquo; Primero</a>
      @endif
      @if($pagAnt >= 1)
       <a href="{{ url('mueble/' . $pagAnt) }}" style="text-decoration: none; padding: 8px 16px; background-color: #4CAF50; color: white; border-radius: 5px;">&lsaquo; Anterior</a>
      @endif
      <span style="padding: 8px 16px; background-color: #f1f1f1; border-radius: 5px;">{{ $pagina . '/' . $pagUlt }}</span>
      @if($pagPos <= $pagUlt)
       <a href="{{ url('mueble/' . $pagPos) }}" style="text-decoration: none; padding: 8px 16px; background-color: #4CAF50; color: white; border-radius: 5px;">Siguiente &rsaquo;</a>
      @endif
      @if($pagina < $pagUlt)
      <a href="{{ url('mueble/' . $pagUlt) }}" style="text-decoration: none; padding: 8px 16px; background-color: #4CAF50; color: white; border-radius: 5px;">Último &raquo;</a>
      @endif
    </div>
    </TD>
   </TR>
  </TABLE>
 </BODY>
</HTML>
