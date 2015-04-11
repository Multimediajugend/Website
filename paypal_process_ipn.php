<?php

// read the data send by PayPal
$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
	$value = urlencode(stripslashes($value));
	$req .= "&$key=$value";
}

// post back to PayPal system to validate
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);
if (!$fp) {
	// HTTP ERROR
} else {
	fputs ($fp, $header . $req);
	while (!feof($fp)) {
		$res = fgets ($fp, 1024);
		if (strcmp ($res, "VERIFIED") == 0) {
			// PAYMENT VALID
			better_mail('mmp@multimediajugend.de', 'IPN success', var_dump_ret($_POST));
			send_confirmation_mail($_POST['payer_email'], $_POST['first_name'], $_POST['last_name'], $_POST['quantity']);
		}

		else if (strcmp ($res, "INVALID") == 0) {
			// PAYMENT INVALID
			better_mail('mmp@multimediajugend.de', 'IPN fail', var_dump_ret($_POST));
		}
	}
	fclose ($fp);
}

function var_dump_ret($mixed = null) {
	ob_start();
	var_dump($mixed);
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

function better_mail($to, $subject, $email) {
	$headers   = array();
	$headers[] = "MIME-Version: 1.0";
	$headers[] = "Content-type: text/plain; charset=iso-8859-1";
	$headers[] = "From: Multimediajugend <info@multimediajugend.de>";
	$headers[] = "Subject: {$subject}";
	$headers[] = "X-Mailer: PHP/".phpversion();

	mail($to, $subject, $email, implode("\r\n", $headers));
}

function send_confirmation_mail($to, $firstName, $lastName, $quantity) {
	$content  = "Hallo " . $firstName . ",\r\n";
	$content .= "\r\n";
	$content .= "Wir haben den Unkostenbeitrag erhalten.\r\n";
	$content .= "Name auf der G&auml;steliste: " . $firstName . " " . $lastName . "\r\n";
	$content .= "Anzahl Personen: " . $quantity . "\r\n";
	$content .= "\r\n";
	$content .= "Vielen Dank. Wir sehen uns bei Media Meets People!\r\n";
	$content .= "Das Team des Multimediale Jugendarbeit Sachsen e.V.\r\n";
	
	better_mail($to, 'Unkostenbeitrag erhalten - Media Meets People', $content);
        
        require './application/config/config.php';
        require './application/libs/controller.php';
        $tmp = new Controller();
        
        $mmpt_ticket_model = $tmp->loadModel('mmpTicketModel');
        $mmpt_ticket_model->addTicket($to, $firstName, $lastName, $quantity);
}