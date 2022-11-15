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
<link rel="stylesheet" type="text/css" href="/assets/css/toastify.css">
  @yield('styles')
    <style>
        .left-inner-addon {
            position: relative;
        }
        .left-inner-addon input {
            padding-left: 22px;
        }
        .left-inner-addon span {
            position: absolute;
            padding: 10px 12px;
            pointer-events: none;
        }

        .right-inner-addon {
            position: relative;
        }
        .right-inner-addon input {
            padding-right: 30px;
        }
        .right-inner-addon span {
            position: absolute;
            right: 0px;
            padding: 7px 12px;
            pointer-events: none;
        }
    </style>
</head>

<body>
  <div class="body-inner">

      <x-header />
    <main>
      <x-banner title="{{ \Auth::user()->hasRole('admin') ? 'Admin Dashboard' : 'Vendor Dashboard' }}" />
      <section id="main-container" class="main-container">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-3 col-lg-4">
                @if(\Auth::user()->hasRole('admin'))
                    <x-admin-sidebar />
                @else
                    <x-vendor-sidebar />
                @endif
{{--                <x-vendor-sidebar />--}}
            </div><!-- Sidebar Col end -->

            <div class="col-xl-8 col-lg-8">
              <div class="content-inner-page">
                <h2 class="column-title mrt-0">@yield('content-title')</h2>
                @yield('content')
              </div><!-- Content inner end -->
            </div><!-- Content Col end -->

          </div><!-- Main row end -->
        </div><!-- Conatiner end -->
      </section><!-- Main container end -->
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
    <script type="text/javascript" src="/assets/js/toastify.js"></script>

      <script>
      function logout() {
        document.getElementById("logout-form").submit();
      }

      function taostr(mssg,colorCode)
      {
          var bgColors = [
                "red",
                "green",
                "blue",
                "warning",
                "linear-gradient(to right, #00b09b, #96c93d)",
                "linear-gradient(to right, #ff5f6d, #ffc371)",
              ];
          Toastify({
              text: mssg,
              duration: 4000,
              close: true,
              position : 'right',
              gravity : 'bottom',
              style: {
                  background: bgColors[colorCode],
              }
          }).showToast();
      }
    </script>

      @yield('scripts')

  </div><!-- Body inner end -->

</body>

</html>
