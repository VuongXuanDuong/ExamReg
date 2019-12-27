<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<div class="print-area" id="printMe"
     style="background-color: white;font-family: 'Times New Roman', Arial;  padding: 20px;">
    <table style="width: 100%; border: none; border-collapse: collapse;">
        <tbody>
        <tr>
            <td style="width: 40%; text-align: center; vertical-align: top;">
                <p style="text-transform: uppercase; font-weight: normal; margin: 0; padding: 0; font-size: 12pt;">ĐẠI
                    HỌC QUỐC GIA HÀ NỘI</p>
            </td>
            <td style="width: 60%; text-align: center; vertical-align: top;">
                <p style="text-transform: uppercase; font-weight: bold; margin: 0; padding: 0; font-size: 12pt;">CỘNG
                    HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
                <p style="margin: 0; padding: 0; font-weight: bold;">Độc lập - Tự do - Hạnh phúc</p>
            </td>
        </tr>
        </tbody>
    </table>
    <input type="hidden" name="" value="{{Auth::user()->id}}" ref="user">
        <h1 style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 14pt; margin: 30px 0 0 0; padding: 0;">
            KẾT QUẢ ĐĂNG KÝ THI
        </h1>
        <p style="text-align: left;  margin: 0; padding: 0; font-size: 12pt;">
            Sinh viên: @{{student.full_name}}
        </p>
        <p style="text-align: left;  margin: 0; padding: 0; font-size: 12pt;">
            Mã sinh viên: @{{student.username}}
        </p>
        <table style="border:none; width: 100%; border-collapse:collapse;">

            <tbody>
            <tr>
                <th style="border:1px solid #000; border-left:1px solid #000; text-align:center;">STT</th>
                <th style="border: 1px solid #000; border-left: 1px solid #000; text-align: center;">Môn học</th>
                <th style="border: 1px solid #000; border-left: 1px solid #000; text-align: center;">Mã môn học</th>
                <th style="border: 1px solid #000; border: 1px solid #000; text-align: center;">Thời gian</th>
                <th style="border: 1px solid #000; border: 1px solid #000; text-align: center;">Phòng thi</th>
                <th style="border: 1px solid #000; border: 1px solid #000; text-align: center;">Địa điểm</th>
            </tr>
            <tr v-for="(examShift, index) in examShifts">
                <td style="border-top: 1px solid #000; border-left: 1px solid #000; text-align: center;border-bottom: 1px solid #000;">
                    @{{index+1}}
                </td>
                <td style="border-top: 1px solid #000; border-left: 1px solid #000; text-align: center;border-bottom: 1px solid #000;">
                    @{{examShift.module_name}}
                </td>
                <td style="border-top: 1px solid #000; border-left: 1px solid #000; text-align: center;border-bottom: 1px solid #000;">
                    @{{examShift.module_code}}
                </td>
                <td style="border-top: 1px solid #000; border-left: 1px solid #000; text-align: center;border-bottom: 1px solid #000;">
                    @{{examShift.time_start}}-@{{examShift.time_finish}}
                </td>
                <td style="border-top: 1px solid #000; border-left: 1px solid #000; text-align: center;border-bottom: 1px solid #000;">
                    @{{examShift.room}}
                </td>
                <td style="border-top: 1px solid #000; border: 1px solid #000; text-align: center;border-bottom: 1px solid #000;">
                    @{{examShift.area}}
                </td>
            </tr>
            </tbody>
        </table>
    <table style="width: 100%; border: none; border-collapse: collapse; margin-top: 30px;">
        <tbody>
        <tr>
            <td style="width: 50%; vertical-align: top; text-align: center;">
            </td>
            <td style="width: 50%; text-align: center; vertical-align: top; ">
                <p style="font-size: 12pt; margin:0; padding:0;">Hà Nội, ngày ..... tháng ..... năm 2019</p>
                <p style="font-weight: bold; margin: 0; padding: 0; text-transform: uppercase; font-size: 12pt;">XÁC
                    NHẬN CỦA PHÒNG ĐÀO TẠO</p>
                <p style="font-weight: bold; margin-top: 80px;">&nbsp;</p>
            </td>
        </tr>
        </tbody>
    </table>

</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script>

<script>
    new Vue({
        el: "#printMe",
        data() {
            return {
                userId: '',
                modules: [],
                moduleId: '',
                reply: '',
                examShifts: [],
                examShift: [],
                student:[],
            }
        },
        methods: {
            getAllExamShifts() {
                axios.get('/api/print/' + this.$refs.user.value).then(res => {
                    this.modules = res.data[0];
                    this.student = res.data[1];
                    console.log(this.student);
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
            print() {
                window.print();
            }
        },
        mounted() {
            this.getAllExamShifts();
        },
        updated(){
            this.print();
        }

    })
</script>
