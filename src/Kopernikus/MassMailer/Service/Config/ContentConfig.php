<?php
/**
 * Created by PhpStorm.
 * User: wolle
 * Date: 7/5/15
 * Time: 5:16 PM
 */

namespace Kopernikus\MassMailer\Service\Config;


class ContentConfig
{
    private $greeting = '';
    private $subject = '';
    private $signature = '';
    private $content = '';

    /**
     * @param array $contentConfig
     */
    public function __construct(array $contentConfig)
    {
        $this->setContent($contentConfig['content']);
        $this->setSubject($contentConfig['subject']);
        $this->setSignature($contentConfig['signature']);
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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }


}