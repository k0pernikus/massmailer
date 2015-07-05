<?php
/**
 * Created by PhpStorm.
 * User: wolle
 * Date: 7/5/15
 * Time: 8:59 PM
 */

namespace Kopernikus\MassMailer\Command;


use Kopernikus\MassMailer\Service\MailerFactory;
use Nette\Mail\IMailer;

class AbstractMailerCommand extends AbstractConfigAwareCommand
{
    /**
     * @var IMailer
     */
    private $mailer;

    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->mailer = (
            new MailerFactory($this->getMailAccountConfig()
        ))->getMailer();

    }

    /**
     * @return IMailer
     */
    public function getMailer()
    {
        return $this->mailer;
    }


}