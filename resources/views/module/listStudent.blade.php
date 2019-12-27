@extends('index')

@section('content')
    <div class="container-fluid full-width-container value-added-detail-page">
    <div class="row">
        <div class="col-md-9">
            <h1 class="section-title" id="services">
                <span>Danh sách sinh viên</span>
{{--                <button class="btn btn-success" data-toggle="modal" data-target="#insertModal"><i--}}
{{--                            class="fa fa-plus"></i></button>--}}
{{--                <div class="col-md-4 bounce" id="excel-input">--}}
{{--                    <form method="POST" action="{{url('admin/module/list-student/import/'.$module->id)}}"--}}
{{--                          enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <label for="excel-file">Nhập file định dạng excel:</label>--}}
{{--                        <input id="excel-file" type="file" class="form-control" accept=".xlsx" required name="file"--}}
{{--                               style="width:70%;float:left;">--}}
{{--                        <button type="submit" class="btn btn-success" style="float:left;"><i class="fa fa-check"></i>--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </div>--}}
            </h1>
            <h2>{{ $module['name'] }}
                <br> [ {{ $module['code'] }} ]
            </h2>
        </div>
        <div class="col-md-3">
        </div>
    </div>

        <div>
            <div class="pull-right pmd-card-body">
                <div class="pmd-textfield pull-left">
                    <button onclick="choose()" type="button" class="btn pmd-btn-raised pmd-ripple-effect btn-danger">
                        Nhập excel
                        <form method="POST" action="{{url('admin/module/list-student/deny/'.$module->id)}}"
                              enctype="multipart/form-data">
                            @csrf
                            <input style="display: none;" type="file" name="file" id="file"
                                   onChange="document.getElementById('submitStudents').click()">
                            <button style="display: none;" type="submit" id="submitStudents" class="btn btn-success"
                                    style="float:left;">
                            </button>
                        </form>
                        <script>
                            function choose() {
                                document.getElementById("file").click();
                            }
                        </script>
                    </button>
                    <button onclick="choose()" type="button" class="btn pmd-btn-raised pmd-ripple-effect btn-success">
                        Nhập excel
                        <form method="POST" action="{{url('admin/module/list-student/import/'.$module->id)}}"
                              enctype="multipart/form-data">
                            @csrf
                            <input style="display: none;" type="file" name="file" id="file"
                                   onChange="document.getElementById('submitStudents').click()">
                            <button style="display: none;" type="submit" id="submitStudents" class="btn btn-success"
                                    style="float:left;">
                            </button>
                        </form>
                        <script>
                            function choose() {
                                document.getElementById("file").click();
                            }
                        </script>
                    </button>
                    <button type="button" class="btn pmd-btn-raised pmd-ripple-effect btn-success" data-toggle="modal" data-target="#insertModal">Thêm</button>
                </div>
            </div>
        </div>

    <div class="table-responsive pmd-card pmd-z-depth">
        <table class="table table-mc-red pmd-table">
            <thead>
            <td>STT</td>
            <th>Họ và tên</th>
            <th>Mã sinh viên</th>
            <th>Email</th>
            <th>Trạng thái</th>
            <th>Hành động</th>

            </thead>
            <tbody>
            @foreach( $users as $index => $user )
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$user['user']->full_name}}</td>
                    <td>{{$user['user']->username}}</td>
                    <td>{{$user['user']->vnu_mail}}</td>
                    @if($user['status'] == 1)
                        <td>Đủ điều kiện</td>
                    @else
                        <td>Không đủ điều kiện</td>
                    @endif
                    <td class="pmd-table-row-action">
                        <div class="btn-group" user_id={{$user['id']}} user_info="{{$user}}">

                            {{-- Delete button --}}
                            <form method="post" action="{{ url('/admin/module/list-student/'.$module->id) }}">
                                @csrf
                                {!! method_field('delete') !!}
                                <input type="hidden" name="module_user_id" value="{{ $user['id'] }}">
                                <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa mục này ?')"><i
                                            class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <div class="modal" id="insertModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Student</h4>

                </div>

                <!-- Modal body -->
                <form id="formInsert" class="form-group" action="{{url('admin/module/list-student/'.$module->id)}}"
                      method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <select name="user_id" class="form-control">
                                @foreach ($students as $in => $student)
                                    <option value="{{ $student['id'] }}" }}> {{$student['username']}}
                                        - {{ $student['full_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Thêm</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        // Alert successful delete
        @if(session('del-success'))
        swal({
            title: "Xóa thành công",
            type: "success",
            button: false,
            timer: 1000
        })
        @endif

        function loading() {
            swal({
                title: "Vui lòng đợi",
                imageUrl: 'https://mbtskoudsalg.com/images/loading-gif-png-5.gif',
                imageWidth: 150,
                imageHeight: 150,
                text: "Dữ liệu đang được xử lý",
                showConfirmButton: false
            })
        }
    </script>

@endsection
