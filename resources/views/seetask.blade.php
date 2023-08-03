<!DOCTYPE html>
<html>
<head>
    <title>Users Table</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        text {
            display: block;
            width: 100px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
    </style>
</head>
<body>
    
<div class="container">
    <h1>Task Table</h1>

    <div class="container">
        <a href="/dashboard" type="button" class="btn btn-secondary" style="position: fixed;margin-left: 70%;margin-top: -44px;"><-- Go Back</a>
    </div>
    @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
    @endif
    @if(Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p>
    @endif

    <table class="table table-bordered data-table" style="align-content: center;">
        <thead>
            <tr >
                <th>Sr. No.</th>
                <th>Task</th>
                <th class="text">Description</th>
                <th>Status</th>
                <th width="100px">Action</th>
                <th width="100px">Check task</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</body>
   
<script type="text/javascript">
  $(function () {
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('task_detail') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'task', name: 'task'},
              {data: 'description', name: 'description'},
              {data: 'status', name: 'status'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
              {data: 'Checkcolumn', name: 'Checkcolumn', orderable: false, searchable: false},
          ]
      });
    });
</script>
<script>
    $(document).ready(function(){
        setTimeout( function(){$('.alert').hide();} , 2000);
    });
</script>
</html>