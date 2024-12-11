<?php
     session_start();
     
     if (!isset($_SESSION["user"])) {
          header("Location: login.php");
          exit();
     }
?>
<HTML>
 <HEAD>
  <TITLE>
	Existencias
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
	<A HREF="index.php">Principal</A>
	<BR>
	<BR>
	<A HREF="listado.php">Productos</A>
	<BR>
	<BR>
	<?php 
          if (isset($_SESSION["user"])) {
              echo "<A HREF='form_existencias.php'>Disponibilidad de piezas</A>
	               <BR>
	               <BR>
                    <A HREF='logout.php'>Cerrar sesi&oacute;n</A>";
          } else {
               echo "<A HREF='login.php'>Acceso clientes</A>";
          }
     ?>	
    </TD>
    <TD WIDTH=85% ALIGN=CENTER VALIGN=CENTER>
     <H1>
	Disponibilidad de piezas
     </H1>
	Selecci&oacute;n de la pieza para la que se desea conocer su disponibilidad.
     <BR>
     <BR>
     <!-- Formulario de selección de pieza -->
     <FORM NAME="existencias" ACTION="existencias.php" METHOD="POST">
      <TABLE>
       <TR>
        <TD ALIGN="RIGHT">
         Escoja la pieza
        </TD>
        <TD>
	 <SELECT NAME="pieza">
		<OPTION></OPTION>
          <?php           
               $dbHost = "localhost"; // Dirección Host
               $dbUser = "user"; // Nombre Usuario
               $dbPass = "1234"; // Contraseña Usuario
               $dbName = "muebles"; // Nombre Base de Datos
               $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
           
               // Comprobamos que la conexión funcione.
               if ($conn->connect_error) {
                   die("Error en la base de datos");
               }
           
               // Creación y ejecución de la Query.
               $sql = "SELECT nombre FROM Pieza";
               $result = $conn->query($sql);

               if ($result->num_rows > 0) { // Si encuentra existencias las muestra.
                    while($row = $result->fetch_assoc()) {
                         echo "<OPTION>".$row['nombre']."</OPTION>";
                    }
               }
           
               // Cerramos los recursos.
               $conn->close();
          ?>
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
