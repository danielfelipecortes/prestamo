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
    <?php error_reporting (0);?> 
    <?php
          function getNombre(){
	      return $_POST["Nombre"];
          }
    ?> 
<nav class="navbar navbar-expand-sm bg-success navbar-dark">	
<table> <tr> 
	<th><a href="../PrestamoDigital.php" class="text-white">Inicio</a></th> 
	<th><a href="Consulta_Fechas.php" class="text-white">Actualizar</a></th> 
	<th><a href="Consulta_Activo.php" class="text-white">Consulta equipos</a></th> 
	<th><a href="Consulta_Usuario.php" class="text-white">Consulta usuarios</a></th>
	<th><a href="Consulta_Razon.php" class="text-white">Consulta razones</a></th>
	<th><a href="Consulta_Estado.php" class="text-white">Consulta estados</a></th>
</tr> </table>
</nav>
    <header>
        <div style = "text-align:center;"><h2>Consultas por fechas</h2></div> 
    </header> 
    <nav class="navbar navbar-expand-sm bg-success navbar-dark"> 
    	<div class="dropdown"> 
    	   <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Consulta por fecha entrega</button>
    	   <div class="dropdown-menu">
           <form method="POST" action="Consulta_Fechas.php" class="dropdown-item">
    	   <label for="Fec">Fecha:</label>
	       <input type="DATE" name="Fec" id="Fec"/>
	       <br>
	       <input type="Submit" value="Buscar" name="Buscar" id="Buscar">    
           </form>
           </div>
        </div>   
        <div class="dropdown"> 
           <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Consulta por fecha devolucion</button>	
           <div class="dropdown-menu">
           <form method="POST" action="Consulta_Fechas.php" class="dropdown-item">
    	   <label for="Dev">Fecha:</label>
	       <input type="DATE" name="Dev" id="Dev"/>
	       <br>
	       <input type="Submit" value="Buscar" name="Mirar" id="Mirar">    
           </form>
           </div> 
        </div>   
        <div class="dropdown"> 
           <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Consulta por temporada</button>	
           <div class="dropdown-menu">
           <form method="POST" action="Consulta_Fechas.php" class="dropdown-item">
    	   <label for="Ini">Fecha inicio:</label>
	       <input type="DATE" name="Ini" id="Ini"/>
	       <br>
	       <label for="Fin">Fecha final:</label>
	       <input type="DATE" name="Fin" id="Fin"/>
	       <br>
	       <input type="Submit" value="Buscar" name="Revisar" id="Revisar">    
           </form>
           </div> 
        </div>                       
	    <div class="dropdown"> 
	       <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Extender o devolver</button>
	       <div class="dropdown-menu">	
           <form method="POST" action="Consulta_Fechas.php" class="dropdown-item">
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
	       <input type="Submit" value="Extender" name="Extender" id="Extender"> 
	       <input type="Submit" value="Devolver" name="Devolver" id="Devolver">    
           </form>
           </div>
        </div>   
     </nav>
	<br>
        <table border="1" >
	    <tr>
	       <td>Fecha</td><td>Codigo</td><td>Nombre</td><td>Razon</td><td>Activo</td><td>Equipo</td><td>Accesorios</td><td>Encargado</td><td>Devolucion</td><td>Estado</td><td>Observaciones</td>
	    </tr>
	    <?php
	        $Fec = "1970-01-01";
	        $Dev = "1970-01-01";
	        $Ini = "1970-01-01";
	        $Fin = "1970-01-01";
	        if(isset($_POST["Buscar"])){
	   	    $Fec = date('Y-m-d',strtotime($_POST['Fec']));
           $sql="SELECT N.Id,DATE_FORMAT(N.Fecha,'%d/%m/%Y') AS Fecha,N.Dependencia,P.Identificacion AS Usuario,P.U_Nombre,K.Motivos,G.Codigo,O.Tipo,B.A_Tipo,F.E_Nombre,DATE_FORMAT(N.Devolucion,'%d/%m/%Y') AS Devolucion,H.Condicion,L.Detalles FROM Prestamo N INNER JOIN Razon K ON N.Razon = K.Id
                          INNER JOIN Accesorio B ON N.Accesorios = B.Id
                          INNER JOIN Estado H ON N.Estado = H.Id
                          INNER JOIN Observacion L ON N.Observaciones = L.Id
                          INNER JOIN Usuario P ON N.Usuario = P.Id
                          INNER JOIN Encargado F ON N.Encargado = F.Id
                          INNER JOIN Activo G ON N.Activo = G.Id
                          INNER JOIN Equipo O ON G.Equipo = O.Id  WHERE N.Fecha = '$Fec'";
           $result=mysqli_query($cn,$sql);
           while($mostrar=mysqli_fetch_array($result)){
	    ?>
	    <tr>
	       <td><?php echo $mostrar['Fecha'] ?></td>
	       <td><?php echo $mostrar['Usuario'] ?></td>
	       <td><?php echo $mostrar['U_Nombre'] ?></td>
	       <td><?php echo $mostrar['Motivos'] ?></td>
	       <td><?php echo $mostrar['Codigo'] ?></td>
	       <td><?php echo $mostrar['Tipo'] ?></td>
	       <td><?php echo $mostrar['A_Tipo'] ?></td>
	       <td><?php echo $mostrar['E_Nombre'] ?></td>
	       <td><?php echo $mostrar['Devolucion'] ?></td>
	       <td><?php echo $mostrar['Condicion'] ?></td>
	       <td><?php echo $mostrar['Detalles'] ?></td>
	    </tr>
	    <?php 
	       }
	       }
	       if(isset($_POST["Revisar"])){
             $Ini = date('Y-m-d',strtotime($_POST['Ini']));
             $Fin = date('Y-m-d',strtotime($_POST['Fin']));
           $sql="SELECT N.Id,DATE_FORMAT(N.Fecha,'%d/%m/%Y') AS Fecha,N.Dependencia,P.Identificacion AS Usuario,P.U_Nombre,K.Motivos,G.Codigo,O.Tipo,B.A_Tipo,F.E_Nombre,DATE_FORMAT(N.Devolucion,'%d/%m/%Y') AS Devolucion,H.Condicion,L.Detalles FROM Prestamo N INNER JOIN Razon K ON N.Razon = K.Id
                          INNER JOIN Accesorio B ON N.Accesorios = B.Id
                          INNER JOIN Estado H ON N.Estado = H.Id
                          INNER JOIN Observacion L ON N.Observaciones = L.Id
                          INNER JOIN Usuario P ON N.Usuario = P.Id
                          INNER JOIN Encargado F ON N.Encargado = F.Id
                          INNER JOIN Activo G ON N.Activo = G.Id
                          INNER JOIN Equipo O ON G.Equipo = O.Id  WHERE N.Fecha BETWEEN '$Ini' AND '$Fin'";
           $result=mysqli_query($cn,$sql);
           while($mostrar=mysqli_fetch_array($result)){
        ?>
	    <tr>
	       <td><?php echo $mostrar['Fecha'] ?></td>
	       <td><?php echo $mostrar['Usuario'] ?></td>
	       <td><?php echo $mostrar['U_Nombre'] ?></td>
	       <td><?php echo $mostrar['Motivos'] ?></td>
	       <td><?php echo $mostrar['Codigo'] ?></td>
	       <td><?php echo $mostrar['Tipo'] ?></td>
	       <td><?php echo $mostrar['A_Tipo'] ?></td>
	       <td><?php echo $mostrar['E_Nombre'] ?></td>
	       <td><?php echo $mostrar['Devolucion'] ?></td>
	       <td><?php echo $mostrar['Condicion'] ?></td>
	       <td><?php echo $mostrar['Detalles'] ?></td>
	    </tr>
   	    <?php 
	       }
	       }
	       if(isset($_POST["Mirar"])){
	       $Dev = date('Y-m-d',strtotime($_POST['Dev']));
	       $sql="SELECT N.Id,DATE_FORMAT(N.Fecha,'%d/%m/%Y') AS Fecha,N.Dependencia,P.Identificacion AS Usuario,P.U_Nombre,K.Motivos,G.Codigo,O.Tipo,B.A_Tipo,F.E_Nombre,DATE_FORMAT(N.Devolucion,'%d/%m/%Y') AS Devolucion,H.Condicion,L.Detalles FROM Prestamo N INNER JOIN Razon K ON N.Razon = K.Id
                          INNER JOIN Accesorio B ON N.Accesorios = B.Id
                          INNER JOIN Estado H ON N.Estado = H.Id
                          INNER JOIN Observacion L ON N.Observaciones = L.Id
                          INNER JOIN Usuario P ON N.Usuario = P.Id
                          INNER JOIN Encargado F ON N.Encargado = F.Id
                          INNER JOIN Activo G ON N.Activo = G.Id
                          INNER JOIN Equipo O ON G.Equipo = O.Id  WHERE N.Devolucion = '$Dev'";
           $result=mysqli_query($cn,$sql);
           while($mostrar=mysqli_fetch_array($result)){
	    ?>
	    <tr>
	       <td><?php echo $mostrar['Fecha'] ?></td>
	       <td><?php echo $mostrar['Usuario'] ?></td>
	       <td><?php echo $mostrar['U_Nombre'] ?></td>
	       <td><?php echo $mostrar['Motivos'] ?></td>
	       <td><?php echo $mostrar['Codigo'] ?></td>
	       <td><?php echo $mostrar['Tipo'] ?></td>
	       <td><?php echo $mostrar['A_Tipo'] ?></td>
	       <td><?php echo $mostrar['E_Nombre'] ?></td>
	       <td><?php echo $mostrar['Devolucion'] ?></td>
	       <td><?php echo $mostrar['Condicion'] ?></td>
	       <td><?php echo $mostrar['Detalles'] ?></td>
	    </tr>
	    <?php	
	       }
	       }
	    ?>
	    <?php
	        $Mod = "1970-01-01";
	        if(isset($_POST["Extender"])){
	        	$Mod = date('Y-m-d',strtotime($_POST['Mod']));
	        	$Ide =(int)$_POST["Ide"];
	        	$sql = "UPDATE Prestamo N INNER JOIN Usuario P ON N.Usuario = P.Id Set Devolucion='$Mod', Estado='5' WHERE P.U_Nombre='$nom'";
	        	$result=mysqli_query($cn,$sql); 
	        }
	        if(isset($_POST["Devolver"])){
	        	$Mod = date('Y-m-d',strtotime($_POST['Mod']));
	        	$Ide =(int)$_POST["Ide"];
	        	$sql = "UPDATE Prestamo N INNER JOIN Usuario P ON N.Usuario = P.Id Set Devolucion='$Mod', Estado='5' WHERE P.U_Nombre='$nom'";
	        	$result=mysqli_query($cn,$sql); 
	        }
	    ?>    
    <?php include ("C_conexion.php")?>
</body>
</html>     