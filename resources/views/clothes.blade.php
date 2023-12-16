<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Books</title>
<style>
    /* CSS reset */


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
.cardc-area {
  align-items: center;
  display: flex;
  flex-wrap: nowrap;
  height: 100%;
  justify-content: space-evenly;
  padding: 1rem;
}

.cardc {
  position: relative;
  max-width: 20em;
  max-height: 30em;
  margin: 2rem auto;
  padding: 2em;
  justify-content: center; /* Center horizontally */
  align-items: center;
}

/* Card ============================================*/
:root{
  --size: 180px;
  --icon-size: 35px;
  --icon-color: #483C3E;
}

/* BOX STYLES*/
.box{
  position: relative;
  width: var(--size);
  height: var(--size);
  transform-style: preserve-3d;
  transform:rotatex(345deg) rotateY(216deg);
  z-index: 0;
}
.face{
  position: absolute;
  height: 100%;
  width: 100%;
}
.bottom{
  transform:rotatex(-90deg);
  transform-origin: bottom center;
  background-color: #98511B; 
  z-index: 0;
  box-shadow: 0 var(--size) 3px #0005;
}
.front{
  background-color: #CB9869;
   z-index: 5;
}
.back{
  background-color: #af8e6f; 
  transform: translatez(var(--size));
  z-index: 2;
}
.right{
  background-color: #8d745e;
  transform-origin: center left;
   z-index: 4
}
.left{
  background-color: #FFC889;
  transform:rotatey(90deg);
  transform-origin: center right;
  z-index: 3;
}
.face.left::after, .face.right::after{
  content: "";
  height: 15%;
  width: 10%;
  position: absolute;
  top: 0;
  left: 45%;
  background-color: #0004;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}
/* COVER STYLES*/
.top{
  transform: rotatex(90deg);
  transform-origin: top center;
  z-index: 6;
  position: absolute;
  transform-style: preserve-3d;
  cursor: pointer;
}
.cover-back, .cover-front{
  width: var(--size);
  height: calc(var(--size) / 2);
  background-color: #EBB27A;
  position: absolute;
  transition: transform 0.5s .35s linear;
  z-index: 8;
}
.cover-back::after, .cover-front::after{
  content: "";
  height: 10%;
  width: 100%;
  position: absolute;
  top: 0;
  left: 0;
  background-color: #0004;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}
.cover-front::after{
  top: 90%;
}
.cover-back{
  left: 0;
  bottom: 0;
  transform-origin: center bottom;
}
.top:active > .cover-back{
  transform: rotatex(-200deg);
  transition: transform 0.5s linear;
}
.cover-front{
  left: 0;
  top: 0;
  transform-origin: center top;
}
.top:active > .cover-back + .cover-right + .cover-left + .cover-front{
  transform: rotatex(200deg);
  transition: transform .5s linear;
}
.cover-left, .cover-right{
  height: var(--size);
  width: calc(var(--size) / 3);
  background-color: #c99e76;
  position: absolute;
  transition: transform .5s linear;
  z-index: 7;
}
.cover-left{
  left: 0;
  bottom: 0;
  transform-origin: center left;
}
.top:active > .cover-back + .cover-right + .cover-left{
  transform: rotatey(-190deg);
  transition: transform .5s .35s linear;
}
.cover-right{
  right: 0;
  top: 0;
  transform-origin: center right;
}
.top:active > .cover-back + .cover-right{
  transform: rotatey(190deg);
  transition: transform .5s .35s linear;
}
.content{
  width: 80%;
  height: 80%; 
  position: absolute;
  bottom: 1px;
  display: grid;
  place-items: center;
  transform: rotateY(-216deg) 
    translatez(calc(var(--size) / -2 )) 
    translatex(-50%);
  transition: transform .4s linear;
  
}
.top:active + .content{
  transform: rotateY(-216deg) 
    translatez(calc(var(--size) / -2 )) 
    translatex(-50%) translatey(-82%);
  transition: transform .5s 1s 
    cubic-bezier(.24,.05,.66,1.24);
}

/* ICONS STYLES*/
.icons{
  display: flex;
  justify-content: flex-start;
  position: absolute;
  bottom: 5px;
  left: 5px;
}
.icons div{
  margin: 2px;
  border-radius: 3px;
}
.arrow{
  height: 100%;
  width: 100%;
  clip-path: polygon(21% 28%, 41% 39%, 52% 22%, 56% 29%, 48% 36%, 72% 38%, 84% 14%, 75% 19%, 67% 5%, 39% 5%);
  background-color: var(--icon-color);
  position: absolute;
}
.arrow:nth-child(2){
  transform: rotate(120deg);
}
.arrow:nth-child(3){
  transform: rotate(-125deg);
}
.umbrella{
  height: var(--icon-size);
  width: var(--icon-size);
  position:relative;
  border: 1px solid var(--icon-color);
}
.umbrella::after{
  content:"";
  height: 40%;
  width: 100%;
  top: 20%;
  position: absolute;
  background-color:var(--icon-color);
  border-radius: 50% 50% 50% 50% / 90% 90% 10% 10%;
}
.umbrella::before{
  content:"";
  height: 80%;
  width: 10%;
  top: 10%;
  left: 50%;
  position: absolute;
  border-radius: 0% 0% 50% 50% / 0% 0% 10% 10%;
  border: calc(var(--icon-size) * 4 / 100) solid var(--icon-color);
  border-top: none;
  border-right: none;
}
.glass{
  height: var(--icon-size);
  width: var(--icon-size);
  position:relative;
  border: 1px solid var(--icon-color);
}
.glass::after{
  content:"";
  height: 60%;
  width: 70%;
  top:5%;
  left:15%;
  position: absolute;
  background-color:var(--icon-color);
  border-radius: 0% 0% 50% 50% / 0% 0% 100% 100% ;
  clip-path: polygon(0% 0%, 55% 0, 68% 20%, 54% 34%, 75% 55%, 61% 34%, 75% 19%, 67% 0, 100% 0%, 100% 100%, 0% 100%);
}
.glass::before{
  content:"";
  height: 95%;
  width: 100%;
  position: absolute;
  background-color: var(--icon-color);
  clip-path: polygon(15% 100%, 45% 90%, 40% 55%, 60% 55%, 55% 90%, 85% 100%);
}
.orientation{
  height: var(--icon-size);
  width: var(--icon-size);
  position:relative;
  border: 1px solid var(--icon-color);
}
.orientation::after,
.orientation::before{
  content:"";
  height: 70%;
  width: 40%;
  top:5%;
  left:15%;
  position: absolute;
  background-color:var(--icon-color);
clip-path: polygon(50% 0, 80% 30%, 60% 30%, 60% 100%, 40% 100%, 40% 30%, 20% 30%);
}
.orientation::after{
  left: 45%;
}
.base{
  height: 8%;
  width: 70%;
  left: 15%;
  bottom: 10%;
  position: absolute;
  background-color: var(--icon-color);
}
.recycled{
  height: calc(var(--icon-size) * 1);
  width: calc(var(--icon-size) * 1);
  position: absolute;
  bottom: 3px;
  right: 3px;
}

.ball{
  height: calc(var(--icon-size) * 1.3);
  width: calc(var(--icon-size) * 1.3);
  position: absolute;
  bottom: 10px;
  left: 10px;
  border-radius: 50%;
  border: 1px solid var(--icon-color);
  background-image: radial-gradient(#CB9869 10%, var(--icon-color) 11% 13%,#CB9869 14% 20%, var(--icon-color) 21% 22%, #0000 24%),linear-gradient(var(--icon-color) 48%, #0000 46% 54%, var(--icon-color) 54% 55%, #0000 57%)
}
.label {
  height: calc(var(--icon-size) * 1.5);
  width: calc(var(--icon-size) * 4);
  position: absolute;
  background-color: #ddd;
  border: 3px double var(--icon-color);
  border-radius: 5px;
  top: 5px;
  left: 5px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.label::before {
  font-family: sans-serif;
  font-size: .7rem;
  font-weight: bold; /* Making the text bolder */
  white-space: pre;
  position: absolute;
  right: 50%;
  transform: scale(-1) translateX(50%); /* Mirror effect and reposition */
  top: 50%;
  transform-origin: top right; /* Transform origin adjustment */
  transform: scale(-1) translate(50%, -50%) rotate(180deg); /* Mirror effect and reposition */
}

.label::after{
  height: 10px;
  width: 2px;
  content: "";
  position:absolute;
  bottom: 3px;
  left: 5px;
  color: var(--icon-color);
  background-color: var(--icon-color);
  box-shadow: 3px 0,6px 0,10px 0,13px 0, 15px 0, 19px 0;
}


/* Picachu Styles*/
.pikachu{
  --pikachu-size: calc(var(--size) * .7);
  width: var(--pikachu-size);
  height: var(--pikachu-size);
  position: absolute;
}
.pikachu .ear{
  width: calc(var(--pikachu-size) * 0.174);
  height: calc(var(--pikachu-size) * 0.514);
  position: absolute;
  border-radius: 20% 80% 35% 35% /
    77% 60% 40% 23% ;
  background-image: linear-gradient(90deg, 
    #0000 30%,
    #fff4 48% 53%,
    #0000 70%),
    radial-gradient(calc(var(--pikachu-size) * 0.2429) calc(var(--pikachu-size) * 0.4714) at 
      calc(var(--pikachu-size) * 0.0714) 
      calc(var(--pikachu-size) * 0.3571) , 
      #E3D831 49%, #000 51% );
  transform: rotate(30deg);
  top: -1%;
  right: 3%;
  animation: move-right 2s linear infinite;
  transform-origin: 0 70%;
}
.ear.left{
  transform: scalex(-1)  rotate(30deg);
  animation: move 2s linear infinite;
  transform-origin: 140% 100%;
  top: 3.5%;
  right: 95.5%;
}
@keyframes move-right{
  0%,40%,80%{
    transform: rotate(30deg);
  }
  50%,60%{
    transform: rotate(33deg);
  }
}
@keyframes move{
  0%,40%,80%{
    transform: scalex(-1) rotate(30deg);
  }
  50%,60%{
    transform: scalex(-1) rotate(33deg);
  }
}
.pikachu .head{
  width: calc(var(--pikachu-size) * 0.693);
  height: calc(var(--pikachu-size) * 0.629);
  position: absolute;
  background-color: #DCD132;
  border-radius:50%;
  box-shadow: inset 5px 0 8px #F5EF30;
  bottom: 6px;
  left: 22px;
}
.pikachu .head::before{
  width: calc(var(--pikachu-size) * 0.72);
  height: calc(var(--pikachu-size) * 0.5);
  content: "";
  position: absolute;
  background-color: #DCD132;
  border-radius:50%;
  bottom: -5px;
  left: -2px;
  background-image: radial-gradient(
    calc(var(--pikachu-size) * 0.1285) 
    calc(var(--pikachu-size) * 0.1714) 
    at calc(var(--pikachu-size) * 0.0714) 
    calc(var(--pikachu-size) * 0.25) , 
    #AA0515 50%, #0000 54%), 
    radial-gradient(
    calc(var(--pikachu-size) * 0.1285) 
    calc(var(--pikachu-size) * 0.1714) 
    at calc(var(--pikachu-size) * 0.65) 
    calc(var(--pikachu-size) * 0.25) , 
    #AA0515 50%, #0000 54%),
    radial-gradient(
      calc(var(--pikachu-size) * 0.45)
      calc(var(--pikachu-size) * 0.3714) at 
      calc(var(--pikachu-size) * 0.1428)
      calc(var(--pikachu-size) * 0.45), 
      #B0A828 50%, #0000 60%),
    radial-gradient(
      calc(var(--pikachu-size) * 0.7857)
      calc(var(--pikachu-size) * 0.5357) at 
      calc(var(--pikachu-size) * .4286)
      calc(var(--pikachu-size) * .1286),
      #0000 50%, #B0A828 60%),
    radial-gradient(
      calc(var(--pikachu-size) * 0.7857)
      calc(var(--pikachu-size) * 0.5357) at 
      calc(var(--pikachu-size) * 0.3571) 
      calc(var(--pikachu-size) * 0.4857), 
      #0001 50%, #0000 60%),
    radial-gradient(
      calc(var(--pikachu-size) * 0.3143)
      calc(var(--pikachu-size) * 0.4143) at 
      calc(var(--pikachu-size) * 0.3571)
      calc(var(--pikachu-size) * 0.25), 
      #fff1 50%, #0000 70%);
}
.pikachu .eye{
    width: calc(
      var(--pikachu-size) * 0.114);
    height: calc(
      var(--pikachu-size) * 0.136);
    position: absolute;
    background-color: #000;
    border-radius: 50%;
    z-index: 1;
    top: 32%;
    left: 15%;
}
.pikachu .eye::after{
  content: "";
  width: 35%;
  height: 35%;
  position: absolute;
  background-color: #fff;
  border-radius: 50%;
  top: 20%;
  right: 10%;
}
.pikachu .eye:nth-child(2)::after{
  left: 10%;
}
.pikachu .eye:nth-child(2){
  left: 67%;
}
.pikachu .nouse{
  width: calc(var(--pikachu-size) * 0.043);
  height: calc(var(--pikachu-size) * 0.022);
  background-color: #000;
  z-index: 1;
  position: absolute;
  top: 54%;
  left: 47%;
  border-radius: 30% 30% 50% 50% / 30% 30% 70% 70%; 
}
.pikachu .mouth{
  width: calc(var(--pikachu-size) * 0.2143);
  height: calc(var(--pikachu-size) * 0.04);
  position: absolute;
  top: 70%;
  left: 35%;
  overflow: hidden;
}
.pikachu .mouth::before,
.pikachu .mouth::after{
  content: "";
  width: 50%;
  height: 200%;
  position: absolute;
  border-radius: 50%;
  box-shadow: 0 1px 0 #0004;
  bottom: 1px;
  left: 0;
}
.pikachu .mouth::after{
  left: 50%;
}

.box__btn {
  display: table;
  padding: .5em 2em;
  background: rgb(30 118 118 / 99%);
  border-color: #fe3f40;
  color: #fff;
  text-decoration: none;
  margin: 2em 0 0 -3em; /* Adjust the margin to move it to the left */
  transition: color 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 5px 5px 15px 5px rgba(0, 0, 0, 0.2);
  border-radius: 0.8em;
}


.box__btn:hover {
  color: #fe3f40;
  font-weight: bold;
  box-shadow: 2px 2px 5px 2px rgba(0, 0, 0, 0.2);
}


</style>  
</head>
<body>

<main class="main">

  <div class="w3-container w3-bottombar" style="display: flex; justify-content: space-between; align-items: center;">
    <h1 style="margin: 0;"><b>Clothes</b></h1>
    <div class="w3-section w3-padding-16" style="margin-left: auto;">
        <input style="box-shadow: 5px 5px 15px 5px rgba(0, 0, 0, 0.2); width: 300px; border-radius: 8px; padding: 10px;" class="form-control font-bold neumorphic" id="myInput3" type="text" placeholder="Search Clothes..." onkeyup="searchc()">
    </div>
  </div>



  <div id="clothesCarousel" class="carousel slide cardc-area" data-ride="carousel">
    <div class="carousel-inner">
        @php $chunks = $clothes->chunk(2); @endphp
        @foreach ($chunks as $index => $chunk)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="row justify-content-center">
                    @foreach ($chunk as $cloth)
                        <div class="col-md-4">
                            <div class="cardc">
                              <div class="box">
                               
                            <div class="face bottom"></div>
                            <div class="face back"></div>
                            <div class="face right"></div>
                            <div class="face left">
                              <div class="icons">
                                <div class="umbrella"></div>
                              <div class="orientation">
                                <div class="base"></div>
                              </div>
                              <div class="glass"></div>
                              </div>
                            </div>
                            <div class="face front">
                              <div class="recycled">
                                <div class="arrow"></div>
                                <div class="arrow"></div>
                                <div class="arrow"></div>
                              </div>
                              <div class="label" style="position: relative;">
                                  <h5 style="transform: scaleX(-1); display: inline-block;">
                                    <b>{{$cloth->title}}</b>
                                  </h5>
                              </div>
                              <br>
                              <div class="label" style="position: relative; background-color: #b3d7ff; padding: 10px; text-align: center; border: 3px double var(--icon-color);">
                                <h6 style="transform: scaleX(-1); display: inline-block; color: black;">
                                  <b>{{$cloth->description}}</b>
                                </h6>
                              </div>

                            </div>
                            <div class="face top">
                              <div class="cover-back"></div>
                              <div class="cover-right"></div>
                              <div class="cover-left"></div>
                              <div class="cover-front"></div>
                            </div>
                            <div class="content">
                            <div class="pikachu">
                              <div class="ear left"></div>
                              <div class="ear"></div>
                              <div class="head">
                                <div class="eye"></div>
                                <div class="eye"></div>
                                <div class="nouse"></div>
                                <div class="mouth"></div>
                              </div>
                            </div>
                          </div>
                        
                                </div>
                                <form id="clothesSeekDonationForm" data-donation-id="{{ $cloth->d_id }}" action="{{ route('handle.button.click') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="donation_id" value="{{ $cloth->d_id }}">
                                    <button type="button" onclick="submitForm(this)" class="box__btn">Seek Donation</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <!-- Controls -->
    <a class="carousel-control-prev" href="#clothesCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#clothesCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


    </main>
    
</body>
<script>
      document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.box__btn');

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
function searchc() {
    var searchInput = document.getElementById("myInput3").value.toLowerCase();
    var labels = document.querySelectorAll('#clothesCarousel');

    labels.forEach(function(label) {
        var title = label.querySelector('h5').innerText.toLowerCase();
        var description = label.querySelector('h6').innerText.toLowerCase();
        var shouldShow = title.includes(searchInput) || description.includes(searchInput);
        label.style.display = shouldShow ? 'block' : 'none';
    });
}

</script>

</html>