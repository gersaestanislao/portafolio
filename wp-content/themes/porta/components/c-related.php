
<!-- Sección de proyectos -->
<aside id="proyectos" class="layout-projects" aria-labelledby="projects-title" data-aos="fade-up">

  <!-- Encabezado de sección -->
  <header>

    <!-- Título principal de la sección, si existe -->
      <h2 id="projects-title" class="projects__title">
        Proyectos relacionados
      </h2>
    <h2 class="projects__title">
        <?php echo esc_html($title); ?> 
      </h2>
  </header>

  <!-- Grid de proyectos -->
  <div class="projects__grid">
    <?php
    // =============================
    // CONSULTA PERSONALIZADA (WP_Query)
    // =============================
    $args = [
      'post_type'      =>  $post_type,
      'posts_per_page' => 3,
      'post__not_in'   => [ get_the_ID() ],
      'orderby'        => 'rand'           
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
          include('moduls/m-item.php'); 
          ?>


      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>

  <!-- Enlace a más contenido (botón) -->
  <?php if ($linkComponente && $linkTextoComponente): ?>
    <p>
      <a href="<?php echo esc_url($linkComponente); ?>" class="btn">
        <?php echo esc_html($linkTextoComponente); ?>
      </a>
    </p>
  <?php endif; ?>

  </aside>
