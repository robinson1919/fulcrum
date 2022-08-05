<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Courses from API</h4>
                    </div>
                    <div class="card-body">
    
                        <table id="sortTable" data-toggle="table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Corse Code</th>
                                    <th>Workflow State</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses->courses as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->course_code }}</td>
                                    <td>{{ $item->workflow_state }}</td>
                                    <td>{{ is_null($item->start_at) ? 'N/A' : date('m-d-Y', strtotime($item->start_at)) }}</td>
                                    <td>{{ is_null($item->end_at) ? 'N/A' : date('m-d-Y', strtotime($item->end_at)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table> 

                        <!-- Button trigger modal -->
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Show Workflow State
                            </button>
                        </div>
                        <!-- Button trigger modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Workflow State Availability Count</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <h4>{{ $courses->work_flow_availability }} </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

    
    
</body>
<footer>
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var app = <?php echo json_encode($courses); ?>;
        console.log(app)
    </script>
</footer>


</html>

