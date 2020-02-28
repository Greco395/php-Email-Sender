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

<!DOCTYPE html>
<html lang="en">
<head>
  <title>php EMAIL SENDER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta author="greco395.com">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!--
###########################################################
#                                                         #
#   php Email Sender creato da greco395.com               #
#                                                         #
#   Syle bootstrap ( https://github.com/twbs/bootstrap )  #
#                                                         #
###########################################################
-->
<div class="jumbotron text-center">
  <h1>EMAIL SENDER</h1>
  <p>Con questo form si può inviare una mail</p> 
</div>
  
<div class="container">
    <h2>
        <? 
          // controllo se $al (variabile che invia la mail) contiene informazioni se contiene true signifia che la mail è inviata, false non inviata. Invece se errore è true almeno un campo non è stato compilato
           if(!empty($al)){ 
                            if($al == true){ 
                                             echo "<font color='green'>MAIL INVIATA"; 
                      }elseif($al == false){ 
                                             echo "<font color='red'>ERRORE NEL INVIO DELLA MAIL"; 
                                            } 
                            }elseif($errore == true){
                                echo "<font color='red'>COMPILA TUTTI I CAMPI</font>";
                            }
        ?>
    </h2>

  <div class="row">
      <form action="" method="POST">
           <input type="email" class="form-control" placeholder="Email Mittente" name="email-mittente">
           <br>
            <input type="email" class="form-control" placeholder="Email Destinatario" name="email-destinatario">
            <br>
            <input type="text" class="form-control" placeholder="Oggetto" name="oggetto">
            <br>
            <textarea class="form-control" placeholder="MESSAGGIO ( anche html )" name="messaggio" rows="10"></textarea>
            <br>
            <button type="submit" class="btn btn-block btn-info"><span class="glyphicon glyphicon-send"></span>  INVIA</button>
      </form>
  </div>
</div>
<br><br><center><a href="http://greco395.com/">tutti i progetti e il codice sorgente</a></center>


</body>
</html>
