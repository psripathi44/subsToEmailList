<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Me</title>
<link rel="icon" type="image/ico" href="Images/favicon.ico">
<link href="../CSS/styles.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Tajawal" rel="stylesheet">
</head>
<body>
	<div class="topnav">
			<a href="http://subscribemaillist.gologg.com/">Home</a>
			<a class="active" href="#SendEmail">Test Unsubscribe link</a>
	</div>
	<div id = "main">
		<div style="font-family: 'Tajawal', sans-serif;">
			<form method="POST" action="" enctype="multipart/form-data" style="width: 125%;">
			<p class="title"> Use this form to send an email to your personal mail inbox to see how 'Unsubscribe' link added to email.</p>
			<span class="subTitle"> Make sure the email you use here is subscribed already.</span><br/><br/><br/>
				<input type="hidden" name="action" value="submit">
				<input name="email" type="email	" value="" placeholder="Email" class ="formTextbox"/><br/><br/>
				<textarea name="message" rows="6" placeholder="Message" class = "formTextArea"></textarea><br/><br/>
				<input type="submit" name ="submit" value="Send Message" class="formButton"/>&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="reset" name ="reset" value="Reset Fields" class="formButton"/>
			</form>
		</div>
	<?php
    
	if(isset($_POST["submit"]))
	{
        $email=$_REQUEST['email'];
        $message=$_REQUEST['message'];
        
		if (($email=="")||($message=="")){
            print '<br/><b style="color:#B60000">Exception:</b> ';
            echo "<br/>All fields are required. Please fill all the fields.";
        }
		else{
            /*Email code BEGIN*/
            require "encryptDecrypt.php";
			require 'PHPMailer/PHPMailerAutoload.php';
            
            $key = 'dc2c9daafa96835122a5c1608casdasdasd4ef4we3ad4232asd64e45d';
            $encCode = encrypted($email, $key);
			$mail = new PHPMailer;
			
			$mail->isSMTP();									// Set mailer to use SMTP
			$mail->Host = 'mx1.hostinger.com';                  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;								// Enable SMTP authentication
			$mail->Username = 'subslist@gologg.com';			// SMTP username
			$mail->Password = '2Xzhxvs9QM8b';					// SMTP password
			$mail->SMTPSecure = 'true';							// Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;									// TCP port to connect to
			
			$mail->setFrom('subslist@gologg.com', $email);
			$mail->addReplyTo($email, $email);
			$mail->addAddress($email);   		                // Add a recipient
			
			$mail->isHTML(true);                                // Set email format to HTML

			$bodyContent = "<html>\n"; 
			$bodyContent .= "<head>\n";
			$bodyContent .= "<link href='https://fonts.googleapis.com/css?family=Tajawal' rel='stylesheet'>\n";
			$bodyContent .= "</head>\n";  
			$bodyContent .= "<body style=\"font-family: 'Tajawal', sans-serif; font-size: 1em; font-style: normal; font-weight: 300; color: #4B4B4B;\">\n";
			$bodyContent .= "<br/> Hello User!<br/><br/> PFB message sent -<br/><br/>\n";
            $bodyContent .= "Message: $message <br/>\n";
            $bodyContent .= "<a href='http://subscribemaillist.gologg.com/unsubscribe/$encCode' target='_blank'>Unsubscribe</a>\n";
			$bodyContent .= "<br/> Regards, <br/> Portfolio manager.<br/><br/>\n";
			$bodyContent .= "</body>\n"; 
			$bodyContent .= "</html>\n"; 
			
			
			$mail->Subject = 'Newsletter - XYZ Inc.';
			$mail->Body    = $bodyContent;
			
			if(!$mail->send()) {
				echo "<br/><span style='color:#B60000;'>Error: </span> <br/>Email could not be sent.";
				echo '<br/>Mailer Error: ' . $mail->ErrorInfo;
			} else {
                echo "<br/>Your message has been sent! Check your spam if you do not see the email in a couple of mins.";
			}
			/*Email code END*/
		}
	}  
	?>
</div>
</body>
</html>