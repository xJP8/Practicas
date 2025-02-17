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
        @foreach($muebles as $mueble)
            <tr>
                <td>{{ $mueble->nombre }}</td>
                <td>{{ $mueble->precio }}</td>
            </tr>
        @endforeach
     </TABLE>
     <div class="pagination">
        @if ($muebles->onFirstPage())
            <span class="disabled">«</span>
        @else
            <a href="{{ route('mueble', ['page' => $muebles->currentPage() - 1]) }}">«</a>
        @endif

        @foreach ($muebles->getUrlRange(1, $muebles->lastPage()) as $page => $url)
            @if ($page == $muebles->currentPage())
                <span class="active">{{ $page }}</span>
            @else
                <a href="{{ route('mueble', ['page' => $page]) }}">{{ $page }}</a>
            @endif
        @endforeach

        @if ($muebles->hasMorePages())
            <a href="{{ route('mueble', ['page' => $muebles->currentPage() + 1]) }}">»</a>
        @else
            <span class="disabled">»</span>
        @endif
    </div>
    </TD>
   </TR>
  </TABLE>
 </BODY>
</HTML>
