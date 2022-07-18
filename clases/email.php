<?php
namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{
    public $email;
    public $nombre;
    public $token;
    public function __construct($email,$nombre, $token)
    {
        $this->email= $email;
        $this->nombre= $nombre;
        $this->token = $token;
    }
    public function enviarConfirmacion(){
        //Crean objeto de email
        $mail= new PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '6c98e3d5219525';
        $mail->Password = 'a1332dc5cdb583';

        $mail->isHTML(true);
        $mail->CharSet= 'UTF-8';

        $mail->setFrom('cuentas@kiribeauty.com');
        $mail->addAddress('cuentas@biribeauty.com','Kiri Beauty');
        $mail->Subject='Confirma tu cuenta';
        $contenido= "<html>";
        $contenido.= "<p> <strong> Hola ".$this->nombre." <strong> Has creado tu cuenta en KiriBeauty, confirma tu cuenta dando click en el siguiente enlace</p> ";
        $contenido.='<p> Da click <a href="http://localhost:3000/confirmar-cuenta?token='.$this->token.'">aquí para confirmar tu cuenta</a> </p>';
        $contenido.="<p> Si no has creado una cuenta ignora el mensaje </p>";
        $contenido.="</html>";
        $mail->Body= $contenido;

        //enviando email
        $mail->send();

    }
    public function enviarInstrucciones(){
          //Crean objeto de email
          $mail= new PHPMailer();

          $mail->isSMTP();
          $mail->Host = 'smtp.mailtrap.io';
          $mail->SMTPAuth = true;
          $mail->Port = 2525;
          $mail->Username = '6c98e3d5219525';
          $mail->Password = 'a1332dc5cdb583';
  
          $mail->isHTML(true);
          $mail->CharSet= 'UTF-8';
  
          $mail->setFrom('cuentas@kiribeauty.com');
          $mail->addAddress('cuentas@biribeauty.com','Kiri Beauty');
          $mail->Subject='Reestablece tu password';
          $contenido= "<html>";
          $contenido.= "<p> <strong> Hola ".$this->email." <strong> Has solicitado reestablecer tu password, da click en el siguiente enlace para restablecerla</p> ";
          $contenido.='<p>  <a href="http://localhost:3000/restore?token='.$this->token.'">Da click aquí </a> </p>';
          $contenido.="<p> Si no has creado una cuenta ignora el mensaje </p>";
          $contenido.="</html>";
          $mail->Body= $contenido;
  
          //enviando email
          $mail->send();
  
    }
}
?>