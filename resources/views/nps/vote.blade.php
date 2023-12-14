<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
        background: #dfdddd;
        padding: 1rem !important;
        border: none !important;
        color: #000;
        border-radius: 12px !important;
      }

      section.nps .btn.buttonNps {
        margin-top: 1rem;
        background: #82d9c3;
        padding: 0.85rem !important;
        border: none !important;
        color: #fff;
        font-weight: 600;
        border-radius: 12px !important;
        width: 100%;
        transition: 0.3s;
      }

      section.nps .btn.buttonNps:hover,
      section.nps .btn.buttonNps:active {
        background: #259433;
      }
    </style>
    <title>NPS - Central Nutrition</title>
  </head>
  <body>
    <section class="nps">
      <div class="container">
        <div class="row pt-5 pb-4">
          <div class="col-12 text-center">
            <img src="{{asset('assets/media/nps/logo.png')}}" alt="" height="120" class="img-fluid">
          </div>
        </div>
        <div class="row pt-4 pt-md-5 justify-content-center">
          <div class="col-lg-9 col-xl-8 col-xxl-7 text-center">
            <h2>Em uma escala de 0 a 10, qual a probabilidade de você recomendar nossos produtos?</h2>
          </div>
        </div>
        <div class="row pt-4 pb-4 pb-md-5">
          <div class="col-12 voteNps">
             @for ($i = 0; $i <= 10; $i++)
             <a href="{{route('nps.vote', [$nps->uuid, $i])}}" class="voto-list-item">{{$i}}</a>
             @endfor
          </div>
        </div>
        <div class="row pt-4 pt-md-5 pb-5 pb-lg-0 justify-content-center">
          <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4 text-center" style="padding-bottom: 100px;">
            <img src="{{asset('assets/media/nps/title.png')}}" alt="" class="img-fluid">
          </div>
        </div>
        <div class="row pb-5">
          <div class="col-12 text-center">
            <img src="{{asset('assets/media/nps/produtos.png')}}" alt="" class="img-fluid">
          </div>
        </div>
        <div class="row pb-5">
          <div class="col-12 text-center">
            <img src="{{asset('assets/media/nps/footer.png')}}" alt="" class="img-fluid">
          </div>
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
    </section>
  </body>
</html>
