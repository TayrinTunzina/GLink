<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SSLCommerz">
    <title>Payment</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    .custom-background {
      background: linear-gradient(273deg, rgba(3,164,237,0.9669117647058824) 0%, rgba(27,140,140,0.9921218487394958) 11%, rgba(0,68,68,0.9641106442577031) 51%, rgba(9,16,85,0.9585084033613446) 89%);
    }

    .neumorphic {
        background-color: rgb(232 234 236)!important;/* Adjust this to your desired background color */
        border-radius: 15px; /* Adjust border-radius for rounded corners */
        box-shadow: 10px 10px 20px #c7c7c7, -10px -10px 20px #ffffff; /* Adjust the shadow values */
    }
        /* Apply neumorphic styles to the input fields */
        .form-control {
        border: none;
        background: #f0f0f0;
        border-radius: 10px;
        padding: 12px;
        box-shadow: 5px 5px 10px #bfbfbf, -5px -5px 10px #ffffff;
        transition: all 0.3s ease-in-out;
    }

    .form-control:focus {
        outline: none;
        box-shadow: 3px 3px 6px #bfbfbf, -3px -3px 6px #ffffff;
    }

    /* Apply styles for button */
    .btn {
        border: none;
        border-radius: 10px;
        padding: 12px 24px;
        background: #fe3f40;
        color: white;
        cursor: pointer;
        box-shadow: 5px 5px 10px #bfbfbf, -5px -5px 10px #ffffff;
        transition: all 0.3s ease-in-out;
    }

    .btn:hover {
        box-shadow: 3px 3px 6px #bfbfbf, -3px -3px 6px #ffffff;
    }
    .input-group-text {
        background: #e7e4e4;
        border: none;
        padding: 6px;
        border-radius: 10px;
        box-shadow: 5px 5px 10px #bfbfbf, -5px -5px 10px #ffffff;
        
    }

    </style>
</head>

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large custom-background">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 custom-background"><i class="fa-solid fa-signal ms-3 scale5 w3-margin-right"></i>Generosity Link</a>
 </div>
</div>

<body class="bg-light">
<div class="container">
    <div class="py-5 text-center">
        <br>
        <h2>Donation Form</h2>

        <p class="lead">Please fill up your information.</p>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Details</span>
                <span class="badge badge-secondary badge-pill" style="background-color:#fe3f40">Time left: {{ \Carbon\Carbon::parse($campaigns->deadline)->diffForHumans() }}</span>
            </h4>
            <ul class="list-group mb-3 neumorphic">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Campaign ID</h6>
                        <!-- <small class="text-muted">Brief description</small> -->
                    </div>
                    <span class="text-muted">{{ $campaigns->camp_id }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                    <h6 class="my-0">{{ $campaigns->title }}</h6>
                    <small class="text-muted">{{ $campaigns->description }}</small>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Donated Users</h6>
                    </div>
                    <span class="text-muted">4</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total Fund Raised (BDT)</span>
                    <strong>1200 TK</strong>
                </li>
            </ul>
        </div>
        <div class="col-md-7 order-md-2 neumorphic"><br>
            <h4 class="mb-3">User ID: {{ session('user_id') }}</h4><!-- Output generated URL for debugging -->

            <form method="POST" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="name"><b>Full name</b></label>
                        <input type="text" name="name" class="form-control" id="name" placeholder=""
                               value="John Doe" required>
                        <div class="invalid-feedback">
                            Valid customer name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email"><b>Email</b></label>
                    <input type="email" name="email" class="form-control" id="email"
                           placeholder="you@example.com" value="you@example.com" required>
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="phone"><b>Phone</b></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><b>+88&nbsp</b></span>
                        </div>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone"
                               value="01711xxxxxx" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            Your Mobile number is required.
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-5 mb-3">
                        <label for="amount"><b>Amount to donate</b></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><b>Tk&nbsp</b></span>
                            </div>
                            
                            <input type="text" class="form-control" id="amount" placeholder="" value="100" required>

                            <div class="invalid-feedback">
                                Please enter the amount to donate.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 mb-3">
                        <label for="address"><b>Address </b><span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                           value="93 B, New Eskaton Road" required>
                        <div class="invalid-feedback">
                            Please enter your address.
                        </div>
                    </div>

                </div>
                <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}"
                        style="background-color: #fe3f40; border-color: #fe3f40;"> Pay Now
                    </button>
            </form>
            <br>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p>© Copyright 2023 Team ASPIRANTS. All Rights Reserved. <br><a rel="nofollow" href="#">GENEROSITY LINK</a></p>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<!-- If you want to use the popup integration, -->
<script>
    // Function to collect form data and initiate payment
    function initiatePayment() {
        var obj = {};
        obj.user_id = '{{ session('user_id') }}';
        obj.camp_id = '{{ $campaigns->camp_id }}';
        obj.name = $('#name').val();
        obj.email = $('#email').val();
        obj.phone = $('#phone').val();
        obj.total_amount = $('#amount').val();
        obj.address = $('#address').val();

        // Assign the form data to the postdata property of the button
        $('#sslczPayBtn').prop('postdata', obj);

        // Trigger the payment initiation script
        var script = document.createElement("script");
        script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
        document.getElementsByTagName("head")[0].appendChild(script);
    }

    // Attach the initiatePayment function to the button's click event
    $('#sslczPayBtn').on('click', function(event) {
        event.preventDefault(); // Prevent default form submission
        initiatePayment(); // Call the function to gather data and initiate payment
    });
</script>



</html>
