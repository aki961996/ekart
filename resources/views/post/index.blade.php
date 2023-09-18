@extends('admin.layouts.master')
@section('title','Dashboard')
@section('content')





<body>
    <div class="container">
        <h2>Laravel 10 Implementing Yajra Datatables </h2>
        <table class="table table-bordered data-table data_table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Category</th>
                    <th width="105px">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        $(function () {
 
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url:"{{ route('admin.post.index') }}",

        },
        columns: [
            {data: 'id'},
            {data: 'title'},
            {data: 'body'},
            {data: 'categories.name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
       
  });

  
    </script>
</body>

</html>
@endsection