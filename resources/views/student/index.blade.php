@extends('index')

@section('content')
 <!-- tab start -->
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
        <span>Sinh viên</span>
      </h1><!-- End Title -->
    
      <!--breadcrum start-->
      <ol class="breadcrumb text-left">
        <li><a href="{{asset('admin')}}">Trang chủ</a></li>
        <li class="active">Sinh viên</li>
      </ol><!--breadcrum end-->
    </div>

    <div>
      <div class="pull-right pmd-card-body">
        <div class="pmd-textfield pull-left">
          <button onclick ="choose()"type="button" class="btn pmd-btn-raised pmd-ripple-effect btn-success">
            <input type="file" id="file" style="display: none;
            ">
            <script >
              function choose(){
                document.getElementById("file").click();
              }
            </script>

          Nhập Excel
          </button>
         
         <button type="button" class="btn pmd-btn-raised pmd-ripple-effect btn-success" data-toggle="modal" data-target="#insertModal">Thêm</button>
        </div>
      </div>
    </div>

    <!-- Table -->
    <div class="table-responsive pmd-card pmd-z-depth">
      <table class="table table-mc-red pmd-table">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên đăng nhập</th>
            <th>Họ và tên</th>
            <th>VNU Email</th>
            <th>Hành động</th>
          </tr>
        </thead>

        <tbody>
           @foreach($accounts as $index => $account)
            <tr>
              @if(isset($_GET['page']))
                <td>{{($_GET['page']-1)*20+$index+1}}</td>
              @else
                <td>{{$index+1}}</td>
              @endif
              <td>{{$account['username']}}</td>
              <td>{{$account['full_name']}}</td>
              <td>{{$account['vnu_mail']}}</td>
              <td class="pmd-table-row-action">
                <div account_id={{$account['id']}} account_info="{{$account}}">
                    <button type="button" class="btn-sm btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-warning" data-toggle="modal" data-target="#editModal" onclick="setValueEditForm(this)" > <i class="material-icons md-dark pmd-xs">edit</i> </button>

                    <button type="button" class="btn-sm btn pmd-btn-fab pmd-btn-raised pmd-ripple-effect btn-info" onclick = "showStudentInfo(this);" > <i class="material-icons md-dark pmd-xs">visibility</i></button>
                    {{-- Delete form --}}
                    <form class="" action="{{url('admin/sinh-vien/'.$account['id'])}}" method="post">
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
 
<div class="row">
    <div class="col-md-2 col-md-offset-5" style="margin:0px auto;">{{$accounts->links()}}</div>
</div>

<!-- The Edit Modal -->
<div class="modal" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Sửa tài khoản giảng viên</h4>

      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="formEdit" class="form-group" action="{{url('admin/giang-vien')}}" method="post" >
          @csrf
            {!! method_field('put') !!}
          <div class="form-group">
            <label >Tên đăng nhập</label>

            <input type="text" class="form-control" name="username" placeholder="Nhập tài khoản" required value="">

          </div>
          <div class="form-group">
            <label for="">Mật khẩu (Để trống nếu không đổi mật khẩu)</label>
            <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu"  value="">
          </div>
          <div class="form-group">
            <label for="">Nhập lại mật khẩu (Để trống nếu không đổi mật khẩu) </label>
            <input type="password" class="form-control"  name="re_password" id="passwordedit" placeholder="Nhập lại mật khẩu"  value="">
          </div>
          <div class="form-group">
            <label for="">Họ và tên</label>
            <input type="text" class="form-control"  name="full_name" placeholder="Nhập họ và tên" required value="">
          </div>
          <div class="form-group">
            <label for="#username">VNU email</label>
            <input type="email" class="form-control" name="vnu_mail" placeholder="Nhập VNU email" required value="">
          </div>
          <div class="form-group">
            <label for="#username">Niên khóa</label>
            <input class="form-control" name="school_year" placeholder="Nhập niên khóa" value="">
          </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >Sửa</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
        </form>
      </div>

    </div>
  </div>
</div>





{{-- Modal --}}

<!-- The Modal -->
<div class="modal" id="insertModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Thêm tài khoản sinh viên</h4>

      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="formInsert" class="form-group" action="{{url('admin/sinh-vien')}}" method="post" >
          @csrf
          <div class="form-group">
            <label >Tên đăng nhập</label>
            <input type="text" class="form-control" id="student_account" name="username" placeholder="Nhập tài khoản" required value="">
            <p style="color:red;display:none;" id="username-error" > <i class="fas fa-exclamation-triangle"></i> Tên đăng nhập đã tồn tại</p>
          </div>
          <div class="form-group">
            <label for="">Mật khẩu</label>
            <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" id="password" required value="">
          </div>
          <div class="form-group">
            <label for="">Nhập lại mật khẩu</label>
            <input type="password" class="form-control"  name="re_password" placeholder="Nhập lại mật khẩu" required value="">
          </div>
          <div class="form-group">
            <label for="">Họ và tên</label>
            <input type="text" class="form-control"  name="full_name" placeholder="Nhập họ và tên" required value="">
          </div>
          <div class="form-group">
            <label for="#username">VNU email</label>
            <input type="email" class="form-control" name="vnu_mail" placeholder="Nhập VNU email" required value="">
          </div>
          <div class="form-group">
            <label for="#username">Lớp</label>
            <input type="text" class="form-control" name="school_year" placeholder="Nhập lớp VD:QH-2015-I/CQ-CLC" required value="">
          </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >Thêm</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
        </form>
      </div>

    </div>
  </div>
