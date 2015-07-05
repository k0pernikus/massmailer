<?php
namespace Kopernikus\MassMailer\Service;

use Eden\Mail\Smtp;
use Kopernikus\MassMailer\Service\Config\MailAccountConfig;

/**
 * Class EdenMailerFactory
 * @package Kopernikus\MassMailer\Service
 */
class EdenMailerFactory
{
    /**
     * @var Smtp
     */
    private $smtp;

    /**
     * Instantiate new Smtp Object
     */
    public function __construct(MailAccountConfig $config)
    {
        var_dump($config->getHost());


        $this->smtp = new Smtp(
            $config->getHost(),
            $config->getUser(),
            $config->getPassword(),
            $config->getPort(),
            $config->isUseSSL(),
            $config->isUseTLS()
        );
    }

    /**
     * @return Smtp
     */
    public function getSmtpInstance()
    {
        return $this->smtp;

    }

}