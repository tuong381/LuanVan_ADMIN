<!DOCTYPE html>
<html>
<head>
    <title>Phòng gym BodyFit Fitness</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

 <h3 style="color:#a50000">THÔNG BÁO THANH TOÁN LỊCH HẸN</h3>
<p>Chào bạn {{$tenKH}}</p>
<p>Lịch hẹn với mã #{{$maHD}} của bạn đặt vào ngày {{$ngayDH}} đã được thanh toán. </p>
<p>Cảm ơn bạn đã tin tưởng cửa hàng </p>


<div class="container" style="border: 1px solid #a50000;width: 40rem;">

  <p style="color: #a50000; text-align: center; font-weight: 700; font-size: 15px;">
        Đơn hàng của bạn # {{$maHD}} ({{$ngayDH}} )
    </p>
  <table class="table table-striped" style="text-align: center;">

    <thead >
      <tr>
        <th>Loại vé</th>
         <th>Ngày đăng ký</th>
         <th>Giờ đăng ký</th>
         <th>Nhân viên thực hiện</th>

      </tr>
    </thead>

    <tbody>

          <tr >
                <td>{{$tenve}}</td>
                <td>{{$ngaydk}}</td>
                <td>{{$giodk}}</td>
                <td>{{$tennv}}</td>


          </tr>

        <tr >
            <td colspan="4" style="color: #a50000; font-weight: 800;padding-left: 23rem;">Tổng thanh toán: {{$tongHD}} vnđ</td>
        </tr>

    </tbody>

  </table>



<p></p>
</div>
<p>Đây là thư tự động từ hệ thống. Vui lòng không trả lời email này.</p>
<p>Nếu có bất kỳ thắc mắc hay cần giúp đỡ, Bạn vui lòng liên hệ với chúng tôi qua số điện thoại
    <span style="color: #a50000">073 246 2322</span></p>

</body>
</html>
