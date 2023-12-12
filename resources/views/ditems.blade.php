<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items Donations</title>

    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="{{asset('donors_assets/donors.css')}}">

        <link rel="stylesheet" href="{{asset('donors_assets/donors.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style>

        #mySidenav a {
          position: absolute;
          left: -8px;
          transition: 0.3s;
          padding: 15px;
          width: 120px;
          text-decoration: none;
          font-size: 20px;
          color: white;
          border-radius: 0 5px 5px 0;
          margin-top: 60px;
        }

        #mySidenav a:hover {
          left: 0;
        }

        #book {
          top: 20px;
          background-color: #069c49;
        }

        #electronics {
          top: 100px;
          background-color: #239bfa;
        }

        #clothing {
          top: 180px;
          background-color: #f44336;
        }

        #furniture {
          top: 260px;
          background-color: #8c5fed;
        }

        /* #toys {
          top: 340px;
          background-color: #555;
        } */

        /* Footer ====================================*/

        .footer {
          background-color: #333;
          margin-top: 3rem;
          padding: 1rem 0;
          width: 100%;
        }

        .footer-text {
          color: #fff;
          font-size: 1.2rem;
          text-align: center;
        }
</style>
</head>
<body style="background-color: #ccc;">

<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align w3-large custom-background">
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
        <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 custom-background" style="font-weight:bold"><i class="fa-solid fa-signal ms-3 scale5 w3-margin-right"></i>Generosity Link</a>
        <a href="#" class="w3-right w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="background-color: #091055f5 !important;">
            <img src="data:image/png;base64,{{ base64_encode(session('pic')) }}" width="25" height="25" alt="User Image" class="w3-circle">
        </a>
    </div>
</div>

<div id="mySidenav" class="sidenav" style="margin-top: 40px;">
    <a href="#" data-content="book" id="book">Books</a>
    <a href="#" data-content="electronics" id="electronics">Electronic</a>
    <a href="#" data-content="clothing" id="clothing">Clothes</a>
    <a href="#" data-content="furniture" id="furniture">Furniture</a>
</div>

  <div id="bookContent" class="mySidenav" style="margin-left: 160px; margin-top: 70px;">
      @include('books')
  </div>

  <div id="electronicsContent" class="mySidenav" style="margin-left: 160px; margin-top: 70px;">
    @include('electronics')
  </div>

  <div id="clothingContent" class="mySidenav" style="margin-left: 160px; margin-top: 70px;">
    @include('clothes')
  </div>

  <div id="furnitureContent" class="mySidenav" style="margin-left: 160px; margin-top: 70px;">
    @include('furnitures')
  </div>

  <footer class="footer">
      <p class="footer-text">© Copyright 2023 Team ASPIRANTS. All Rights Reserved.</p>
    </footer>

</body>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebarItems = document.querySelectorAll("#mySidenav a");
        const contentSections = document.querySelectorAll(".mySidenav");

        function hideAllContentSections() {
            contentSections.forEach(section => {
                section.style.display = "none";
            });
        }

        function showContentSection(sectionId) {
            hideAllContentSections();
            const section = document.getElementById(sectionId);
            if (section) {
                section.style.display = "block";
            }
        }

        sidebarItems.forEach(item => {
            item.addEventListener("click", function (event) {
                event.preventDefault();
                const contentToLoad = item.getAttribute("data-content");
                showContentSection(contentToLoad + "Content");
            });
        });

        showContentSection("bookContent"); // Show default content on page load
    });
</script>

</html>