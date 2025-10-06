
<?php 
// CABECERA GLOBAL DEL SITI
include('header.php'); 

// Obtener el slug actual y el tipo de contenido
    global $wp;
    $current_slug = add_query_arg([], $wp->request);
    $post_type = get_post_type();
?>
    

<body>

  <?php 
  // MENÚ DE NAVEGACIÓN
  include('components/c-menu__nav.php'); 
  ?>


<main id="main-content--catalog">

    <?php 
        // TÍTULO DEL CATÁLOGO
        include('components/c-titleCatalog.php'); 
    ?>

    <?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            $post_type_obj = get_post_type_object( $post_type );
            $rewrite_slug = $post_type_obj->rewrite['slug'];
        }
    }
    ?>

    <!-- breadcrumb  -->
    <section class="layout-breadcrumb">     
        <a href="<?php echo site_url() ; ?>"><i class="fa-solid fa-house"></i></a>
       <span> /</span>
        <a href="<?php echo site_url() ; ?>/<?php echo  $rewrite_slug?>">
            <?php
                if ( $post_type == 'web') {
                    echo 'Desarrollo web + UX & UI';
                    } else {
                        echo  $post_type;
                    }
                ?>
            </a>
            <span> /</span>

            <span><?php the_title(); ?></span>
    </section>

    <section class="layout-projects--project">
        

        <div class="projects__grid projects__grid--project">

            <?php if (have_rows('images')): ?>
                <?php while (have_rows('images')): the_row(); 
                  // Subcampos ACF
                  $img       = get_sub_field('img');
                  $link       = get_sub_field('link');
            ?>

                <div class="projects__animate" data-aos="fade-up">
                    <a target="_blank" href="<?php echo esc_url($link); ?>">
                     <img src="<?php echo esc_url($img); ?>" alt="Gersain Desarrollo web + UX & UI" loading="lazy">
                    </a>
                </div>

             <?php endwhile; ?>
            <?php else: ?>
            <p class="u-tool">No hay proyecto cargado.</p>
            <?php endif; ?>

            
        </div>

        <?php if (have_rows('images')): ?>
                <?php while (have_rows('images')): the_row(); 
                  // Subcampos ACF
                  $link       = get_sub_field('link');
            ?>

                <?php if ($link): ?>
                    <a href="<?php echo esc_url($link); ?>" target="_blank" class="btn  btn--dark">
                Ver el proyecto online</a>
                <?php endif; ?>
                <?php endwhile; ?>
            <?php else: ?>
            <p class="u-tool">No hay proyecto cargado.</p>
            <?php endif; ?>
    </section>

    <?php
        include('components/c-metrics-donut.php');
    ?>

    <?php 
        // CONTENIDO RELACIONADO
        include('components/c-related.php'); 
        ?>

    </main>


<?php 

// CABECERA GLOBAL DEL SITIO

include('footer.php'); 
?>