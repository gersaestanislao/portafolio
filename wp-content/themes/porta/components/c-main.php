<?php
// =============================
// CAMPOS PERSONALIZADOS (ACF)
// =============================
$title                = get_sub_field('title');
$subtitle             = get_sub_field('subtitle');
$tipoContenido        = get_sub_field('tipoContenido');
$linkComponente       = get_sub_field('linkComponente');
$linkTextoComponente  = get_sub_field('linkTextoComponente');
?>
<!-- Sección de proyectos -->
<section id="proyectos" class="layout-projects" aria-labelledby="projects-title" data-aos="fade-up">

  <!-- Encabezado de sección -->
  <header>

    <!-- Subtítulo, si existe -->
    <?php if ($subtitle): ?>
      <small class="section-label">
        <?php echo esc_html($subtitle); ?>
      </small>
    <?php endif; ?>

    <!-- Título principal de la sección, si existe -->
    <?php if ($title): ?>
      <h2 class="projects__title">
        <?php echo esc_html($title); ?>
      </h2>
    
    <?php endif; ?>

  </header>

  <!-- Grid de proyectos -->
  <div class="projects__grid">
    <?php
    // =============================
    // CONSULTA PERSONALIZADA (WP_Query)
    // =============================
    $args = [
      'post_type'      => $tipoContenido,
      'posts_per_page' => 12,
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
      <a href="<?php echo esc_url($linkComponente); ?>" class="btn  btn--dark">
        <?php echo esc_html($linkTextoComponente); ?>
      </a>
    </p>
  <?php endif; ?>

</section>
