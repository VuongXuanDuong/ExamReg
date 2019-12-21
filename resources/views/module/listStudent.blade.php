@extends('index')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1 class="title">
                Danh sách sinh viên
                <button class="btn btn-success" data-toggle="modal" data-target="#insertModal"><i
                            class="fa fa-plus"></i></button>
            </h1>
            <h2>{{ $module['name'] }}
                <br> [ {{ $module['code'] }} ]
            </h2>
        </div>
        <div class="col-md-3">
        </div>
    </div>

    <table class="table">
        <thead>
        <td>STT</td>
        <th>Name</th>
        <th>Code</th>
        <th>Email</th>
        <th>Status</th>
        <th>Công cụ</th>

        </thead>
        <tbody>
        @foreach( $users as $index => $user )
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$user['user']->full_name}}</td>
                <td>{{$user['user']->username}}</td>
                <td>{{$user['user']->vnu_mail}}</td>
                @if($user['status'] == 1)
                    <td>Được thi</td>
                @else
                    <td>Không được thi</td>
                @endif
                <td>
                    <div class="btn-group" user_id={{$user['id']}} user_info="{{$user}}">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal"
                            onclick="setValueEditForm(this)">
                        <i class="fa fa-edit"></i>
                    </button>
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
    <div class="modal" id="insertModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Student</h4>

                </div>

                <!-- Modal body -->
                <form id="formInsert" class="form-group" action="{{url('admin/module/list-student/'.$module->id)}}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <select name="user_id" class="form-control">
                                @foreach ($students as $in => $student)
                                    <option value="{{ $student['id'] }}" }}> {{$student['username']}} - {{ $student['full_name']}}</option>
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
