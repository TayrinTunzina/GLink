<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Donations</title>
</head>

<body>


    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="campaigns-tab" data-bs-toggle="tab" href="#campaigns" role="tab" aria-controls="campaigns" aria-selected="true">Campaigns</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="add-donation-tab" data-bs-toggle="tab" href="#add-donation" role="tab" aria-controls="add-donation" aria-selected="false">Add Donation</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="campaigns" role="tabpanel" aria-labelledby="campaigns-tab">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Campaign</th>
                            <th>Name</th>
                            <th>Date & Time</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Edit/Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Campaigns data will be populated here -->
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="add-donation" role="tabpanel" aria-labelledby="add-donation-tab">
                <form>
                    <div class="mb-3">
                        <label for="campaign">Campaign:</label>
                        <select class="form-select" id="campaign" name="campaign">
                            <!-- Populate campaign options here -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                    </div>
                    <div class="mb-3">
                        <label for="amount">Amount:</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter donation amount">
                    </div>
                    <div class="mb-3">
                        <label for="payment-method">Payment Method:</label>
                        <select class="form-select" id="payment-method" name="payment-method">
                            <!-- Populate payment method options here -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status">Status:</label>
                        <select class="form-select" id="status" name="status">
                            <option value="paid">Paid</option>
                            <option value="not-paid">Not Paid</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional: Bootstrap JS and Popper.js for Bootstrap components -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>