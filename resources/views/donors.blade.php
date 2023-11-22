<!DOCTYPE html>
<html>
<head>
<title>Donors</title>
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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large custom-background">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 custom-background" style="font-weight:bold"><i class="fa-solid fa-signal ms-3 scale5 w3-margin-right"></i>Generosity Link</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="background-color: #091055f5 !important;" title="Messages"><i class="fa fa-envelope"></i></a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" style="background-color: #091055f5 !important;" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small" style="background-color:#fe3f40;">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">One new friend request</a>
      <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
      <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
    </div>
  </div>
  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="w3-right w3-bar-item w3-button w3-padding-large w3-theme-d5 custom-background" style="font-weight:bold" type="submit"><i class="fa fa-home w3-margin-right"></i>Logout</button>
  </form>

 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 2</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">Link 3</a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white neumorphic">
        <div class="w3-container"><br>
         <h4 class="w3-center">My Profile</h4>
         @if(session()->has('users'))
            @php
                $user = session('users');
            @endphp
            <!-- Display user information -->
            <p class="w3-center"><img src="data:image/png;base64,{{ base64_encode($user->pic) }}" width="106" height="106" alt="Avatar"/></p>
            <hr>
            <p style="color:#091055f5;font-weight:600"><i class="fas fa-pencil-alt fa-fw w3-margin-right" style="color:#091055f5;"></i> Role: {{ $user->role }}</p>
            <p style="color:#091055f5;font-weight:600"><i class="fa fa-user fa-fw w3-margin-right" style="color:#091055f5;"></i> {{ $user->name }}</p>
            <p style="color:#091055f5;font-weight:600"><i class="fa fa-envelope fa-fw w3-margin-right" style="color:#091055f5;"></i> {{ $user->email }}</p>
        @else
            <!-- Handle the case where $user is not available in the session -->
            <p>No user data available.</p>
        @endif



        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round neumorphic">
        <div class="w3-white neumorphic">


          <button  class="w3-button w3-block w3-left-align" style="background-color:#03a4ed; color:white;" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o fa-fw w3-margin-right" style="color:white;"></i> Create Donation Post</button>

          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" style="font-family: 'Rubik', sans-serif;" id="myModalLabel">Create Donation Post</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" style="font-family: 'Roboto', sans-serif;">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="file">Select pictures of item:</label>
                      <input type="file" class="form-control-file" id="file" name="file">
                    </div>
                    <div class="form-group">
                    <label for="category">Donation Category:</label>
                      <select class="form-control" id="category" name="category">
                          <option value="" selected disabled>Select a category</option>
                          <option value="clothing">Clothing</option>
                          <option value="electronics">Electronics</option>
                          <option value="furniture">Furniture</option>
                          <option value="books">Books</option>
                          <option value="furniture">Pet Adoption</option>
                      </select>
                    </div>
            <div class="form-group">
            <label for="description">Write Description:</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter your description here"></textarea>
            </div>
                    <button type="submit" class="w3-button w3-theme fas fa-pencil-alt" name="send_file">&nbsp; Post</button>
                  </form>
                </div>
              </div>
            </div>
          </div>









          <!-- <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-left-align" style="background-color:#03a4ed; color:white;"><i class="fas fa-paw w3-margin-right" style="color:white;"></i> Upload Pet Video</button> -->
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-left-align" style="background-color:#03a4ed; color:white;"><i class="fa fa-calendar-check-o fa-fw w3-margin-right" style="color:white;"></i> My Posts</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>

        </div>      
      </div>
      <br>
      
      <br>
      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
      </div>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white neumorphic">
            <div class="w3-container w3-padding">


              <!-- Header -->
              <header id="portfolio">
                <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
                <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
                <div class="w3-container w3-bottombar" style="display: flex; justify-content: space-between; align-items: center;">
                    <h1 style="margin: 0;"><b>Campaigns</b></h1>
                    <div class="w3-section w3-padding-16" style="margin-left: auto;">
                        <input style="box-shadow: 5px 5px 15px 5px rgba(0, 0, 0, 0.2); width: 200px; border-radius: 8px; padding: 10px;" class="form-control font-bold neumorphic" id="myInput" type="text" placeholder="Search..." onkeyup="search()">
                    </div>
                </div>

            
              </header>

              <div class="scrollable-content">
                @foreach($campaigns as $campaign)
                    <div class="w3-container w3-card w3-white w3-round w3-margin campaigns neumorphic"><br>
                    <span class="w3-right w3-opacity">
                        <i class="fas fa-stopwatch"></i> <!-- Stopwatch icon -->
                        Time Left: &nbsp<strong>{{ \Carbon\Carbon::parse($campaign->deadline)->diffForHumans() }}</strong>
                    </span>


                        <h4>{{ $campaign->title }}</h4><br>
                        <hr class="w3-clear">
                        <p>{{ $campaign->description }}</p>
                        <div class="w3-row-padding" style="margin:0 -16px; display: flex; justify-content: center; align-items: center;">
                        <div class="w3-half" style="display: flex; justify-content: center;">
                            @if ($campaign->image)
                                <img src="data:image/png;base64,{{ base64_encode($campaign->image) }}" style="width:100%" alt="pic" class="w3-margin-bottom">
                            @endif
                            </div>
                        </div>
                        <a href="{{ route('payment', ['camp_id' => $campaign->camp_id, 'user_id' => session('user_id')]) }}" class="w3-button w3-theme-d1 w3-margin-bottom">
                            <i class="fas fa-hand-holding-usd"></i> Donate
                        </a>
                    </div>
                @endforeach
              </div>

              </div>
            </div>
          </div>
        </div>
      
      <div><br>

    </div>
      
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center neumorphic">
        <div class="w3-container">
        <br><p><strong>Services:</strong></p>
          <img src="/w3images/forest.jpg" alt="pic" style="width:100%;">

          <p style="color:white;"><button class="w3-button w3-block" style="background-color:rgb(27 140 140 / 99%)">Items Donation</button></p>
          <p style="color:white;"><button class="w3-button w3-block" style="background-color:rgb(27 140 140 / 99%)">Food Donations</button></p>
          <p style="color:white;"><button class="w3-button w3-block" style="background-color:rgb(27 140 140 / 99%)">Pet Adoption</button></p>
        </div>
      </div>
      <br>
      
      <!-- <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Friend Request</p>
          <img src="/w3images/avatar6.png" alt="Avatar" style="width:50%"><br>
          <span>Jane Doe</span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
          </div>
        </div>
      </div> -->
      <br>
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->

<footer class="w3-container w3-theme-d5 w3-center">
  <p>© Copyright 2023 Team ASPIRANTS. All Rights Reserved. <br><a rel="nofollow" href="#">GENEROSITY LINK</a></p>
</footer>
 
<script>

	function search() {

	var searchInput = document.getElementById("myInput").value.toLowerCase();

	var elements = document.getElementsByClassName("campaigns");

	// Loop through the elements and check if the search input matches the content
	for (var i = 0; i < elements.length; i++) {
	var content = elements[i].innerText.toLowerCase();
	if (content.includes(searchInput)) {
		elements[i].style.display = "block";
	} else {
		elements[i].style.display = "none";
	}
	}
}

</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>

<script>
    var obj = {};
    obj.donor_name = $('#donor_name').val();
    obj.phone = $('#phone').val();
    obj.address = $('#address').val();
    obj.amount = $('#total_amount').val();
    
    $('#sslczPayBtn').prop('postdata', obj);
</script>

</body>
</html> 
