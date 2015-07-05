<?php
namespace Kopernikus\MassMailer\Service\Config;

use Kopernikus\MassMailer\Exception\AttachmentNotFoundException;

class ContentConfig
{
    private $greeting = '';
    private $subject = '';
    private $signature = '';
    private $content = '';

    /**
     * @var array
     */
    private $attachments = [];

    /**
     * @param array $contentConfig
     */
    public function __construct(array $contentConfig)
    {
        $this->setGreeting($contentConfig['greeting']);
        $this->setContent($contentConfig['content']);
        $this->setSubject($contentConfig['subject']);
        $this->setSignature($contentConfig['signature']);


        foreach ($contentConfig['attachments'] as $attachment) {
            $attachment = $this->getResourcesDir() . $attachment;

            if (!file_exists($attachment)) {
                throw new AttachmentNotFoundException($attachment);
            }

            $this->attachments[] = $attachment;
        }
    }


    /**
     * @return string
     */
    public function getGreeting()
    {
        return $this->greeting;
    }

    /**
     * @param string $greeting
     */
    public function setGreeting($greeting)
    {
        $this->greeting = $greeting;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }

    /**
     * @return string
     */
    public function getContent(Reciever $reciever)
    {
        $content = $this->greeting . " " . $reciever->getFirstname() . ",\r\n\r\n" . $this->content;
        $content = str_replace("<br />", "\r\n", $content);

        return $content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return array
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @return string
     */
    public function getResourcesDir()
    {
        return __DIR__ . "/../../Ressources/attachments/";
    }
}