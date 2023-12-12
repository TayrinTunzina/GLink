<?php

use App\Models\Payment;

// Fetch all users from the database
$payments = Payment::all();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Payments</title>
    
</head>

<body>
    <div class="container-fluid">
        <h2>Payment History</h2>
        <div class="table-responsive mt-3">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Amount</th>
                        <th>Transaction ID</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td class="align-middle">{{ $payment->name }}</td>
                        <td class="align-middle">{{ $payment->email }}</td>
                        <td class="align-middle">{{ $payment->phone }}</td>
                        <td class="align-middle">{{ $payment->amount }}</td>
                        <td class="align-middle">{{ $payment->transaction_id }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional: Bootstrap JS and Popper.js for Bootstrap components -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/payments',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var tbody = '';
                    $.each(data, function(index, payment) {
                        tbody += '<tr>';
                        tbody += '<td class="align-middle">' + payment.name + '</td>';
                        tbody += '<td class="align-middle">' + payment.email + '</td>';
                        tbody += '<td class="align-middle">' + payment.phone + '</td>';
                        tbody += '<td class="align-middle">' + payment.amount + '</td>';
                        tbody += '<td class="align-middle">' + payment.transaction_id + '</td>';
                        tbody += '</tr>';
                    });
                    $('tbody').html(tbody);
                }
            });
        });
    </script>
</body>

</html>