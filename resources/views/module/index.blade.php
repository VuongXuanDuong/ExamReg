@extends('index')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1 class="title">
                List Module
                <button class="btn btn-success" data-toggle="modal" data-target="#insertModal"><i
                            class="fa fa-plus"></i></button>
            </h1>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    {{--    List module --}}
    <table class="table">
        <thead>

        <th>STT</th>
        <th>Name</th>
        <th>Code</th>
        <th>Tổng sinh viên</th>
        <th>Công cụ</th>


        </thead>
        <tbody>
        @foreach($modules as $index =>  $module )
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$module['name']}}</td>
                <td>{{$module['code']}}</td>
                <td>{{$module['module_user_count']}}</td>
                <td>
                    <div class="btn-group" module_id={{$module['id']}} module_info="{{$module}}">
                        {{-- Edit button --}}
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal"
                                onclick="setValueEditForm(this)">
                            <i class="fa fa-edit"></i>
                        </button>

                        {{-- Show button --}}
                        {{--                        <button type="submit" class="btn btn-success" onclick="showModuleInfo(this);"><i--}}
                        {{--                                    class="fa fa-eye"></i></button>--}}

{{--                        Show list student of this module--}}
                        <a class="btn btn-success" href="{{asset('admin/module/list-student/'.$module->id )}}">
                            <i class="far fa-address-card"></i>
                        </a>
                        {{-- Delete button --}}
                        <form method="post" action="{{ url('/admin/module/'.$module->id) }}">
                            @csrf
                            {!! method_field('delete') !!}
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa mục này ?')"><i
                                        class="fa fa-trash"></i></button>
                        </form>
                        {{--  --}}

                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

{{--    <div class="modal" id="studentModal">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <!-- Modal Header -->--}}
{{--                <div class="modal-header">--}}
{{--                    <h4 class="modal-title">Xem sinh viên lớp học phần</h4>--}}
{{--                    <div>--}}
{{--                        <h4>   bat dau  ket thuc</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <table class="table" >--}}
{{--                    <thead>--}}

{{--                    <th>STT</th>--}}
{{--                    <th>Họ và tên</th>--}}
{{--                    <th>Mã sinh viên</th>--}}
{{--                    <th>Trạng Thái</th>--}}
{{--                    <th>Công cụ</th>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    <tr id="formStudent">--}}
{{--                        <td id="index"></td>--}}
{{--                        <td id="nameStudent"></td>--}}
{{--                        <td id="codeStudent"></td>--}}
{{--                        <td id="status"></td>--}}
{{--                        <td></td>--}}
{{--                        @if (is_array($users) || is_object($users))--}}
{{--                            <br>bat dau {{$users}} ket thuc--}}
{{--                            @foreach( $users as $in => $user)--}}
{{--                                <td>{{$in+1}}</td>--}}
{{--                                <td>{{ $user['user']->full_name }}</td>--}}
{{--                                <td>{{ $user['user']->username }}</td>--}}
{{--                                <td></td>--}}
{{--                                <td></td>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--                <!-- Modal footer -->--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    {{--    form edit module--}}
    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Module</h4>

                </div>

                <!-- Modal body -->
                <form id="formEdit" class="form-group" action="{{url('admin/module')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        {!! method_field('put') !!}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="">Code</label>
                            <input type="text" class="form-control" name="code" required
                                   value="">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Sửa</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal" id="insertModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create Module</h4>

                </div>

                <!-- Modal body -->
                <form id="formInsert" class="form-group" action="{{url('admin/module')}}" method="post">
                    <div class="modal-body">
                        @csrf

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name"
                                   placeholder="Enter name module" required value="">
                        </div>
                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" class="form-control" name="code" placeholder="Enter a short name"
                                   required value="">
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
    <script type="text/javascript">
        function setValueEditForm(elem) {
            let info = JSON.parse(elem.parentNode.getAttribute('module_info'));
            $('#formEdit').attr('action', window.location.origin + '/admin/module/' + info.id);
            $('#formEdit input[name = name]').val(info.name);
            $('#formEdit input[name = code]').val(info.code);
        }

        // function setValueUserForm(elem) {
        //     let info = JSON.parse(elem.parentNode.getAttribute('module_info'));
        //     let users = info['module_user'];
        //     // $('#formStudent').html(users);
        //     for (let j=0 ; j<users.length;j++) {
        //         console.log(users[j]['user']['full_name'])
        //         $('#index').html(j+1);
        //         $('#nameStudent').html(users[j]['user']['full_name']);
        //         $('#codeStudent').html(users[j]['user']['username']);
        //         $('#status').html(users[j]['status']);
        //         $('#test').html(users[j]['user']);
        //     }

        function showModuleInfo(elem) {
            let info = JSON.parse(elem.parentNode.getAttribute('module_info'));
            swal({
                title: "University",
                confirmButtonText: 'Thoát',
                html:
                    `
                 <table class="table" style="text-align:left;">
                    <tr>
                        <th>Name  </th>
                        <td>${info.name}</td>
                    </tr>
                    <tr>
                        <th>Code  </th>
                        <td>${info.code}</td>
                    </tr>
                    <tr>
                        <th> Code Subject </th>
                        <td>${info.subject_code}</td>
                    </tr>
                     <tr>
                        <th>Time create  </th>
                        <td>${info.created_at}</td>
                    </tr>
                </table>
                    `
            })
        }
    </script>


@endsection
