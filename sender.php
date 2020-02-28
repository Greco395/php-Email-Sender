<?php
/*
###########################################################
#                                                         #
#   php Email Sender creato da greco395.com               #
#                                                         #
###########################################################
*/
// varibili input
$email_mittente      = $_POST['email-mittente'];
$email_destinatario  = $_POST['email-destinatario'];
$oggetto             = $_POST['oggetto'];
$messaggio           = $_POST['messaggio'];



// funzione che invia la mail
function inviaMail($email_destinatario, $email_mittente, $oggetto, $messaggio){
    
    // Set delle intestazioni per inviare mail in html
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    // Creo l'intestazine della mail
    $headers .= 'From: '.$email_mittente."\r\n".
        'Reply-To: '.$email_mittente."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        
    // invio l'email
    if(@mail($email_destinatario, $oggetto, $messaggio, $headers)){
            return true;
    }else{
            return false;
   }
}



// invia la mail se tutti i campi sono stati compilati altrimenti da errore=true e viene mostrato un messaggio al utente
if(!empty($email_mittente)){
    if(!empty($email_destinatario)){
        if(!empty($oggetto)){
            if(!empty($messaggio)){
                $al = inviaMail($email_destinatario, $email_mittente, $oggetto, $messaggio);
            }else{ $errore = true; }
        }else{ $errore = true; }
    }else{ $errore = true; }
}else{ $errore = true; }
 
?>
