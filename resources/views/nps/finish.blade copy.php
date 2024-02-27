<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Tag Manager -->
    <script>
      (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
          'gtm.start': new Date().getTime(),
          event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
          j = d.createElement(s),
          dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
      })(window, document, 'script', 'dataLayer', 'GTM-TLTB64R');
    </script>
    <!-- End Google Tag Manager -->
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        background: #ffffff;
        -webkit-font-smoothing: antialiased;
      }

      body,
      input,
      textarea,
      button {
        font-family: "Montserrat", sans-serif !important;
        font-weight: 400;
      }

      html {
        scroll-behavior: smooth;

        @media (max-width: 992px) {
          font-size: 93.75%;
        }

        @media (max-width: 768px) {
          font-size: 87.5%;
        }
      }

      button {
        cursor: pointer;
      }

      [disabled] {
        opacity: 0.6;
        cursor: not-allowed;
      }

      a,
      a:hover {
        text-decoration: none;
      }

      hr {
        background-color: #ffffff;
        opacity: 1;
        height: 1px;
      }

      a:focus,
      a:active {
        outline: none !important;
        box-shadow: none;
        outline-style: none;
      }

      textarea:hover,
      select:focus,
      input:hover,
      textarea:active,
      input:active,
      textarea:focus,
      input:focus,
      button:focus,
      button:active,
      button:hover,
      label:focus,
      .btn:active {
        outline: none !important;
        -webkit-appearance: none;
        box-shadow: none !important;
      }

      .form-floating>.form-control:focus~label,
      .form-floating>.form-control:not(:placeholder-shown)~label,
      .form-floating>.form-select~label {
        transform: scale(0.85) translateY(-0.75rem) translateX(0.15rem);
      }

      .form-floating>label {
        padding: 1rem 1.75rem;
      }

      label.box {
        display: flex;
        margin-top: 10px;
        padding: 10px 12px;
        border-radius: 5px;
        cursor: pointer;
        border: 1px solid #ddd
      }

      #one:checked~label.first,
      #two:checked~label.second,
      #three:checked~label.third,
      #four:checked~label.forth,
      #five:checked~label.fifth,
      #six:checked~label.sixth,
      #seven:checked~label.seveth,
      #eight:checked~label.eighth {
        border-color: #35d9c3
      }

      #one:checked~label.first .circle,
      #two:checked~label.second .circle,
      #three:checked~label.third .circle,
      #four:checked~label.forth .circle,
      #five:checked~label.fifth .circle,
      #six:checked~label.sixth .circle,
      #seven:checked~label.seveth .circle,
      #eight:checked~label.eighth .circle {
        border: 6px solid #35d9c3;
        background-color: #fff
      }

      label.box:hover {
        background: #fffcff
      }

      label.box .course {
        display: flex;
        align-items: center;
        width: 100%
      }

      label.box .circle {
        height: 22px;
        width: 22px;
        border-radius: 50%;
        margin-right: 15px;
        border: 2px solid #ddd;
        display: inline-block
      }

      input[type="radio"] {
        display: none
      }

      @media (max-width: 575.98px) {

        .container,
        .container-fluid {
          width: 90vw;
        }
      }

      @media (min-width: 576px) and (max-width: 767.98px) {

        .container,
        .container-sm {
          max-width: none;
          width: 90vw;
        }
      }

      /* CONSUMIDOR */
      section.nps {
        min-height: 100vh;
        background: url("/assets/media/nps/bg.png") no-repeat;
        background-size: cover;
        background-position-y: 0%;
        background-position-x: center;
        background-position-y: center;
      }

      section.nps h2 {
        font-size: 2rem;
        font-weight: 500;
        color: #4a4a4a;
      }

      section.nps h3 {
        font-size: 1.5rem;
        font-weight: 300;
        color: #4a4a4a;
      }

      section.nps .voteNps {
        display: flex;
        justify-content: space-between;
      }

      section.nps .voteNps .voto-list-item {
        cursor: pointer;
        background: #f1f1f1;
        width: 100%;
        height: 75px;
        color: #000;
        font-weight: 700;
        font-size: 20px;
        margin: 0 0 0 5px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
      }

      section.nps .voteNps .voto-list-item:nth-child(1) {
        background: #c90018;
        margin: 0;
      }

      section.nps .voteNps .voto-list-item:nth-child(2) {
        background: #d5202a;
      }

      section.nps .voteNps .voto-list-item:nth-child(3) {
        background: #fd3817;
      }

      section.nps .voteNps .voto-list-item:nth-child(4) {
        background: #fd590d;
      }

      section.nps .voteNps .voto-list-item:nth-child(5) {
        background: #fe980a;
      }

      section.nps .voteNps .voto-list-item:nth-child(6) {
        background: #febf00;
      }

      section.nps .voteNps .voto-list-item:nth-child(7) {
        background: #ebd900;
      }

      section.nps .voteNps .voto-list-item:nth-child(8) {
        background: #e2dd24;
      }

      section.nps .voteNps .voto-list-item:nth-child(9) {
        background: #b1ce07;
      }

      section.nps .voteNps .voto-list-item:nth-child(10) {
        background: #97c21c;
      }

      section.nps .voteNps .voto-list-item:nth-child(11) {
        background: #10ac32;
      }

      section.nps .voteNps .voto-list-item:hover {
        background: #000 !important;
        color: #fff !important;
      }

      @media (max-width: 767.98px) {
        section.nps {
          background-position-y: -50% !important;
        }

        section.nps h2 {
          font-size: 1.25rem;
        }

        section.nps h3 {
          font-size: 1rem;
        }

        section.nps .voteNps .voto-list-item {
          height: 50px;
          margin: 0 0 0 1px;
        }
      }

      section.nps .link-social {
        padding: 0 0.5rem;
        color: #fff;
      }

      section.nps .form-control {
        padding: 1rem !important;
        border: 1px solid #dfdddd;
        color: #000;
        border-radius: 12px !important;
      }

      section.nps .btn.buttonNps {
        margin-top: 1rem;
        background: #FF9600;
        padding: 0.85rem !important;
        border: 1px solid #f8f9fa;
        color: #fff;
        font-weight: 600;
        border-radius: 12px !important;
        width: 100%;
        transition: 0.3s;
      }

      section.nps .btn.buttonNps:hover,
      section.nps .btn.buttonNps:active {
        background: #e0a76d;
      }

      .background-image-container {
        position: relative;
        /* Permite que o elemento seja posicionado em relação ao pai */
        background-color: rgba(255, 255, 255, 0.8);
        /* Fundo branco com transparência */
        padding: 20px;
        /* Espaçamento ao redor da imagem (ajuste conforme necessário) */
        text-align: center;
        /* Centraliza o conteúdo */
      }

      .w-custom-15 {
        width: 15%;
      }
      .w-custom-30 {
        width: 30%;
      }

      /* section.nps > .container{
        background: rgba( 255, 255, 255, 0.35 );
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 13.5px );
        -webkit-backdrop-filter: blur( 13.5px );
        border-radius: 10px;
        border: 1px solid rgba( 255, 255, 255, 0.18 );
      } */
    </style>
    <title>NPS - Central Nutrition</title>
  </head>
  <body>
    <form action="{{ route('nps.reason', [$nps->uuid, $nps->vote]) }}" method="post">
      @csrf
      <section class="nps">

      <div class="container">

        <div class="row pt-5 pb-4">
          <div class="col-12 text-center">
            <img src="{{asset('assets/media/nps/logo.png')}}" class="img-fluid w-custom-30 d-md-none mx-auto">
            <img src="{{asset('assets/media/nps/logo.png')}}" class="img-fluid w-custom-15 d-none d-md-block mx-auto">
          </div>
        </div>

        <div class="row pt-4 pt-md-5 justify-content-center">

          <div class="col-lg-9 col-xl-8 col-xxl-7 text-center">

            <div class="container mb-2">
              <h2>Muito obrigado pelo seu voto!</h2>
              <h3>Agora gostaríamos de saber qual seguimento e o motivo pelo qual você nos deu essa nota.​</h3>

              <div class="row" hidden>
                <div class="col-12">
                  <div>
                    <div class="row">
                      <div class="col-md-6">
                        <input type="radio" name="reason_channel" id="five" value="atendimento" {{(!$nps->reason_channel || $nps->reason_channel == "atendimento") ? 'checked' : null }}>
                        <label for="five" class="box fifth w-100">
                          <div class="course">
                            <span class="circle"></span>
                            <span class="subject">Atendimento</span>
                          </div>
                        </label>
                      </div>
                      <div class="col-md-6">
                        <input type="radio" name="reason_channel" id="six" value="entrega" {{($nps->reason_channel == "entrega") ? 'checked' : null }}>
                        <label for="six" class="box sixth w-100">
                          <div class="course">
                            <span class="circle"></span>
                            <span class="subject">Entrega</span>
                          </div>
                        </label>
                      </div>
                      <div class="col-md-6">
                        <input type="radio" name="reason_channel" id="seven" value="qualidade" {{($nps->reason_channel == "qualidade") ? 'checked' : null }}>
                        <label for="seven" class="box seveth w-100">
                          <div class="course">
                            <span class="circle"></span>
                            <span class="subject">Qualidade</span>
                          </div>
                        </label>
                      </div>
                      <div class="col-md-6">
                        <input type="radio" name="reason_channel" id="eight" value="outros" {{($nps->reason_channel == "outros") ? 'checked' : null }}>
                        <label for="eight" class="box eighth w-100">
                          <div class="course">
                            <span class="circle"></span>
                            <span class="subject">Outros</span>
                          </div>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-9 col-xl-8 col-xxl-7 text-center">
            <div class="container">
              <div class="row justify-content-center pt-3">
              <div class="col-lg-12">
                <textarea name="reason_description" placeholder="Escreva aqui o que motivou dar a nota acima" rows="4" class="form-control textoNps" required>{{$nps->reason_description}}</textarea>
                <button type="submit" class="btn buttonNps">Enviar agora</button>
              </div>
            </div>
            </div>
          </div>

          <div class="col-lg-9 col-xl-8 col-xxl-7 text-center">
            <div class="container">
              <div class="row justify-content-center pt-3">
                <div class="col-12 text-center mt-3">
                  <img src="{{asset('assets/media/nps/footer.png')}}" alt="" class="img-fluid w-90">
                </div>
              </div>
            </div>
            <div class="container">
              <div class="row pb-5">
                <div class="col-12 pt-2 text-center">
                  <a href="#" class="link-social">
                    <i class="fab fa-2x fa-whatsapp"></i>
                  </a>
                  <a href="#" class="link-social">
                    <i class="fab fa-2x fa-facebook-f"></i>
                  </a>
                  <a href="#" class="link-social">
                    <i class="fab fa-2x fa-instagram"></i>
                  </a>
                  <a href="#" class="link-social">
                    <i class="fab fa-2x fa-linkedin-in"></i>
                  </a>
                  <a href="#" class="link-social">
                    <i class="fab fa-2x fa-youtube"></i>
                  </a>
                  <a href="#" class="link-social">
                    <i class="fab fa-2x fa-twitter"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>

        </div>



      </div>
    </section>
    </form>

  </body>
</html>
