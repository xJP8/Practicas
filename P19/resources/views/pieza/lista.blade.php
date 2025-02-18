<HTML>
 <HEAD>
  <TITLE>
	PIEZAS
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
	Disponibilidad de piezas
     </H1>
	Selecci&oacute;n de la pieza para la que se desea conocer su disponibilidad.
     <BR>
     <BR>
     <!-- Formulario de selección de pieza -->
     <FORM NAME="existencia" ACTION="{{ route('listar') }}" METHOD="POST">
     @csrf 
     <TABLE>
       <TR>
        <TD ALIGN="RIGHT">
         Escoja la pieza
        </TD>
        <TD>
      <SELECT NAME="existencia">
          <OPTION></OPTION>
            @foreach ($piezas as $pieza)
                  <OPTION value="{{ $pieza->cod }}">{{ $pieza->nombre }}</OPTION>
            @endforeach
	 </SELECT>
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
    </TD>
   </TR>
  </TABLE>
 </BODY>
</HTML>
