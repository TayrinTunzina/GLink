<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Donations</title>
</head>

<body>


    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="donations-tab" data-bs-toggle="tab" href="#donations" role="tab" aria-controls="donations" aria-selected="true">Donations</a>
            </li>

        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="donations" role="tabpanel" aria-labelledby="donations-tab">


                <table class="table">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Post Status</th>
                            <th>Delivery Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donations as $donation)
                        <form id="statusForm_{{ $donation->d_id }}" method="GET" action="{{ route('donation.update', $donation->d_id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('GET')
                            <input type="hidden" name="_method" value="PUT">
                            <tr>
                                <td>{{ $donation->category }}</td>
                                <td>{{ $donation->description }}</td>
                                <!-- <td>{{ $donation->post_status }}</td>
                            <td>{{ $donation->delivery_status }}</td> -->
                                <td>
                                    <select name="post_status" id="post_status_{{ $donation->d_id }}">
                                        <option value="pending" {{ $donation->post_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="accepted" {{ $donation->post_status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                        <option value="rejected" {{ $donation->post_status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </td>
                                <td>
                                    <select name="delivery_status" id="delivery_status_{{ $donation->d_id }}">
                                        <option value="pending" {{ $donation->delivery_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        @if ($donation->post_status == 'accepted')
                                        <option value="accepted" {{ $donation->delivery_status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                        @endif
                                        <option value="rejected" {{ $donation->delivery_status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </td>
                                <td>

                                    <button type="submit" class="btn btn-primary">Update Status</button>
                                </td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <!-- Optional: Bootstrap JS and Popper.js for Bootstrap components -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#statusForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                // Collect the selected status values
                var formData = {
                    _token: $('input[name="_token"]').val(),
                    donations: []
                };

                $('select[name="post_status"]').each(function() {
                    //var donationId = $(this).attr('id').split('_')[2];
                    var postStatus = $(this).val();
                    var deliveryStatus = $('#delivery_status_' + donationId).val();

                    formData.donations.push({
                        //id: donationId,
                        post_status: postStatus,
                        delivery_status: deliveryStatus
                    });
                });

                // Send the AJAX request
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle the error
                        console.error(error);
                    }
                });
            });
        });
    </script>
</body>

</html>