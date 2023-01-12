<?php
            $Serv = 'localhost';$User = 'root';$Password = '';
            /**mysql_connect()('$Serv','$User','$Password') or die ('error'.mysql_error());**/
            $cn = mysqli_connect("localhost","root","","prestamo digital");
            /**if(!$cn)
                	{echo'No conecto';}else{echo'Si conecto';}
            $cdb = mysqli_select_db($cn,"prestamos");
                if(!$cdb)
                	{echo'<br>No conecto a la base';}else{echo'<br>Si conecto a la base de datos Prestamos';}**/    
  ?>