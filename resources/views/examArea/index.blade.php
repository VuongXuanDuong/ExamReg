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
            <span>Khu vực thi</span>
          </h1><!-- End Title -->
        
          <!--breadcrum start-->
          <ol class="breadcrumb text-left">
            <li><a href="{{asset('admin')}}">Trang chủ</a></li>
            <li class="active">Khu vực thi</li>
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

        {{-- List ExamArea --}}
        <!-- Table -->
        <div class="table-responsive pmd-card pmd-z-depth">
            <table class="table table-mc-red pmd-table">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Tool</th>
                  </tr>
                </thead>

                <tbody>
                   @foreach($examAreas as $index => $examArea)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$examArea['name']}}</td>
                        <td class="pmd-table-row-action">
                            <div exam_id={{$examArea['id']}} examArea_info="{{$examArea}}">
                                {{-- Edit button --}}
                                <button type="button" class="btn-sm btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-warning" data-toggle="modal" data-target="#editModal" onclick="setValueEditForm(this)" > <i class="material-icons md-dark pmd-xs">edit</i> </button>

                                {{-- SHow button --}}
                                <button type="button" class="btn-sm btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-info" onclick = "showExamAreaInfo(this);" > <i class="material-icons md-dark pmd-xs">visibility</i></button>
                                {{--end show --}}

                                {{-- Delete form --}}
                                <form action="{{ url('/admin/exam-area/'.$examArea->id) }}" method="post">
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
