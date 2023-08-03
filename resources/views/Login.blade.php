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
    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="/images/nathan-dumlao-zIgmSQdTIpA-unsplash.jpg"
                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form>
      
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0">Task Manager</span>
                        </div>
      
                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                        <span class="err text-danger"></span>
                        <div class="form-outline mb-4">
                            <span class="email_err text-danger"></span>
                          <input type="email" id="email" class="form-control form-control-lg" />
                          <label class="form-label" for="email">Email address</label>
                        </div>
      
                        <div class="form-outline mb-4">
                            <span class="password_err text-danger"></span>
                          <input type="password" id="password" class="form-control form-control-lg" />
                          <label class="form-label" for="password">Password</label>
                        </div>
      
                        <div class="pt-1 mb-4">
                          <button class="btn btn-dark btn-lg btn-block" id="button" type="button">Login</button>
                        </div>
      
                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? 
                            <a href="/register"style="color: #393f81;">Register here</a>
                        </p>
                      </form>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
<script>
    $(document).ready(function(){
        $('#button').click(function(e){

        e.preventDefault();

        var email = $("#email").val();
        var password = $("#password").val();

        $.ajax({
                type: 'post',
                url: '/send_login_data',
                data:{
                    _token: '{{csrf_token()}}',
                    email:email,
                    password:password,
                },
                success:function(data){
                    if($.isEmptyObject(data.error)){
                        if(data.message){
                            window.location="{{route('dashboard')}}";
                        }else{
                            $('.err').html(data.notexists);
                        }
                    }else{
                        printErrorMsg(data.error);
                    }
                }
        });
    });

    function printErrorMsg(msg)
    {
        $.each(msg,function(key,value){
            $('.'+key+'_err').html('***'+value+"***");
        });

        setTimeout(() => {
            $('.err').html('');
            $('.email_err').html('');
            $('.password_err').html('');
        }, 3000);
    }  
});
</script>
</html>