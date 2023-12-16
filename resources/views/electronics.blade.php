<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Electronics</title>
<style>


/* Layout Structure=========================================*/

.main {
  background: #eee8dd; /* Light background color */
  border-radius: 20px; /* Rounded corners */
  display: flex;
  flex-direction: column;
  justify-content: center;
  height: 78vh;
  width: 95%;
  padding: 20px; /* Adjust padding as needed */
  box-shadow: 
    10px 10px 15px #cbc4b8, /* Light shadow on the top-left */
    -10px -10px 15px #ffffff; /* Dark shadow on the bottom-right */
}

@import url('https://fonts.googleapis.com/css?family=El+Messiri');

.carde {
  position: relative;
  max-width: 20em;
  max-height: 27em;
  margin: 2rem auto;
  padding: 2em;
  background: #fff;
  border-radius: 1.5em; /* Adjust the value for desired roundness */
  box-shadow: 0 0 1em rgba(0, 0, 0, 0.1), 0 0.5em 1em rgba(0, 0, 0, 0.2); /* Neumorphic shadow */
  justify-content: center; /* Center horizontally */
  align-items: center;
}

.card__img {
  display: block;
  width: 100%; /* Adjust this if needed */
  height: 10em; /* Set a fixed height */
  object-fit: contain; /* Fit the whole image within the container */
  margin: 1em auto;
  border-radius: 2px;
}



.card__title {
  margin: 0 auto 1em;
  color: #091055f5;
  text-align: center;
  text-transform: capitalize;
}

.card__text {
  margin: 2em 5%;
  color: #646464;
}

.card__btn {
  display: table;
  padding: .7em 4em;
  background: rgb(30 118 118 / 99%);
  border-color: #fe3f40;
  color: #fff;
  text-decoration: none;
  margin: 1em auto 0;
  transition: color 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 5px 5px 15px 5px rgba(0, 0, 0, 0.2);
  border-radius: 1.3em;
}

.card__btn:hover {
  color: #fe3f40;
  font-weight: bold;
  box-shadow: 2px 2px 5px 2px rgba(0, 0, 0, 0.2);
}

.carde-area {
  align-items: center;
  display: flex;
  flex-wrap: nowrap;
  height: 100%;
  justify-content: space-evenly;
  padding: 1rem;
}

/**
 * Card #9
 */

.card--9 {

    transition: background-color 0.3s ease;
  --mouseX9: 0;
  --mouseY9: 0;
  --padding: 1em;

  background: #fff;
  position: relative;

  &::before {
    display: block;
    position: absolute;
    top: calc(var(--padding) * -1);
    bottom: calc(var(--padding) * -1);
    left: calc(var(--padding) * -1);
    right: calc(var(--padding) * -1);
    content: ' ';
    z-index: -1;
    background: #091055f5;
    opacity: .9;
    transform: perspective(700px) rotateX(calc(var(--mouseY9) * -1deg)) rotateY(calc(var(--mouseX9) * 1deg));
  }
}

.card--9:hover {
    background-color: #f0f3ff;
  }


</style>  
</head>
<body>

