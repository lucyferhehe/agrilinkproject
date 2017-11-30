<?php

namespace common\lib;

use common\lib\PHPMailer;

class sendEmail {

    public function sendEmailto($sendEmail, $subject, $body) {

        $mail = new PHPMailer();
      
        $mail->IsSMTP();
        $mail->CharSet = "utf-8";
        $mail->SMTPDebug = 1;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->Username = 'tranphu13023@gmail.com';
        $mail->Password = 'phu12345';
        
        $mail->SetFrom('tranphu13023@gmail.com', 'hello');
        $mail->AddReplyTo('tranphu1302@gmail.com', 'phu tran');
        $mail->Subject =  $subject;
        $mail->MsgHTML($body);

        $mail->AltBody = "hahahahah";
       
        if (is_array($sendEmail)) {
            foreach ($sendEmail as  $value) {

                $mail->AddAddress($value);
            } 
        }else {
                $mail->AddAddress($sendEmail);
                
            }

            if(!$mail->send()){
                return FALSE;
            }else{
                return TRUE;
            }
            
    }

}
