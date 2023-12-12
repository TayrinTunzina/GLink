<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Donations</title>

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
        /* Example CSS - adjust according to your design */

        .neuromorphic-container {
        background: linear-gradient(to bottom right, #eee8dd, #e3d9c6);
        border-radius: 10px;
        box-shadow: 5px 5px 15px 5px rgba(0, 0, 0, 0.2);
        padding: 20px;
        margin: 60px;
        margin-top: 70px;
        }

        .neuromorphic-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .neuromorphic-table th, .neuromorphic-table td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }

        .neuromorphic-table th {
            background-color: #e0e0e0;
        }

            /* CSS for button styling */
    .neuromorphic-button {
        padding: 8px 18px;
        border-radius: 20px;
        background-color: #03a4ed;
        color: #ffff;
        font-size: 16px;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        margin: 5px;
        outline: none;
    }

    /* CSS for icon inside the button */
    .neuromorphic-button i {
        margin-right: 8px;
    }

    /* Hover effect */
    .neuromorphic-button:hover {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        color:#fe3f40;
    }

    </style>

    </head>
<body>
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

    <div class="neuromorphic-container">
    <h2 style="color:#03a4ed;"><b>My</b><span style="color:#fe3f40;"><b> Donations</b></span></h2><p>
    <div class="w3-bottombar"></div>
    <!-- Button to toggle donated items table -->
    <button onclick="showDonatedItems()" class="neuromorphic-button">
        <i class="fas fa-hands-helping"></i> <b>Gave Help</b>
    </button>

    <!-- Button to toggle seeked donations table -->
    <button onclick="showSeekedDonations()" class="neuromorphic-button">
        <i class="fas fa-hands"></i> <b>Got Help</b>
    </button>


    <!-- Table for donated items -->
    <table id="donatedItemsTable" style="display: none;">
        <!-- Table content for donated items -->
        <!-- Example headers and rows -->
        <thead>
            <tr>
                <th>Donated Item ID</th>
                <th>Description</th>
                <!-- Add more headers as needed -->
            </tr>
        </thead>
        <tbody>
            <!-- Rows for donated items -->
            <!-- Example row -->
            <tr>
                <td>1</td>
                <td>Example description</td>
                <!-- Add more columns as needed -->
            </tr>
        </tbody>
    </table>

    <!-- Table for seeked donations -->
    <table id="seekedDonationsTable" style="display: none;">
        <!-- Table content for seeked donations -->
        <!-- Example headers and rows -->
        <thead>
            <tr>
                <th>Seeked Donation ID</th>
                <th>Description</th>
                <!-- Add more headers as needed -->
            </tr>
        </thead>
        <tbody>
            <!-- Rows for seeked donations -->
            <!-- Example row -->
            <tr>
                <td>1</td>
                <td>Example description</td>
                <!-- Add more columns as needed -->
            </tr>
        </tbody>
    </table>
</div>



    <footer class="w3-container w3-theme-d5 w3-center w3-bottom">
    <p>© Copyright 2023 Team ASPIRANTS. All Rights Reserved. <br><a rel="nofollow" href="#">GENEROSITY LINK</a></p>
    </footer>

    <script>
        function showDonatedItems() {
        // Show the table for donated items
        document.getElementById('donatedItemsTable').style.display = 'block';
        // Hide the table for seeked donations
        document.getElementById('seekedDonationsTable').style.display = 'none';
    }

    function showSeekedDonations() {
        // Show the table for seeked donations
        document.getElementById('seekedDonationsTable').style.display = 'block';
        // Hide the table for donated items
        document.getElementById('donatedItemsTable').style.display = 'none';
    }
    </script>


</body>
</html>