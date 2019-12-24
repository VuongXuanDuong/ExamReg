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
            <span>Học phần</span>
          </h1><!-- End Title -->
        
          <!--breadcrum start-->
          <ol class="breadcrumb text-left">
            <li><a href="{{asset('admin')}}">Trang chủ</a></li>
            <li class="active">Học phần</li>
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

        {{-- List module --}}
        <!-- Table -->
        <div class="table-responsive pmd-card pmd-z-depth">
            <table class="table table-mc-red pmd-table">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Tổng sinh viên</th>
                    <th>Công cụ</th>
                  </tr>
                </thead>

                <tbody>
                   @foreach($modules as $index => $module)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$module['name']}}</td>
                        <td>{{$module['code']}}</td>
                        <td>{{$module['module_user_count']}}</td>
                        <td class="pmd-table-row-action">
                            <div module_id={{$module['id']}} module_info="{{$module}}">
                                {{-- Edit button --}}
                                <button type="button" class="btn-sm btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-warning" data-toggle="modal" data-target="#editModal" onclick="setValueEditForm(this)" > <i class="material-icons md-dark pmd-xs">edit</i> </button>

                                {{-- SHow button --}}
                                {{--<button type="button" class="btn-sm btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-info" onclick = "showModuleInfo(this);" > <i class="material-icons md-dark pmd-xs">visibility</i></button> --}}
                                {{--end show --}}

                                <a class="btn btn-sm pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-info" href="{{asset('admin/module/list-student/'.$module->id )}}">
                                  <i class="material-icons md-dark pmd-xs">visibility</i>
                                </a>

                                {{-- Delete form --}}
                                <form action="{{ url('/admin/module/'.$module->id) }}" method="post">
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
