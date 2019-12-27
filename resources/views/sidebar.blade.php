</aside>-->
<!-- Left sidebar -->
<aside id="basicSidebar" class="pmd-sidebar  sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-darkblue sidebar-with-icons" role="navigation">
    <ul class="nav pmd-sidebar-nav">
        <li> 
            <a class="pmd-ripple-effect" href="{{asset('admin')}}"> 
                <i class="media-left media-middle"><i class="fa fa-tachometer"></i></i>
                <span class="media-body">Trang chủ</span>
            </a> 
        </li>
        
        <li class="dropdown pmd-dropdown"> 
            <a class="pmd-ripple-effect"  href="{{asset('admin/sinh-vien')}}">
                <div class="media-left media-middle"><i class="fa fa-user-o"></i></div>
                <span class="media-body">Sinh Viên</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a> 
        </li>
        <li>
            <a class="pmd-ripple-effect" href="{{asset('admin/exam-area')}}">
                <i class="media-left media-middle"><i class="fa fa-map-marker"></i></i>
                <span class="media-body">Khu vực thi</span>
            </a>
        </li>
        <li class="dropdown pmd-dropdown"> 
            <a  class="pmd-ripple-effect" href="{{asset('admin/room')}}">
                <i class="media-left media-middle"><i class="fa fa-desktop"></i></i>
                <span class="media-body">Phòng Máy</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a> 
        </li>
        <li class="dropdown pmd-dropdown"> 
            <a  class="pmd-ripple-effect" href="{{asset('admin/module')}}"> 
                <i class="media-left media-middle"><i class="fa fa-book"></i></i>
                <span class="media-body">Học phần</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a>
        </li>

        <li class="dropdown pmd-dropdown"> 
            <a class="pmd-ripple-effect" href="{{asset('admin/exam')}}">    
                <i class="media-left media-middle"><i class="fa fa-list-alt"></i></i>
                <span class="media-body">Kỳ thi</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a> 
        </li>
        <li> 
            <a class="pmd-ripple-effect" href="{{asset('admin/exam-shift')}}">    
                <i class="media-left media-middle"> <i class="fa fa-bell-o"></i></i>
                <span class="media-body">Ca thi</span>
            </a> 
        </li>
        <li> 
            <a class="pmd-ripple-effect" href="{{asset('admin/exam-room')}}"> 
                <i class="media-left media-middle"><i class="fa fa-building"></i></i>
                <span class="media-body">Phòng thi</span>
            </a> 
        </li>
        <li class="dropdown pmd-dropdown">
            <a class="pmd-ripple-effect" href="{{asset('admin/university')}}">
                <i class="media-left media-middle"><i class="fa fa-university"></i></i>
                <span class="media-body">Trường Học</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a>
        </li>
        
    </ul>
</aside><!-- End Left sidebar -->
<script type="text/javascript">
    $('document').ready(function () {
        $(".nav-side-menu").animate({width: 'toggle'}, 0);
    })
    $('.times').click(function () {
        $(".nav-side-menu").animate({width: 'toggle'}, 150);
        $('#bars').show();
    });

    $('#bars').click(function () {
        $(".nav-side-menu").animate({width: 'toggle'}, 150);
        $('#bars').hide();
    });

</script>
