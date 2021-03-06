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
    @foreach( $students as $index => $student )
        <h1 style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 14pt; margin: 30px 0 0 0; padding: 0;">
            DANH SÁCH SINH VIÊN - {{$student['exam_shift']->module->name}}
        </h1>
        <p style="text-align: center; font-weight: bold; margin: 0; padding: 0; font-size: 14pt;">
            MÔN THI: {{$student['exam_shift']->module->name}} - {{$student['exam_shift']->module->code}}
        </p>
        <table style="width: 100%; border: none; border-collapse: collapse; margin-top: 30px;">
            <tbody>
            <tr>
                <td>Ngày thi : <b>{{ $student['exam_shift']->day }}</b></td>
            </tr>
            <tr>
                <td>Phòng máy: <b>{{$student['room']->name}} - {{ $student['room']->area->name }}</b></td>
            </tr>
            <tr>
                <td>Thời điểm bắt đầu:<b>{{ $student['exam_shift']->time_start }}</b>
                </td>
                <td>Thời điểm kết thúc:<b>{{ $student['exam_shift']->time_finish }}</b></td>
            </tr>
            </tbody>
        </table>
        <br>
    @endforeach
    <table style="border:none; width: 100%; border-collapse:collapse;">

        <tbody>
        <tr>
            <th style="border:1px solid #000; border-left:1px solid #000; text-align:center;">STT</th>
            <th style="border: 1px solid #000; border-left: 1px solid #000; text-align: center;">Mã sinh viên</th>
            <th style="border: 1px solid #000; border-left: 1px solid #000; text-align: center;">Họ và tên</th>
            <th style="border: 1px solid #000; border: 1px solid #000; text-align: center;">Email</th>
        </tr>
        <tr>
        @foreach( $students as $index => $student )
            @foreach($student['exam_room_user'] as $index => $user)
                <tr>
                    <td style="border-top: 1px solid #000; border-left: 1px solid #000; text-align: center;border-bottom: 1px solid #000;">{{$index+1}} </td>
                    <td style="border-top: 1px solid #000; border-left: 1px solid #000; text-align: center;border-bottom: 1px solid #000;"> {{ $user['user']->full_name }}</td>
                    <td style="border-top: 1px solid #000; border-left: 1px solid #000; text-align: center;border-bottom: 1px solid #000;"> {{ $user['user']->username }} </td>
                    <td style="border-top: 1px solid #000; border-left: 1px solid #000; text-align: center;border-bottom: 1px solid #000;"> {{ $user['user']->vnu_mail }}</td>
                </tr>
            @endforeach
        @endforeach
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
</body>
</html>
<script type="text/javascript">
    window.print()
</script>



