<?php
namespace Kopernikus\MassMailer\Service\Mail;


use Kopernikus\MassMailer\Service\Config\ContentConfig;
use Kopernikus\MassMailer\Service\Config\RecieverConfig;
use Nette\Mail\Message;

/**
 * Class ContentPreparer
 * @package Kopernikus\MassMailer\Service\Mail
 */
class ContentPreparer
{
    public function generateMessage(RecieverConfig $reciever, ContentConfig $contentConfig)
    {
        $message = new Message();

        $message->setFrom('philipp.kretzschmar@gmail.com');
        $message->setBody(
            $contentConfig->getContent($reciever)
        );
        $message->setSubject($contentConfig->getSubject());
        $message->addTo($reciever->getEmail());

        foreach ($contentConfig->getAttachments() as $attachment) {
            $message->addAttachment($attachment);
        }

        return $message;
    }
}