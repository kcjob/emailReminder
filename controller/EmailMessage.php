<?php

namespace controller;

use model\db\EmailMessageData;
use \controller\ConfigEmail;

class EmailMessage {

    /**
     * 
     * @param array $emailDataArray
     */
    static function createAndSendEmail(array $emailDataArray) {

        $app = new EmailTemplateView();
        $emailSender = new EmailSender();
        
        foreach ($emailDataArray as $emailDataObject) {
            
            $msg = $app->generateView($emailDataObject);

            EmailSender::mailmsg($msg, $emailDataObject);
        }
    }

}
