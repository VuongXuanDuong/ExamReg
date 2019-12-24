@extends('index')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1 class="title">
                Danh sách sinh viên
            </h1>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <div>
        @foreach( $students as $index => $student )
            <h3>
                {{ $student['room']->name }}
                {{ $student['room']->area->name }}
                <br>
                {{ $student['exam_shift']->module->name }}
                - {{ $student['exam_shift']->module->code }}
            </h3>
            <h5>
                Day: {{ $student['exam_shift']->day }}
                <br>Time: {{ $student['exam_shift']->time_start }} - {{ $student['exam_shift']->time_finish }}
            </h5>
        @endforeach
    </div>

    <table class="table">
        <thead>
        <td>STT</td>
        <th>Name</th>
        <th>Code</th>
        <th>Email</th>

        </thead>
        <tbody>
        @foreach( $students as $index => $student )
            @foreach($student['exam_room_user'] as $index => $user)
                <tr>
                    <td>{{$index+1}}</td>
                    <td> {{ $user['user']->full_name }}</td>
                    <td> {{ $user['user']->username }}</td>
                    <td> {{ $user['user']->vnu_mail }}</td>
                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
    <button  class="btn btn-success" onclick="myFunction()">Print</button>
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
        function myFunction() {
            window.print();
        }
    </script>

@endsection
