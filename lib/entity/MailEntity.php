<?php

/**
 * Description of MailEntity
 *
 * @author usukhbayar.m
 */
class MailEntity
{

    const MAIN_EMAIL = 'sales@megamed.mn';
    const FROM_EMAIL = 'noreply@megamed.mn';
    const ROOT_DIR = '/home/megamedm/';

    public static function sentMail($email, $body, $subject = 'new order arrived')
    {
        $ccEmails = array('dairiimaa11@gmail.com', 'm.usukhbayar@gmail.com');

        $message = Swift_Message::newInstance()
                ->setFrom(self::FROM_EMAIL)
                ->setTo($email)
                ->setBcc($ccEmails)
                ->setSubject($subject)
                ->setBody($body);

        sfContext::getInstance()->getMailer()->send($message);
    }

}
