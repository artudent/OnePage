<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Accept, Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token, Authorization");
header("Content-Type: application/json");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./src/PHPMailer.php";
require "./src/Exception.php";

$agreePrivacy = $_POST['agreePrivacy'] ?? '';
$agreeArtist = $_POST['agreeArtist'] ?? '';
$name = $_POST['name'] ?? '';
$artistName = $_POST['artistName'] ?? '';
$school = $_POST['school'] ?? '';
$grade = $_POST['grade'] ?? '';
$college = $_POST['college'] ?? '';
$major = $_POST['major'] ?? '';
$artist = $_POST['artist'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$file = $_FILES['file'] ?? '';
$mailTo = $_POST['mailTo'] ?? '';

$required = [$name, $school, $grade, $major, $artist, $email, $phone];

for($i=0; $i<count($required); $i++) {
  if ($required[$i] == '') {
    echo json_encode(array('err' => '필수값['.$i.']을 입력해주세요.'));
    return false;
  }
}

$subject = "[사이트 문의] ".$name." - ".$artist;
$contents = "<h2>".$subject."</h2>"
            ."1. <strong>개인 정보 수집 동의:</strong> ".$agreePrivacy."<br>"
            ."2. <strong>소속 작가 동의서:</strong> ".$agreeArtist."<br>"
            ."3. <strong>*성명:</strong> ".$name."<br>"
            ."4. <strong>작가명:</strong> ".$artistName."<br>"
            ."5. <strong>*학교:</strong> ".$school."<br>"
            ."6. <strong>*학년:</strong> ".$grade."<br>"
            ."7. <strong>*단과대:</strong> ".$college."<br>"
            ."8. <strong>학과:</strong> ".$major."<br>"
            ."9. <strong>*작가 활동 범위:</strong> ".$artist."<br>"
            ."10.<strong>*이메일:</strong> ".$email."<br>"
            ."11.<strong>*연락처:</strong> ".$phone."<br>";

$mail = new PHPMailer(true);
$mail->isMail(); 
$mail->CharSet = "utf-8";

$mail->setFrom('webmaster@artudent.co.kr', 'webmaster');
$mail->addAddress($mailTo);     // Add a recipient

$mail->isHTML(true);                          // Set email format to HTML
$mail->Subject = $subject;
$mail->Body    = $contents;
$mail->addAttachment($file["tmp_name"], $file["name"]);

if(!$mail->send()) {
  echo json_encode(array('err' => $mail->ErrorInfo.' 메일 전송에 실패하였습니다. 잠시 후 다시 이용해주세요.'));
} else {
  echo json_encode(array('success' => true));
}
?>