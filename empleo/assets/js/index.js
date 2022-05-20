function cambiar(pestanas, pestana1, pestanas2, pestana21) {

  if(pestanas != null && pestana1 != null){
    cambiarPestannaR(pestanas, pestana1);
  }
  if(pestanas2 != null && pestana21 != null){
    cambiarPestannaL(pestanas2, pestana21);
  }

}

// Dadas la division que contiene todas las pestañas y la de la pestaña que se 
// quiere mostrar, la funcion oculta todas las pestañas a excepcion de esa.
function cambiarPestannaR(pestannas, pestanna) {

  // Obtiene los elementos con los identificadores pasados.
  pestanna = document.getElementById(pestanna.id);
  listaPestannas = document.getElementById(pestannas.id);

  // Obtiene las divisiones que tienen el contenido de las pestañas.
  cpestanna = document.getElementById('c' + pestanna.id);
  listacPestannas = document.getElementById('contenido' + pestannas.id);

  i = 0;
  // Recorre la lista ocultando todas las pestañas y restaurando el fondo 
  // y el padding de las pestañas.
  while (typeof listacPestannas.getElementsByTagName('div')[i] != 'undefined') {
      $(document).ready(function () {
          $(listacPestannas.getElementsByTagName('div')[i]).css('display', 'none');
          $(listaPestannas.getElementsByTagName('li')[i]).css('border', 'none');
          $(listaPestannas.getElementsByTagName('li')[i]).css('font-weight', 'bold');
      });
      i += 1;

  }

  $(document).ready(function () {
      // Muestra el contenido de la pestaña pasada como parametro a la funcion,
      // cambia el color de la pestaña y aumenta el padding para que tape el  
      // borde superior del contenido que esta juesto debajo y se vea de este 
      // modo que esta seleccionada.
      $(cpestanna).css('display', '');
      $(pestanna).css('border-bottom','0.3ex solid white');
      $(pestanna).css('font-weight','bolder');
  });

}
function cambiarPestannaL(pestannas, pestanna) {

  pestanna = document.getElementById(pestanna.id);
  listaPestannas = document.getElementById(pestannas.id);


  cpestanna = document.getElementById('c' + pestanna.id);
  listacPestannas = document.getElementById('contenido' + pestannas.id);

  i = 0;
  while (typeof listacPestannas.getElementsByTagName('div')[i] != 'undefined') {
      $(document).ready(function () {
          $(listacPestannas.getElementsByTagName('div')[i]).css('display', 'none');
          $(listaPestannas.getElementsByTagName('li')[i]).css('border', 'none');
          $(listaPestannas.getElementsByTagName('li')[i]).css('font-weight', 'bold');
      });
      i += 1;
  }

  $(document).ready(function () {
      $(cpestanna).css('display', '');
      $(pestanna).css('border-bottom','0.3ex solid white');
      $(pestanna).css('font-weight','bolder');
  });

}

/* Open the sidenav */
function openNav() {

  var windowWidth = window.innerWidth;

  if(windowWidth <= 500){
      document.getElementById("mySidenav").style.width = "100%";
  }else if(windowWidth >500 && windowWidth <= 1024){
      document.getElementById("mySidenav").style.width = "60%";
  }
  else{
      document.getElementById("mySidenav").style.width = "30%";
  }
}

  /* Close/hide the sidenav */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

