<?php
include('db.php');
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;


$conexion=mysqli_connect("localhost","root","","proyecto");

$consulta="SELECT*FROM usuarios where Nombre='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:home.php");

}else{
    ?>
    <?php
    include("index.php");

  ?>
  <div class="login-boxx"> 
  <a class="bad">ERROR DE AUTENTIFICACION</a> 

</div>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);