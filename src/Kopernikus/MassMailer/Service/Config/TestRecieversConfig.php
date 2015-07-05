<?php
namespace Kopernikus\MassMailer\Service\Config;

/**
 * Class TestRecieversConfig
 * @package Kopernikus\MassMailer\Service\Config
 */
class TestRecieversConfig
{
    /**
     * @var RecieverConfig[]
     */
    private $recievers;

    /**
     * @param array $testMailRecieversConfig
     */
    function __construct(array $testMailRecieversConfig)
    {
        $recievers = $testMailRecieversConfig['recievers'];

        foreach ($recievers as $reciever) {
            $this->recievers[] = new RecieverConfig($reciever);
        }
    }

    /**
     * @return RecieverConfig[]
     */
    public function getRecievers()
    {
        return $this->recievers;
    }


}