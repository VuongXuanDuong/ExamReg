

<!-- Header Starts -->
<!--Start Nav bar -->
<nav class="navbar navbar-inverse navbar-fixed-top pmd-navbar pmd-z-depth">

  <div class="container-fluid">
    <div class="pmd-navbar-right-icon pull-right navigation">
      <!-- User Infomation -->
      <div class="dropdown pmd-dropdown pmd-user-info visible-xs visible-md visible-sm visible-lg">
        <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" style="cursor: pointer;" aria-expandedhref="javascript:void(0);">
          <div class="media-left">
            <img src="{{asset('user-icon.png')}}" alt="New User">
          </div>
          <div class="media-body media-middle"></div>
          <div class="media-right media-middle">
            <i class="material-icons md-dark pmd-sm">arrow_drop_down</i>
          </div>
          <div class="media-right media-middle">
            <i class="dic-more-vert dic"></i>
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-right" role="menu">
          <li><a  onclick="confirmSignOut(this.getAttribute('link'))" link="{{asset('logout')}}">Logout</a></li>
        </ul>
      </div>
      <!-- End Infomation -->
    </div>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a href="javascript:void(0);" data-target="basicSidebar" data-placement="left" data-position="slidepush" is-open="true" is-open-width="1200" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect pull-left margin-r8 pmd-sidebar-toggle"><i class="material-icons md-light">menu</i></a>
      <a href="{{url('admin')}}" class="navbar-brand">
        <!--<a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" aria-expandedhref="javascript:void(0);">-->
        <div class="media-left">
          <img src="{{asset('Logo-VNU.png')}}" alt="Logo" height="60" width="60">
        </div>
        <!--</a>-->
        <a style="color: white">EXAMREG</a>
      </a>

    </div>
  </div>

</nav><!--End Nav bar -->
<!-- Header Ends -->
{{--<nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--  --}}{{-- <a class="navbar-brand" href="#">Class Serveys</a> --}}
{{--  <h3> <img src="{{asset('icon.png')}}" width="50px" alt=""> ExamReg</h3>--}}
{{--  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--    <span class="navbar-toggler-icon"></span>--}}
{{--  </button>--}}

{{--  <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--    <ul class="navbar-nav mr-auto">--}}
{{--      <li class="nav-item active">--}}
{{--        <a class="nav-link" href="{{asset('student')}}"> Trang chủ <span class="sr-only"></span></a>--}}
{{--      </li>--}}


{{--    </ul>--}}


{{--      <div class="nav-item dropdown">--}}
{{--        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--          <i class="fa fa-user"></i>--}}
{{--        </a>--}}
{{--        <div class="dropdown-menu dropdown-left-manual" aria-labelledby="userDropdown">--}}
{{--          <a href="{{asset('student/me')}}"> <i class="fa fa-user"></i> Thông tin cá nhân</a>--}}
{{--          <a href="{{asset('student/change')}}"> <i class="fa fa-key"></i> Đổi mật khẩu </a>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <div>--}}
{{--        <a href="{{asset('logout')}}" style="color:red;"> <i class="fas fa-power-off"></i> </a>--}}
{{--      </div>--}}

{{--  </div>--}}
{{--</nav>--}}
