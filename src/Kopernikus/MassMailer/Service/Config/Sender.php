<?php
namespace Kopernikus\MassMailer\Service\Config;


class Sender
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;


    /**
     * @param array|null $senderConfig
     */
    public function __construct(array $senderConfig = null)
    {
        $this->name = $senderConfig['name'];
        $this->email = $senderConfig['email'];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

}