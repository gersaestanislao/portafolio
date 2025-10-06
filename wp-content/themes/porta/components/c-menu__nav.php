<?php
// Obtener el último segmento de la URL
$url = $_SERVER['REQUEST_URI']; 
$final = basename(rtrim(parse_url($url, PHP_URL_PATH), '/')); // limpio y robusto
?>

<header class="layout-header" role="banner">
  <div class="header__logo">
    <a href="<?php echo site_url(); ?>" class="header__brand" aria-label="Inicio - Gersain Estanislao">
      <strong>Gersain Estanislao</strong>
    </a>
  </div>

  <nav class="header__nav" role="navigation" aria-label="Menú principal">
    <ul class="header__navItem">
      <li>
        <a 
          href="<?php echo site_url(); ?>" 
          class="<?php echo ($final === '' ? 'link-active' : ''); ?>"
          aria-current="<?php echo ($final === '' ? 'page' : 'false'); ?>"
        >Inicio</a>
      </li>
      <li>
        <a 
          href="<?php echo site_url(); ?>/Web" 
          class="<?php echo ($final === 'Web' ? 'link-active' : ''); ?>"
          aria-current="<?php echo ($final === 'Web' ? 'page' : 'false'); ?>"
        >Web</a>
      </li>
      <!-- <li>
        <a 
          href="<?php echo site_url(); ?>/Branding" 
          class="<?php echo ($final === 'Branding' ? 'link-active' : ''); ?>"
          aria-current="<?php echo ($final === 'Branding' ? 'page' : 'false'); ?>"
        >Branding</a>
      </li> -->
    </ul>
  </nav>
</header>
