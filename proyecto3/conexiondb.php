<?php 
//Se crea una funcion que nos permitira hacer la conecion con la base de datos 

function conectar(){
    //Se definen las variables que recibe la funcion que nos permite el hacer la conecion con la base mysql
    //Nombre del usuario de la base de datos asignado por 00webhost
    $user="id9267449_prebe";
    //Se escribe la constrasena de para acceder a la base de datos
    $passdb="protecoweb";
    //nombre del servidor 
    $server="localhost";
    //nombre de la base de datos a usar
    $dbname="id9267449_db1";
    //Se define una variable que hace la conecxion y se pasan los parametros que recibe
    $con=mysqli_connect($server,$user,$passdb,$dbname) or die ("hubo un problema al conectarse a la base de datos".mysql_error());
    //Se crea una varible que define la base que vamos a usar
    return $con;
}
     

?>