<main class="main">

  <div class="w3-container w3-bottombar" style="display: flex; justify-content: space-between; align-items: center;">
    <h1 style="margin: 0;"><b>Electronics</b></h1>
    <div class="w3-section w3-padding-16" style="margin-left: auto;">
        <input style="box-shadow: 5px 5px 15px 5px rgba(0, 0, 0, 0.2); width: 300px; border-radius: 8px; padding: 10px;" class="form-control font-bold neumorphic" id="myInput2" type="text" placeholder="Search Electronics Product..." onkeyup="searches()">
    </div>
  </div>


  <div id="electronicsCarousel" class="carousel slide carde-area" data-ride="carousel">
    <div class="carousel-inner">
        @php $chunks = $electronics->chunk(2); @endphp
        @foreach ($chunks as $index => $chunk)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="row justify-content-center">
                    @foreach ($chunk as $electronic)
                        <div class="col-md-4">
                            <div class="carde card--9">
                                <h2 class="card__title"><b>{{$electronic->title}} </b></h2>
                                <img class="card__img" src="data:image/jpeg;base64,{{ base64_encode($electronic->image) }}" alt="{{ $electronic->category }}">
                                <p class="card__text"><b>{{$electronic->description}}</b></p>
                                
                              <!-- <form id="electronicSeekDonationForm" data-donation-id="{{ $electronic->d_id }}" action="{{ route('handle.button.click') }}" method="POST">
                                @csrf
                                <input type="hidden" name="donation_id" value="{{ $electronic->d_id }}">
                                <button type="submit" class="card__btn">Seek Donation</button>
                              </form> -->

                              <form id="electronicSeekDonationForm" data-donation-id="{{ $electronic->d_id }}" action="{{ route('handle.button.click') }}" method="POST">
                                  @csrf
                                  <input type="hidden" name="donation_id" value="{{ $electronic->d_id }}">
                                  <button type="button" onclick="submitForm(this)" class="card__btn">Seek Donation</button>
                              </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#electronicsCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#electronicsCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
</div>

    </main>
    
</body>

<script>
  var card9 = document.querySelector(".card--9");

  card9.addEventListener('mousemove', function (e) {
    var wh = window.innerHeight / 2,
      ww = window.innerWidth / 2;
    card9.style.setProperty('--mouseX9', (e.clientX - ww) / 25);
    card9.style.setProperty('--mouseY9', (e.clientY - wh) / 25);
  });

  card9.addEventListener('mouseleave', function (e) {
    card9.style.setProperty('--mouseX9', 0);
    card9.style.setProperty('--mouseY9', 0);
  });
</script>

<script>
      document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.card__btn');

        buttons.forEach(button => {
            const donationId = button.closest('form').getAttribute('data-donation-id');
            
            fetch(`/get-req-status?donation_id=${donationId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Network response was not ok.");
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.req_status) {
                        if (data.req_status.toLowerCase() === 'pending') {
                            button.textContent = 'Requested';
                        } else if (data.req_status.toLowerCase() === 'accepted') {
                            button.textContent = 'Accepted';
                        } else if (data.req_status.toLowerCase() === 'rejected') {
                            button.textContent = 'Sorry, donated.';
                        } else {
                            button.textContent = data.req_status;
                        }
                    }
                })
                .catch(error => {
                    console.error('There was an error:', error);
                });
        });
    });
    function submitForm(button) {
        const form = button.closest('form');
        const donationId = form.getAttribute('data-donation-id');
        const formData = new FormData(form);

        fetch(form.action, {
            method: form.method,
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok.');
            }
            return response.json();
        })
        .then(data => {
            if (data.status) {
                if (data.status.toLowerCase() === 'pending') {
                    button.textContent = 'Requested';
                } else if (data.status.toLowerCase() === 'accepted') {
                    button.textContent = 'Accepted';
                } else if (data.status.toLowerCase() === 'rejected') {
                    button.textContent = 'Sorry, donated.';
                } else {
                    button.textContent = data.status;
                }
            }
            // Display the JSON response in a popup
            alert(JSON.stringify(data));
        })
        .catch(error => {
            console.error('There was an error:', error);
        });
    }
</script>


<script>
    function searches() {
        var searchInput = document.getElementById("myInput2").value.toLowerCase();
        var cards = document.querySelectorAll('#electronicsCarousel');

        cards.forEach(function(card) {
            var title = card.querySelector('.card__title').innerText.toLowerCase();
            var description = card.querySelector('.card__text').innerText.toLowerCase();
            var shouldShow = title.includes(searchInput) || description.includes(searchInput);
            card.style.display = shouldShow ? 'block' : 'none';
        });
    }
</script>






</html>