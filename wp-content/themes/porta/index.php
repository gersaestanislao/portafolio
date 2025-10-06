<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Portafolio de Gersain Estanislao</title>
  <meta name="description" content="Portafolio de Gersain Estanislao, desarrollador web y diseñador de productos digitales especializado en UX/UI.">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">

  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <!-- CSS base -->
  <link rel="stylesheet" href="styles/base.css" />
</head>

<body>
  <!-- Accesibilidad: encabezado con landmark -->
  <header class="layout-header" role="banner">
    <div class="header__logo">
      <a href="/" class="header__brand" aria-label="Inicio - Gersain Estanislao">
        <strong>Gersain Estanislao</strong>
      </a>
    </div>
    <nav class="header__nav" role="navigation" aria-label="Menú principal">
      <ul>
        <li><a href="#proyectos">Work</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contacto">Contact</a></li>
      </ul>
    </nav>
  </header>

  <main id="main-content">
    <!-- Hero con h1 principal -->
    <section class="layout-hero">
      <div class="hero__branding">
        <h1 class="hero__title">
          Desarrollador web + Diseñador de productos digitales
        </h1>
        <div class="btn-grid">
          <a href="docs/portafolio.pdf" class="btn btn--dark" download>
            <span class="fa fa-file-pdf" aria-hidden="true"></span> Portafolio PDF
          </a>
          <a href="docs/cv.pdf" class="btn" download>
            <span class="fa fa-file" aria-hidden="true"></span> Descarga CV
          </a>
        </div>
      </div>
    </section>

    <!-- Proyectos -->
    <section id="proyectos" class="layout-projects" aria-labelledby="projects-title" data-aos="fade-up">
      <header>
        <p class="section-label">Proyectos</p>
        <h2 id="projects-title" class="projects__title">Desarrollo web + UX & UI</h2>
      </header>

      <div class="projects__grid">
        <a href="proyecto-green.html" class="project__item">
          <img src="img/green-portda.png" alt="Proyecto Green: diseño web corporativo" loading="lazy" width="400" height="300">
        </a>
        
        <a href="proyecto-andre.html" class="project__item">
          <img src="img/andre-portda.jpg" alt="Proyecto André: diseño UX/UI para ecommerce" loading="lazy" width="400" height="300">
        </a>

        <a href="proyecto-x.html" class="project__item">
          <img src="img/andre-portda.jpg" alt="Proyecto X: interfaz de usuario minimalista" loading="lazy" width="400" height="300">
        </a>
      </div>

      <p>
        <a href="proyectos.html" class="btn">Más proyectos</a>
      </p>
    </section>

    <!-- Métricas -->
    <section class="layout-metrics" aria-labelledby="metrics-title" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1200">
      <h2 id="metrics-title" class="visually-hidden">Métricas y logros</h2>
      <ul class="metrics__list">
        <li class="metrics__item">
          <strong>1M+</strong>
          <p>Usuarios y clientes han interactuado con nuestros sitios web.</p>
        </li>
        <li class="metrics__item">
          <strong>36</strong>
          <p>Proyectos activos para múltiples empresas y marcas.</p>
        </li>
        <li class="metrics__item">
          <strong>100+</strong>
          <p>Clientes diferentes han confiado en nuestra experiencia.</p>
        </li>
      </ul>
    </section>
  </main>

  <!-- Footer -->
  <footer class="layout-footer">
    <p>Gersain Estanislao</p>
    <p><a href="mailto:stanisger@gmail.com">stanisger@gmail.com</a> </p>
    <p><a href="tel:5520146997">55 2014 6997<a> </p>
  </footer>

  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    });
  </script>
</body>
</html>
