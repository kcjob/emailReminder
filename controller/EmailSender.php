<?php

namespace controller;

class EmailSender {

    private $email_params;

    public function __construct() {
       $email_params = parse_ini_file("config/emailParams.generic.ini");
       $this->userName = $email_params['userName'];
       $this->userPassword = $email_params['userPassword'];
       $this->fromName = $email_params['fromName'];
       $this->sentTo = $email_params['sentTo'];

   }

    function mailmsg($msg, $emailDataObject) {
        //print_r($email_params);
        // Create the Transport
        $transport = (new \Swift_SmtpTransport('outgoing.ccny.cuny.edu', 587, 'tls'))
                ->setUsername($this->userName)
                ->setPassword($this->userPassword);

        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

        // Create a message
        $message = (new \Swift_Message('Core Facilities Equipment Use'))
                ->setFrom($this->fromName)
                //-> setTo($useremailAddress) // users email addresses
                //-> setTo($emailDataObject->userEmailAddress) // users email addresses
                ->setTo($this->sentTo)
                ->setContentType("text/html")
                ->setBody($msg);
        // Send the message
        $numSent = $mailer->send($message, $failures);

        // Note that often that only the boolean equivalent of the
        //return value is of concern (zero indicates FALSE)
        /*
          if ($mailer->send($message))
          {
          $totalEmails = $totalEmails + $numSent;
          //echo "Sent\n";
          }
          else
          {
          echo "Failed\n";
          }
          printf("Total Emails messages %d sent\n", $totalEmails);
         */
    }

}
