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
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            width: 68%;
        }

        .section2 {
            display: flex;
            justify-content: space-between;
            margin-top: -40px;
        }

        .sections {
            display: flex;
            justify-content: space-between;
        }

        .left-section {
            width: 50%; /* Adjust the width as needed */
            padding: 8px; /* Adjust padding as needed */
        }

        .right-section {
            width: 50%; /* Adjust the width as needed */
            padding: 10px; /* Adjust padding as needed */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px !important;
            border-bottom: 2px solid #ccc;
            text-align: center;
        }

        thead {
        background-color: #f5f5f5;
        }

        tbody tr:nth-child(even) {
        background-color: #f2f2f2;
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

        .left-section {
            float: left; /* Or adjust the display property if float causes issues */
            width: 50%; /* Adjust the width as needed */
            padding: 20px; /* Adjust padding as needed */
        }

        .right-section {
            float: right; /* Align the right section */
            width: 50%; /* Adjust the width as needed */
            padding: 20px; /* Adjust padding as needed */
        }

        .view-button {
            padding: 8px 18px;
            border-radius: 20px;
            background-color: #fe3f40;
            color: #ffff;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 5px;
            outline: none;
        }

        /* CSS for icon inside the button */
        .view-button i {
            margin-right: 8px;
        }


    </style>

    </head>
    <body style="background-image: url('/uploads/phone-donate.jpg'); background-position: right center; background-repeat: no-repeat; background-size: 400px; height: 100vh; width: 100vw;">
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

        <button onclick="showDonatedItems()" class="neuromorphic-button">
            <i class="fas fa-hands-helping"></i> <b>Gave Help</b>
        </button>

        <button onclick="showSeekedDonations()" class="neuromorphic-button">
            <i class="fas fa-hands"></i> <b>Got Help</b>
        </button>

        <div class="sections">
            <div class="left-section">
            <table id="donatedItemsTable" style="display: none;">
                <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Details</th>
                        <th>Post Status</th>
                        <th>Delivery Status</th>
                        <th>Date & Time</th>                  
                    </tr>
                </thead>
                <tbody>
                        @foreach($donations as $donation)
                        <tr>
                            <td>{{ $donation->d_id }}</td>
                            <!-- <td><button onclick="showItemDetails('{{ $donation->image }}', '{{ $donation->description }}', '{{ $donation->title }}', '{{ $donation->category }}')">View Details</button></td> -->
                            <td><button onclick="showItemDetails('{{ $donation->d_id }}')" class="view-button">View</button></td>

                            <td >{{ $donation->post_status }}</td>
                            <td>{{ $donation->delivery_status }}</td>
                            <td>{{ $donation->created_at }}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            </div>

            <div id="itemDetailsContainer" class="right-section neuromorphic-details-container">
                <!-- Item details will be displayed here -->
            </div>

        </div>

        <!-- Table for seeked donations -->

        <div class="section2">
            <div class="left-section">
            <table id="seekedDonationsTable" style="display: none;">
                <thead>
                    <tr>
                        <th>Seeked Donation ID</th>
                        <th>Item Details</th>
                        <th>Request Status</th>
                        <th>Date & Time</th>                  
                    </tr>
                </thead>
                <tbody>
                        @foreach($itemRequests as $itemRequest)
                        <tr>
                            <td>{{ $itemRequest->donation_id }}</td>
                            <td><button onclick="showItemDetails2('{{ $itemRequest->donation_id }}')" class="view-button">View</button></td>
                            <td >{{ $itemRequest->req_status }}</td>
                            <td>{{ $itemRequest->created_at }}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            </div>

            <div id="seekitemDetailsContainer" class="right-section neuromorphic-details-container">
                <!-- Item details will be displayed here -->
            </div>

        </div>


</div>



    <footer class="w3-container w3-theme-d5 w3-center w3-bottom">
    <p>© Copyright 2023 Team ASPIRANTS. All Rights Reserved. <br><a rel="nofollow" href="#">GENEROSITY LINK</a></p>
    </footer>

    <script>
        function showDonatedItems() {
        // Show the table for donated items
        document.getElementById('donatedItemsTable').style.display = 'block';
        document.getElementById('itemDetailsContainer').style.display = 'block';
        // Hide the table for seeked donations
        document.getElementById('seekedDonationsTable').style.display = 'none';
        document.getElementById('seekitemDetailsContainer').style.display = 'none';      
    }

    function showSeekedDonations() {
        // Show the table for seeked donations
        document.getElementById('seekedDonationsTable').style.display = 'block';
        document.getElementById('seekitemDetailsContainer').style.display = 'block';
        // Hide the table for donated items
        document.getElementById('donatedItemsTable').style.display = 'none';
        document.getElementById('itemDetailsContainer').style.display = 'none';
    }
    </script>

<script>
function showItemDetails(itemId) {
    fetch(`/itemDetails/${itemId}`)
        .then(response => response.json())
        .then(data => {
            const detailsContainer = document.getElementById('itemDetailsContainer');

            const imageSize = '200px'; // Adjust as needed

            // Styling for the container and text elements
            const containerStyles = `
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                padding: 20px;
                margin: 20px;
                background-color: #ffffff;
                text-align: center;
                position: relative;
                border-right: 8px inset #fe3f40; /* Inset red border on the right side */
                border-bottom: 8px inset rgb(9 16 85 / 96%);
            `;

            // Styling for the image
            const imageStyles = `
                height: ${imageSize};
                width: auto;
                border-radius: 10px;
                margin-bottom: 15px;
            `;

            // Create HTML content for item details with updated styles
            const detailsContent = `
                <div class="neuromorphic-details" style="${containerStyles}">
                    <img src="data:image/jpeg;base64,${data.image}" alt="${data.title}" class="detail-image" style="${imageStyles}">
                    <h3 class="detail-title" style="color: #333; font-size: 24px; margin-bottom: 10px;">${data.title}</h3>
                    <p class="detail-category" style="color: #555; font-size: 16px; margin-bottom: 5px;">Category: ${data.category}</p>
                    <p class="detail-description" style="color: #777; font-size: 14px;">${data.description}</p>
                </div>
            `;

            // Update the details container with the content
            detailsContainer.innerHTML = detailsContent;
        })
        .catch(error => console.error('Error:', error));
}

function showItemDetails2(donationId) {
    fetch(`/itemDetails/${donationId}`)
        .then(response => response.json())
        .then(data => {
            const detailsContainer = document.getElementById('seekitemDetailsContainer');

            const imageSize = '200px'; // Adjust as needed

            // Styling for the container and text elements
            const containerStyles = `
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                padding: 20px;
                margin: 20px;
                background-color: #ffffff;
                text-align: center;
                position: relative;
                border-right: 8px inset #fe3f40; /* Inset red border on the right side */
                border-bottom: 8px inset rgb(46 106 106 / 99%);
            `;

            // Styling for the image
            const imageStyles = `
                height: ${imageSize};
                width: auto;
                border-radius: 10px;
                margin-bottom: 15px;
            `;

            // Create HTML content for item details with updated styles
            const detailsContent = `
                <div class="neuromorphic-details" style="${containerStyles}">
                    <img src="data:image/jpeg;base64,${data.image}" alt="${data.title}" class="detail-image" style="${imageStyles}">
                    <h3 class="detail-title" style="color: #333; font-size: 24px; margin-bottom: 10px;">${data.title}</h3>
                    <p class="detail-category" style="color: #555; font-size: 16px; margin-bottom: 5px;">Category: ${data.category}</p>
                    <p class="detail-description" style="color: #777; font-size: 14px;">${data.description}</p>
                </div>
            `;

            // Update the details container with the content
            detailsContainer.innerHTML = detailsContent;
        })
        .catch(error => console.error('Error:', error));
}



</script>

</body>
</html>