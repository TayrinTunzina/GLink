<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=campaign, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Campaigns</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>

    <div class="card-header d-block d-sm-flex border-0">
        <div class="me-3">
            <h4 class="card-title mb-2">Campaigns</h4>
            <span class="fs-12"></span>
        </div>
        <div class="card-tabs mt-3 mt-sm-0">
            <ul class="nav nav-tabs" role="tablist">

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#Campaigns" role="tab">Campaigns</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#AddCampaigns" role="tab">Add Campaigns</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- modal body -->
    <div class="modal" tabindex="-1" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Campaign</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your modal form here -->
                    
                        <input type="hidden" id="edit_camp_id">

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="edit_title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit_description" name="description"></textarea>
                        </div>
                        <!-- <div class="mb-3">
                        <label for="deadline" class="form-label">Deadline</label>
                        <input type="date" class="form-control" id="edit_deadline" name="deadline">
                    </div> -->
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="edit_amount" name="amount">
                            </div>
                        </div>
                        <!-- <div class="mb-3">
                                <label for="terms" class="form-label">Terms</label>
                                <textarea class="form-control" id="terms" name="terms"></textarea>
                            </div> -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="edit_status" name="status">
                                <option selected>Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="updateData">Update</button>
                </div>
                
            </div>
        </div>
    </div>
    <!-- modal body -->


    <div class="card-body tab-content p-0">

        <div class="tab-pane" id="Campaigns" role="tabpanel">
            <div class="table-responsive">
                <table class="table table-responsive-md card-table transactions-table">
                    <thead>
                        <tr>
                            <th class="col-md-4 align-middle">Title</th>
                            <th class="align-middle">Amount</th>
                            <th class="align-middle">Deadline</th>
                            <th class="align-middle">Status</th>
                            <th class="align-middle">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($campaigns as $campaign)
                        <tr>
                            <td class="align-middle">{{ $campaign->title }}</td>
                            <td class="align-middle">{{ $campaign->amount }}</td>
                            <td class="align-middle">{{ $campaign->deadline }}</td>
                            <td class="align-middle">{{ $campaign->status }}</td>
                            <td class="align-middle"><button type="button" value="{{ $campaign->camp_id }}" class="btn btn-primary btn-sm">Edit</button></td>
                            <td class="align-middle">
                                <form action="{{ route('campaigns.destroy', $campaign->camp_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" name="delete-campaign">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane" id="AddCampaigns" role="tabpanel">
            <div class="table-responsive" style="padding: 20px;">
                <table class="table table-responsive-md card-table transactions-table">
                    <tbody>

                        <form id="createForm" action="javascript:void(0)" style="padding: 20px;">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="mb-3">
                                <label for="deadline" class="form-label">Deadline</label>
                                <input type="date" class="form-control" id="deadline" name="deadline">
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="amount" name="amount">
                                </div>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="terms" class="form-label">Terms</label>
                                <textarea class="form-control" id="terms" name="terms"></textarea>
                            </div> -->
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option selected>Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <button id="saveData" type="submit" class="btn btn-primary">Submit</button>
                            <div id="successMessage" style="display: none;"></div>
                        </form>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            fetchCampaigns();

            function fetchCampaigns() {
                $.ajax({
                    type: "GET",
                    url: '/fetch-campaigns',
                    dataType: "json", // Corrected this line
                    success: function(response) {
                        // Assuming response.students is an array of campaigns
                        $.each(response.students, function(key, item) {
                            $('#campaignData').append('<tr>\
                <td class="align-middle">' + item.title + '</td>\
                <td class="align-middle">' + item.amount + '</td>\
                <td class="align-middle">' + item.deadline + '</td>\
                <td class="align-middle">' + item.status + '</td>\
                <td class="align-middle"><button type="button" value="' + item.camp_id + '" class="btn btn-primary btn-sm">Edit</button></td>\
                <td class="align-middle"><button type="button" value="' + item.camp_id + '" class="btn btn-danger btn-sm">Delete</button></td>\
            </tr>');
                        });
                    },

                });
            }


            $('body').on('click', '.btn-primary', function(event) {
                event.preventDefault();
                var camp_id = $(this).val();
                $('#editModal').modal('show');

                // Populate the form fields with the specific record data
                $.ajax({
                    type: "GET",
                    url: '/campaigns/' + camp_id,
                    dataType: "json",
                    success: function(response) {
                        // Assuming response.student is an object of the campaign
                        $('#edit_camp_id').val(response.campaign.camp_id);
                        $('#edit_title').val(response.campaign.title);
                        $('#edit_description').val(response.campaign.description);
                        $('#edit_amount').val(response.campaign.amount);
                        // $('#edit_deadline').val(response.campaign.deadline);
                        $('#edit_status').val(response.campaign.status);
                    },
                });
            });

            $('body').on('click', '#updateData', function(event) {

                event.preventDefault();
                var camp_id = $('#edit_camp_id').val();
                var title = $('#edit_title').val();
                var description = $('#edit_description').val();
                var amount = $('#edit_amount').val();
                var status = $('#edit_status').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: '/update-campaigns/' + camp_id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "title": title,
                        "description": description,
                        "amount": amount,
                        "status": status,
                    },
                    dataType: "json",
                    success: function(response) {
                        // Hide the modal
                        $('#editModal').modal('hide');

                        // Update the specific record in the table
                        // $('#title' + camp_id).text(title);
                        // $('#amount' + camp_id).text(amount);
                        // $('#deadline' + camp_id).text(deadline);
                        // $('#status' + camp_id).text(status);
                    },
                });
            });



            $('#saveData').on('click', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/submit-campaigns',
                    type: 'POST',
                    data: $('#createForm').serialize(),
                    success: function(response) {
                        console.log(response, 'response');
                        fetchCampaigns();
                        $("#successMessage").text('Campaign submitted successfully!').show();
                    },
                })
            });


        });
    </script>

</body>

</html>