</div>




{{-- Script --}}

{{-- Validate form --}}
<script type="text/javascript">
  $(document).ready(function(){

    $('#formInsert').validate({
      rules:{
        username:{
          required:true,
          minlength:7,
          maxlength:9
        },
        password:{
          required:true,
          minlength:8
        },
        re_password:{
          required:true,
          minlength:8,
          equalTo:'#password'
        },
        full_name:{
          required:true,
        },
        vnu_mail:{
          required:true,
          email:true
        }
      },
      messages:{
        username:{
          required:"Bạn chưa nhập tài khoản",
          minlength:"Tài khoản quá ngắn",
          maxlength:"Tài khoản quá dài"
        },
        password:{
          required:"Bạn chưa nhập mật khẩu",
          minlength:"Mật khẩu phải có ít nhất 8 kí tự"
        },
        re_password:{
          required:"Bạn chưa nhập lại mật khẩu",
          equalTo:"Mật khẩu không khớp"
        },
        full_name:{
          required:"Bạn chưa nhập họ và tên",
        },
        vnu_mail:{
          required:"Bạn chưa nhập email",
          email:"Email chưa đúng định dạng"
        }
      }
    })

    $('#formEdit').validate({
      rules:{
        username:{
          required:true,
          minlength:4,
          maxlength:30
        },
        password:{
        },
        re_password:{
          equalTo:'#passwordedit'
        },
        full_name:{
          required:true,
        },
        vnu_mail:{
          required:true,
          email:true
        }
      },
      messages:{
        username:{
          required:"Bạn chưa nhập tài khoản",
          minlength:"Tài khoản quá ngắn",
          maxlength:"Tài khoản quá dài"
        },
        re_password:{

          equalTo:"Mật khẩu không khớp"
        },
        full_name:{
          required:"Bạn chưa nhập họ và tên",
        },
        vnu_mail:{
          required:"Bạn chưa nhập email",
          email:"Email chưa đúng định dạng"
        }
      }
    })

  });

</script>
<script type="text/javascript">

//Check existing account
$(document).ready(function(){
  $('#student_account').change(function(){
    $('#username-error').hide();
      $.get("/api/check/"+$('#student_account').val(),function(res){
        if(res == 'true'){
          $('#username-error').show();
        }else{
          $('#username-error').hide();
        }
      });
  });
})


// Set value edit form

function setValueEditForm(elem){
  let info = JSON.parse(elem.parentNode.getAttribute('account_info'));
  $('#formEdit').attr('action',window.location.origin + '/admin/sinh-vien/'+info.id);
  $('#formEdit input[name = username]').val(info.username);
  $('#formEdit input[name = full_name]').val(info.full_name);
  $('#formEdit input[name = vnu_mail]').val(info.vnu_mail.trim());
  $('#formEdit input[name = school_year]').val(info.school_year);
}


// Show student info
function showStudentInfo(elem){
  let info = JSON.parse(elem.parentNode.getAttribute('account_info'));
  swal({
    title:"Thông tin sinh viên",
    confirmButtonText:'Thoát',
    html:
      `
        <table class="table" style="text-align:left;">
          <tr>
            <th>Tên đầy đủ  </th>
            <td>${info.full_name}</td>
          </tr>
          <tr>
            <th>Tên đăng nhập  </th>
            <td>${info.username}</td>
          </tr>
          <tr>
            <th>VNU mail  </th>
            <td>${info.vnu_mail}</td>
          </tr>
          <tr>
            <th>Niên khóa </th>
            <td>${info.school_year}</td>
          </tr>


        </table>
      `
  })
}
</script>
  {{-- Alert  session --}}
  <script type="text/javascript">

  @if (\Session::has('success'))
      swal({
        title:"Nhập dữ liệu thành công",
        type:"success",
        button:false,
        timer:1500
      });
  @endif
  // Error handle upload file
  @if(session('error'))

      swal({
        title:"Đã có lỗi xảy ra",
        type:"error",
        text:"File không đúng định dạng"
      })

  @endif

  // Alert successful delete file
  @if(session('del-success'))
    swal({
      title:"Xóa thành công",
      type:"success",
      button:false,
      timer:1000
    })
  @endif

  // Alert create success
  @if(session('create-success'))
  swal({
    title:"Thêm thành công",
    type:"success",
    button:false,
    timer:1000
  })
  @endif
  // if error
  @if($errors->any())
  swal({
    title:"Lõi",
    type:"error",
    text:"Tên đăng nhập đã tồn tại",
    button:false,
    timer:1000
  })
  @endif
  </script>

  {{--  --}}
@endsection
