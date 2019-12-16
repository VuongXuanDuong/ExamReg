@extends('index')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1 class="title">
                List Exam Area
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
        <th>Name</th>
        <th>Tools</th>


        </thead>
        <tbody>
        @foreach($examAreas as $index =>  $examArea )
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$examArea['name']}}</td>
                <td>
                    <div class="btn-group" exam_id={{$examArea['id']}} examArea_info="{{$examArea}}">
                        {{-- Edit button --}}
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal"
                                onclick="setValueEditForm(this)">
                            <i class="fa fa-edit"></i>
                        </button>

                        {{-- Show button --}}
                        <button type="submit" class="btn btn-success" onclick="showExamAreaInfo(this);"><i
                                    class="fa fa-eye"></i></button>

                        {{--  --}}

                        {{-- Delete button --}}
                        <form method="post" action="{{ url('/admin/exam-area/'.$examArea->id) }}">
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
                    <h4 class="modal-title">Edit Exam Area</h4>
                </div>
                <!-- Modal body -->
                <form id="formEdit" class="form-group" action="{{url('admin/exam-area')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        {!! method_field('put') !!}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required
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
                <form id="formInsert" class="form-group" action="{{url('admin/exam-area')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name"
                                   placeholder="Enter name module" required value="">
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
            let info = JSON.parse(elem.parentNode.getAttribute('examArea_info'));
            $('#formEdit').attr('action', window.location.origin + '/admin/exam-area/' + info.id);
            $('#formEdit input[name = name]').val(info.name);
        }
        function showExamAreaInfo(elem) {
            let info = JSON.parse(elem.parentNode.getAttribute('examArea_info'));
            swal({
                title: "Exam Area",
                confirmButtonText: 'Thoát',
                html:
                    `
                 <table class="table" style="text-align:left;">
                    <tr>
                        <th>Name  </th>
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
