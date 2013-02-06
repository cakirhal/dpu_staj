<?php
require_once('class.phpmailer.php');

function smtpmail($message_subject, $message_body, $from_adress, $from_name, $to_adress, $to_name){

$mail             = new PHPMailer();
$body             = file_get_contents('deneme.html');
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "dpu.bil.muh@gmail.com";  // GMAIL username     dpu.bil.muh@gmail.com
$mail->Password   = "bilgisayar2012";            // GMAIL password    bilgisayar2012
$mail->SetFrom($from_adress, $from_name);
$mail->AddReplyTo($from_adress,$from_name);
$mail->Subject    = $message_subject;
$mail->MsgHTML($message_body);
$mail->AddAddress($to_adress, $to_name);
//$mail->AddAttachment($message_att);      // attachment
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else{
			echo '<script type="text/javascript">alert("yeni þifreniz mail adresinize gönderildi");</script>';
		echo '<meta http-equiv="refresh" content="0;URL=index.php">';
  
  }
return 0;
}
?>
