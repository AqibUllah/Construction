<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HK Construction') }} @yield('title')</title>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name=author content="Themefisher">
    <meta name=generator content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon
    ================================================== -->
    <link rel="icon" type="/assets/image/png" href="images/favicon.png">

    <!-- CSS
    ================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/assets/plugins/bootstrap/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="/assets/plugins/animate-css/animate.css">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="/assets/plugins/slick/slick.css">
    <link rel="stylesheet" href="/assets/plugins/slick/slick-theme.css">
    <!-- Colorbox -->
    <link rel="stylesheet" href="/assets/plugins/colorbox/colorbox.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
  <div class="body-inner">

  <div id="top-bar" class="top-bar">
        <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-8">
                <ul class="top-info text-center text-md-left">
                    <li><i class="fas fa-map-marker-alt"></i> <p class="info-text">9051 Constra Incorporate, USA</p>
                    </li>
                </ul>
              </div>
              <!--/ Top info end -->
  
              <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                <ul class="list-unstyled">
                    <li>
                      <a title="Facebook" href="https://facebbok.com/themefisher.com">
                          <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                      </a>
                      <a title="Twitter" href="https://twitter.com/themefisher.com">
                          <span class="social-icon"><i class="fab fa-twitter"></i></span>
                      </a>
                      <a title="Instagram" href="https://instagram.com/themefisher.com">
                          <span class="social-icon"><i class="fab fa-instagram"></i></span>
                      </a>
                      <a title="Linkdin" href="https://github.com/themefisher.com">
                          <span class="social-icon"><i class="fab fa-github"></i></span>
                      </a>
                    </li>
                </ul>
              </div>
              <!--/ Top social end -->
          </div>
          <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </div>
    <!--/ Topbar end -->
    
    <!-- topbar & navbar -->
    <x-header />


    <main>       
      @yield('content')
    </main>


  <x-footer />
  <!-- initialize jQuery Library -->
  <script src="/assets/plugins/jQuery/jquery.min.js"></script>
  <!-- Bootstrap jQuery -->
  <script src="/assets/plugins/bootstrap/bootstrap.min.js" defer></script>
  <!-- Slick Carousel -->
  <script src="/assets/plugins/slick/slick.min.js"></script>
  <script src="/assets/plugins/slick/slick-animation.min.js"></script>
  <!-- Color box -->
  <script src="/assets/plugins/colorbox/jquery.colorbox.js"></script>
  <!-- shuffle -->
  <script src="/assets/plugins/shuffle/shuffle.min.js" defer></script>


  <!-- Google Map API Key-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
  <!-- Google Map Plugin-->
  <script src="/assets/plugins/google-map/map.js" defer></script>

  <!-- Template custom -->
  <script src="/assets/js/script.js"></script>
  
  </div><!-- Body inner end -->

</body>
</html>
