function direc() {
    var idp = document.getElementById(peli1)
    
    alert(idp);
    document.cookie = "dir=https://www.w3schools.com/html/mov_bbb.mp4";  
    alert("Se cambio el valor de la cookie");
    location.reload();
   return false;
}
  