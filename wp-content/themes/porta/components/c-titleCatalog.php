<section class="layout-hero--inter">
    <div class="hero__branding">
    <h1 class="hero__title hero__title--inter">
        
    <?php
    if (is_post_type_archive('web')) {
        echo 'Desarrollo web + UX & UI';
        } else {
        post_type_archive_title();
        }
    ?>
  </h1>
    </div>
</section>