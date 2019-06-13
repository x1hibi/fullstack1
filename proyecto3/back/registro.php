<?php
error_reporting(E_PARSE );
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
        <a  href="catalogo.php" <?php echo $estilo; ?> >Catalogo</a> 
        <a  href="login.php" <?php echo $estilo2; ?> >Login</a>    
        <a  href="registro.php" class="active" <?php echo $estilo2; ?> >Registro</a>
        <a  href="login.php" <?php echo $estilo; ?> >Logout</a>
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
      <h1 class="dtitle dtitle-ani">Registro</h1>
    </div>
  </div>
</div>
    
<?php 
    if(isset($_GET['error'])==true){
        echo '<script language="javascript">';
        echo 'alert("El nombre de usuario o el correo ya estan registrados")';
        echo '</script>';
        echo "<meta http-equiv='refresh' content='0;url=registro.php'>";
    }
    
     
    ?>
    <div class="container">
    
    <form action="testphp.php" method="post">
        
    <div class="form-group">
    <label for="exampleInputEmail1">Correo</label>
    <input type="email" class="form-control" id="exampleInputEmail1"    placeholder="Ingresa tu correo" name="correo" required>
  </div>    
  <div class="form-group">
    <label>Usuario</label>
    <input type="text" class="form-control" placeholder="Ingresa tu nombre de usuario" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contraseña</label>
    <input type="password" class="form-control" id="ps1" placeholder="Ingresa tu contraseña" name="p1" required>
  </div>
<div class="form-group">
    <input type="password" class="form-control" id="ps2" placeholder="Confirma la contraseña" name="p2" required>
  </div>        
<div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1" >He leido y acepto los términos y condiciones.</label>
  </div><br>
  <button type="submit" class="btn btn-primary" >Enviar</button>
</form>
        </div>
 
    <br>
    <br>
    <br>
    <br>
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

<script>
    
    var password = document.getElementById("ps1")
  , confirm_password = document.getElementById("ps2");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Las contraseñas no coinciden!");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
    </script>
    
    
  
<script type="text/javascript" src="js/scrollerincon.js"></script>    
<script type="text/javascript" src="js/burger.js"></script>    
<script type="text/javascript" src="js/top.js"></script>    
<script type="text/javascript" src="js/scroll.js"></script>
 
</body>
    
</html>