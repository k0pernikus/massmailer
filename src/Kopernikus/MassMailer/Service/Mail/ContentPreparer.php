<?php
namespace Kopernikus\MassMailer\Service\Mail;


use Kopernikus\MassMailer\Service\Config\ContentConfig;
use Kopernikus\MassMailer\Service\Config\Reciever;
use Kopernikus\MassMailer\Service\Config\Sender;
use Nette\Mail\Message;

/**
 * Class ContentPreparer
 * @package Kopernikus\MassMailer\Service\Mail
 */
class ContentPreparer
{
    /**
     * @var Sender
     */
    private $sender;

    function __construct(Sender $sender)
    {
        $this->sender = $sender;
    }

    public function generateMessage(Reciever $reciever, ContentConfig $contentConfig)
    {
        $message = new Message();

        $message->setFrom($this->sender->getEmail(), $this->sender->getName());
        $message->setBody(
            $contentConfig->getContent($reciever)
        );
        $message->setSubject($contentConfig->getSubject());
        $message->addTo($reciever->getEmail(), $reciever->getFullName());
        $message->addBcc($this->sender->getEmail());

        foreach ($contentConfig->getAttachments() as $attachment) {
            $message->addAttachment($attachment);
        }

        return $message;
    }
}