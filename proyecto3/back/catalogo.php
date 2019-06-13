<?php
    error_reporting(E_PARSE );
    include("conexiondb.php");
    //Se predefinen las variables para que se sobreescriban
    $con=conectar();
    //Se declaran las varables en null o con valor si ya se habia echo un login previamente 
    $var1=$_POST['user_name'];
    $var2=$_POST['user_pass'];
    //Se definen las cookies en valores de null 
    $time=10000 ;
    //Se definen varibles que estan vacias o sea con valor null 
    //$v1;
    //$v2;
    //setcookie("nu",$v1,time()+$time);
    //setcookie("pu",$v2,time()+$time);


    //caso 1 Se accede con el link de maner adirect, como no hay summit el valor de todas las varibles es de null, y lo mandamos a volar
    //Se hace primero la comprobacion del valor de las cokkies si, ya se ha hecho login y estan guardadas ya no se hacen las conusltas a la base de datos 
   
    //caso 1 se trata de usar el enlace directo 

    if ($_COOKIE["nu"] == NULL and $var1==NULL){
        
    echo "<meta http-equiv='refresh' content='0;url=login.php?lol=1'>";
        
    exit('YOU ARE NOT LOGIN');
     
         //Se comprueba que el nombre de usuario es distinto a null  y el valor de refrecado es igual a null
    }elseif ($var1 != NULL and $_COOKIE["nu"] == NULL){
         //Se cren las dos cokies para futuros logins y para mantener la sesion abierta,nu=name user
         //Se hace un segundo if para saber si es reload o primer login 
    //Se procede a hacer la consulta 
        //Se declaran las consultas
    $query_user_name="SELECT name FROM cuenta WHERE name = '$var1' ";  
    $query_user_pass="SELECT pass FROM cuenta WHERE pass = '$var2' ";
    //Se abre la conexion 
    $q1=mysqli_query($con,$query_user_name);
    //Se crea una variable que llama una funcion que convierte la tabla obtenido en la consulta en un arreglo
    $check=mysqli_fetch_array($q1);
    //Secrea una varible que contiene el nombre del primer elemento del arreglo, por medio de la consulta arreglamos que sea un arrgelo de un solo elemento.
    $name_query=0;
    $pass_query=0; 
    $name_query=$check['name'];
    //Se hace lo mismo pero para los correos
    $q2=mysqli_query($con,$query_user_pass);
    $check2=mysqli_fetch_array($q2);
    $pass_query=$check2['pass']; 
 
    if ( $var1 != $name_query or $var2 != $pass_query){
       echo "<meta http-equiv='refresh' content='0;url=login.php?error=1'>";
    } 
    //Se define la varible con el nombre del usuario  
    $v1=$var1;
    $v2=$var2;
    setcookie('nu',$v1,time()+$time);
    setcookie('pu',$v2,time()+$time);
    //Se crea una cokie para que se reinicie cuando sea la primera vez que se hace el login 
    setcookie('log',"0",time()+$time);
    //$nu=$var1; 
        
    //Se cierra la conexion
    mysqli_close($con);
    //Cuando se entra  por el enlace directo se revisa si tiene valores el valor del usuario, sin no tiene se redirecciona al login
        
    }elseif ( $_COOKIE["nu"] != NULL and $var1 == NULL){
        $nu=$_COOKIE["nu"];
    }
//Se hace el mensaje de bienvenida

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
  
 <script type="text/javascript" src="js/cookies.js"></script>
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
        
        <?php 
            //Se hace una creacion de variables para poder poner el atributo de displayt none 
            //cuando el valor de la cokkie es distinto a null
            if ($_COOKIE['nu']==NULL){
            $estilo="style=\"display:none;\" ";
            $estilo2="";
            }else{
            $estilo="";
            $estilo2="style=\"display:none;\" ";
            }
            
            ?>
            
        
        <div class="links">
        <a  href="#" class="yeslog"  style="color:cyan"><?php echo $_COOKIE["nu"]; ?></a>    
        <a  href="index.php"  >Inicio</a>
        <a  href="catalogo.php" class="active" <?php echo $estilo; ?> >Catalogo</a> 
        <a  href="login.php" <?php echo $estilo2; ?> >Login</a>    
        <a  href="registro.php" <?php echo $estilo2; ?> >Registro</a>
        <a  href="login.php" <?php echo $estilo; ?> id="link" >Logout</a>
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
        
        <img src="img/meta.png" class="img3">
            </div>
    </header>
    
    <!--Este script revisa que sea la primera sasion y reinicia parta poner el nombre del usuario la nav bar-->
<script type="text/javascript">
    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)log\s*\=\s*([^;]*).*$)|^.*$/, "$1");

    if(cookieValue == 0){
        alert("Se ha iniciado correctamente la session.");
        document.cookie = "log=1";    
        location.reload();
    }
    
</script>
    
    
    
    <div class="container">
  <div class="row">
    <div class="col-sm">
      <h1 class="dtitle dtitle-ani">Catalogo</h1>
    </div>
  </div>
</div>
    
  <div class="container">
  <div class="row">
    <div class="col-sm icon1">
      <div class="dborder shadow pop">
        <img src="/img/mov1.jpg" alt="Responsive image" class="responsive">
        </div>
    </div>
    <div class="col-sm icon2">
            <div class="dborder shadow pop" >
        <img src="/img/mov2.jpg" alt="Responsive image" class="responsive">
        </div>
    </div>
    <div class="col-sm icon3">
      <div class="dborder shadow pop" >
        <img src="/img/mov3.jpg" alt="Responsive image" class="responsive">
        </div>
    </div>
    </div>
  </div>
    
      <div class="container">
  <div class="row">
    <div class="col-sm icon1">
      <div class="dborder shadow pop">
        <img src="/img/mov4.jpg" alt="Responsive image" class="responsive">
        </div>
    </div>
    <div class="col-sm icon2">
            <div class="dborder shadow pop" >
        <img src="/img/mov5.jpg" alt="Responsive image" class="responsive">
        </div>
    </div>
    <div class="col-sm icon3">
      <div class="dborder shadow pop" >
        <img src="/img/mov6.jpg" alt="Responsive image" class="responsive">
        </div>
    </div>
    </div>
  </div>

    <br>
    <br>
    
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


    
    


<script type="text/javascript" src="js/cookies.js"></script>    
<script type="text/javascript" src="js/scrollerincon.js"></script>    
<script type="text/javascript" src="js/burger.js"></script>    
<script type="text/javascript" src="js/top.js"></script>    
<script type="text/javascript" src="js/scroll.js"></script>
 
</body>
    
</html>