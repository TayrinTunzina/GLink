<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=campaign, initial-scale=1.0">
    <title>Campaigns</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

<div class="container">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="campaigns-tab" data-bs-toggle="tab" href="#campaigns" role="tab" aria-controls="campaigns" aria-selected="true">Campaigns</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="add-campaign-tab" data-bs-toggle="tab" href="#add-campaign" role="tab" aria-controls="add-campaign" aria-selected="false">Add Campaign</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="campaigns" role="tabpanel" aria-labelledby="campaigns-tab">
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
                        <!-- Here you can add rows of data -->
                        <tr>
                            <td class="align-middle">Campaign 1</td>
                            <td class="align-middle">$100</td>
                            <td class="align-middle">2022-12-31</td>
                            <td class="col-md-2 align-middle">
                                <select class="form-select" aria-label="Status">
                                    <option selected>Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </td>
                            <td class="align-middle">
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-primary">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="add-campaign" role="tabpanel" aria-labelledby="add-campaign-tab">
            <form>
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
        </div>
    </div>
</div>





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>