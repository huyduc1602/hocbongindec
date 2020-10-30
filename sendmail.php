<?php
require "lib/PHPMailerAutoload.php";
$name = isset($_POST["name"])?$_POST["name"]:"";
$phone = isset($_POST["phone"])?$_POST["phone"]:"";
$email = isset($_POST["email"])?$_POST["email"]:"";
$chose = isset($_POST["chose"])?$_POST["chose"]:"";
$school = isset($_POST["school"])?$_POST["school"]:"";

$content = 'Họ tên: '.$name;
$content .= '<br/>SDT: '.$phone;
$content .= '<br/>Địa chỉ email: '.$email;
$content .= '<br/>Trường: '.$school;
$content .= '<br/>Trình độ: '.$chose;
// Khai báo tạo PHPMailer

$mail = new PHPMailer();
//Khai báo gửi mail bằng SMTP
$mail->CharSet = "UTF-8";
$mail->IsSMTP();
//Tắt mở kiểm tra lỗi trả về, chấp nhận các giá trị 0 1 2
// 0 = off không thông báo bất kì gì, tốt nhất nên dùng khi đã hoàn thành.
// 1 = Thông báo lỗi ở client
// 2 = Thông báo lỗi cả client và lỗi ở server
$mail->SMTPDebug  = 0;
 
$mail->Debugoutput = "html"; // Lỗi trả về hiển thị với cấu trúc HTML
$mail->Host       = "smtp.gmail.com"; //host smtp để gửi mail
$mail->Port       = 465; // cổng để gửi mail
$mail->SMTPSecure = "ssl"; //Phương thức mã hóa thư - ssl hoặc tls
$mail->SMTPAuth   = true; //Xác thực SMTP
$mail->Username   = "no.reply.email.243@gmail.com"; // Tên đăng nhập tài khoản Gmail
$mail->Password   = "sthhjkddvwmzcxrv"; //Mật khẩu của gmail
$mail->SetFrom("info@indec.vn",$name); // Thông tin người gửi
$mail->AddAddress("huyduc1602@gmail.com", $name);//Email của người nhận
$mail->Subject = "Đăng ký HỌC BỔNG MÙA XUÂN UK"; //Tiêu đề của thư
$mail->MsgHTML($content); //Nội dung của bức thư.
// $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
// Gửi thư với tập tin html
$mail->AltBody = "Đăng ký HỌC BỔNG MÙA XUÂN UK";//Nội dung rút gọn hiển thị bên ngoài thư mục thư.
 
//Tiến hành gửi email và kiểm tra lỗi
if(!$mail->Send()) {
  echo "<p class='error_popup'>Có lỗi khi gửi mail: </p>" ;
} else {
  echo "<p class='success_popup'>Cảm ơn bạn đã đăng ký. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất</p>";
}
?>