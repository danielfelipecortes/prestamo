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
         <table><tr> 
	         <th><a href="../PrestamoDigital.php" class="text-white">Inicio</a></th>
	         <th><a href="Tabladeencargados.php" class="text-white">Actualizar</a></th>  
	         <th><a href="Tabladeequipos.php" class="text-white">Equipos</a></th> 
	         <th><a href="Tabladeusuarios.php" class="text-white">Usuarios</a></th> 
         </tr></table> 
    </nav>
	<header>
        <div style = "text-align:center;"><h2>Encargados para prestar</h2></div> 
    </header> 
    <nav class="navbar navbar-expand-sm bg-success navbar-dark">    
        <div class="dropdown"> 
              <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Nuevo</button>
            <div class="dropdown-menu"> 
	            <form method="POST" action="Tabladeencargados.php">
		            <table>
			             <tr>
	                         <td><label for="Ide">Identificacion:</label></td><td><input type="text" name="Ide" id="Ide" /></td>
	                     </tr>    
	                     <tr>   
	                         <td><label for="Nom">Nombre:</label><td><input type="text" name="Nom" id="Nom" /></td>
	                     </tr>       
	                     <tr>    
	                         <td><label for="Car">Cargo:</label><td><select type="number" name="Car" id="Car"/>
	            	                                                   <?php include ("Listas/Lista_Cargos.php")?>
                                                                    </select></td>
	                     </tr>    
	                     <tr>    
	                         <td><label for="Con">Contacto:</label><td><input type="text" name="Con" id="Con"/>
	                     </tr> 
	                     <tr>    
	                         <td><label for="Cor">Correo:</label><td><input type="text" name="Cor" id="Cor"/>
	                     </tr>     
	                </table>
	                <br><input type="Submit" value="Ingresar" name="Ingresar" id="Ingresar">
	            </form>	
	        </div> 	
        </div>
    <div class="dropdown"> 
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Eliminar</button>
        <div class="dropdown-menu"> 
            <form method="POST" action="Tabladeencargados.php" class="dropdown-item">
		        <table>
			        <tr><td><label for="Ide">Identificacion:</label></td><td><input type="text" name="Ide" id="Ide"/></td></tr>   
	            </table>
	            <br><input type="Submit" value="Eliminar" name="Eliminar" id="Eliminar">
	        </form>
	    </div> 	
    </div>                  
    </nav> 	
    <br>
        <table border="1" >
	    <tr>
	       <td>Id</td><td>Identificacion</td><td>Nombre</td><td>Area</td><td>Cargo</td><td>Oficina</td><td>Contacto</td><td>Correo</td>
	    </tr>
	    <?php
           $sql="SELECT F.Id,F.Identificacion,F.E_Nombre,C.Dependencia,D.Puesto,M.Ubicacion,F.Contacto,F.Correo FROM Encargado F 
                                                                                                   INNER JOIN Area C ON F.Area = C.Id
                                                                                                   INNER JOIN Cargo D ON F.Cargo = D.Id
                                                                                                   INNER JOIN Oficina M ON F.Oficina = M.Id";
           $result=mysqli_query($cn,$sql);
           while($mostrar=mysqli_fetch_array($result)){
	    ?>
	    <tr>
	       <td><?php echo $mostrar['Id'] ?></td>
	       <td><?php echo $mostrar['Identificacion'] ?></td>
	       <td><?php echo $mostrar['E_Nombre'] ?></td>
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
	$Ide = " ";
	$Nom = " ";
	$Car = 0;
	$Con = " ";
	$Cor = " ";
	   if(isset($_POST["Ingresar"])){
		$Ide = $_POST["Ide"];
	    $Nom = $_POST["Nom"];
	    $Car = (int)$_POST["Car"];
	    $Con = $_POST["Con"];
	    $Cor = $_POST["Cor"];   	
        $Ingresar = "INSERT INTO encargado (Id,Identificacion,E_Nombre,Area,Cargo,Oficina,Contacto,Correo) VALUES (NULL,'$Ide','$Nom','26','$Car','3','$Con','$Cor')";
	    $Ingreso = mysqli_query($cn,$Ingresar);
	   }
	   if(isset($_POST["Eliminar"])){
        $Ide = $_POST["Ide"];
        $Eliminar = "DELETE FROM encargado WHERE Identificacion = '$Ide'";
        $Elimino = mysqli_query($cn,$Eliminar); 
	   }
	?> 
	<?php include ("C_conexion.php")?>
</body>
</html> 