<!DOCTYPE html>
<html>
    <head>
	    <title>PD</title>
	    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
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
        <?php function getNombre(){ return $_POST["Nombre"];}?> 
        <?php function getRazon(){ return $_POST["Razon"];}?>
        <?php function getCondicion(){return $_POST["Condicion"];}?>

	    <header>
        <div style = "text-align:center;"><h1>PRESTAMO DIGITAL</h1></div> 
        </header> 

        <nav class="navbar navbar-expand-sm bg-success navbar-dark">    
            <table>
	            <tr>
			        <td><a href="index.php" role="button" class="btn btn-success">Inicio</a></td>
	                <td><?php include ("Tablasadicionales.php")?></td>
                    <td><?php include ("Tablasconsultas.php")?></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Filtros</button>
                            <div class="dropdown-menu">
	                            <form method="POST" action="index.php" class="dropdown-item">
		                            <label for="Fec">Fecha:</label><input type="DATE" name="Fec" id="Fec"/>
		                            <input type="Submit" value="Buscar" name="Buscar" id="Buscar">
		                        </form>
                                <form method="POST" action="index.php" class="dropdown-item">
		                            <label for="Nombre">Nombre:</label><select name="Nombre" id="Nombre">
                	                <?php 
                	                $rs=mysqli_query($cn,"SELECT DISTINCT P.Usuario,N.U_Nombre FROM Prestamo P INNER JOIN Usuario N ON P.Usuario=N.Id");
                	                $n=mysqli_num_rows($rs);
                	                for($i=0;$i<$n;$i++){
                	                                        $row= mysqli_fetch_array($rs);
                	                                        $id=$row["Usuario"];
                                                            $nom=$row["U_Nombre"];
                                                            echo "<option value='".$id."'>".$nom."</option>";
                                                        }
                	                $nom=getNombre(); 
                	                $consulta=mysqli_query($cn,"SELECT U_Nombre FROM Usuario where id='$nom'");
	                                $row= mysqli_fetch_array($consulta);
	                                $nom=$row["U_Nombre"];
                	                ?>
                                    </select><input type="Submit" value="Buscar" name="Buscar1" id="Buscar1">    
                                </form>
                                <form method="POST" action="index.php" class="dropdown-item">
                                    <label for="Razon">Razon:</label><select name="Razon" id="Razon">
                	                        <?php 
                	                        $rs = mysqli_query($cn,"SELECT DISTINCT P.Razon,K.Motivos FROM Prestamo P INNER JOIN Razon K ON P.Razon=K.Id");
                	                        $n=mysqli_num_rows($rs);
                	                        for($i=0;$i<$n;$i++){
                		                        $row= mysqli_fetch_array($rs);
                		                        $id=$row["Razon"];
                                                $Raz=$row["Motivos"];
                                                echo "<option value='".$id."'>".$Raz."</option>";}
                	                        $Raz=getRazon(); 
                	                        $consulta=mysqli_query($cn,"SELECT Motivos FROM Razon where id='$Raz'");
	                                        $row= mysqli_fetch_array($consulta);
	                                        $Raz=$row["Motivos"];
                	                        ?>
                                    </select>             
	                                <input type="Submit" value="Buscar" name="Buscar2" id="Buscar2">
	                            </form>
                                <form method="POST" action="index.php" class="dropdown-item">
                                    <label for="Condicion">Estado:</label><select name="Condicion" id="Condicion">
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
	                                <input type="Submit" value="Buscar" name="Buscar3" id="Buscar3">
	                            </form>
                            </div>                        
                        </div>     	
                    </td>
                    <td>
            	        <div class="dropdown">
            		        <button type="button"class="btn btn-success dropdown-toggle"data-toggle="dropdown">Nuevo</button>
            	            <div class="dropdown-menu">    
	                            <form method="POST" action="index.php" class="dropdown-item">
		                            <table>
			                            <tr><td><label for="Fec">Fecha:</label></td><td><input type="DATE"name="Fec"id="Fec"/></td></tr>       
	                                    <tr><td><label for="Usu">Usuario:</label></td><td><select type="number"name="Usu"id="Usu"/> 
	                                    	                                                <?php include ("Tablas/Listas/Lista_Usuarios.php")?>
	                                                                                      </select></td></tr>      
	                                    <tr><td><label for="Raz">Razon:</label></td><td><select type="number"name="Raz"id="Raz">
	        	                                                                             <?php include ("Tablas/Listas/Lista_Razones.php")?>
	                                                                                    </select></td></tr>    
	                                    <tr><td><label for="Act">Activo:</label></td><td><select type="number"name="Act"id="Act"/>
	                                    	                                                  <?php include ("Tablas/Listas/Lista_Activos.php")?>
	                                                                                    </select></td></tr>
	                                    <tr><td><label for="Acc">Accesorios:</label></td><td><select type="number"name="Acc"id="Acc"/>
	                                    	                                               <?php include ("Tablas/Listas/Lista_Accesorios.php")?>
	                                                                                          </select></td></tr>
	                                    <tr><td><label for="Enc">Encargado:</label></td><td><select type="number"name="Enc"id="Enc"/>
	                                    	                                               <?php include ("Tablas/Listas/Lista_Encargados.php")?>
	                                                                                          </select></td></tr>  
	                                    <tr><td><label for="Dev">Devolucion:</label></td><td><input type="DATE"name="Dev"id="Dev"/></td></tr>  
	                                    <tr><td><label for="Est">Estado:</label></td><td><select type="number"name="Est"id="Est"/>
	                                    	                                                  <?php include ("Tablas/Listas/Lista_Estados.php")?>
	                                                                                          </select></td></tr>
	                                    <tr><td><label for="Obs">Observacion:</label></td><td><select type="number"name="Obs"id="Obs"/>
	                                    	                                            <?php include ("Tablas/Listas/Lista_Observaciones.php")?>
	                                                                                          </select></td></tr>
	                                </table>
	                                <br><input type="Submit" value="Ingresar" name="Ingresar" id="Ingresar">
	                             </form>
	                        </div>  
	                   </div>    	
                    </td>
                </tr>
	        </table>
        </nav>
        <br>
        <table border="1" >
	        <tr>
	            <td>Fecha</td><td>Dependencia</td><td>Codigo</td><td>Nombre</td><td>Razon</td><td>Activo</td><td>Equipo</td>
	            <td>Accesorios</td><td>Encargado</td><td>Devolucion</td><td>Estado</td><td>Observaciones</td>
	        </tr>
	    <?php
	       $Fec = "1970-01-01";
	       if(isset($_POST["Buscar"])){
	   	    $Fec = date('Y-m-d',strtotime($_POST['Fec']));
           $sql="SELECT DATE_FORMAT(N.Fecha,'%d/%m/%Y') AS Fecha,N.Dependencia,P.Identificacion AS Usuario,P.U_Nombre,K.Motivos,G.Codigo,O.Tipo,B.A_Tipo,F.E_Nombre,DATE_FORMAT(N.Devolucion,'%d/%m/%Y') AS Devolucion,H.Condicion,L.Detalles FROM Prestamo N INNER JOIN Razon K ON N.Razon = K.Id
                          INNER JOIN Accesorio B ON N.Accesorios = B.Id
                          INNER JOIN Estado H ON N.Estado = H.Id
                          INNER JOIN Observacion L ON N.Observaciones = L.Id
                          INNER JOIN Usuario P ON N.Usuario = P.Id
                          INNER JOIN Encargado F ON N.Encargado = F.Id
                          INNER JOIN Activo G ON N.Activo = G.Id
                          INNER JOIN Equipo O ON G.Equipo = O.Id WHERE N.Fecha = '$Fec'";
           $result=mysqli_query($cn,$sql);
           while($mostrar=mysqli_fetch_array($result)){
	    ?>
	    <tr>
	       <td><?php echo $mostrar['Fecha'] ?></td>
	       <td><?php echo $mostrar['Dependencia'] ?></td>
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
           }else if(isset($_POST["Buscar1"])){
           $sql="SELECT DATE_FORMAT(N.Fecha,'%d/%m/%Y') AS Fecha,N.Dependencia,P.Identificacion AS Usuario,P.U_Nombre,K.Motivos,G.Codigo,O.Tipo,B.A_Tipo,F.E_Nombre,DATE_FORMAT(N.Devolucion,'%d/%m/%Y') AS Devolucion,H.Condicion,L.Detalles FROM Prestamo N 
                          INNER JOIN Razon K ON N.Razon = K.Id
                          INNER JOIN Accesorio B ON N.Accesorios = B.Id
                          INNER JOIN Estado H ON N.Estado = H.Id
                          INNER JOIN Observacion L ON N.Observaciones = L.Id
                          INNER JOIN Usuario P ON N.Usuario = P.Id
                          INNER JOIN Encargado F ON N.Encargado = F.Id
                          INNER JOIN Activo G ON N.Activo = G.Id
                          INNER JOIN Equipo O ON G.Equipo = O.Id WHERE P.U_Nombre = '$nom'";
           $result=mysqli_query($cn,$sql);
           while($mostrar=mysqli_fetch_array($result)){
           ?>
	          <tr>
	             <td><?php echo $mostrar['Fecha'] ?></td>
	             <td><?php echo $mostrar['Dependencia'] ?></td>
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
           }else if(isset($_POST["Buscar2"])){
           $sql="SELECT DATE_FORMAT(N.Fecha,'%d/%m/%Y') AS Fecha,N.Dependencia,P.Identificacion AS Usuario,P.U_Nombre,K.Motivos,G.Codigo,O.Tipo,B.A_Tipo,F.E_Nombre,DATE_FORMAT(N.Devolucion,'%d/%m/%Y') AS Devolucion,H.Condicion,L.Detalles FROM Prestamo N 
                          INNER JOIN Razon K ON N.Razon = K.Id
                          INNER JOIN Accesorio B ON N.Accesorios = B.Id
                          INNER JOIN Estado H ON N.Estado = H.Id
                          INNER JOIN Observacion L ON N.Observaciones = L.Id
                          INNER JOIN Usuario P ON N.Usuario = P.Id
                          INNER JOIN Encargado F ON N.Encargado = F.Id
                          INNER JOIN Activo G ON N.Activo = G.Id
                          INNER JOIN Equipo O ON G.Equipo = O.Id WHERE K.Motivos = '$Raz'";
           $result=mysqli_query($cn,$sql);
           while($mostrar=mysqli_fetch_array($result)){
           ?>
	          <tr>
	             <td><?php echo $mostrar['Fecha'] ?></td>
	             <td><?php echo $mostrar['Dependencia'] ?></td>
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
           }else if (isset($_POST["Buscar3"])){
           $sql="SELECT DATE_FORMAT(N.Fecha,'%d/%m/%Y') AS Fecha,N.Dependencia,P.Identificacion AS Usuario,P.U_Nombre,K.Motivos,G.Codigo,O.Tipo,B.A_Tipo,F.E_Nombre,DATE_FORMAT(N.Devolucion,'%d/%m/%Y') AS Devolucion,H.Condicion,L.Detalles FROM Prestamo N 
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
	             <td><?php echo $mostrar['Fecha'] ?></td>
	             <td><?php echo $mostrar['Dependencia'] ?></td>
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
           }else{
           $sql="SELECT DATE_FORMAT(N.Fecha,'%d/%m/%Y') AS Fecha,N.Dependencia,P.Identificacion AS Usuario,P.U_Nombre,K.Motivos,G.Codigo,O.Tipo,B.A_Tipo,F.E_Nombre,DATE_FORMAT(N.Devolucion,'%d/%m/%Y') AS Devolucion,H.Condicion,L.Detalles FROM Prestamo N INNER JOIN Razon K ON N.Razon = K.Id
                          INNER JOIN Accesorio B ON N.Accesorios = B.Id
                          INNER JOIN Estado H ON N.Estado = H.Id
                          INNER JOIN Observacion L ON N.Observaciones = L.Id
                          INNER JOIN Usuario P ON N.Usuario = P.Id
                          INNER JOIN Encargado F ON N.Encargado = F.Id
                          INNER JOIN Activo G ON N.Activo = G.Id
                          INNER JOIN Equipo O ON G.Equipo = O.Id";
           $result=mysqli_query($cn,$sql);
           while($mostrar=mysqli_fetch_array($result)){
	    ?>
	    <tr>
	       <td><?php echo $mostrar['Fecha'] ?></td>
	       <td><?php echo $mostrar['Dependencia'] ?></td>
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
	    </table>
	<?php
	   $Usu = 0;
	   $Raz = 0;
	   $Act = 0;
	   $Acc = 0;
	   $Enc = 0;
	   $Dev = "1970-01-01";
	   $Est = 0;
	   $Obs = 0;
	   if(isset($_POST["Ingresar"])){
	   	$Fec = date('Y-m-d', strtotime($_POST['Fec']));
	    $Usu = (int)$_POST["Usu"];
	    $Raz = (int)$_POST["Raz"];
	    $Act = (int)$_POST["Act"];
	    $Acc = (int)$_POST["Acc"];
	    $Enc = (int)$_POST["Enc"];
	    $Dev = date('Y-m-d', strtotime($_POST['Dev']));
	    $Est = (int)$_POST["Est"];
	    $Obs = (int)$_POST["Obs"];
        $Ingresar = "INSERT INTO prestamo (Id,Fecha,Dependencia,Usuario,Razon,Activo,Accesorios,Encargado,Devolucion,Estado,Observaciones) VALUES (NULL,'$Fec','Gestion Tecnologica','$Usu','$Raz','$Act','$Acc','$Enc','$Dev','$Est','$Obs')";
	    $Ingreso = mysqli_query($cn,$Ingresar);
	   }
	   if(isset($_POST["Eliminar"])){
        $Act = $_POST["Act"];
        $Eliminar = "DELETE FROM activo WHERE codigo = '$Act'";
        $Elimino = mysqli_query($cn,$Eliminar); 
	   }
	?>   	
    <?php include ("C_conexion.php")?>
</body>
</html> 