<?php
namespace Kopernikus\MassMailer\Service\Config;

/**
 * Class TestRecieversConfig
 * @package Kopernikus\MassMailer\Service\Config
 */
class RecieversConfig
{
    /**
     * @var Reciever[]
     */
    private $recievers;

    /**
     * @param array $testMailRecieversConfig
     */
    function __construct(array $testMailRecieversConfig)
    {
        $recievers = $testMailRecieversConfig['recievers'];

        foreach ($recievers as $reciever) {
            $this->recievers[] = new Reciever($reciever);
        }
    }

    /**
     * @return Reciever[]
     */
    public function getRecievers()
    {
        return $this->recievers;
    }


}