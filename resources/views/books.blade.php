<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
<style>
    /* CSS reset */
*,
*::after,
*::before {
  box-sizing: inherit;
  margin: 0;
  padding: 0;
}

/* html { font-size: 80%; } */

    /* Main heading for card's front cover */
.card-front__heading {
  font-size: 1.5rem;
  margin-top: .25rem;
}

/* Main heading for inside page */
.inside-page__heading { 
  padding-bottom: 1rem; 
  width: 100%;
}

/* Mixed */

/* For both inside page's main heading and 'view me' text on card front cover */
.inside-page__heading,
.card-front__text-view {
  font-size: 1.3rem;
  font-weight: 800;
  margin-top: .2rem;
}

.inside-page__heading--city,
.card-front__text-view--city { color: rgb(9 16 85 / 96%); }

.inside-page__heading--ski,
.card-front__text-view--ski { color: #2aaac1; }

.inside-page__heading--beach,
.card-front__text-view--beach { color: #fa7f67; }

.inside-page__heading--camping,
.card-front__text-view--camping { color: #00b97c; }

/* Front cover */

.card-front__tp { color: #fafbfa; }

/* For pricing text on card front cover */
.card-front__text-price {
  font-size: 1.2rem;
  margin-top: -.2rem;
}

/* Back cover */

/* For inside page's body text */
.inside-page__text {
  color: #333;
}

/* Icons ===========================================*/

.card-front__icon {
  fill: #fafbfa;
  font-size: 3vw;
  height: 3.25rem;
  margin-top: -.5rem;
  width: 3.25rem;
}

/* Buttons =================================================*/

.inside-page__btn {
  background-color: transparent;
  border: 3px solid;
  border-radius: .5rem;
  font-size: 1.2rem;
  font-weight: 600;
  margin-top: 2rem;
  overflow: hidden;
  padding: .7rem .75rem;
  position: relative;
  text-decoration: none;
  transition: all .3s ease;
  width: 90%;
  z-index: 10;
}

.inside-page__btn::before { 
  content: "";
  height: 100%;
  left: 0;
  position: absolute;
  top: 0;
  transform: scaleY(0);
  transition: all .3s ease;
  width: 100%;
  z-index: -1;
}

.inside-page__btn--city { 
  border-color: #fe3f40;
  color: #fe3f40;
}

.inside-page__btn--city::before { 
  background-color: rgb(30 118 118 / 99%);
}

.inside-page__btn:hover { 
  color: #fafbfa;
}

.inside-page__btn:hover::before { 
  transform: scaleY(1);
}

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


/* Container to hold all cards in one place */
.card-area {
  align-items: center;
  display: flex;
  flex-wrap: nowrap;
  height: 100%;
  justify-content: space-evenly;
  padding: 1rem;
}

/* Card ============================================*/

/* Area to hold an individual card */
.card-section {
  align-items: center;
  display: flex;
  height: 100%;
  justify-content: center;
  width: 100%;
}

/* A container to hold the flip card and the inside page */
.card {
  background-color: rgba(0,0,0, .05);
  box-shadow: -.1rem 1.7rem 6.6rem -3.2rem rgba(0,0,0,0.5);
  height: 15rem;
  position: relative;
  transition: all 1s ease;
  width: 15rem;
}

/* Flip card - covering both the front and inside front page */

/* An outer container to hold the flip card. This excludes the inside page */
.flip-card {
  height: 15rem;
  perspective: 100rem;
  position: absolute;
  right: 0;
  transition: all 1s ease;
  visibility: hidden;
  width: 15rem;
  z-index: 100;
}

/* The outer container's visibility is set to hidden. This is to make everything within the container NOT set to hidden  */
/* This is done so content in the inside page can be selected */
.flip-card > * {
  visibility: visible;
}

/* An inner container to hold the flip card. This excludes the inside page */
.flip-card__container {
  height: 100%;
  position: absolute;
  right: 0;
  transform-origin: left;
  transform-style: preserve-3d;
  transition: all 1s ease;
  width: 100%;
}

.card-front,
.card-back {
  backface-visibility: hidden;
  height: 100%;
  left: 0;
  position: absolute;
  top: 0;
  width: 100%;
}

/* Styling for the front side of the flip card */

/* container for the front side */
.card-front {
  background-color: #fafbfa;
  height: 15rem;
  width: 15rem;
}

/* Front side's top section */
.card-front__tp {
  align-items: center;
  clip-path: polygon(0 0, 100% 0, 100% 90%, 57% 90%, 50% 100%, 43% 90%, 0 90%);
  display: flex;
  flex-direction: column;
  height: 12rem;
  justify-content: center;
  padding: .75rem;
  position: relative; /* Add this to maintain the aspect ratio of the image */
  overflow: hidden;
}

.card-front__tp img {
        /* Set the image width and height to fit the card */
        width: 100%; /* Ensure the image fills the container */
        height: 100%; /* Ensure the image fills the container */
        object-fit: cover; /* Maintain aspect ratio and fill */
        position: absolute; /* Position the image */
        top: 0; /* Align to the top */
        left: 0; /* Align to the left */
    }

.card-front__tp--city {
  background: linear-gradient(
    to bottom,
    rgb(9 16 85 / 96%),
    rgb(0 68 68 / 96%)
  );
}

.card-front__tp--ski {
  background: linear-gradient(
    to bottom,
    #47c2d7,
    #279eb2
  );
}

.card-front__tp--beach {
  background: linear-gradient(
    to bottom,
    #fb9b88,
    #f86647
  );
}

.card-front__tp--camping {
  background: linear-gradient(
    to bottom,
    #00db93,
    #00b97d
  );
}

/* Front card's bottom section */
.card-front__bt {
  align-items: center;
  display: flex;
  justify-content: center;
}

/* Styling for the back side of the flip card */

.card-back {
  background-color: #fafbfa;
  transform: rotateY(180deg);
}

/* Specifically targeting the <video> element */
.video__container {
  clip-path: polygon(0% 0%, 100% 0%, 90% 50%, 100% 100%, 0% 100%);
  height: auto;
  min-height: 100%;
  object-fit: cover;
  width: 100%;
}

/* Inside page */

.inside-page {
  background-color: #fafbfa;
  box-shadow: inset 20rem 0px 5rem -2.5rem rgba(0,0,0,0.25);
  height: 100%;
  padding: 1rem;
  position: absolute;
  right: 0;
  transition: all 1s ease;
  width: 15rem;
  z-index: 1;
  justify-content: center;
  text-align: center; 
}

.inside-page__container {
  align-items: center;
  /* display: flex;   */
  flex-direction: column;
  height: 100%;
  text-align: center; 
  width: 100%;
}

/* Functionality ====================================*/

/* This is to keep the card centered (within its container) when opened */
.card:hover {
  box-shadow:
  -.1rem 1.7rem 6.6rem -3.2rem rgba(0,0,0,0.75);
  width: 30rem;
}

/* When the card is hovered, the flip card container will rotate */
.card:hover .flip-card__container {
  transform: rotateY(-180deg);
}

/* When the card is hovered, the shadow on the inside page will shrink to the left */
.card:hover .inside-page {
  box-shadow: inset 1rem 0px 5rem -2.5rem rgba(0,0,0,0.1);
}
</style>  
</head>
<body>

<main class="main">

  <div class="w3-container w3-bottombar" style="display: flex; justify-content: space-between; align-items: center;">
    <h1 style="margin: 0;"><b>Books</b></h1>
    <div class="w3-section w3-padding-16" style="margin-left: auto;">
        <input style="box-shadow: 5px 5px 15px 5px rgba(0, 0, 0, 0.2); width: 300px; border-radius: 8px; padding: 10px;" class="form-control font-bold neumorphic" id="myInput" type="text" placeholder="Search Book..." onkeyup="search()">
    </div>
  </div>
        <section class="card-area">
        
            <!-- Card: City -->
            @foreach ($books as $book)
            <section class="card-section">
                <div class="card">
                    <div class="flip-card">
                        <div class="flip-card__container">
                            <div class="card-front">
                                <div class="card-front__tp card-front__tp--city">
                                <img src="data:image/jpeg;base64,{{ base64_encode($book->image) }}" alt="{{ $book->category }}">
                                </div>

                                <div class="card-front__bt">
                                    <p class="card-front__text-view card-front__text-view--city">
                                        View me
                                    </p>
                                </div>
                            </div>
                            <div class="card-back">
                                <video class="video__container" autoplay muted loop>
                                    <source class="video__media" src="https://player.vimeo.com/external/370331493.sd.mp4?s=e90dcaba73c19e0e36f03406b47bbd6992dd6c1c&profile_id=139&oauth2_token_id=57447761" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>

                    <div class="inside-page">
                        <div class="inside-page__container">
                            <h3 class="inside-page__heading inside-page__heading--city">
                                  <h2 class="card-front__heading">
                                  {{$book->title}}
                                  </h2>
                            </h3>
                            <p class="inside-page__text">
                                {{$book->description}}
                            </p>
                            <a href="#" class="inside-page__btn inside-page__btn--city" onclick="changeToPending(this)">Seek Donation</a>

                        </div>
                    </div>
                </div>
            </section>
            @endforeach


        </section>

    </main>
    
</body>

<script>
  function changeToPending(btn) {
    btn.textContent = 'Pending';
    btn.classList.add('pending'); // Optional: Add a class to further style the pending button
    btn.removeAttribute('onclick'); // Remove the onclick attribute to prevent multiple clicks
}
</script>

<script>
function search() {
    var searchInput = document.getElementById("myInput").value.toLowerCase();
    var elements = document.querySelectorAll(".card-section");

    // Loop through the elements and check if the search input matches the content
    elements.forEach(function(element) {
        var title = element.querySelector(".card-front__heading").innerText.toLowerCase();
        var description = element.querySelector(".inside-page__text").innerText.toLowerCase();

        if (title.includes(searchInput) || description.includes(searchInput)) {
            element.style.display = "block";
        } else {
            element.style.display = "none";
        }
    });
}
</script>
</html>