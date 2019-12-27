@extends('StudentLayout.master')
@section('content')

    <script type="text/javascript">
        // Session  login success
        @if(session('login-success'))
        swal({
            title: "Đăng nhập thành công",
            type: "success",
            showConfirmButton: false,
            timer: 2500
        })
        @endif
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
    <div class="container-fluid full-width-container value-added-detail-page">
        <h1 class="section-title" id="services">
            <span>Đăng ký thi</span>
        </h1><!-- End Title -->
        <input type="hidden" name="" value="{{Auth::user()->id}}" ref="user">
        <div class="table-responsive pmd-card pmd-z-depth">
            <table class="table table-mc-red pmd-table">
                <thead>

                <th>Chọn</th>
                <th>Trạng thái</th>
                <th>Môn học</th>
                <th>Mã môn học</th>
                <th>Ngày thi</th>
                <th>Bắt đầu</th>
                <th>Kết thúc</th>
                <th>Đã ĐK</th>
                <th>Tổng SV</th>


                </thead>
                <tbody>
                <tr v-for="(examShift, index) in examShifts">
                    <td>
                        <i v-if="!examShift.isExamShiftRegisted || examShift.isRegisted"
                           :class="{green: examShift.isRegisted}" @click="selectExamShift(examShift)" class="fa fa-check-square"></i>
                    </td>
                    <td>
                        <i v-if="examShift.status">Đủ điều kiện thi</i>
                        <i v-if="!examShift.status">Không đủ điều kiện thi</i>
                    </td>
                    <td>@{{examShift.module_name}}</td>
                    <td>@{{examShift.module_code}}</td>
                    <td>@{{examShift.day}}</td>
                    <td>@{{examShift.time_start}}</td>
                    <td>@{{examShift.time_finish}}</td>
                    <td>@{{examShift.site}}</td>
                    <td>@{{examShift.total}}</td>
                    {{--      <td>@{{examShift.id}}</td>--}}
                    {{--      <td>@{{examShift.isRegisted}}</td>--}}
                    {{--      <td>@{{examShift.isExamShiftRegisted}}</td>--}}
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container-fluid full-width-container value-added-detail-page">
        <h1 class="section-title" id="services">
            <span>Đăng ký thi</span>
        </h1>
        <div class="table-responsive pmd-card pmd-z-depth">
            <table class="table table-mc-red pmd-table">
                <thead>

                <th> </th>
                <th>Môn học</th>
                <th>Mã môn học</th>
                <th>Ngày thi</th>
                <th>Bắt đầu</th>
                <th>Kết thúc</th>

                </thead>
                <tbody>
                <tr v-for="(examShift, index) in registedExamShifts">
                    <td>
                        <i class="fa fa-check-square" :class="{green: examShift.isRegisted}"
                           @click="selectExamShift(examShift)"></i>
                    </td>
                    <td>@{{examShift.module_name}}</td>
                    <td>@{{examShift.module_code}}</td>
                    <td>@{{examShift.day}}</td>
                    <td>@{{examShift.time_start}}</td>
                    <td>@{{examShift.time_finish}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="pull-right pmd-card-body">
        <button class="btn btn-success" name="button" @click="submit">Đăng ký</button>
    </div>
    </div>
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
                    moduleRegisted: [],
                    examShifts: [],
                    registedExamShifts: []
                }
            },
            methods: {
                selectExamShift(examShift) {
                    if (this.registedExamShifts.find(el => el.id == examShift.id)) {
                        return;
                    }
                    this.registedExamShifts.push(examShift);

                    this.examShifts.map(el => {

                        if (el.module_code == examShift.module_code) {
                            el.isExamShiftRegisted = true;
                            if (el == examShift) {
                                el.isRegisted = true;
                            }
                            return el;
                        }
                        return el;
                    });
                    this.$forceUpdate();

                },
                getAllExamShifts() {
                    axios.get('/api/all-modules/' + this.$refs.user.value).then(res => {
                        console.log(res);
                        this.modules = res.data[0];
                        this.moduleRegisteds = res.data[1];
                        this.sites = res.data[2];
                        this.modules.forEach(module => {
                            module.module.exam_shift.forEach(examShift => {
                                examShift.status = module.status;
                                examShift.module_name = module.module.name;
                                examShift.module_code = module.module.code;
                                examShift.isExamShiftRegisted = false;
                                examShift.isRegisted = false;
                                if (examShift.status == 0) {
                                    examShift.isExamShiftRegisted = true;
                                }
                                this.moduleRegisteds.forEach(moduleRegisted => {
                                    this.moduleId = moduleRegisted.exam_room.exam_shift.module_id;
                                    if (this.moduleId == module.module.id) {
                                        examShift.isExamShiftRegisted = true;
                                    }
                                })
                                examShift.total = 0;
                                examShift.exam_room.forEach(examRoom => {
                                    examShift.total += examRoom.room.total_computer;
                                })
                                this.sites.forEach(site => {
                                    let moduleU = site.exam_room.exam_shift.module_id;
                                    if (module.module.id == moduleU) {
                                        examShift.site = site.exam_room_count;
                                    } else {
                                        examShift.site = 0;
                                    }
                                })
                                this.examShifts.push(examShift);
                            })

                        })
                    });
                },
                submit() {
                    let examShiftIds = this.registedExamShifts.map(el => el.id);
                    let userId = this.$refs.user.value;
                    axios.post('/api/register-exam-sessions', {ids: examShiftIds, userId: userId}).then(res => {
                        this.reply = res.data;
                        if (this.reply === 'ok') {
                            this.userId = '',
                                this.modules = [],
                                this.moduleId = '',
                                this.moduleRegisted = [],
                                this.examShifts = [],
                                this.registedExamShifts = []
                            this.getAllExamShifts();
                            swal({
                                title: "Đăng ký thành công",
                                type: "success",
                                button: false,
                                timer: 1500
                            })
                        }
                    });
                }
            },
            mounted() {
                this.getAllExamShifts();

            }
        })
    </script>
@endsection
