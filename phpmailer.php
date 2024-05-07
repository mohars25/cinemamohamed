$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = '3896cd1f14f325';
$phpmailer->Password = '8f92664e3f4dde';

public function sentEmailTo(string $to, string $subject, string $body)
    {

        // si on se trouve sur un serveur local on utilise phpmailer
        if ($_SERVER['SERVER_NAME'] === 'localhost') {
            $phpmailer = new PHPMailer();

            // ici c'est la configuration su server de messagerie mailtrap
            $phpmailer->isSMTP();
            $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = 'a4a93c3025671c';
            $phpmailer->Password = 'b5677dabd60c3f';
            // ici on immagine avoir une messagerie
            $phpmailer->setFrom('forum@gmail.com', 'Services Forum');
            // on indique a PHPMailer l'adresse de destination
            $phpmailer->addAddress($to, 'Recipient Name');
            // Sujet de l'e-mail
            $phpmailer->Subject = $subject;
            // Contenu de l'e-mail
            $phpmailer->isHTML(true);
            // Indique que le contenu est au format HTML
            $phpmailer->CharSet = 'UTF-8';
            // Définit l'encodage des caractères
            $phpmailer->Body = $body;
            // on envois le mail et retournons la reponse de l'envois (true or false)
            return $phpmailer->send();
        }
        //si on se trouve sur un serveur distant on utilise la fonction nativ de php mail()
        else {
            // En-têtes de l'email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: expéditeur@example.com' . "\r\n";
            $headers .= 'Reply-To: expéditeur@example.com' . "\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();
            // on envois le mail et retournons la reponse de l'envois (true or false)
            return mail($to, $subject, $body, $headers);
        }
    }