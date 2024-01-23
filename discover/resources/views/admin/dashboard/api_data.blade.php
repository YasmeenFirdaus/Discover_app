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

    <div class="container">
        <h2>API Data</h2>

        @if (isset($apiDataList) && count($apiDataList) > 0)
            <div class="table-responsive">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image URL</th>
                            <th>Source Name</th>
                            <th>Source URL</th>
                            <th>URL</th>
                            <th>Content Type</th>
                            <th>Published At</th>
                            <th>Author Name</th>
                            <th>Author URL</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Metadata</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($apiDataList as $data)
    <tr>
        <td>{{ $data['id'] ?? 'N/A' }}</td>
        <td>{{ $data['title'] ?? 'N/A' }}</td>
        <td>{{ $data['description'] ?? 'N/A' }}</td>
        <td>{{ $data['image_url'] ?? 'N/A' }}</td>
        <td>{{ $data['source_name'] ?? 'N/A' }}</td>
        <td>{{ $data['source_url'] ?? 'N/A' }}</td>
        <td>{{ $data['url'] ?? 'N/A' }}</td>
        <td>{{ $data['content_type'] ?? 'N/A' }}</td>
        <td>
            @if ($data['published_at'])
                {{ \Carbon\Carbon::parse($data['published_at'])->format('Y-m-d H:i:s') }}
            @else
                N/A
            @endif
        </td>
        <td>{{ $data['author_name'] ?? 'N/A' }}</td>
        <td>{{ $data['author_url'] ?? 'N/A' }}</td>
        <td>{{ $data['category'] ?? 'N/A' }}</td>
        <td>
            @if (!empty($data['tags']))
                {{ is_array($data['tags']) ? implode(', ', $data['tags']) : $data['tags'] }}
            @else
                No tags available
            @endif
        </td>
        <td>
            @if (!empty($data['metadata']))
                {{ is_array($data['metadata']) ? implode(', ', $data['metadata']) : $data['metadata'] }}
            @else
                No metadata available
            @endif
        </td>
    </tr>
@endforeach

                    </tbody>
                </table>
            </div>
        @else
            <p>No API data available.</p>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @include('admin.dashboard.component.footer')
</body>

</html>