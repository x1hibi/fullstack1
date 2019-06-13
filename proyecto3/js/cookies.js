
document.getElementById("link").addEventListener("click", cokie, true);

function cokie() {
    document.cookie = "nu=";
    document.cookie = "pu="; 
    alert("Se cerro la sesion.");
   return false;
}
