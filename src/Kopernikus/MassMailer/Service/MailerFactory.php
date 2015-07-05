<?php
namespace Kopernikus\MassMailer\Service;


use Kopernikus\MassMailer\Service\Config\MailAccountConfig;
use Nette\Mail\SmtpMailer;

/**
 * Class EdenMailerFactory
 * @package Kopernikus\MassMailer\Service
 */
class MailerFactory
{
    /**
     * @var MailAccountConfig
     */
    private $config;

    /**
     * Instantiate new Smtp Object
     */
    public function __construct(MailAccountConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @return SmtpMailer
     */
    public function getMailer()
    {
        $options = [
            'host'     => $this->config->getHost(),
            'username' => $this->config->getUser(),
            'password' => $this->config->getPassword(),
            'secure'   => $this->config->getEncryption(),
        ];


        return $mailer = new SmtpMailer($options);
    }

}