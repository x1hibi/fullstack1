<?php
    include("conexiondb.php");
    $con=conectar();
    $var1=$_POST['nombre'];
    $var2=$_POST['correo'];
    $var3=$_POST['p1'];
    $var4="user";
    //Se declaran las consultas
    $query_user_name="SELECT name FROM cuenta WHERE name = '$var1' ";  
    $query_user_email="SELECT email FROM cuenta WHERE email = '$var2' ";
    //Se abre la conexion 
    $q1=mysqli_query($con,$query_user_name);
    //Se crea una variable que llama una funcion que convierte la tabla obtenido en la consulta en un arreglo
    $check=mysqli_fetch_array($q1);
    //Se crea una varible que contiene el nombre del primer elemento del arreglo, por medio de la consulta arreglamos que sea un arrgelo de un solo elemento.
    $name_query=$check['name'];
    //Se hace lo mismo pero para los correos
    $q2=mysqli_query($con,$query_user_email);
    $check2=mysqli_fetch_array($q2);
    $email_query=$check2['email']; 
    if ( $var1 == $name_query or $var2 == $email_query){
        header('Location: registro.php?error=1');
    } else {
            //Se define una variable que continee los datos el codigo para mandar al sql de la base
            $insert="INSERT into cuenta VALUES('$var1','$var2','$var3','$var4')";
            $result=mysqli_query($con,$insert) or die ("Error al mandar los datos");    
    }
    
        mysqli_close($con);
        header('Location: login.php?success=1');
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link type="text/css" rel=stylesheet href="css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">   
<link rel="stylesheet" href="css/slider.css">
<link rel="stylesheet" href="css/burger.css">
<link rel="stylesheet" href="css/navbar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">    
<link rel="icon" href="img/logo.png">    
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov" rel="stylesheet">
    
 <script src="https://unpkg.com/scrollreveal"></script>
  
<title>PopMovies</title>   

</head>
    
<body>
    
    <!-- navbar-->
        <div class="dnavbar" id="top">
        <input type="checkbox" id="check-nav"> 
        <div class="logo">
            <img src="img/logo.png" class="icon">
            <div class="log">PopMovies</div>
        </div>
        
        <div class="links">
        <a  href="index.php" >Inicio</a>
        <a  href="login.php" >Login</a>    
        <a  href="registro.php" class="active">Registro</a>

        <div>
        <div class="container-social"> 
        <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook social2 socialnav" style="font-size:50px"></i></a>
        <a href="https://twitter.com" target="_blank"><i class="fa fa-twitter social2 socialnav" style="font-size:50px"></i></a>
        <a href="https://www.google.com" target="_blank"><i class="fa fa-google social2 socialnav" style="font-size:50px"></i></a>
        </div>    
        </div>    
        </div>
        <label for="check-nav">
        <div class="check">
        <div class="burger" onclick="burger(this)">
            <div class="line1"></div>
            <div class="line2"></div>
        <div class="line3"></div>
            
        </div>    
            </div>  
            </label>
    </div>
    
    <!--header-->

        <header>    
        <div class="dcontainer">   
        <img src="img/logo.png" class="img1 dlogo">
            <p class="eslogan">Only the best for you</p>
            </div>
    </header>
    
    
    <div class="container">
  <div class="row">
    <div class="col-sm">
      <h1 class="dtitle dtitle-ani">BIENVENIDO A NUESTRA COMUNIDAD</h1>
        <h2>Se han almaceno tus datos en variables conocidas en breve las insertaremos en nuestra base de datos.</h2>
    </div>
  </div>
</div>



        <footer class="page-footer font-small blue">
    <br>
    <div>
<div class="social-container"> 
        <a href="https://www.facebook.com" target="_blank">
            <i class="fa fa-facebook social s1" style="font-size:25px"></i></a>
        <a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter social s2" style="font-size:25px"></i></a>
        <a href="https://www.google.com" target="_blank"><i class="fa fa-google social s2" style="font-size:25px"></i></a>
        </div>    
</div>
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3" style="color:white">© 2019 Copyright:
    <a href="#"> popmovies.com</a>
  </div>
  <!-- Copyright -->


    
</footer>


    
  
<script type="text/javascript" src="js/scrollerincon.js"></script>    
<script type="text/javascript" src="js/burger.js"></script>    
<script type="text/javascript" src="js/top.js"></script>    
<script type="text/javascript" src="js/scroll.js"></script>
 
</body>
    
</html>