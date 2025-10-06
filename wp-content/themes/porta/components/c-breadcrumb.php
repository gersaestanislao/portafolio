
<section class="layout-breadcrumb">        
    <a href="<?php echo site_url() ; ?>"> <i class="fa-solid fa-house"></i></a>
    <span> /</span>
    
    <span href="/<?php echo $current_slug ?>">
    <?php
        if (is_post_type_archive('web')) {
            echo 'Desarrollo web + UX & UI';
            } else {
            post_type_archive_title();
            }
        ?>
    </span>
    <span> /</span>
   
    <span>
     Green Eye
    </span>
    
</section>