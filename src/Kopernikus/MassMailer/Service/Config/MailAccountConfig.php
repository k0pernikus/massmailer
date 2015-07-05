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
     * @var bool
     */
    private $useTLS;

    /**
     * @var int
     */
    private $port;

    /**
     * @var bool
     */
    private $useSSL;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $user;

    function __construct(array $config)
    {
        list($host, $user, $password, $useSSL, $port, $useTLS) = $this->parseConfig($config);

        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->useSSL = $useSSL;
        $this->port = $port;
        $this->useTLS = $useTLS;
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

    private function parseConfig($mailAccountConfig)
    {
        $host = $mailAccountConfig['smtp'];
        $user = $mailAccountConfig['email'];
        $password = $mailAccountConfig['password'];
        $useSSL = $mailAccountConfig['useSSL'];
        $port = $mailAccountConfig['port'];
        $useTLS = $mailAccountConfig['useTLS'];

        $params = [$host, $user, $password, $useSSL, $port, $useTLS];

        var_dump($params);

        return $params;
    }
}