<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Managment Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
      
                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
      
                      <form class="mx-1 mx-md-4">

                        <span class="err text-danger"></span>
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <span class="name_err text-danger"></span>
                            <input type="text" id="name" class="form-control" />
                            <label class="form-label" for="name">Your Name</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <span class="email_err text-danger"></span>
                            <input type="email" id="email" class="form-control" />
                            <label class="form-label" for="email">Your Email</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <span class="password_err text-danger"></span>
                            <input type="password" id="password" class="form-control" />
                            <label class="form-label" for="password">Password</label>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <span class="repassword_err text-danger"></span>
                            <input type="password" id="repassword" class="form-control" />
                            <label class="form-label" for="repassword">Repeat your password</label>
                          </div>
                        </div>

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button type="button" id="button" class="btn btn-primary btn-lg">Register</button>
                        </div>
      
                      </form>
      
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2" style="width: 410px;">
      
                      <img src="/images/nathalia-rosa-P1SdQAhcJz8-unsplash.jpg"
                        class="img-fluid" alt="Register Page Image">
      
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
    $(document).ready(function() {
        $('#button').click(function(event) {

            event.preventDefault();
            console.log($('#name').val());
            let name = $('#name').val();
            let email = $("#email").val();
            let password = $("#password").val();
            let repassword = $("#repassword").val();

            $.ajax({
                type: 'post',
                url: '/send_register_data',
                dataType: 'JSON',
                data: {
                    _token: '{{csrf_token()}}',
                    name:name,
                    email:email,
                    password:password,
                    repassword:repassword,
                },
                success:function(data){
                    if($.isEmptyObject(data.error)){
                        if(data.success){
                            window.location="{{route('dashboard')}}";
                        }else{
                            $('.err').html(data.exists);
                        }
                    }
                    else{
                        printErrorMsg(data.error);
                    }
                }
            });   

            function printErrorMsg(msg)
            {
                $.each(msg,function(key,value){
                    $('.'+key+'_err').html('***'+value+'***');
                });

                setTimeout(() => {
                    $('.err').html('');
                    $('.name_err').html('');
                    $('.email_err').html('');
                    $('.password_err').html('');
                    $('.repassword_err').html('');
                }, 3000);
            }
        });
    });
</script>
</html>