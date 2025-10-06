<?php  
/*
Template Name: Inicio
*/
?>

<?php 
// CABECERA GLOBAL DEL SITIO
include('header.php'); 
?>

<body>

  <?php 
  // MENÚ DE NAVEGACIÓN
  include('components/c-menu__nav.php'); 
  ?>

  <!-- Contenido principal del sitio -->
  <main id="main-content">

    <?php
    // LOOP DE CAMPOS FLEXIBLES (ACF)
    if (have_rows('layout')) :
      while (have_rows('layout')) : the_row();

  
        // SECCIÓN HERO (CARRUSEL PRINCIPAL)
  
        if (get_row_layout() === 'hero') :
          get_template_part('components/c-hero');

  
        // SECCIÓN DE DESTACADOS
  
        elseif (get_row_layout() === 'destacados') :
          get_template_part('components/c-main');

        endif;

      endwhile;
    endif;
    ?>

</main>


<?php 

// CABECERA GLOBAL DEL SITIO

include('footer.php'); 
?>


