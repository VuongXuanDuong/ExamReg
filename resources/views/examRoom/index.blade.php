@extends('index')

@section('content')
     <div class="container-fluid full-width-container value-added-detail-page">
        <div>
          <div class="pull-right table-title-top-action">
            <div class="pmd-textfield pull-left">
              <input type="text" id="search_form" class="form-control" placeholder="Search for...">
            </div>
            <a href="javascript:void(0);" class="btn btn-primary pmd-btn-raised add-btn pmd-ripple-effect pull-left">Search</a>
          </div>
          <!-- Title -->
          <h1 class="section-title" id="services">
            <span>Phòng thi</span>
          </h1><!-- End Title -->

          <!--breadcrum start-->
          <ol class="breadcrumb text-left">
            <li><a href="{{asset('admin')}}">Trang chủ</a></li>
            <li class="active">Phòng thi</li>
          </ol><!--breadcrum end-->
        </div>


        <div>
          <div class="pull-right pmd-card-body">
            <div class="pmd-textfield pull-left">
              <!--<button onclick ="choose()"type="button" class="btn pmd-btn-raised pmd-ripple-effect btn-success">
                <input type="file" id="file" style="display: none;
                ">
                <script >
                  function choose(){
                    document.getElementById("file").click();
                  }
                </script>

              Nhập Excel
              </button>-->

             <button type="button" class="btn pmd-btn-raised pmd-ripple-effect btn-success" data-toggle="modal" data-target="#insertModal">Thêm</button>
            </div>
          </div>
        </div>

        {{-- List university --}}
        <!-- Table -->
        <div class="table-responsive pmd-card pmd-z-depth">
            <table class="table table-mc-red pmd-table">
                <thead>
                    <th>STT</th>
                    <th>Tên phòng thi</th>
                    <th>Mã môn thi</th>
                    <th>Môn thi</th>
                    <th>Thời gian</th>
                    <th>Địa Điểm</th>
                    <th>Tổng sinh viên</th>
                    <th>Tổng số máy</th>
                    <th>Hành động</th>
                </thead>

                <tbody>
                    @foreach($examRooms as $index =>  $examRoom )
                    <tr>
                         <td>{{$index+1}}</td>
                        <td>{{$examRoom['name']}}</td>
                        <td>{{$examRoom['exam_shift']->module->code}}</td>
                        <td>{{$examRoom['exam_shift']->module->name}}</td>
                        <td> {{date('g:iA', strtotime($examRoom['exam_shift']->time_start))}} - {{date('g:iA', strtotime($examRoom['exam_shift']->time_finish))}}
                            <br>{{$examRoom['exam_shift']->day}}
                        </td>
                        <td>{{$examRoom['room']->name}}
                            <br>{{$examRoom['room']->area->name}}</td>
                        <td> {{ $examRoom['exam_room_user_count']}}</td>
                        <td>{{$examRoom['room']->total_computer}}</td>
                        <td class="pmd-table-row-action">
                            <div examRoom_id={{$examRoom['id']}} examRoom_info="{{$examRoom}}">
                                {{-- Edit button --}}
                                <button type="button" class="btn-sm btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-warning" data-toggle="modal" data-target="#editModal" onclick="setValueEditForm(this)" > <i class="material-icons md-dark pmd-xs">edit</i> </button>

                                {{-- SHow button --}}
                                <!-- <button type="button" class="btn-sm btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-info" onclick = "showExamRoomInfo(this);" > <i class="material-icons md-dark pmd-xs">visibility</i></button>
                                {{--end show --}} -->
                                <!-- <a class="btn btn-success" href="{{asset('admin/exam-room/list-student/'.$examRoom->id )}}">
                                    <i class="far fa-address-card"></i> -->
                                    <a target="_blank" class="btn-sm btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-info" href="{{asset('admin/exam-room/list-student/'.$examRoom->id )}}">
                                        <i class="material-icons md-dark pmd-xs"><i class="fa fa-print"></i></i>
                                    </a>
                                {{-- Delete form --}}
                                <form action="{{ url('/admin/exam-room/'.$examRoom->id) }}" method="post">
                                  {{method_field("delete")}}
                                  @csrf
                                  <button type="submit" class="
                                  btn-sm btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-danger " onclick="return confirm('Bạn có chắc chắn muốn xóa mục này ?')" > <i class="material-icons md-dark pmd-xs">delete</i> </button>
                                </form>
                                {{-- End --}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          <!-- Table end -->
        </div>
    </div>

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
                    <h4 class="modal-title">Tạo phòng thi</h4>
                </div>
                <!-- Modal body -->
                <form id="formInsert" class="form-group" action="{{url('admin/exam-room')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Tên phòng thi</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên" required
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
