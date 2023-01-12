<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <title>PD</title>
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css" media="screen">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</head>
<body>
<?php include ("A_conexion.php")?> 
<nav class="navbar navbar-expand-sm bg-success navbar-dark">  
<table> <tr> 
  <th><a href="../PrestamoDigital.php"class="text-white">Inicio</a></th> 
  <th><a href="Consulta_Usuario.php" class="text-white">Actualizar</a></th>
  <th><a href="Consulta_Fechas.php"class="text-white">Consulta fechas</a></th> 
  <th><a href="Consulta_Activo.php"class="text-white">Consulta equipos</a></th>
  <th><a href="Consulta_Razon.php"class="text-white">Consulta razones</a></th>
  <th><a href="Consulta_Estado.php"class="text-white">Consulta estados</a></th>
</tr> </table>
</nav>
    <header>
        <div style = "text-align:center;"><h2>Consulta por cedula  o nombre de usuario</h2></div> 
    </header> 
    <?php error_reporting (0);?> 
    <?php
          function getIdentificacion(){
	      return $_POST["Identificacion"];
          }
          function getNombre(){
	      return $_POST["Nombre"];
          }
          function getActivo(){
        return $_POST["Activo"];
          }
    ?>  
    
  <nav class="navbar navbar-expand-sm bg-success navbar-dark">  
    <div class="dropdown">
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Consulta por cedula de usuario</button>
      <div class="dropdown-menu">               
        <form method="POST" action="Consulta_Usuario.php" class="dropdown-item">
            <label for="Identificacion">Ingrese cedula de usuario:</label>
            <select name="Identificacion" id="Identificacion">
                	<?php 
                	$rs = mysqli_query($cn,"SELECT DISTINCT P.Usuario,N.Identificacion FROM Prestamo P INNER JOIN Usuario N ON P.Usuario=N.Id");
                	$n=mysqli_num_rows($rs);
                	for($i=0;$i<$n;$i++){
                		$row= mysqli_fetch_array($rs);
                		$id=$row["Usuario"];
                    $cedula=$row["Identificacion"];
                    echo "<option value='".$id."'>".$cedula."</option>";}
                	$cedula=getIdentificacion(); 
                	$consulta=mysqli_query($cn,"SELECT Identificacion FROM Usuario where id='$cedula'");
	                $row= mysqli_fetch_array($consulta);
	                $cedula=$row["Identificacion"];
                	?>
            </select>
            <br>              
	        <input type="Submit" value="Buscar" name="Buscar" id="Buscar">
	      </form>
      </div>  
	  </div>   
    <div class="dropdown"> 
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Consulta por nombre de usuario</button>
      <div class="dropdown-menu">
	      <form method="POST" action="Consulta_Usuario.php" class="dropdown-item">
            <label for="Nombre">Ingrese nombre de usuario:</label>
            <select name="Nombre" id="Nombre">
                	<?php 
                	$rs = mysqli_query($cn,"SELECT DISTINCT P.Usuario,N.U_Nombre FROM Prestamo P INNER JOIN Usuario N ON P.Usuario=N.Id");
                	$n=mysqli_num_rows($rs);
                	for($i=0;$i<$n;$i++){
                		$row= mysqli_fetch_array($rs);
                		$id=$row["Usuario"];
                    $nom=$row["U_Nombre"];
                    echo "<option value='".$id."'>".$nom."</option>";}
                	$nom=getNombre(); 
                	$consulta=mysqli_query($cn,"SELECT U_Nombre FROM Usuario where id='$nom'");
	                $row= mysqli_fetch_array($consulta);
	                $nom=$row["U_Nombre"];
                	?>
            </select>
            <br>
            <input type="Submit" value="Buscar" name="Buscar" id="Buscar">
	      </form>
      </div> 
    </div>
    <div class="dropdown"> 
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Retornar equipo</button>
      <div class="dropdown-menu">
        <form method="POST" action="Consulta_Usuario.php" class="dropdown-item">
            <label for="Nombre">Ingrese nombre de usuario:</label>
            <select name="Nombre" id="Nombre">
                  <?php 
                  $rs = mysqli_query($cn,"SELECT DISTINCT P.Usuario,N.U_Nombre FROM Prestamo P INNER JOIN Usuario N ON P.Usuario=N.Id");
                  $n=mysqli_num_rows($rs);
                  for($i=0;$i<$n;$i++){
                    $row= mysqli_fetch_array($rs);
                    $id=$row["Usuario"];
                    $nom=$row["U_Nombre"];
                    echo "<option value='".$id."'>".$nom."</option>";}
                  $nom=getNombre(); 
                  $consulta=mysqli_query($cn,"SELECT U_Nombre FROM Usuario where id='$nom'");
                  $row= mysqli_fetch_array($consulta);
                  $nom=$row["U_Nombre"];
                  ?>
            </select>
            <br>
           <label for="Activo">Ingrese activo fijo:</label>
            <select name="Activo" id="Activo">
                  <?php 
                  $rs = mysqli_query($cn,"SELECT DISTINCT N.Activo,G.Codigo FROM Prestamo N INNER JOIN Activo G ON N.Activo=G.Id");
                  $n=mysqli_num_rows($rs);
                  for($i=0;$i<$n;$i++){
                    $row= mysqli_fetch_array($rs);
                    $id=$row["Activo"];
                        $dgt=$row["Codigo"];
                        echo "<option value='".$id."'>".$dgt."</option>";}
                  $dgt=getActivo(); 
                  $consulta=mysqli_query($cn,"SELECT Codigo FROM Activo where id='$dgt'");
                  $row= mysqli_fetch_array($consulta);
                  $dgt=$row["Codigo"];
                  ?>
            </select>
            <br>
            <input type="Submit" value="Devolver" name="Devuelto" id="Devuelto">
        </form>
      </div> 
    </div>
      <div class="dropdown"> 
         <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Extender prestamo</button>
         <div class="dropdown-menu">  
           <form method="POST" action="Consulta_Usuario.php" class="dropdown-item">
         <label for="Mod">Fecha:</label>
         <input type="DATE" name="Mod" id="Mod"/>
         <br>
            <label for="Nombre">Ingrese nombre de usuario:</label>
            <select name="Nombre" id="Nombre">
                  <?php 
                  $rs = mysqli_query($cn,"SELECT DISTINCT P.Usuario,N.U_Nombre FROM Prestamo P INNER JOIN Usuario N ON P.Usuario=N.Id");
                  $n=mysqli_num_rows($rs);
                  for($i=0;$i<$n;$i++){
                    $row= mysqli_fetch_array($rs);
                    $id=$row["Usuario"];
                    $nom=$row["U_Nombre"];
                    echo "<option value='".$id."'>".$nom."</option>";}
                  $nom=getNombre(); 
                  $consulta=mysqli_query($cn,"SELECT U_Nombre FROM Usuario where id='$nom'");
                  $row= mysqli_fetch_array($consulta);
                  $nom=$row["U_Nombre"];
                  ?>
            </select>
            <br>
           <label for="Activo">Ingrese activo fijo:</label>
            <select name="Activo" id="Activo">
                  <?php 
                  $rs = mysqli_query($cn,"SELECT DISTINCT N.Activo,G.Codigo FROM Prestamo N INNER JOIN Activo G ON N.Activo=G.Id");
                  $n=mysqli_num_rows($rs);
                  for($i=0;$i<$n;$i++){
                    $row= mysqli_fetch_array($rs);
                    $id=$row["Activo"];
                        $dgt=$row["Codigo"];
                        echo "<option value='".$id."'>".$dgt."</option>";}
                  $dgt=getActivo(); 
                  $consulta=mysqli_query($cn,"SELECT Codigo FROM Activo where id='$dgt'");
                  $row= mysqli_fetch_array($consulta);
                  $dgt=$row["Codigo"];
                  ?>
            </select>            
         <br>
         <input type="Submit" value="Extender" name="Extender" id="Extender">   
           </form>
           </div>
        </div>     
	</nav>    
      <table border="1" >
	    <tr>
	       <td>Cedula</td><td>Nombre</td><td>Razon</td><td>Activo</td><td>Equipo</td><td>Accesorios</td><td>Encargado</td><td>Entrega</td><td>Devolucion</td><td>Estado</td><td>Observaciones</td>
	    </tr>
	    <?php
           $sql="SELECT DATE_FORMAT(N.Fecha,'%d/%m/%Y') AS Fecha,P.Identificacion AS Usuario,P.U_Nombre,K.Motivos,G.Codigo,O.Tipo,B.A_Tipo,F.E_Nombre,DATE_FORMAT(N.Devolucion,'%d/%m/%Y') AS Devolucion,H.Condicion,L.Detalles FROM Prestamo N 
                          INNER JOIN Razon K ON N.Razon = K.Id
                          INNER JOIN Accesorio B ON N.Accesorios = B.Id
                          INNER JOIN Estado H ON N.Estado = H.Id
                          INNER JOIN Observacion L ON N.Observaciones = L.Id
                          INNER JOIN Usuario P ON N.Usuario = P.Id
                          INNER JOIN Encargado F ON N.Encargado = F.Id
                          INNER JOIN Activo G ON N.Activo = G.Id
                          INNER JOIN Equipo O ON G.Equipo = O.Id WHERE P.Identificacion = '$cedula' OR P.U_Nombre = '$nom'";
           $result=mysqli_query($cn,$sql);
           while($mostrar=mysqli_fetch_array($result)){
	    ?>
	    <tr>
	       <td><?php echo $mostrar['Usuario'] ?></td>
	       <td><?php echo $mostrar['U_Nombre'] ?></td>
	       <td><?php echo $mostrar['Motivos'] ?></td>
	       <td><?php echo $mostrar['Codigo'] ?></td>
	       <td><?php echo $mostrar['Tipo'] ?></td>
	       <td><?php echo $mostrar['A_Tipo'] ?></td>
	       <td><?php echo $mostrar['E_Nombre'] ?></td>
	       <td><?php echo $mostrar['Fecha'] ?></td>
	       <td><?php echo $mostrar['Devolucion'] ?></td>
	       <td><?php echo $mostrar['Condicion'] ?></td>
	       <td><?php echo $mostrar['Detalles'] ?></td>
	    </tr>
	    <?php 
	       }
	    ?>
	    </table>
	    <h5>Datos de usuario</h5> 
	    <table border="1" >
	    <tr>
	       <td>Area</td><td>Cargo</td><td>Oficina</td><td>Contacto</td><td>Correo</td>
	    </tr>
	    <?php
           $sql="SELECT C.Dependencia,D.Puesto,M.Ubicacion,P.Contacto,P.Correo FROM Usuario P INNER JOIN Area C ON P.Area = C.Id 
                                                                                              INNER JOIN Cargo D ON P.Cargo = D.Id
                                                                                              INNER JOIN Oficina M ON P.Oficina = M.Id
                                                                                              WHERE P.Identificacion = '$cedula' OR P.U_Nombre = '$nom'";
           $result=mysqli_query($cn,$sql);
           while($mostrar=mysqli_fetch_array($result)){
	    ?>
	    <tr>
	       <td><?php echo $mostrar['Dependencia'] ?></td>
	       <td><?php echo $mostrar['Puesto'] ?></td>
	       <td><?php echo $mostrar['Ubicacion'] ?></td>
	       <td><?php echo $mostrar['Contacto'] ?></td>
	       <td><?php echo $mostrar['Correo'] ?></td>
	    </tr>
	    <?php 
	       }
	    ?>
	    </table>	
       <?php 
       if(isset($_POST["Devuelto"])){
        $sql = "UPDATE Prestamo N INNER JOIN Usuario P ON N.Usuario = P.Id Set Estado='2' WHERE P.U_Nombre='$nom'";
            $result=mysqli_query($cn,$sql);
       }
       ?> 
      <?php
          $Mod = "1970-01-01";
          if(isset($_POST["Extender"])){
            $Mod = date('Y-m-d',strtotime($_POST['Mod']));
            $sql = "UPDATE Prestamo N INNER JOIN Usuario P ON N.Usuario = P.Id INNER JOIN Activo G ON N.Activo = G.Id Set Devolucion='$Mod', Estado='5' WHERE P.U_Nombre='$nom' AND G.Codigo = '$dgt'";
            $result=mysqli_query($cn,$sql); 
          }
      ?>     
    <?php include ("C_conexion.php")?>
</body>
</html> 