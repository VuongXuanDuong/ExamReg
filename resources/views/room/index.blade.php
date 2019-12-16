@extends('index')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1 class="title">
                Danh sách phòng máy
                <button class="btn btn-success" data-toggle="modal" data-target="#insertModal"><i
                            class="fa fa-plus"></i></button>
            </h1>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    {{--    List room --}}
    <table class="table">
        <thead>

        <th>STT</th>
        <th>Tên phòng</th>
        <th>Số lượng máy</th>
        <th>Địa điểm</th>
        <th>Công cụ</th>


        </thead>
        <tbody>
        @foreach($rooms as $index =>  $room )
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$room['name']}}</td>
                <td>{{$room['total_computer']}}</td>
                <td>{{$room['area']->name}}</td>
                <td>
                    <div class="btn-group" room_id={{$room['id']}} room_info="{{$room}}">
                        {{-- Edit button --}}
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal"
                                onclick="setValueEditForm(this)">
                            <i class="fa fa-edit"></i>
                        </button>

                        {{-- Show button --}}
                        <button type="submit" class="btn btn-success" onclick="showRoomInfo(this);"><i
                                    class="fa fa-eye"></i></button>

                        {{--  --}}

                        {{-- Delete button --}}
                        <form method="post" action="{{ url('/admin/room/'.$room->id) }}">
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
