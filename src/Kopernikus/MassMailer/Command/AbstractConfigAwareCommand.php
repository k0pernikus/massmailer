<?php
/**
 * Created by PhpStorm.
 * User: wolle
 * Date: 7/5/15
 * Time: 4:43 PM
 */

namespace Kopernikus\MassMailer\Command;


use Kopernikus\MassMailer\Service\Config\ContentConfig;
use Kopernikus\MassMailer\Service\Config\MailAccountConfig;
use Kopernikus\MassMailer\Service\Config\RecieversConfig;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Yaml\Yaml;

class AbstractConfigAwareCommand extends Command
{
    /**
     * @var array
     */
    private $config;

    public function __construct($name = null)
    {
        $configFile = '../config/mail.yml';
        $configFile = __DIR__ . "/$configFile";
        $configFileContent = file_get_contents($configFile);
        $this->config = Yaml::parse($configFileContent);

        parent::__construct($name);
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return MailAccountConfig
     */
    public function getMailAccountConfig()
    {
        return new MailAccountConfig($this->config['mail_account']);
    }

    /**
     * @return RecieversConfig
     */
    public function getTestMailRecievers()
    {
        return new RecieversConfig($this->config['test_mail_recievers']);

    }

    /**
     * @return ContentConfig
     */
    public function getContentConfig()
    {
        return new ContentConfig($this->config['content']);

    }

}