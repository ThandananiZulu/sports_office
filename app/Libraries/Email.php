<?php namespace App\Libraries;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {



	function send_email($email,$subject,$message,$fromTitle='Zakheletech') {
    
        $mail = new PHPMailer(true);  
		try {
		    
		    $mail->isSMTP();  
		    $mail->Host         = 'mail.freshlinks.co.za'; //smtp.google.com
		    $mail->SMTPAuth     = true;     
		    $mail->Username     = 'no-reply@freshlinks.co.za';  
		    $mail->Password     = '8UmhS(+r$>`v(4DY';
			$mail->SMTPSecure   = 'tls';  
			$mail->Port         = 587;  
			// $mail->Port         = 25;  
			$mail->Subject      = $subject;
			$mail->Body         = $message;
			$mail->setFrom('no-reply@freshlinks.co.za', $fromTitle);
			
			$mail->addAddress($email);  
			$mail->isHTML(true);      
			
			if(!$mail->send()) {
			 //   echo "Something went wrong. Please try again.";
			}
		    else {
			//    echo "Email sent successfully.";
		    }
		    
		} catch (Exception $e) {
	//	var_dump($e);die;
		 //   echo "Something went wrong. Please try again.";
		}
        
    }
	function send_email_with_attachment($email,$subject,$message,$fromTitle='Freshlinks',$attachments=[]) {
    
        $mail = new PHPMailer(true);  
		try {
		    
		    $mail->isSMTP();  
		    $mail->Host         = 'mail.freshlinks.co.za'; //smtp.google.com
		    $mail->SMTPAuth     = true;     
		    $mail->Username     = 'no-reply@freshlinks.co.za';  
		    $mail->Password     = '8UmhS(+r$>`v(4DY';
			$mail->SMTPSecure   = 'tls';  
			$mail->Port         = 587;  
			// $mail->Port         = 25;  
			$mail->Subject      = $subject;
			$mail->Body         = $message;
			$mail->setFrom('no-reply@freshlinks.co.za', $fromTitle);
			
			if($attachments){
				if(count($attachments))
				foreach($attachments as $row){
					$mail->addStringAttachment( $row['content'] , $row['filename'] );
				}	
			}	
			

			$mail->addAddress($email);  
			$mail->isHTML(true);      
			
			if(!$mail->send()) {
			 //   echo "Something went wrong. Please try again.";
			}
		    else {
			//    echo "Email sent successfully.";
		    }
		    
		} catch (Exception $e) {
	//	var_dump($e);die;
		 //   echo "Something went wrong. Please try again.";
		}
        
    }

	
}