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
                            <th>Campaign</th>
                            <th>Name</th>
                            <th>Date & Time</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donations as $donation)
                        <tr>
                            <td><select name="campaign_id" class="form-select">
                                    @foreach($campaigns as $campaign)
                                    <option value="{{ $campaign->id }}" {{ $donation->campaign_id == $campaign->id ? 'selected' : '' }}>
                                        {{ $campaign->title }}
                                    </option>
                                    @endforeach
                                </select></td>
                            <td>{{ $donation->name }}</td>
                            <td>{{ $donation->created_at }}</td>
                            <td>{{ $donation->amount }}</td>
                            <td>{{ $donation->status }}</td>
                            <td>
                                <form action="{{ route('donation.destroy', $donation->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" name="delete-donation" onclick="return confirm('Are you sure you want to delete this donation?')">Delete</button>
                                </form>
                            </td>
                        </tr>
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
</body>

</html>