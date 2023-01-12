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
	<?php include ("A_conexion.php");?>
	<nav class="navbar navbar-expand-sm bg-success navbar-dark"> 
        <table><tr> 
                <th><a href="../PrestamoDigital.php" class="text-white">Inicio</a></th> 
                <th><a href="Tabladeequipos.php" class="text-white">Actualizar</a></th> 
	            <th><a href="Tabladeencargados.php" class="text-white">Encargados</a></th> 
	            <th><a href="Tabladeusuarios.php" class="text-white">Usuarios</a></th> 
        </tr></table>
    </nav>
    <header>
        <div style = "text-align:center;"><h2>Activos para prestamo</h2></div> 
    </header> 
  <nav class="navbar navbar-expand-sm bg-success navbar-dark">    
    <div class="dropdown"> 
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Nuevo</button>
        <div class="dropdown-menu"> 
            <form method="POST" action="Tabladeequipos.php" class="dropdown-item">
		        <table>
			        <tr><td><label for="Act">Activo fijo:</label></td><td><select type="text" name="Act" id="Act"/> 
			        	                                                       <?php include ("Listas/Lista_Dgts.php")?>
                                                                          </select></td></tr>
	                <tr><td><label for="Equ">Equipo:</label></td><td><select type="number" name="Equ" id="Equ">
	        	                                                 <?php include ("Listas/Lista_Equipos.php")?>
	                                                         </select></td></tr>    
	                <tr><td><label for="Mar">Marca:</label></td><td><select type="number" name="Mar" id="Mar">
                                                                 <?php include ("Listas/Lista_Marcas.php")?>
                                                             </select></td></tr>    
	                <tr><td><label for="Mod">Modelo:</label></td><td><select type="number" name="Mod" id="Mod"/>
	            	                                             <?php include ("Listas/Lista_Modelos.php")?>  
	                                                         </select></td></tr>    
	                <tr><td><label for="Ser">Serial:</label></td><td><input type="text" name="Ser" id="Ser"/></td></tr>    
	            </table>
	            <br><input type="Submit" value="Ingresar" name="Ingresar" id="Ingresar">
	        </form>
	    </div> 	
    </div>
    <div class="dropdown"> 
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Eliminar</button>
        <div class="dropdown-menu"> 
            <form method="POST" action="Tabladeequipos.php" class="dropdown-item">
		        <table>
			        <tr><td><label for="Act">Activo fijo:</label></td><td><select type="text" name="Act" id="Act"/> 
			        	                                                       <?php include ("Listas/Lista_Dgts.php")?>
                                                                          </select></td></tr>   
	            </table>
	            <br><input type="Submit" value="Eliminar" name="Eliminar" id="Eliminar">
	        </form>
	    </div> 	
    </div> 
    <div class="dropdown"> 
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Editar</button>
        <div class="dropdown-menu"> 
            <form method="POST" action="Tabladeequipos.php" class="dropdown-item">
		        <table>
			        <tr><td><label for="Act">Activo fijo:</label></td><td><select type="text" name="Act" id="Act"/> 
			        	                                                       <?php include ("Listas/Lista_Dgts.php")?>
                                                                          </select></td></tr>
	                <tr><td><label for="Equ">Equipo:</label></td><td><select type="number" name="Equ" id="Equ">
	        	                                                 <?php include ("Listas/Lista_Equipos.php")?>
	                                                         </select></td></tr>    
	                <tr><td><label for="Mar">Marca:</label></td><td><select type="number" name="Mar" id="Mar">
                                                                 <?php include ("Listas/Lista_Marcas.php")?>
                                                             </select></td></tr>    
	                <tr><td><label for="Mod">Modelo:</label></td><td><select type="number" name="Mod" id="Mod"/>
	            	                                             <?php include ("Listas/Lista_Modelos.php")?>  
	                                                         </select></td></tr>    
	                <tr><td><label for="Ser">Serial:</label></td><td><input type="text" name="Ser" id="Ser"/></td></tr>    
	            </table>
	            <br><input type="Submit" value="Editar" name="Editar" id="Editar">
	        </form>
	    </div> 	
    </div>    
  </nav>   
  <br>  
        <table border="1" >
	    <tr>
	       <td>Codigo</td><td>Equipo</td><td>Marca</td><td>Modelo</td><td>Serial</td>
	    </tr>
	    <?php
           $sql="SELECT G.Codigo,O.Tipo,I.N_Marca,J.N_Modelo,G.Serial FROM Activo G 
                                                                           INNER JOIN Equipo O ON G.Equipo = O.Id
                                                                           INNER JOIN Marca I ON G.Marca = I.Id
                                                                           INNER JOIN Modelo J ON G.Modelo = J.Id";
           $result=mysqli_query($cn,$sql);
           while($mostrar=mysqli_fetch_array($result)){
	    ?>
	    <tr>
	       <td><?php echo $mostrar['Codigo'] ?></td>
	       <td><?php echo $mostrar['Tipo'] ?></td>
	       <td><?php echo $mostrar['N_Marca'] ?></td>
	       <td><?php echo $mostrar['N_Modelo'] ?></td>
	       <td><?php echo $mostrar['Serial'] ?></td>
	    </tr>
	    <?php 
	       }
	    ?>
	    </table>	
	<?php
        $Act = " ";
        $Equ = 0;
        $Mar = 0;
        $Mod = 0;
        $Ser = " ";
	   if(isset($_POST["Ingresar"])){
        $Act = $_POST["Act"];
        $Equ = (int)$_POST["Equ"];
        $Mar = (int)$_POST["Mar"];
        $Mod = (int)$_POST["Mod"];
        $Ser = $_POST["Ser"];
        $Ingresar = "INSERT INTO activo (Id,Codigo,Equipo,Marca,Modelo,`Serial`) VALUES (NULL,'$Act','$Equ','$Mar','$Mod','$Ser')";
	    $Ingreso = mysqli_query($cn,$Ingresar);
	    
	   }
	   if(isset($_POST["Eliminar"])){
        $Act = $_POST["Act"];
        $Eliminar = "DELETE FROM activo WHERE codigo = '$Act'";
        $Elimino = mysqli_query($cn,$Eliminar); 
	   }
	   if(isset($_POST["Editar"])){
	   	 $Act = $_POST["Act"];
	   	 $Equ = (int)$_POST["Equ"];
         $Mar = (int)$_POST["Mar"];
         $Mod = (int)$_POST["Mod"];
         $sql = "UPDATE Activo  Set Equipo='$Equ',Marca='$Mar',Modelo='$Mod',`Serial`='$Ser' WHERE Codigo='$Act'";
	     $result=mysqli_query($cn,$sql);  $Ser = $_POST["Ser"];
	   }
	?>           
	<?php include ("C_conexion.php");?>
</body>
</html> 