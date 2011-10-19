<?php
		require_once 'includes/lib/swift_required.php';
		$name = $_POST['name'];
		$email = $_POST['email'];
		$inquiry_type = $_POST['inquiry_type'];
		if ($inquiry_type=="General Questions")
		{
			$toEmail = "apprentic@impact.org";
		} else if ($inquiry_type=="Media/Press")
		{
			$toEmail = "shiori.mine@impact.org";
		} else if ($inquiry_type=="Sponsorship Inquiry")
		{
			$toEmail = "apprentice@impact.org";
		} else {
			$toEmail = "apprentice@impact.org";
		}
		
		$message_to_send = $_POST['message'];
		//Create the Transport
		$transport = Swift_SmtpTransport::newInstance('localhost', 25);
		
		//Create the Mailer using your created Transport
		$mailer = Swift_Mailer::newInstance($transport);
		
		//Create a message
		$message = Swift_Message::newInstance('Wonderful Subject')
		->addTo( $toEmail )
		->setFrom(array($email => $name ))
		->setSubject($inquiry_type)
		->setBody($message_to_send, 'text/html')
		;
		
		//Send the message
		$numSent = $mailer->send($message);	
		header( 'Location: http://www.apprentice.impact.org' ) ;
?>	
