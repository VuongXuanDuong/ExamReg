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
            <span>Ca thi</span>
          </h1><!-- End Title -->

          <!--breadcrum start-->
          <ol class="breadcrumb text-left">
            <li><a href="{{asset('admin')}}">Trang chủ</a></li>
            <li class="active">Ca thi</li>
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

        {{-- List ExamShift --}}
        <!-- Table -->
        <div class="table-responsive pmd-card pmd-z-depth">
            <table class="table table-mc-red pmd-table">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã môn học</th>
                    <th>Môn học</th>
                    <th>Kỳ thi</th>
                    <th>Ngày thi</th>
                    <th>Bắt đầu</th>
                    <th>Kết thúc</th>
                    <th>Hành động</th>
                </tr>
                </thead>

                <tbody>
                   @foreach($examShifts as $index => $examShift)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$examShift['module']->code}}</td>
                        <td>{{$examShift['module']->name}}</td>
                        <td>{{$examShift['exam']->name}}</td>
                        <td>{{$examShift['day']}}</td>
                        <td>{{date('g:iA', strtotime($examShift['time_start']))}}</td>
                        <td>{{date('g:iA', strtotime($examShift['time_finish']))}}</td>
                        <td class="pmd-table-row-action">
                            <div examShift_id={{$examShift['id']}} examShift_info="{{$examShift}}">
                                {{-- Edit button --}}
                                <button type="button" class="btn-sm btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-warning" data-toggle="modal" data-target="#editModal" onclick="setValueEditForm(this)" > <i class="material-icons md-dark pmd-xs">edit</i> </button>

                                {{-- SHow button --}}
                                <button type="button" class="btn-sm btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-info" onclick = "showExamShiftInfo(this);" > <i class="material-icons md-dark pmd-xs">visibility</i></button>
                                {{--end show --}}

                                {{-- Delete form --}}
                                <form action="{{ url('/admin/exam-shift/'.$examShift->id) }}" method="post">
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
{{-- form edit--}}
    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Sửa ca thi</h4>
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
                            <label for="">Ngày thi</label>
                            <input type="date" class="form-control" name="day" required
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="">Bắt đầu</label>
                            <input type="time" class="form-control" name="time_start" required
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="">Kết thúc</label>
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
                    <h4 class="modal-title">Tạo ca thi</h4>
                </div>
                <!-- Modal body -->
                <form id="formInsert" class="form-group" action="{{url('admin/exam-shift')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Môn học</label>
                            <select name="module_id" class="form-control">
                                @foreach ($modules as $index => $module)
                                    <option value="{{ $module['id'] }}" }}> {{$module['code']}} - [{{ $module['name']}}]</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kỳ thi</label>
                            <select name="exam_id" class="form-control">
                                @foreach ($exams as $index => $exam)
                                    <option value="{{ $exam['id'] }}" }}> {{ $exam['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày thi</label>
                            <input type="date" class="form-control" name="day" required
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="">Thời gian bắt đầu</label>
                            <input type="time" class="form-control" name="time_start" required
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="">Thời gian kết thúc</label>
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
                title: "Ca thi",
                confirmButtonText: 'Thoát',
                html:
                    `
                 <table class="table" style="text-align:left;">
                    <tr>
                        <th>Môn học</th>
                        <td>${info.module.name}</td>
                    </tr>
                    <tr>
                        <th>Mã môn học</th>
                        <td>${info.module.code}</td>
                    </tr>
                    <tr>
                        <th>Ngày thi</th>
                        <td>${info.day}</td>
                    </tr>
                    <tr>
                        <th>Bắt đầu</th>
                        <td>${info.time_start}</td>
                    <tr>
                        <th>Kết thúc</th>
                        <td>${info.time_finish}</td>
                    </tr>
                     <tr>
                        <th>Thời gian tạo </th>
                        <td>${info.created_at}</td>
                    </tr>
                </table>
                    `
            })
        }
    </script>


@endsection
