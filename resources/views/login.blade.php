<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>GL</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('home_assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('home_assets/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('home_assets/assets/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('home_assets/assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{asset('home_assets/assets/css/owl.css')}}">
<!--
    
TemplateMo 562 Space Dynamic

https://templatemo.com/tm-562-space-dynamic

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <h4>GENEROSITY<span>LINK</span></h4>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#contact">Message Us</a></li> 
              <li class="scroll-to-section"><div class="main-red-button"><a href="#contact">Contact Now</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 align-self-center">
        <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
            @include('sign')
        </div>
        <div class="col-lg-3">
        <div class="right-video wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
          <video autoplay loop muted width="700" height="500">
            <source src="{{asset('home_assets/assets/images/d2.mp4')}}" type="video/mp4">
          </video>

        </div>
      </div>
      </div>

    </div>
  </div>
</div>


  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
          <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
              <h2 style= "font-size: 40px; font-weight: 700;"><em><span style="color: #03a4ed;">Donate</em> Now</h2>
          </div>
        <div class="col-lg-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">        

            <div id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.102012049592!2d90.45394511507973!3d23.80018908458274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c87a1f3a4ca9%3A0x8f858f75b50469df!2sUnited%20City!5e0!3m2!1sen!2sbd!4v1631579353289!5m2!1sen!2sbd" width="100%" height="360px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
          <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
              <h4 style="text-align: center; color:black">
                Feel Free To <em><span style="color: #03a4ed;">Contact</span></em> Us</h4>
                <br>
            </div>
            <div class="row">     
              <div class="col-lg-6">
                <fieldset>
                  <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <input type="surname" name="surname" id="surname" placeholder="Surname" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>  
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-button ">Send Message</button>
                </fieldset>
              </div>
            </div>
            <div class="contact-dec">
              <img src="assets/images/contact-decoration.png" alt="">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p>© Copyright 2023 Team ASPIRANTS. All Rights Reserved.          
          <br> <a rel="nofollow" href="#">GENEROSITY LINK</a></p>
        </div>
      </div>
    </div>
  </footer>
  <!-- Scripts -->
  <script src="{{asset('home_assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('home_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('home_assets/assets/js/owl-carousel.js')}}"></script>
  <script src="{{asset('home_assets/assets/js/animation.js')}}"></script>
  <script src="{{asset('home_assets/assets/js/imagesloaded.js')}}"></script>
  <script src="{{asset('home_assets/assets/js/templatemo-custom.js')}}"></script>

</body>
</html>