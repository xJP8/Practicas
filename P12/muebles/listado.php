<?php
  session_start();   
?>
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
	Listado de productos
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
          $dbHost = "sql7.freemysqlhosting.net"; // Dirección Host
          $dbUser = "sql7751449"; // Nombre Usuario
          $dbPass = "VGD4EMEjQA"; // Contraseña Usuario
          $dbName = "sql7751449"; // Nombre Base de Datos
          $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

          // Comprobamos que la conexión funcione.
          if ($conn->connect_error) {
               die("Error en la base de datos");
          }

          // Creación y ejecución de la Query.
          $sql = "SELECT nombre, precio FROM Mueble";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) { // Si encuentra existencias las muestra.
               while($row = $result->fetch_assoc()) {
                    echo "<TR>
                          <TD ALIGN='CENTER'>" . $row["nombre"] . "</TD>
                          <TD ALIGN='CENTER'>" . number_format($row["precio"], 2) . " €</TD>
                          </TR>";
               }
          } else { // Si no encuentra existencias muestra mensaje de que no hay.
               echo "<TR>
                     <TD ALIGN='CENTER' COLSPAN=2>No hay muebles en la base de datos</TD>
                     </TR>";
          }

          // Cerramos los recursos y mostramos mensaje.
          $conn->close();
     ?>
     </TABLE>
    </TD>
   </TR>
  </TABLE>
 </BODY>
</HTML>
