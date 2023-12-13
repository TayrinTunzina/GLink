<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>

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
        .neumorphic-container {
        background: linear-gradient(to bottom right, #eee8dd, #e3d9c6);
        border-radius: 10px;
        box-shadow: 5px 5px 15px 5px rgba(0, 0, 0, 0.2);
        padding: 20px;
        margin: 60px;
        margin-top: 70px;
        width: 68%;
        }

        table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        }

        th, td {
        border-bottom: 1px solid #ddd;
        padding: 8px;
        text-align: center;
        }

        thead {
        background-color: #f5f5f5;
        }

        tbody tr:nth-child(even) {
        background-color: #f2f2f2;
        }

    </style>
</head>
<body style="background-image: url('/uploads/pic2.jpg'); background-position: right center; background-repeat: no-repeat; background-size: 400px; height: 100vh; width: 100vw;">
    <!-- Navbar -->
    <div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align w3-large custom-background">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 custom-background"><i class="fa-solid fa-signal ms-3 scale5 w3-margin-right"></i>Generosity Link</a>
    <a href="#" class="w3-right w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" style="background-color: #091055f5 !important;">
        <img src="data:image/png;base64,{{ base64_encode(session('pic')) }}" width="25" height="25" alt="User Image" class="w3-circle">
    </a>
    </div>
    </div>


    <div class="neumorphic-container">
        <h1 style="color:#fe3f40;"><b>Transaction</b><span style="color:#03a4ed;"><b> History</b></span></h1>
        <div class="w3-bottombar"></div>
        <table>
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>User ID</th>
                    <th>Campaign ID</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Transaction ID</th>
                    <th>Date & Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->pay_id }}</td>
                    <td>{{ $transaction->user_id }}</td>
                    <td >{{ $transaction->camp_id }}</td>
                    <td>{{ $transaction->name }}</td>
                    <td>{{ $transaction->amount }} &nbsp{{ $transaction->currency }}</td>
                    <td>{{ $transaction->transaction_id }}</td>
                    <td>{{ $transaction->timestamp }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <footer class="w3-container w3-theme-d5 w3-center w3-bottom">
    <p>© Copyright 2023 Team ASPIRANTS. All Rights Reserved. <br><a rel="nofollow" href="#">GENEROSITY LINK</a></p>
    </footer>
</body>
</html>