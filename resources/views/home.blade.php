@extends('index')
@section('content')


    <script type="text/javascript">
        // Session  login success
        @if(session('login-success'))
        swal({
            title: "Đăng nhập thành công",
            type: "success",
            text: "Chào mừng bạn đến với hệ thống Class Survey",
            showConfirmButton: false,
            timer: 2000
        })
        @endif


    </script>


    <div class="panel">
        <div class="panel-header">
            <div class="number">
                {{$studentCount}}
            </div>
            <div class="icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div style="clear:both;"></div>
            <div class="text">
                Sinh viên
            </div>
        </div>
        <div class="panel-footer">
            <a href="{{asset('admin/sinh-vien')}}"> Xem thêm</a>
        </div>

    </div>

    <div class="panel">
        <div class="panel-header" style="background-color:#3d95e0;">
            <div class="number">
                {{$teacherCount}}
            </div>
            <div class="icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div style="clear:both;"></div>
            <div class="text">
                Giảng viên
            </div>
        </div>
        <div class="panel-footer">
            <a href="{{asset('admin/giang-vien')}}"> Xem thêm</a>
        </div>
    </div>
    <div class="panel">
        <div class="panel-header" style="background-color:#ff9400;">
            <div class="number">
                {{$universityCount}}
            </div>
            <div class="icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <div style="clear:both;"></div>
            <div class="text">
                University
                <br>
            </div>
        </div>
        <div class="panel-footer">
            <a href="{{asset('admin/university')}}"> Xem thêm</a>
        </div>
    </div>
    <div class="panel">
        <div class="panel-header" style="background-color:#ff9400;">
            <div class="number">
                {{$areaCount}}
            </div>
            <div class="icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <div style="clear:both;"></div>
            <div class="text">
                Khu vực thi
                <br>
            </div>
        </div>
        <div class="panel-footer">
            <a href="{{asset('admin/exam-area')}}">  Xem thêm</a>
        </div>
    </div>
    <div class="panel">
        <div class="panel-header" style="background-color:#ff9400;">
            <div class="number">
                {{$roomCount}}
            </div>
            <div class="icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <div style="clear:both;"></div>
            <div class="text">
                Phòng máy
                <br>
            </div>
        </div>
        <div class="panel-footer">
            <a href="{{asset('admin/room')}}"> Xem thêm</a>
        </div>
    </div>
    <div class="panel">
        <div class="panel-header" style="background-color:#ff9400;">
            <div class="number">
                {{$examCount}}
            </div>
            <div class="icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <div style="clear:both;"></div>
            <div class="text">
                Kỳ thi
                <br>
            </div>
        </div>
        <div class="panel-footer">
            <a href="{{asset('admin/exam')}}">  Xem thêm</a>
        </div>
    </div>
    <div class="panel">
        <div class="panel-header" style="background-color:#ff9400;">
            <div class="number">
                {{$moduleCount}}
            </div>
            <div class="icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <div style="clear:both;"></div>
            <div class="text">
                Học phần
                <br>
            </div>
        </div>
        <div class="panel-footer">
            <a href="{{asset('admin/module')}}">  Xem thêm</a>
        </div>
    </div>
    <div class="panel">
        <div class="panel-header" style="background-color:#ff9400;">
            <div class="number">
                {{$examShiftCount}}
            </div>
            <div class="icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <div style="clear:both;"></div>
            <div class="text">
                Ca thi
                <br>
            </div>
        </div>
        <div class="panel-footer">
            <a href="{{asset('admin/exam-shift')}}">  Xem thêm</a>
        </div>
    </div>
    <div class="panel">
        <div class="panel-header" style="background-color:#ff9400;">
            <div class="number">
                {{$examRoomCount}}
            </div>
            <div class="icon">
                <i class="fas fa-clipboard-list"></i>
            </div>
            <div style="clear:both;"></div>
            <div class="text">
                Phòng thi
                <br>
            </div>
        </div>
        <div class="panel-footer">
            <a href="{{asset('admin/exam-room')}}">  Xem thêm</a>
        </div>
    </div>

    </div>


    <style media="screen">
        .panel {
            width: 372px;
            height: 172px;
            color: white;
            border-radius: 5px;
            background-color: crimson;
            float: left;
            border: 1px solid red;
            margin: 20px;

        }

        .panel .panel-header {
            height: 80%;
            width: 100%;
            padding: 10px;
            padding-top: 0px;
        }

        .panel .panel-footer {
            height: 20%;
            background-color: white;
        }

        .panel .panel-header .number {
            width: 50%;
            float: left;
            font-size: 70px;
        }

        .panel .panel-header .icon {
            width: 10%;
            float: left;
            font-size: 70px;
        }

        .panel-footer {
            padding-left: 10px;
            padding-top: 5px;
            color: crimson;

        }

        .panel .text {
            font-size: 18px;

        }
    </style>

@endsection
