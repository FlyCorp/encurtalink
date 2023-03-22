<!DOCTYPE html>

<html lang="en" data-theme="light">
  <!--begin::Head-->
  <head>
    <title>{{$link->link}}</title>
    <meta charset="utf-8" />
    <meta name="description" content="Link de redirecionamento do encurtador de links" />
    <meta name="keywords" content="encurtador" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Encurtador de links" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="favicon.ico" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    @if ($link->script_header)
    <!--Begin::Google Tag Manager -->
        {!!$link->script_header!!}
    <!--End::Google Tag Manager -->
    @endif

  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body id="kt_body" class="auth-bg bgi-size-cover bgi-position-center bgi-no-repeat">

    <input type="hidden" name="link" value="{{$link->link}}">

    <!--Begin::Google Tag Manager (noscript) -->
    <noscript>
      <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!--End::Google Tag Manager (noscript) -->
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
      <!--begin::Page bg image-->
      <style>
        body {
          background-image: url('/assets/media/backgrounds/bkg-central-3840x1877px.png');
        }

        [data-bs-theme="dark"] body {
          background-image: url('/assets/media/backgrounds/bkg-central-3840x1877px.png');
        }
      </style>
      <!--end::Page bg image-->
      <!--begin::Authentication - Signup Welcome Message -->
      <div class="d-flex flex-column flex-center flex-column-fluid">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center text-center p-10">
          <!--begin::Wrapper-->
          <div class="card card-flush w-lg-650px py-5">
            <div class="card-body py-15 py-lg-20">
                <div style="text-align:center; margin:0 15px 34px 15px">
                    <!--begin:Logo-->
                    <div style="margin-bottom: 10px">
                        <a href="https://keenthemes.com" rel="noopener" target="_blank">
                            <img alt="Logo" src="{{asset('assets/media/avatars/central_farma_logo.png')}}" style="height: 80px">
                        </a>
                    </div>
                    <!--end:Logo-->

                    <!--begin:Media-->
                    <div class="mt-15 mb-10">
                        <span class="spinner-border spinner-lg text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </span>
                    </div>
                    <!--end:Media-->



                    <!--begin:Text-->
                    <div style="font-size: 14px; font-weight: 500; margin-bottom: 27px; font-family:Arial,Helvetica,sans-serif;">
                        <p style="margin-bottom:9px; color:#181C32; font-size: 22px; font-weight:700">Aguarde, você está sendo redirecionado...</p>
                        <p style="margin-bottom:2px; color:#7E8299">Em instantes, você terá acesso ao link solicitado</p>
                    </div>
                    <!--end:Text-->
                </div>
            </div>
          </div>
          <!--end::Wrapper-->
        </div>
        <!--end::Content-->
      </div>
      <!--end::Authentication - Signup Welcome Message-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
      var hostUrl = "/metronic8/demo10/assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->
    @if ($link->script_body)
        {!!$link->script_body!!}
    @endif
    <script>
        $(document).ready(function () {
            let url = $(`input[type="hidden"][name="link"]`).val();
            setTimeout(() => {
                window.location = url;
            }, 3000);
        });
    </script>
    <!--end::Javascript-->
  </body>
  <!--end::Body-->
</html>
