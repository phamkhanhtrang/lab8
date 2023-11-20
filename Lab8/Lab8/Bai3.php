<?php
          require 'PHPMailer-master/src/PHPMailer.php';  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
          require "PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
          require 'PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
          $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
            try {
               // $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
                $mail->isSMTP();  
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';  //SMTP servers
                $mail->SMTPAuth = true; // Enable authentication
		    $nguoigui = 'trangpk.22it@vku.udn.vn';
		    $matkhau = 'bhwr hveq sprc nzog';// mật khẩu của tài khoản 
		    $tennguoigui = 'Khánh Trang';
                $mail->Username = $nguoigui; // SMTP username
                $mail->Password = $matkhau;   // SMTP password
                $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                $mail->Port = 465;  // port to connect to                
                $mail->setFrom($nguoigui, $tennguoigui ); 
               
               $recipients = "khanhtrang123@gmail.com,khanhtrang3145@gmail.com";
               $email_array = explode(",",$recipients);
               foreach($email_array as $email)
                      {
                         $to      =  $email;
                         $mail->addAddress($to); 
                    }

                $mail->isHTML(true);  // Set email format to HTML
                $mail->Subject = 'Gửi thư từ Khánh Trang';      
                $noidungthu = "<b>Hiii!</b><br>hhhhhhhhh" ;
                $mail->Body = $noidungthu;
                $mail->AddAttachment("4.png","picture");
                $mail->smtpConnect( array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                ));
                $mail->send();
                echo 'Đã gửi mail xong';
                
            } catch (Exception $e) {
                echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
            }

?>
