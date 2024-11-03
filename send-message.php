<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Chemin vers le fichier autoload de Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturer les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

   
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'megdiche.nadia1996@gmail.com'; // Remplace par ton adresse Gmail
        $mail->Password = 'bhci dyky nwwm xkqe'; // Remplace par ton mot de passe d'application Gmail
        $mail->SMTPSecure = 'ssl'; // Changer en 'ssl' pour le port 465
        $mail->Port = 465;

        // Désactiver temporairement la vérification SSL
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        // Expéditeur et destinataire
        $mail->setFrom('megdiche.nadia1996@gmail.com', 'Trabelsi nadia'); // Utilisez votre adresse Gmail ici
        $mail->addReplyTo($email, $name); // Adresse de réponse de l'utilisateur
        $mail->addAddress('megdiche.nadia1996@gmail.com'); // Votre email pour recevoir les messages

        // Contenu de l'email
        $mail->isHTML(true);
        $mail->Subject = "Nouveau message de $name";
        $mail->Body = "Nom : $name<br>Email : $email<br>Sujet : $subject<br>Message :$message";

 // Envoi de l'email
 if ($mail->send()) {
    echo "<div class='success-message'>Votre message a été envoyé avec succès !</div>";
} else {
    echo "<div class='error-message'>Erreur : Votre message n'a pas pu être envoyé. Veuillez réessayer.</div>";

}
} else {
    echo "<div style='background-color: #d4edda; color: #155724; padding: 30px; border-radius: 5px;'>Votre message a été envoyé avec succès !</div>";
}
?>
