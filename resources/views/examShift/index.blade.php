@extends('index')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1 class="title">
                List Exam Shift
                <button class="btn btn-success" data-toggle="modal" data-target="#insertModal"><i
                            class="fa fa-plus"></i></button>
            </h1>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    {{--    List exam area --}}
    <table class="table">
        <thead>

        <th>STT</th>
        <th>Mã môn học</th>
        <th>Môn học</th>
        <th>Kỳ thi</th>
        <th>Day</th>
        <th>Time Start</th>
        <th>Time Finish</th>
        <th>Tools</th>


        </thead>
        <tbody>
        @foreach($examShifts as $index =>  $examShift )
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$examShift['module']->code}}</td>
                <td>{{$examShift['module']->name}}</td>
                <td>{{$examShift['exam']->name}}</td>
                <td>{{$examShift['day']}}</td>
                <td>{{date('g:iA', strtotime($examShift['time_start']))}}</td>
                <td>{{date('g:iA', strtotime($examShift['time_finish']))}}</td>
                <td>
                    <div class="btn-group" examShift_id={{$examShift['id']}} examShift_info="{{$examShift}}">
                        {{-- Edit button --}}
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal"
                                onclick="setValueEditForm(this)">
                            <i class="fa fa-edit"></i>
                        </button>

                        {{-- Show button --}}
                        <button type="submit" class="btn btn-success" onclick="showExamShiftInfo(this);"><i
                                    class="fa fa-eye"></i></button>

                        {{--  --}}

                        {{-- Delete button --}}
                        <form method="post" action="{{ url('/admin/exam-shift/'.$examShift->id) }}">
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
                    <h4 class="modal-title">Edit Exam Shift</h4>
                </div>
                <!-- Modal body -->
                <form id="formEdit" class="form-group" action="{{url('admin/exam-shift')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        {!! method_field('put') !!}
                        <div class="form-group">
                            <label>Môn học</label>
                            <select name="module_id" class="form-control">
                                @foreach ($modules as $index => $module)
                                    <option value="{{ $module['id'] }}" {{ $module['id'] == $examShift['module_id'] ? 'selected' : '' }}> {{$module['code']}} - [{{ $module['name']}}]</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kỳ thi</label>
                            <select name="exam_id" class="form-control">
                                @foreach ($exams as $index => $exam)
                                    <option value="{{ $exam['id'] }}" {{ $exam['id'] == $examShift['exam_id'] ? 'selected' : '' }}> {{ $exam['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Day</label>
                            <input type="date" class="form-control" name="day" required
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="">Time Start</label>
                            <input type="time" class="form-control" name="time_start" required
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="">Time Finish</label>
                            <input type="time" class="form-control" name="time_finish" required
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
{{--    form insert--}}
    <div class="modal" id="insertModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create Exam</h4>
                </div>
                <!-- Modal body -->
                <form id="formInsert" class="form-group" action="{{url('admin/exam-shift')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Môn học</label>
                            <select name="module_id" class="form-control">
                                <option>-- --</option>
                                @foreach ($modules as $index => $module)
                                    <option value="{{ $module['id'] }}" }}> {{$module['code']}} - [{{ $module['name']}}]</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kỳ thi</label>
                            <select name="exam_id" class="form-control">
                                <option>-- --</option>
                                @foreach ($exams as $index => $exam)
                                    <option value="{{ $exam['id'] }}" }}> {{ $exam['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Day</label>
                            <input type="date" class="form-control" name="day" required
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="">Time Start</label>
                            <input type="time" class="form-control" name="time_start" required
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="">Time Finish</label>
                            <input type="time" class="form-control" name="time_finish" required
                                   value="">
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
            let info = JSON.parse(elem.parentNode.getAttribute('examShift_info'));
            $('#formEdit').attr('action', window.location.origin + '/admin/exam-shift/' + info.id);
            $('#formEdit select[name = module_id]').val(info.module_id);
            $('#formEdit select[name = exam_id]').val(info.exam_id);
            $('#formEdit input[name = day]').val(info.day);
            $('#formEdit input[name = time_start]').val(info.time_start);
            $('#formEdit input[name = time_finish]').val(info.time_finish);

        }
        function showExamShiftInfo(elem) {
            let info = JSON.parse(elem.parentNode.getAttribute('examShift_info'));
            swal({
                title: "Exam Shift",
                confirmButtonText: 'Thoát',
                html:
                    `
                 <table class="table" style="text-align:left;">
                    <tr>
                        <th>Do Something </th>
                        <td>${info.day}</td>
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
