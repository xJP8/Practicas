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
	Informaci&oacute;n de la pieza seleccionada
     </H1>
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

          $pieza = $_POST["pieza"];

          // Creación, preparación y ejecución de la Query.
          $sql = "SELECT P.nombre, sum(E.unidades) FROM Pieza P, Estante E WHERE P.cod = E.cod_pieza AND P.nombre = ?";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("s", $pieza);
          $stmt->execute();

          // Obtención de los resultados.
          $resoult = $stmt->get_result();
          $msg = ""; // Mensaje a mostrar al usuario.

          if ($resoult->num_rows>0) {
               $row = $resoult->fetch_assoc();
               $msg = "Hay ".$row["sum(E.unidades)"]." unidades en almacén de la pieza con nombre: ".$row["nombre"].".";
          } else {
               $msg = "No se encontraron resultados.";
          }

          // Cerramos los recursos y mostramos mensaje.
          $stmt->close();
          $conn->close();
          echo $msg;
     ?>
     <BR>
    </TD>
   </TR>
  </TABLE>
 </BODY>
</HTML>
