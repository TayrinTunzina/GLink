<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=campaign, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Campaigns</title>
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
    <div class="card-body tab-content p-0">

        <div class="tab-pane" id="Campaigns" role="tabpanel">
            <div class="table-responsive">
                <table class="table table-responsive-md card-table transactions-table">
                    <thead>
                        <tr>
                            <th class="col-md-4 align-middle">Title</th>
                            <th class="align-middle">Donated</th>
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
                            <td class="align-middle">
                                <!-- <form action="{{ route('campaigns.edit', $campaign->id) }}" method="POST">
                                    @csrf
                                    
                                    <button type="submit" class="btn btn-primary" name="edit-campaign">Edit</button>
                                </form> -->
                                <a href="{{ route('campaigns.edit', $campaign->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('campaigns.destroy', $campaign->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" name="delete-campaign">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane" id="AddCampaigns" role="tabpanel">
            <div class="table-responsive">
                <table class="table table-responsive-md card-table transactions-table">
                    <tbody>

                        <form method="POST" action="{{ route('campaigns.store') }}" enctype="multipart/form-data">
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
                            <div class="mb-3">
                                <label for="terms" class="form-label">Terms</label>
                                <textarea class="form-control" id="terms" name="terms"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option selected>Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>

</html>