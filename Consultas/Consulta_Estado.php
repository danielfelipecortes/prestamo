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
  <th><a href="../PrestamoDigital.php" class="text-white">Inicio</a></th> 
  <th><a href="Consulta_Estado.php" class="text-white">Actualizar</a></th>
  <th><a href="Consulta_Fechas.php" class="text-white">Consulta fechas</a></th> 
  <th><a href="Consulta_Activo.php" class="text-white">Consulta equipos</a></th>
  <th><a href="Consulta_Usuario.php" class="text-white">Consulta usuarios</a></th>
  <th><a href="Consulta_Razon.php" class="text-white">Consulta razones</a></th>
</tr> </table>
</nav>
    <header>
        <div style = "text-align:center;"><h2>Consulta por estado</h2></div> 
    </header> 
    <?php error_reporting (0);?>
    <?php
          function getCondicion(){
	      return $_POST["Condicion"];
          }
    ?>
    <nav class="navbar navbar-expand-sm bg-success navbar-dark">  
    <div class="dropdown">
      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Consulta por estado</button>
      <div class="dropdown-menu">                 
        <form method="POST" action="Consulta_Estado.php" class="dropdown-item">
            <label for="Condicion">Ingrese un estado de prestamo:</label>
            <select name="Condicion" id="Condicion">
                	<?php 
                	$rs = mysqli_query($cn,"SELECT DISTINCT P.Estado,H.Condicion FROM Prestamo P INNER JOIN Estado H ON P.Estado=H.Id");
                	$n=mysqli_num_rows($rs);
                	for($i=0;$i<$n;$i++){
                		$row= mysqli_fetch_array($rs);
                		$id=$row["Estado"];
                    $con=$row["Condicion"];
                    echo "<option value='".$id."'>".$con."</option>";}
                	$con=getCondicion(); 
                	$consulta=mysqli_query($cn,"SELECT Condicion FROM Estado where id='$con'");
	                $row= mysqli_fetch_array($consulta);
	                $con=$row["Condicion"];
                	?>
            </select>
            <br>              
	        <input type="Submit" value="Buscar" name="Buscar" id="Buscar">
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
                          INNER JOIN Equipo O ON G.Equipo = O.Id WHERE H.Condicion = '$con'";
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
    <?php include ("C_conexion.php")?>
</body>
</html>	 