    <h3>Registro de Activos para prestamo (Forma general de relaciones indicadas)</h3>
        <table border="1" >
	    <tr>
	       <td>Id</td><td>Codigo</td><td>Equipo</td><td>Marca</td><td>Modelo</td><td>Serial</td>
	    </tr>
	    <?php
           $sql="SELECT G.Id,G.Codigo,G.Equipo,G.Marca,G.Modelo,G.Serial FROM Activo G";
           $result=mysqli_query($cn,$sql);
           while($mostrar=mysqli_fetch_array($result)){
	    ?>
	    <tr>
	       <td><?php echo $mostrar['Id'] ?></td>
	       <td><?php echo $mostrar['Codigo'] ?></td>
	       <td><?php echo $mostrar['Equipo'] ?></td>
	       <td><?php echo $mostrar['Marca'] ?></td>
	       <td><?php echo $mostrar['Modelo'] ?></td>
	       <td><?php echo $mostrar['Serial'] ?></td>
	    </tr>
	    <?php 
	       }
	    ?>
	    </table>
	<br>
	<h3>Registro de encargados para prestar (Forma general de relaciones indicadas)</h3>
        <table border="1" >
	    <tr>
	       <td>Id</td><td>Identificacion</td><td>Nombre</td><td>Area</td><td>Cargo</td><td>Oficina</td><td>Contacto</td><td>Correo</td>
	    </tr>
	    <?php
           $sql="SELECT F.Id,F.Identificacion,F.E_Nombre,F.Area,F.Cargo,F.Oficina,F.Contacto,F.Correo FROM Encargado F";
           $result=mysqli_query($cn,$sql);
           while($mostrar=mysqli_fetch_array($result)){
	    ?>
	    <tr>
	       <td><?php echo $mostrar['Id'] ?></td>
	       <td><?php echo $mostrar['Identificacion'] ?></td>
	       <td><?php echo $mostrar['E_Nombre'] ?></td>
	       <td><?php echo $mostrar['Area'] ?></td>
	       <td><?php echo $mostrar['Cargo'] ?></td>
	       <td><?php echo $mostrar['Oficina'] ?></td>
	       <td><?php echo $mostrar['Contacto'] ?></td>
	       <td><?php echo $mostrar['Correo'] ?></td>
	    </tr>
	    <?php 
	       }
	    ?>
	    </table>
	<br>
	<h3>Registro de prestamos realizados (Forma general de relaciones indicadas)</h3>
        <table border="1" >
	    <tr>
	       <td>Id</td><td>Fecha</td><td>Dependencia</td><td>Usuario</td><td>Razon</td><td>Activo</td><td>Accesorios</td><td>Encargado</td><td>Devolucion</td><td>Estado</td><td>Observaciones</td>
	    </tr>
	    <?php
           $sql="SELECT N.Id,N.Fecha,N.Dependencia,N.Usuario,N.Razon,N.Activo,N.Accesorios,N.Encargado,N.Devolucion,N.Estado,N.Observaciones FROM Prestamo N";
           $result=mysqli_query($cn,$sql);
           while($mostrar=mysqli_fetch_array($result)){
	    ?>
	    <tr>
	       <td><?php echo $mostrar['Id'] ?></td>
	       <td><?php echo $mostrar['Fecha'] ?></td>
	       <td><?php echo $mostrar['Dependencia'] ?></td>
	       <td><?php echo $mostrar['Usuario'] ?></td>
	       <td><?php echo $mostrar['Razon'] ?></td>
	       <td><?php echo $mostrar['Activo'] ?></td>
	       <td><?php echo $mostrar['Accesorios'] ?></td>
	       <td><?php echo $mostrar['Encargado'] ?></td>
	       <td><?php echo $mostrar['Devolucion'] ?></td>
	       <td><?php echo $mostrar['Estado'] ?></td>
	       <td><?php echo $mostrar['Observaciones'] ?></td>
	    </tr>
	    <?php 
	       }
	    ?>
	    </table>
	<br>
	<h3>Registro de usuarios que pueden solicitar equipo (Forma general de relaciones indicadas)</h3>
        <table border="1" >
	    <tr>
	       <td>Id</td><td>Identificacion</td><td>Nombre</td><td>Area</td><td>Cargo</td><td>Oficina</td><td>Contacto</td><td>Correo</td>
	    </tr>
	    <?php
           $sql="SELECT P.Id,P.Identificacion,P.U_Nombre,P.Area,P.Cargo,P.Oficina,P.Contacto,P.Correo FROM Usuario P";
           $result=mysqli_query($cn,$sql);
           while($mostrar=mysqli_fetch_array($result)){
	    ?>
	    <tr>
	       <td><?php echo $mostrar['Id'] ?></td>
	       <td><?php echo $mostrar['Identificacion'] ?></td>
	       <td><?php echo $mostrar['U_Nombre'] ?></td>
	       <td><?php echo $mostrar['Area'] ?></td>
	       <td><?php echo $mostrar['Cargo'] ?></td>
	       <td><?php echo $mostrar['Oficina'] ?></td>
	       <td><?php echo $mostrar['Contacto'] ?></td>
	       <td><?php echo $mostrar['Correo'] ?></td>
	    </tr>
	    <?php 
	       }
	    ?>
	    </table>
	<br>
	<h3>Registro de prestamos realizados (Forma general de relaciones realizadas)</h3>
        <table border="1" >
	    <tr>
	       <td>Id</td><td>Fecha</td><td>Dependencia</td><td>Usuario</td><td>Razon</td><td>Activo</td><td>Accesorios</td><td>Encargado</td><td>Devolucion</td><td>Estado</td><td>Observaciones</td>
	    </tr>
	    <?php
           $sql="SELECT N.Id,DATE_FORMAT(N.Fecha,'%d/%m/%Y') AS Fecha,N.Dependencia,P.Identificacion AS Usuario,K.Motivos,G.Codigo,B.A_Tipo,F.Identificacion AS Encargado,DATE_FORMAT(N.Devolucion,'%d/%m/%Y') AS Devolucion,H.Condicion,L.Detalles FROM Prestamo N INNER JOIN Razon K ON N.Razon = K.Id
                          INNER JOIN Accesorio B ON N.Accesorios = B.Id
                          INNER JOIN Estado H ON N.Estado = H.Id
                          INNER JOIN Observacion L ON N.Observaciones = L.Id
                          INNER JOIN Usuario P ON N.Usuario = P.Id
                          INNER JOIN Encargado F ON N.Encargado = F.Id
                          INNER JOIN Activo G ON N.Activo = G.Id";
           $result=mysqli_query($cn,$sql);
           while($mostrar=mysqli_fetch_array($result)){
	    ?>
	    <tr>
	       <td><?php echo $mostrar['Id'] ?></td>
	       <td><?php echo $mostrar['Fecha'] ?></td>
	       <td><?php echo $mostrar['Dependencia'] ?></td>
	       <td><?php echo $mostrar['Usuario'] ?></td>
	       <td><?php echo $mostrar['Motivos'] ?></td>
	       <td><?php echo $mostrar['Codigo'] ?></td>
	       <td><?php echo $mostrar['A_Tipo'] ?></td>
	       <td><?php echo $mostrar['Encargado'] ?></td>
	       <td><?php echo $mostrar['Devolucion'] ?></td>
	       <td><?php echo $mostrar['Condicion'] ?></td>
	       <td><?php echo $mostrar['Detalles'] ?></td>
	    </tr>
	    <?php 
	       }
	    ?>
	    </table>
	<br>