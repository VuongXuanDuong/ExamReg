</aside>-->
<!-- Left sidebar -->
<aside id="basicSidebar" class="pmd-sidebar  sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-darkblue sidebar-with-icons" role="navigation">
    <ul class="nav pmd-sidebar-nav">
        <li>
            <a class="pmd-ripple-effect" href="{{asset('student')}}">
                <i class="media-left media-middle"><svg version="1.1" x="0px" y="0px" width="19.83px" height="18px" viewBox="287.725 407.535 19.83 18" enable-background="new 287.725 407.535 19.83 18"
                                                        xml:space="preserve">
<g>
    <path fill="#C9C8C8" d="M307.555,407.535h-9.108v10.264h9.108V407.535z M287.725,407.535v6.232h9.109v-6.232H287.725z
         M296.834,415.271h-9.109v10.264h9.109V415.271z M307.555,419.303h-9.108v6.232h9.108V419.303z"/>
</g>
</svg></i>
                <span class="media-body">Đăng ký thi</span>
            </a>
        </li>

        <li class="dropdown pmd-dropdown">
            <a class="pmd-ripple-effect"  href="{{asset('student/registrated')}}">
                <div class="media-left media-middle"><i class="fa fa-quora"></i></div>
                <span class="media-body">Xem kết quả</span>
                <div class="media-right media-bottom"><i class="dic-more-vert dic"></i></div>
            </a>
        </li>
        <li class="dropdown pmd-dropdown">
            <a  class="pmd-ripple-effect" href="{{asset('student/me')}}">
                <i class="material-icons media-left pmd-sm">swap_calls</i>
                <span class="media-body">Thông tin cá nhân</span>
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



{{--<!--nav sidebar -->--}}
{{--<aside id="sidebar" >--}}
{{--  <nav class="navbar navbar-inverse sidebar navbar-fixed-top" role="navigation">--}}
{{--      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">--}}

{{--<div class="nav-side-menu">--}}
{{--    <div class="brand">--}}
{{--      <h2>ExamReg</h2>--}}
{{--      <button type="button" class="btn btn-danger times" > <i class="fa fa-times"></i> </button>--}}
{{--    </div>--}}

{{--    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>--}}

{{--        <div class="menu-list">--}}

{{--            <ul id="menu-content" class="menu-content collapse out">--}}
{{--                <li>--}}
{{--                    <a href="">--}}
{{--                        <i class="fa fa-dashboard fa-lg"></i> Trang Chủ--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                  <a href="{{asset('student')}}">--}}
{{--                  <i class="fa fa-dashboard fa-lg"></i> Đăng ký lịch thi--}}
{{--                  </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{asset('student/registrated')}}">--}}
{{--                        <i class="fa fa-dashboard fa-lg"></i> Xem lịch đã đăng ký thi--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{asset('student/me')}}">--}}
{{--                        <i class="fa fa-dashboard fa-lg"></i> Thông tin cá nhân--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--            </ul>--}}
{{--     </div>--}}
{{--</div>--}}
{{--  </nav>--}}

{{--</aside>--}}
{{--<script type="text/javascript">--}}
{{--    $('document').ready(function(){--}}
{{--        $(".nav-side-menu").animate({width:'toggle'},0);--}}
{{--    })--}}
{{--    $('.times').click(function(){--}}
{{--        $(".nav-side-menu").animate({width:'toggle'},150);--}}
{{--        $('#bars').show();--}}
{{--    });--}}

{{--    $('#bars').click(function(){--}}
{{--      $(".nav-side-menu").animate({width:'toggle'},150);--}}
{{--      $('#bars').hide();--}}
{{--    });--}}

{{--</script>--}}
