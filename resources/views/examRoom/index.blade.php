@extends('index')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1 class="title">
                Phòng thi
                <button class="btn btn-success" data-toggle="modal" data-target="#insertModal"><i
                            class="fa fa-plus"></i></button>
            </h1>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    {{--    List exam room --}}
    <table class="table">
        <thead>

        <th>STT</th>
        <th>Tên phòng thi</th>
        <th>Mã môn thi</th>
        <th>Môn thi</th>
        <th>Thời gian</th>
        <th>Địa Điểm</th>
        <th>Tools</th>


        </thead>
        <tbody>
        @foreach($examRooms as $index =>  $examRoom )
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$examRoom['name']}}</td>
                <td>{{$examRoom['examShift']->module->code}}</td>
                <td>{{$examRoom['examShift']->module->name}}</td>
                <td> {{date('g:iA', strtotime($examRoom['examShift']->time_start))}} - {{date('g:iA', strtotime($examRoom['examShift']->time_finish))}}
                    <br>{{$examRoom['examShift']->day}}
                </td>
                <td>{{$examRoom['room']->name}}
                    <br>{{$examRoom['room']->area->name}}</td>
                <td>
                    <div class="btn-group" examRoom_id={{$examRoom['id']}} examRoom_info="{{$examRoom}}">
                        {{-- Edit button --}}
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal"
                                onclick="setValueEditForm(this)">
                            <i class="fa fa-edit"></i>
                        </button>

                        {{-- Show button --}}
                        <button type="submit" class="btn btn-success" onclick="showExamRoomInfo(this);"><i
                                    class="fa fa-eye"></i></button>

                        {{--  --}}

                        {{-- Delete button --}}
                        <form method="post" action="{{ url('/admin/exam-room/'.$examRoom->id) }}">
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

    {{--    form edit--}}
    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Exam Room</h4>
                </div>
                <!-- Modal body -->
                <form id="formEdit" class="form-group" action="{{url('admin/exam-room')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        {!! method_field('put') !!}
                        <div class="form-group">
                            <label>Tên phòng thi</label>
                            <input type="text" class="form-control" name="name" required
                                   value="">
                        </div>
                        <div class="form-group">
                            <label>Ca thi</label>
                            <select name="exam_shift_id" class="form-control">
                                @foreach ($examShifts as $index => $examShift)
                                    <option value="{{ $examShift['id'] }}" {{ $examShift['id'] == $examRoom['exam_shift_id'] ? 'selected' : '' }}>
                                        {{$examShift['module']->code}} [{{$examShift['module']->name}}] | {{date('g:iA', strtotime($examShift['time_start']))}}
                                        -{{date('g:iA', strtotime($examShift['time_finish']))}} | {{$examShift['day']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Địa điểm thi</label>
                            <select name="room_id" class="form-control">
                                @foreach ($rooms as $index => $room)
                                    <option value="{{ $room['id'] }}" {{ $room['id'] == $examRoom['room_id'] ? 'selected' : '' }}>
                                        {{ $room['name']}} | {{ $room['area']->name }}
                                    </option>
                                @endforeach
                            </select>
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
    {{--    form insert--}}
    <div class="modal" id="insertModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create Exam Room</h4>
                </div>
                <!-- Modal body -->
                <form id="formInsert" class="form-group" action="{{url('admin/exam-room')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Tên phòng thi</label>
                            <input type="text" class="form-control" name="name" required
                                   value="">
                        </div>
                        <div class="form-group">
                            <label>Ca thi</label>
                            <select name="exam_shift_id" class="form-control">
                                @foreach ($examShifts as $index => $examShift)
                                    <option value="{{ $examShift['id'] }}">
                                        {{$examShift['module']->code}} [{{$examShift['module']->name}}] | {{date('g:iA', strtotime($examShift['time_start']))}}
                                        -{{date('g:iA', strtotime($examShift['time_finish']))}} | {{$examShift['day']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Địa điểm thi</label>
                            <select name="room_id" class="form-control">
                                @foreach ($rooms as $index => $room)
                                    <option value="{{ $room['id'] }}" }}>
                                        {{ $room['name']}} | {{ $room['area']->name }}
                                    </option>
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
        function setValueEditForm(elem) {
            let info = JSON.parse(elem.parentNode.getAttribute('examRoom_info'));
            $('#formEdit').attr('action', window.location.origin + '/admin/exam-room/' + info.id);
            $('#formEdit select[name = exam_shift_id]').val(info.exam_shift_id);
            $('#formEdit select[name = room_id]').val(info.room_id);
            $('#formEdit input[name = name]').val(info.name);

        }
        function showExamRoomInfo(elem) {
            let info = JSON.parse(elem.parentNode.getAttribute('examRoom_info'));
            swal({
                title: "Exam Room",
                confirmButtonText: 'Thoát',
                html:
                    `
                 <table class="table" style="text-align:left;">
                    <tr>
                        <th>Do Something </th>
                        <td>${info.name}</td>
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
