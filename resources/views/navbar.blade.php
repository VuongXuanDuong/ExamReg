

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
        <div class="media-body media-middle">Admin</div>
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
          <a href="{{url('admin')}}" style="color: white">EXAMREG</a>
        </a>

    </div>
  </div>

</nav><!--End Nav bar -->
<!-- Header Ends -->