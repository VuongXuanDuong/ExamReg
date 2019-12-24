<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
    <title>Đăng nhập</title>
    <link rel="icon" href="{{asset('Logo-VNU.png')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <!--<link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">-->

    <!-- Google icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">

    <!-- Propeller css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/propeller.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/propeller-theme.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/propeller-admin.css')}}">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.5/sweetalert2.all.min.js"></script>
  </head>

  <body>

      {{-- Session error --}}
      @if(session('error'))
      <script type="text/javascript">
        swal({
          title:"Đăng nhập thất bại",
          type:"error",
          text:"Tài khoản hoặc mật khẩu không đúng",
          timer:"1500",
          showCancelButton: false,
          showConfirmButton: false

        })
      </script>
      @endif
      {{-- End session --}}


      <body class="body-custom">
         <div class="logincard">
            <div class="pmd-card card-default pmd-z-depth">
            <div class="login-card">
              <form method="POST" action="{{route('login')}}" id="Login"> 
                @csrf 
                <div class="pmd-card-title card-header-border text-center">
                  <div class="loginlogo">
                    <a href="javascript:void(0);"><img src="{{asset('Logo-VNU.png')}}" alt="Logo" height="70" width="70"></a>
                  </div>
                  <h3>Sign In <span>with <strong>ExamReg</strong></span></h3>
                </div>
                
                <div class="pmd-card-body">
                  <div class="alert alert-success" role="alert"> Oh snap! Change a few things up and try submitting again. </div>
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <!--<input type="text" name="username" id="inputUserName" value="@if(session('info')){{session('info')['username']}}@endif">-->
                                <label for="inputEmail" class="control-label pmd-input-group-label">Username</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">perm_identity</i></div>
                                    <input type="text" class="form-control" name="username" id="inputEmail" value="@if(session('info')){{session('info')['username']}}@endif">
                                </div>
                            </div>
                            
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label for="inputPassword" class="control-label pmd-input-group-label">Password</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">lock_outline</i></div>
                                    <input type="password" class="form-control" name="password" id="inputPassword">
                                </div>
                            </div>
                        </div>
                <div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">
                  <div class="form-group clearfix">
                    <div class="checkbox pull-left">
                      <label class="pmd-checkbox checkbox-pmd-ripple-effect">
                        <input type="checkbox" checked="" value="">
                        <span class="pmd-checkbox"> Remember me</span>
                      </label>
                    </div>
                    <span class="pull-right forgot-password">
                      <a href="javascript:void(0);">Forgot password?</a>
                    </span>
                  </div>
                  <button type="submit" class="btn pmd-ripple-effect btn-primary btn-block">Login</button>
                            
                  <p class="redirection-link"><a href="javascript:void(0);" class="login-register"></a></p>
                            
                </div>
                
              </form>
            </div>
            
            
            <div class="forgot-password-card">
              <form>  
                <div class="pmd-card-title card-header-border text-center">
                <div class="loginlogo">
                  <a href="javascript:void(0);"><img src="{{asset('Logo-VNU.png')}}" alt="Logo" width="70" height="70"></a>
                </div>
                <h3>Forgot password?<br><span>Submit your email address and we'll send you a link to reset your password.</span></h3>
              </div>
                <div class="pmd-card-body">
                  <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label for="inputError1" class="control-label pmd-input-group-label">Email address</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="material-icons md-dark pmd-sm">email</i></div>
                                    <input type="text" class="form-control" id="exampleInputAmount">
                                </div>
                            </div>
                </div>
                <div class="pmd-card-footer card-footer-no-border card-footer-p16 text-center">
                  <a href="index.html" type="button" class="btn pmd-ripple-effect btn-primary btn-block">Submit</a>
                  <p class="redirection-link">Already registered? <a href="javascript:void(0);" class="register-login">Sign In</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
     
    </body>
    <!-- Scripts Starts -->
<script src="{{asset('js/jquery-1.12.2.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/propeller.min.js')}}"></script>
<script>
  $(document).ready(function() {
    var sPath=window.location.pathname;
    var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
    $(".pmd-sidebar-nav").each(function(){
      $(this).find("a[href='"+sPage+"']").parents(".dropdown").addClass("open");
      $(this).find("a[href='"+sPage+"']").parents(".dropdown").find('.dropdown-menu').css("display", "block");
      $(this).find("a[href='"+sPage+"']").parents(".dropdown").find('a.dropdown-toggle').addClass("active");
      $(this).find("a[href='"+sPage+"']").addClass("active");
    });
  });
</script>
<!-- login page sections show hide -->
<script type="text/javascript">
  $(document).ready(function(){
   $('.app-list-icon li a').addClass("active");
    $(".login-for").click(function(){
      $('.login-card').hide()
      $('.forgot-password-card').show();
    });
    $(".signin").click(function(){
      $('.login-card').show()
      $('.forgot-password-card').hide();
    });
  });
</script>
<script type="text/javascript">
$(document).ready(function(){
    $(".login-register").click(function(){
      $('.login-card').hide()
      $('.forgot-password-card').hide();
      $('.register-card').show();
    });
    
    $(".register-login").click(function(){
      $('.register-card').hide()
      $('.forgot-password-card').hide();
      $('.login-card').show();
    });
    $(".forgot-password").click(function(){
      $('.login-card').hide()
      $('.register-card').hide()
      $('.forgot-password-card').show();
    }); 
});
</script> 
  </body>
</html>
