<?php
/**
 * Created by PhpStorm.
 * User: wolle
 * Date: 7/5/15
 * Time: 4:51 PM
 */

namespace Kopernikus\MassMailer\Service\Config;


class MailAccountConfig
{
    /**
     * @var string
     */
    private $host;


    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $encryption;

    /**
     * @param array $config
     */

    function __construct(array $config)
    {
        list($host, $user, $password, $encryption) = $this->parseConfig($config);
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->encryption = $encryption;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return boolean
     */
    public function isUseTLS()
    {
        return $this->useTLS;
    }

    /**
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return boolean
     */
    public function isUseSSL()
    {
        return $this->useSSL;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getEncryption()
    {
        return $this->encryption;
    }

    /**
     * @param $mailAccountConfig
     *
     * @return array
     */
    private function parseConfig($mailAccountConfig)
    {
        $host = $mailAccountConfig['host'];
        $user = $mailAccountConfig['user'];
        $password = $mailAccountConfig['password'];
        $encryption = $mailAccountConfig['encryption'];

        $params = [$host, $user, $password, $encryption];

        return $params;
    }
}