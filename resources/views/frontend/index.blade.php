<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>ekapaksicup81</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="CSS/flip.min.css" />
    <link rel="stylesheet" href="CSS/style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Oswald');

        html,body {
            margin: 0;
            padding: 0;
            background-color: #dadde6;
            font-family: arial;
            overflow-x: hidden;
        }

        .fl-left {
            float: left
        }

        .fl-right {
            float: right
        }

        h1 {
            text-transform: uppercase;
            font-weight: 900;
            border-left: 10px solid #fec500;
            padding-left: 10px;
            margin-bottom: 30px
        }

        .row {
            overflow: hidden
        }

        .      {
            display: table-row;
            width: 49%;
            background-color: #fff;
            color: #989898;
            margin-bottom: 10px;
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
            border-radius: 4px;
            position: relative
        }

        .card+.card {
            margin-left: 2%
        }

        .date {
            display: table-cell;
            width: 25%;
            position: relative;
            text-align: center;
            border-right: 2px dashed #dadde6
        }

        .date:before,
        .date:after {
            content: "";
            display: block;
            width: 30px;
            height: 30px;
            background-color: #DADDE6;
            position: absolute;
            top: -15px;
            right: -15px;
            z-index: 1;
            border-radius: 50%
        }

        .date:after {
            top: auto;
            bottom: -15px
        }

        .date time {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        .date time span {
            display: block
        }

        .date time span:first-child {
            color: #2b2b2b;
            font-weight: 600;
            font-size: 250%
        }

        .date time span:last-child {
            text-transform: uppercase;
            font-weight: 600;
            margin-top: -10px
        }

        .card-cont {
            display: table-cell;
            width: 75%;
            font-size: 85%;
            padding: 10px 10px 30px 50px
        }

        .card-cont h3 {
            color: #3C3C3C;
            font-size: 130%
        }

        .row:last-child .card:last-of-type .card-cont h3 {
            text-decoration: line-through
        }

        .card-cont>div {
            display: table-row
        }

        .card-cont .even-date i,
        .card-cont .even-info i,
        .card-cont .even-date time,
        .card-cont .even-info p {
            display: table-cell
        }

        .card-cont .even-date i,
        .card-cont .even-info i {
            padding: 5% 5% 0 0
        }

        .card-cont .even-info p {
            padding: 30px 50px 0 0
        }

        .card-cont .even-date time span {
            display: block
        }

        .card-cont a {
            display: block;
            text-decoration: none;
            width: 80px;
            height: 30px;
            background-color: #037FDD;
            color: #fff;
            text-align: center;
            line-height: 30px;
            border-radius: 2px;
            position: absolute;
            right: 10px;
            bottom: 10px
        }

        .row:last-child .card:first-child .card-cont a {
            background-color: #037FDD
        }

        .row:last-child .card:last-child .card-cont a {
            background-color: #037FDD
        }

        .background {
        background-image: url("assets/home/Dekstoppp.jpg");
        background-size: contain;
        background-position: top;
      }

      /* Styling Container */
      .countdown-container {
        background-color: #fff8dc;
        /* Light beige for softer look */
        padding: 15px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        border: 2px solid #f4d03f;
      }

      /* Styling Countdown Timer */
      .countdown {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 2rem;
        color: #000;
      }

      /* Styling Timer Numbers */
      .countdown div {
        background: #000;
        color: #fff;
        padding: 15px 25px;
        font-size: 2.5rem;
        font-weight: bold;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      }

      .background-phase1 {
        background-image: url("assets/others/element-%28guest-star%29.png");
        background-size: cover;
        background-position: center;
        position: absolute;
        height: 300px;
        display: flex;
        justify-content: center;
        margin-top: 100px;
        align-items: center;
        width: 100%;
        z-index: 0;
      }

      .tick {
        display: flex;
        align-items: center;
        font-size: 2rem;
        /* Default size for mobile */
        color: #000000;
        font-weight: bold;
        width: 100%;
        height: 100%;
      }

      @media (min-width: 640px) {
        /* Tablet */
        .tick {
          font-size: 2.5rem;
          /* Size for tablet */
        }
      }

      @media (min-width: 768px) {
        /* Desktop */
        .tick {
          font-size: 3rem;
          /* Size for desktop */
        }
      }

      @media only screen and (max-width: 480px) {
        .background {
          background-image: url("assets/home/gspotrait.png");
          background-size: cover;
          background-position: top;
        }
      }

        @media screen and (max-width: 860px) {
            .card {
                display: block;
                float: none;
                width: 100%;
                margin-bottom: 10px
            }

            .card+.card {
                margin-left: 0
            }

            .card-cont .even-date,
            .card-cont .even-info {
                font-size: 75%
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow"
      style="background-color: #dfbc6f">
      <div class="container-fluid">
        <a class="navbar-brand" href="#home">
          <img src="assets/home/EPIC.png" alt="logo" width="65" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="offcanvas offcanvas-end"
          tabindex="-1"
          id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel"
        >
          <div class="offcanvas-header">
            <img src="assets/home/EPIC.png" alt="logo" width="65" />
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a
                  class="nav-link mx-lg-2 active"
                  aria-current="page"
                  href="#home"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2 active" href="#lineup">Lineup</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2 active" href="#ticket">Ticket</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2 active" href="#contact"
                  >Contact Person</a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- End Navbar -->

    <!-- Content -->
    <section class="flex flex-col items-center min-h-screen background pt-4 sm:pt-28 md:pt-10 lg:pt-40"
    >
      <img
        src="assets/home/thankyou.png"
        alt="Logo"
        class="w-full sm:w-4/5 md:w-4/5 lg:w-3/4 max-w-4xl mb-6 sm:mb-6 md:mb-12 pt-40 py-6 sm:pt-0 md:pt-0"
        id="home"
      />
      <div
        class="-mt-20 sm:-mt-20 md:-mt-30 mb-6 sm:mb-12 md:mb-20 w-full px-4 sm:px-0"
      >
        <button
          onclick="document.getElementById('ticket').scrollIntoView({ behavior: 'smooth' });"
          class="mx-auto bg-white font-titan-one font-black text-lg sm:text-2xl md:text-2xl lg:text-4xl rounded-full hover:brightness-95 hover:transform hover:scale-105 transition-transform duration-200 shadow-[3px_3px_0px_rgba(0,0,0,1)] sm:shadow-[8px_8px_0px_rgba(0,0,0,1)] px-6 sm:px-12 md:px-24 lg:px-32 py-2 border-2 sm:border-4 border-black sm:py-2 md:py-4 block text-[#812d2b] tracking-wider"
          style="
            text-shadow: 0.5px 0 0 #812d2b, -0.5px 0 0 #812d2b,
              0 0.5px 0 #812d2b, 0 -0.5px 0 #812d2b, 0.5px 0.5px 0 #812d2b,
              -0.5px -0.5px 0 #812d2b, 0.5px -0.5px 0 #812d2b,
              -0.5px 0.5px 0 #812d2b;
          "
        >
          BUY TICKETS HERE!
        </button>
      </div>

      <section
        class="flex flex-col items-center w-full max-w-7xl mx-auto mt-4 sm:mt-40 md:mt-1 lg:mt-56"
      >
        <div
          id="lineup"
          class="relative flex flex-col items-center gap-2 sm:gap-12 md:gap-16 w-full"
        >
          <img
            src="assets/home/OUR LINEUP EPIC.png"
            alt="Logo"
            class="w-full sm:w-full md:w-3/5 lg:w-3/4 max-w-2xl mt-80 sm:mt-10 lg:-mt-40 xl:mt-10 relative z-10"
          />
          <div class="flex flex-col lg:flex-row items-center justify-center md:-mt-30">
          <img
            src="assets/home/arash.png"
            alt="Logo"
            class="w-full sm:w-[35%] md:w-[30%] lg:w-[50%] max-w-5xl xl:pb-40 lg:-mt-20 relative z-10"
          />
          <img
            src="assets/home/djmaxty.png"
            alt="Logo"
            class="w-[75%] sm:w-[15%] md:w-[20%] lg:w-[35%] max-w-5xl xl:pb-40 lg:-mt-20 relative z-10"
          />
          </div>

          <div
            class="flex flex-col items-center gap-4 sm:gap-6 md:gap-8 w-full sponsor py-4 mt-40 sm:mt-0"
          >
            <img
              src="assets/home/sponsor.png"
              alt="Logo"
              class="w-full sm:w-full md:w-3/4 lg:w-2/3 max-w-2xl lg:-mb-20"
            />

          </div>
        </div>

        <div
          class="relative flex flex-col mt-10 mb-5 items-center w-full md:py-4 px-4 sm:px-0"
        >
          <img
            src="assets/home/tanggal.png"
            alt="Logo"
            class="w-[100%] md:w-[80%] mt-2 sm:mt-10 md:mt-16 lg:mt-24 lg:w-[90%] max-w-5xl relative z-10"
          />
        </div>
      </section>
      
      <!-- End Phase 1 -->
      <div
        class="relative flex flex-col items-center gap-6 sm:gap-12 md:gap-16 w-full sm:py-16 mt-10 mb-10 sm:mt-8 md:mt-5 sm:px-0"
      >
        <div
          class="shadow-lg w-full sm:w-auto md:w-auto lg:w-auto px-5 mb-20 sm:mb-32 md:mb-40 lg:mb-0 lg:-mt-40"
        >
          <div class="tick" data-did-init="handleTickInit">
            <div data-layout="horizontal fit">
              <span
                data-key="days"
                data-transform="pad(000)"
                data-view="flip"
              ></span>
              <span
                data-view="text"
                data-key="sep"
                class="tick-text-inline"
              ></span>
              <span
                data-key="hours"
                data-transform="pad(00)"
                data-view="flip"
              ></span>
              <span
                data-view="text"
                data-key="sep"
                class="tick-text-inline"
              ></span>
              <span
                data-key="minutes"
                data-transform="pad(00)"
                data-view="flip"
              ></span>
              <span
                data-view="text"
                data-key="sep"
                class="tick-text-inline"
              ></span>
              <span
                data-key="seconds"
                data-transform="pad(00)"
                data-view="flip"
              ></span>
            </div>
          </div>
        </div>
        <div
          class="absolute bottom-0 w-full flex justify-center mt-40 md:mt-48 lg:mt-56"
        >
        </div>
      </div>
      <!-- Google Map Iframe -->
<div class="flex justify-center lg:-mt-40">
<div class="w-full">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3630.423750300758!2d106.91503027458991!3d-6.251089161204848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698cd41bc066cb%3A0x293b106e14ca5020!2sSMA%20Negeri%2081%20Jakarta!5e1!3m2!1sid!2sid!4v1746807505816!5m2!1sid!2sid"
      width="100%"
      height="450"
      style="border:0;"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>
</div>
    </section>
    <section class="bg-cover bg-center py-12"  id="ticket"  style="background-image: url('assets/home/dekstoppp.jpg')">
  <div class="row grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-8">
    @foreach($data as $d)
      <article class="flex flex-col justify-between bg-white/30 backdrop-blur-md p-6 rounded-xl shadow-md h-full">
          <div>
            <section class="date text-white mb-4">
                <time datetime="17th Mei">
                    <span class="text-3xl font-bold block">17</span>
                    <span class="uppercase text-sm">Mei</span>
                </time>
            </section>
            <section class="card-cont">
                <small class="text-white">{{$d->name}}</small>
                <h3 class="text-2xl font-bold text-white mb-2">{{$d->venue}}</h3>
                <div class="even-date flex items-center text-white text-sm mb-2">
                    <i class="fa fa-calendar mr-2"></i>
                    <time>
                        <span>{{\Carbon\Carbon::parse($d->start_time)->format('l, d M Y')}}</span>
                        <span>13.30</span>
                    </time>
                </div>
                <div class="even-info flex items-center text-white text-sm mb-6">
                    <i class="fa fa-map-marker mr-2"></i>
                    <p>Konser Tahunan</p>
                </div>
                
                <div class="even-info flex items-center text-white text-sm mb-6">
                    <i class="fa fa-map-marker mr-2"></i>
                    <p class="text-white font-semibold text-lg mb-2">
                  Harga: Rp{{ number_format($d->price, 0, ',', '.') }}
                  </p>

                </div>
          </div>
          <a href="{{route('front.booking', ['id' => $d->id])}}" class="mt-4 inline-block px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold text-center rounded-lg transition">Pesan</a>
      </article>
    @endforeach
  </div>
</section>
<footer class="footer" id="contact">
      <div class="social-icons">
        <a href="https://www.instagram.com/ekapaksicup81/" target="_blank">
          <img src="assets/home/instagram.svg" alt="App 1" />
        </a>
        <a href="https://www.tiktok.com/@ekapaksicup.81" target="_blank">
          <img src="assets/home/tiktok.svg" alt="App 2" />
        </a>
        <a href="http://wa.me/6283171932253" target="_blank">
          <img src="assets/home/whatsapp.svg" alt="App 3" />
        </a>
      </div>

      <div class="contact-section">
        <p class="contact-title">Contact Person:</p>
        <div class="contact-links">
          <a href="https://wa.me/6282113827629" target="_blank">Tenant</a>
          <a href="https://wa.me/6282124367937" target="_blank">Sponsor</a>
          <a href="https://wa.me/6287872920001" target="_blank"
            >Media Partner</a
          >
        </div>
      </div>
    </footer>

<script src="JS/script.js"></script>
<script src="JS/flip.min.js"></script>
<script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script>
(function(){if(!window.chatbase||window.chatbase("getState")!=="initialized"){window.chatbase=(...arguments)=>{if(!window.chatbase.q){window.chatbase.q=[]}window.chatbase.q.push(arguments)};window.chatbase=new Proxy(window.chatbase,{get(target,prop){if(prop==="q"){return target.q}return(...args)=>target(prop,...args)}})}const onLoad=function(){const script=document.createElement("script");script.src="https://www.chatbase.co/embed.min.js";script.id="MyWMKxaqbmPjHCWc5pJc8";script.domain="www.chatbase.co";document.body.appendChild(script)};if(document.readyState==="complete"){onLoad()}else{window.addEventListener("load",onLoad)}})();
</script>
<script type="text/javascript">

</script>

</body>

</html>
