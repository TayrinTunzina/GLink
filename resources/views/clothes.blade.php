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

/* Box ============================================*/

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
  height: calc(var(--icon-size) * 2);
  width: calc(var(--icon-size) * 2);
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
.label{
  height: calc(var(--icon-size) * 1.5);
  width: calc(var(--icon-size) * 2);
  position: absolute;
  background-color: #ddd;
  border: 3px double var(--icon-color);
  border-radius: 5px;
  top: 5px;
  left: 5px;
}
.label::before{
  content:"From: Oak \A To: Ash";
  font-family: sans-serif;
  font-size: .7rem;
  transform: scalex(-1);
  display: inline-block;
  white-space: pre;
  position: absolute;
  right: 3px;
  top: 3px;
}
.label::after{
  height: 15px;
  width: 3px;
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

</style>  
</head>
<body>

<main class="main">

  <div class="w3-container w3-bottombar" style="display: flex; justify-content: space-between; align-items: center;">
    <h1 style="margin: 0;"><b>Clothes</b></h1>
    <div class="w3-section w3-padding-16" style="margin-left: auto;">
        <input style="box-shadow: 5px 5px 15px 5px rgba(0, 0, 0, 0.2); width: 300px; border-radius: 8px; padding: 10px;" class="form-control font-bold neumorphic" id="myInput" type="text" placeholder="Search Clothes..." onkeyup="search()">
    </div>
  </div>
        <section class="card-area">
        


        </section>

    </main>
    
</body>
<script>
    $(document).ready(function() {
        $('.inside-page__btn').click(function(e) {
            e.preventDefault();

            // Fetch data from the clicked button's parent form
            var form = $(this).closest('form');
            var donationId = form.find('[name="donation_id"]').val();
            var userId = form.find('[name="user_id"]').val();

            // Make an AJAX POST request
            $.ajax({
                url: '{{ route("handle.button.click") }}',
                type: 'POST',
                data: {
                    donation_id: donationId,
                    user_id: userId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.error) {
                        // Display error message using a popup or alert
                        alert(response.error);
                    } else if (response.success) {
                        // Display success message using a popup or alert
                        alert(response.success);
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors, if any
                    console.error(error);
                }
            });
        });
    });
</script>

<script>
function search() {
    var searchInput = document.getElementById("myInput").value.toLowerCase();
    var elements = document.querySelectorAll(".card-section");

    // Loop through the elements and check if the search input matches the content
    elements.forEach(function(element) {
        var title = element.querySelector(".inside-page__heading").innerText.toLowerCase();
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