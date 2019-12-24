@extends('StudentLayout.master')
@section('content')


<script type="text/javascript">
// Session  login success
@if(session('login-success'))
  swal({
    title:"Đăng nhập thành công",
    type:"success",
    text:"<?php echo 'Chào mừng '.$student['name'].' đến với hệ thống ExamReg' ?>",
    showConfirmButton:false,
    timer:2500
  })
@endif
@if(session('submitSuccess'))

swal({
  title:"Thành công",
  type:"success",
  text:"<?php echo session('submitSuccess') ?>",
  showConfirmButton:false,
  timer:2500
})

@endif
</script>

<h1 class="title">
  Dang ky mon hoc
</h1>
<div class="">
  <input type="hidden" name="" value="{{Auth::user()->id}}" ref="user">
</div>

<table class="table">
  <thead>

  <th>STT</th>
  <th>Name</th>
  <th>Code</th>
  <th>Ngày</th>
  <th>Bắt đầu</th>
  <th>Kết thúc</th>
  <th>Công cụ</th>


  </thead>
  <tbody>
    <tr v-for="(examShift, index) in examShifts">
      <td >
        <i v-if="!examShift.isExamShiftRegisted || examShift.isRegisted" class="fas fa-check-circle" :class="{green: examShift.isRegisted}" @click="selectExamShift(examShift)"></i>
      </td>
      <td>@{{examShift.module_name}}</td>
      <td>@{{examShift.module_code}}</td>
      <td>@{{examShift.day}}</td>
      <td>@{{examShift.time_start}}</td>
      <td>@{{examShift.time_finish}}</td>
      <td>@{{examShift.id}}</td>
      <td>@{{examShift.isRegisted}}</td>
      <td>@{{examShift.isExamShiftRegisted}}</td>
    </tr>
  </tbody>
</table>
<table class="table">
  <thead>

  <th>STT</th>
  <th>Name</th>
  <th>Code</th>
  <th>Ngày</th>
  <th>Bắt đầu</th>
  <th>Kết thúc</th>
  <th>Công cụ</th>
  <th></th>
  <th></th>

  </thead>
  <tbody>
    <tr v-for="(examShift, index) in registedExamShifts">
      <td>
        <i class="fas fa-check-circle" :class="{green: examShift.isRegisted}" @click="selectExamShift(examShift)"></i>
      </td>
      <td>@{{examShift.module_name}}</td>
      <td>@{{examShift.module_code}}</td>
      <td>@{{examShift.day}}</td>
      <td>@{{examShift.time_start}}</td>
      <td>@{{examShift.time_finish}}</td>
      <td>@{{examShift.id}}</td>
      <td>@{{examShift.isRegisted}}</td>

    </tr>
  </tbody>
</table>
<button class="btn btn-success" name="button" @click="submit">Submit</button>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script>
new Vue({
el:"#app",
data (){
return {
  userId:'',
  modules:[],
  moduleId: '',
  reply: '',
  moduleRegisted: [],
  examShifts: [],
  registedExamShifts: []
}
},
methods:{
  selectExamShift(examShift) {
    if(this.registedExamShifts.find(el => el.id == examShift.id)) {
      return;
    }
    this.registedExamShifts.push(examShift);

    this.examShifts.map(el => {

      if(el.module_code == examShift.module_code) {
        el.isExamShiftRegisted = true;
        if(el == examShift) {
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
      this.modules = res.data[0];
      this.moduleRegisteds = res.data[1];
      console.log(this.moduleRegisteds);
      this.modules.forEach(module => {
        module.module.exam_shift.forEach(examShift => {
          examShift.module_name = module.module.name;
          examShift.module_code = module.module.code;
          examShift.isExamShiftRegisted = false;
          examShift.isRegisted = false;
          this.moduleRegisteds.forEach(moduleRegisted => {
            this.moduleId = moduleRegisted.exam_room.exam_shift.module_id;
            console.log(module.module.id);
            if (this.moduleId == module.module.id ) {
              examShift.isExamShiftRegisted = true;
            }
          }),
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
      if(this.reply === 'ok') {
        location.reload();
        alert("Bạn đã đăng ký thành công!");
      }
    });
  }
},
mounted () {
  this.getAllExamShifts();

}
})
</script>
@endsection
