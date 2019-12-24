@extends('StudentLayout.master')
@section('content')


    <script type="text/javascript">
        // Session  login success
        @if(session('submitSuccess'))

        swal({
            title: "Thành công",
            type: "success",
            text: "<?php echo session('submitSuccess') ?>",
            showConfirmButton: false,
            timer: 2500
        })

        @endif
    </script>

    <h1 class="title">
        Danh sách môn thi đã đăng ký
    </h1>
    <div class="">
        <input type="hidden" name="" value="{{Auth::user()->id}}" ref="user">
    </div>

    <table class="table">
        <thead>

        <th>STT</th>
        <th>Môn học</th>
        <th>Mã</th>
        <th>Thời gian</th>
        <th>Phòng thi</th>
        <th>Địa điểm</th>
        <th>Hủy</th>


        </thead>
        <tbody>
        <tr v-for="(examShift, index) in examShifts">
            <td>
                hihi
            </td>
            <td>@{{examShift.module_name}}
            </td>
            <td>@{{examShift.module_code}}</td>
            <td>@{{examShift.day}}
                <br>@{{examShift.time_start}}-@{{examShift.time_finish}}
            </td>
            <td>
                @{{examShift.room}}
            </td>
            <td>@{{examShift.area}}</td>
            <td>
                <button class="btn btn-danger"
                        onclick="return confirm('Bạn có chắc chắn muốn hủy môn học này ?')"
                        @click="deleteModule(examShift.examRoomUserId)"><i
                            class="fa fa-trash"></i></button>
            </td>
            <td>@{{examShift.examRoomId}}</td>
        </tr>
        </tbody>
    </table>
    <button  class="btn btn-success" @click="myFunction">Print</button>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script>
        new Vue({
            el: "#app",
            data() {
                return {
                    userId: '',
                    modules: [],
                    moduleId: '',
                    reply: '',
                    examShifts: [],
                    examShift: [],
                }
            },
            methods: {
                myFunction() {
                  window.print();
                },
                deleteModule(examRoomUserId) {
                    axios.delete('/api/unregister/' + examRoomUserId).then(res => {
                        console.log(res);
                        this.reply = res.data;
                        if (this.reply == 'ok') {
                            location.reload();
                            alert("Bạn đã hủy ký thành công!");
                        }
                    })
                },
                getAllExamShifts() {
                    axios.get('/api/all-module-registrated/' + this.$refs.user.value).then(res => {
                        this.modules = res.data;
                        console.log(this.modules);
                        this.modules.forEach(module => {
                            module.day = module.exam_room.exam_shift.day;
                            module.time_start = module.exam_room.exam_shift.time_start;
                            module.time_finish = module.exam_room.exam_shift.time_finish;
                            module.module_name = module.exam_room.exam_shift.module.name;
                            module.module_code = module.exam_room.exam_shift.module.code;
                            module.room = module.exam_room.room.name;
                            module.area = module.exam_room.room.area.name;
                            module.examRoomUserId = module.id;
                            this.examShifts.push(module);
                        })
                    });
                },
            },
            mounted() {
                this.getAllExamShifts();

            }
        })
    </script>
@endsection
