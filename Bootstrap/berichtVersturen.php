    
    <?php 
    $naam = $_POST['naam'];
    $mailKlant = $_POST['email'];
    $bericht = $_POST['bericht'];
    
    $emailBeheerder = 'photostuffwebshop@gmail.com';
    $emailOnderwerp = "Niewe vraag";
    $emailInhoud = "$naam heeft een bericht ingestuurd.\n"."\n$bericht\n\n".$headers = "e-mailadres $naam: $mailKlant \r\n";
$headers .= "Reply-To: $mailKlant \r\n";


   


    mail($emailBeheerder,$emailOnderwerp,$emailInhoud,$headers);
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

    ?>  