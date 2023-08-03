<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Task Managment Application</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color: #ffa500d1;">

    <div class="container">
        <a href="/logout" style="float: right;margin-top: 39px;margin-left: -56px;"><div class="container">
            <button type="button" class="btn btn-info">Log Out <i class="fa-solid fa-arrow-right-from-bracket"></i></button>
        </div>
        </a>
    </div>

    <div class="container">
        <div class="row">
            <div class="card-body p-4 p-lg-5 text-black">
                <form action="/addtask" method="post">
                    @csrf
                    <div class="d-flex align-items-center mb-3 pb-1">
                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                        <span class="h1 fw-bold mb-0">DashBoard :)</span>
                    </div>
                    @if(Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif
                    @if(Session::has('error'))
                    <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                    <div class="form-outline mb-4">
                        <input type="text" id="task" name="task" class="form-control form-control-lg"
                            placeholder="I want to do..." autocomplete="off" /><br>
                        <input type="text" id="description" name="description" class="form-control form-control-sm"
                            placeholder="(optional)" autocomplete="off" />
                    </div>

                    <div class="pt-1 mb-4">
                        <button class="btn btn-dark btn-lg btn-block" id="button" type="submit">Add
                            task</button>
                    </div>

                </form>

                <div class="pt-1 mb-4">
                    <a href="/seetask" class="btn btn-info btn-lg btn-block" id="button" type="button">Watch task</a>
                </div>

            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        setTimeout( function(){$('.alert').hide();} , 3000);
    });
</script>
</html>
