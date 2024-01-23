<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPSSF</title>

    @include('admin.dashboard.component.header')
    


</head>

<body>

    @include('admin.dashboard.component.sidebar')

    @include('admin.dashboard.component.navbar')


    


     <!-- partial -->
     <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
            </div>
          </div>
              <div class="container my-5">
                <form action="{{ route('admin.AddNewApi') }}" method="POST">
                @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">API Name</label>
                        <input type="text" class="form-control" id="apiname" aria-describedby="emailHelp" placeholder="Enter API Name" name="apiname">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">API URL</label>
                        <input type="text" class="form-control" id="apiurl" placeholder="API URL" name="apiurl">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <input type="text" class="form-control" id="category" placeholder="API Category" name="category">
                      </div>
                      <!-- <div class="form-group">
                        <label for="exampleInputPassword1">Response</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Response" name="response">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Status" name="status">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Created By</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Created By" name="created">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Updated By</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Updated By" name="updated">
                      </div> -->


                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
              </div>
              <!-- partial -->
              <div class="main-panel">
    <div class="content-wrapper">
        <div class="row justify-content-end">
            <div class="col-md-11 mr-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-3">API Data</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover"  id="myTable">
                                <thead>
                                    <tr>
                                        <th>SR_no</th>
                                        <th>API Name</th>
                                        <th>API URL</th>
                                        <th>Category</th>
                                        <th>Created By</th>
                                        <th>Updated By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $counter = 1;
                                    @endphp

                                    @foreach($api as $api)
                                    <tr>
                                        <td>{{ $counter }}</td>
                                        <td><span class="ellipsis-span">{{ $api->api_name }}</span></td>
                                        <td>{{ $api->api_url }}</td>
                                        <td>{{ $api->category }}</td>
                                        <td>{{ $api->created_by }}</td>
                                        <td>{{ $api->updated_by }}</td>
                                    </tr>
                                    @php
                                    $counter++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- 
<script>
    $(document).ready(function () {
        // Function to toggle response content based on the stored state
        function toggleResponseContent(button, row) {
            var responseContent = row.find(".response-content");
            var isOpen = localStorage.getItem(row.index()); // Use row index as a unique identifier

            if (isOpen === 'true') {
                responseContent.show();
            } else {
                responseContent.hide();
            }
        }

        // Iterate over each toggle button
        $(".toggle-button").each(function () {
            // Find the parent row of the button
            var row = $(this).closest('tr');

            // Toggle the response content based on the stored state
            toggleResponseContent($(this), row);

            // Attach click event to toggle button
            $(this).click(function () {
                // Find the parent row of the clicked button
                var row = $(this).closest('tr');

                // Toggle the visibility of the response content within that row
                row.find(".response-content").toggle();

                // Store the current state in local storage
                var isOpen = row.find(".response-content").is(":visible");
                localStorage.setItem(row.index(), isOpen.toString());
            });
        });
    });
</script> -->


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        @include('admin.dashboard.component.footer')
    

</body>

</html>