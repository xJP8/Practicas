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
    @include('partials.nav')
    </TD>
    <TD WIDTH=85% ALIGN=CENTER VALIGN=CENTER>
    @if(Auth::check())
      <h1>Hola, {{ Auth::user()->user }}</h1>
    @endif
    </TD>
   </TR>
  </TABLE>
 </BODY>
</HTML>
