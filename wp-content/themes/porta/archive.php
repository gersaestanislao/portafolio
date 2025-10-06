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

    <!-- breadcrumb  -->
    <section class="layout-breadcrumb">     
        <a href="<?php echo site_url() ; ?>"><i class="fa-solid fa-house"></i></a>
       <span> /</span>
        <span>
            <?php
                if (is_post_type_archive('web')) {
                    echo 'Desarrollo web + UX & UI';
                    } else {
                    post_type_archive_title();
                    }
                ?>
            </span>
    
    </section>


        <section class="layout-projects layout-projects--inter">
            
            <div class="projects__grid">


            <?php
                // =============================
                // CONSULTA PERSONALIZADA (WP_Query)
                // =============================
                $args = [
                'post_type'      => $post_type,
                ];

                $post_query = new WP_Query($args);
                ?>

                <?php if ($post_query->have_posts()): ?>
                <?php while ($post_query->have_posts()): $post_query->the_post();

                    // Obtener imagen destacada
                    $thumbnail_id  = get_post_thumbnail_id();
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

                    // Fallback accesible: usar título si no hay alt
                    if (!$thumbnail_alt) {
                    $thumbnail_alt = get_the_title();
                    }
                ?>

                    <!-- Item de proyecto -->
                    <?php 
                    // ITEM
                    include('components/moduls/m-item.php'); 
                    ?>


                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            

            </div>
        </section>

    </main>

    <?php 

        // CABECERA GLOBAL DEL SITIO

        include('footer.php'); 
        ?>
