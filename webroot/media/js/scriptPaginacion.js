var imagenes;
var puntos;
var imagenActiva = 0;

window.onload = function(){
    imagenes = document.getElementsByClassName("fotoNav");
    puntos = document.getElementsByClassName("punto");
    
    mostrarImagen(imagenActiva);
}

//Función que mueve el slide
function moverSlide(n) {
    imagenActiva += n;
    
    if(imagenActiva>=imagenes.length){
        imagenActiva = 0;
    }
    else if(imagenActiva<0){
        imagenActiva = imagenes.length-1;
    }
    mostrarImagen(imagenActiva);
}

//Función que cambia el slide
function cambiarImagen(n) {
    imagenActiva = n;
    mostrarImagen(imagenActiva);
}

//Función que muestra una imagen
function mostrarImagen(imagenActiva){
    for(var i=0;i<imagenes.length;i++) {
        imagenes[i].style.display = "none";
    }
    
    for (var i=0;i<puntos.length;i++) {
        puntos[i].className = puntos[i].className.replace(" active", "");
    }
    
    imagenes[imagenActiva].style.display = "flex";
    puntos[imagenActiva].className += " active";
}