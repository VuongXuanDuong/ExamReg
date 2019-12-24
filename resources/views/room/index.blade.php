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
        <span>Phòng máy</span>
      </h1><!-- End Title -->
    
      <!--breadcrum start-->
      <ol class="breadcrumb text-left">
        <li><a href="{{asset('admin')}}">Trang chủ</a></li>
        <li class="active">Phòng máy</li>
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

    {{-- List room --}}
    <!-- Table -->
    <div class="table-responsive pmd-card pmd-z-depth">
        <table class="table table-mc-red pmd-table">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên phòng</th>
                <th>Số lượng máy</th>
                <th>Địa điểm</th>
                <th>Công cụ</th>
              </tr>
            </thead>

            <tbody>
               @foreach($rooms as $index => $room)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$room['name']}}</td>
                    <td>{{$room['total_computer']}}</td>
                    <td>{{$room['area']->name}}</td>
                    <td class="pmd-table-row-action">
                        <div room_id={{$room['id']}} room_info="{{$room}}">
                            {{-- Edit button --}}
                            <button type="button" class="btn-sm btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-warning" data-toggle="modal" data-target="#editModal" onclick="setValueEditForm(this)" > <i class="material-icons md-dark pmd-xs">edit</i> </button>

                            {{-- SHow button --}}
                            <button type="button" class="btn-sm btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-info" onclick = "showRoomInfo(this);" > <i class="material-icons md-dark pmd-xs">visibility</i></button>
                            {{--end show --}}

                            {{-- Delete form --}}
                            <form action="{{ url('/admin/room/'.$room->id) }}" method="post">
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

    {{--    form edit room--}}
    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Room</h4>

                </div>

                <!-- Modal body -->
                <form id="formEdit" class="form-group" action="{{url('admin/room')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        {!! method_field('put') !!}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required
                                   value="">
                        </div>
                        <div class="form-group">
                            <label for="">Total Computer</label>
                            <input type="text" class="form-control" name="total_computer" required
                                   value="">
                        </div>
                        <div class="form-group">
                            <label>Exam Area</label>
                            <select name="area_id" class="form-control">
                                @foreach ($areas as $index => $area)
                                    <option value="{{ $area['id'] }}" {{ $area['id'] == $room['area_id'] ? 'selected' : '' }}> {{ $area['name']}}</option>
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
    <div class="modal" id="insertModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create Room</h4>

                </div>

                <!-- Modal body -->
                <form id="formInsert" class="form-group" action="{{url('admin/room')}}" method="post">
                    <div class="modal-body">
                        @csrf

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name"
                                   placeholder="Enter name room" required value="">
                        </div>
                        <div class="form-group">
                            <label>Total Computer</label>
                            <input type="text" class="form-control" name="total_computer" placeholder="Enter a number"
                                   required value="">
                        </div>
                        <div class="form-group">
                            <label>Exam Area</label>
                            <br>
                            <select name="area_id" class="form-control">
                                @foreach ($areas as $index => $area)
                                    <option value="{{ $area['id'] }}"> {{ $area['name'] }}</option>
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
    <script type="text/javascript">

        function setValueEditForm(elem) {
            let info = JSON.parse(elem.parentNode.getAttribute('room_info'));
            $('#formEdit').attr('action', window.location.origin + '/admin/room/' + info.id);
            $('#formEdit input[name = name]').val(info.name);
            $('#formEdit input[name = total_computer]').val(info.total_computer);
            $('#formEdit select[name = area_id]').val(info.area_id);

        }

        function showRoomInfo(elem) {
            let info = JSON.parse(elem.parentNode.getAttribute('room_info'));
            swal({
                title: "Thông tin phòng máy",
                confirmButtonText: 'Thoát',
                html:
                    `
                 <table class="table" style="text-align:left;">
                    <tr>
                        <th>Tên phòng  </th>
                        <td>${info.name}</td>
                    </tr>
                    <tr>
                        <th>Số lượng máy  </th>
                        <td>${info.total_computer}</td>
                    </tr>
                    <tr>
                        <th>Exam Area  </th>
                        <td>${info.area.name}</td>
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
