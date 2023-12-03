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
  left: -15px;
  transition: 0.3s;
  padding: 15px;
  width: 100px;
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

#toys {
  top: 260px;
  background-color: #8c5fed;
}

#furniture {
  top: 340px;
  background-color: #555;
}
</style>
</head>
<body>

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

<div id="mySidenav" class="sidenav">
    <a href="#" data-content="book" id="book">Books</a>
    <a href="#" data-content="electronics" id="electronics">Electronic</a>
    <a href="#" data-content="clothing" id="clothing">Clothing</a>
    <a href="#" data-content="toys" id="toys">Toys</a>
    <a href="#" data-content="furniture" id="furniture">Furniture</a>
</div>

  <div id="bookContent" class="mySidenav" style="margin-left: 160px; margin-top: 70px;">
      <h2>Books</h2>
      <p>Hover over the buttons in the left side navigation to open them.</p>
  </div>

  <div id="electronicsContent" class="mySidenav" style="margin-left: 160px; margin-top: 70px;">
      <h2>Electronics</h2>
      <p>Hover over the buttons in the left side navigation to open them.</p>
  </div>

  <!-- Add content for other sections similarly -->
  <div id="clothingContent" class="mySidenav" style="margin-left: 160px; margin-top: 70px;">
      <h2>Clothing</h2>
      <p>Content for clothing section...</p>
  </div>

  <div id="toysContent" class="mySidenav" style="margin-left: 160px; margin-top: 70px;">
      <h2>Toys</h2>
      <p>Content for toys section...</p>
  </div>

  <div id="furnitureContent" class="mySidenav" style="margin-left: 160px; margin-top: 70px;">
      <h2>Furniture</h2>
      <p>Content for furniture section...</p>
  </div>


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