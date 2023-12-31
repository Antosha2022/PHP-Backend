<?php
class Feedback{
    public $name;
    public $email;
    public $text;

    public function setData($name, $email, $text) {
        $this->name = $name;
        $this->email = $email;
        $this->text = $text;
    }
    public function validFeedbackForm() {
        if(strlen($this->name) < 3)
            return "Імʼя дуже коротке, треба мінімум 3 символа";
        else if(strlen($this->email) < 3)
            return "Email дуже короткий";
        else if(strlen($this->text) < 5)
            return "Повідомлення дуже коротке, треба мінімум 5 символів";
        else
            return "Все добре";
    }

    public function sendMail() {
        require '/PHPMailerAutoload.php';

        $feedbackName = $this->name;
        $feedbackEmail = $this->email;
        $feedbackText = $this->text;

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = '**************';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = '******************';               // SMTP username
        $mail->Password = '***************';                  // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // SMTP port to connect to

        $mail->CharSet = "UTF-8";

        $mail->setFrom('info@example.com', 'LarAng');
        $mail->addAddress('info@example.com', 'Anton');      // Add a recipient
        // $mail->addAddress('ellen@example.com');            // Name is optional
        $mail->addReplyTo($feedbackEmail, $feedbackName);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Нове повідомлення з сайту LarAng від '.$feedbackName;

        $mail->Body    = 'Це повідомлення від користувача, який у формі вказав імʼя: <b>'.$feedbackName.'</b>
                          та e-mail: '.$feedbackEmail.'</br>
                          <b>Текст повідомлення</b></br>
                          <p>'.$feedbackText.'</p>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            $error = $mail->ErrorInfo;
            $originalString = 'Повідомлення не відправлене! Помилка: '.$error;
            $message = urlencode($originalString);
            header('Location: /user/dashboard/'.$message);

        } else {
            $originalString = 'Все добре! Ваше повідомлення відправлене.';
            $message = urlencode($originalString);
            header('Location: /user/dashboard/'.$message);
        }
    }
}
