<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Task Managment Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
  <div class="container">
    <a href="/seetask" type="button" class="btn btn-secondary" style="float: right;margin-top: 31px;margin-left: -116px;"><-- Go Back</a>
</div>
<form action="/updatetask" method="post">
  @csrf
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
  
              <div class="mb-md-5 mt-md-4 pb-5">
                <div style="display:none">
                  <input type="text" class="form-control form-control-lg" name="id" value="{{$data->id}}"/><br>
                </div>
  
                <h2 class="fw-bold mb-2 text-uppercase">Update Me ☺</h2><br><br>
  
                <div class="form-outline form-white mb-4">
                  <input type="text" id="Task" class="form-control form-control-lg" name="task" value="{{$data->task}}"/><br>
                  <label class="form-label" for="typeEmailX"><b>Task</b></label>
                </div>
  
                <div class="form-outline form-white mb-4">
                  <input type="text" id="Description" class="form-control form-control-sm" name="Description" value="{{$data->description}}" /><br>
                  <label class="form-label" for="typePasswordX"><b>Description</b></label>
                </div>
                <button class="btn btn-outline-light btn-lg px-5" type="submit">Update</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</form>
</body>
</html>