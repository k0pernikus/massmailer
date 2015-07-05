<?php
/**
 * Created by PhpStorm.
 * User: wolle
 * Date: 7/5/15
 * Time: 8:59 PM
 */

namespace Kopernikus\MassMailer\Command;


use Kopernikus\MassMailer\Service\Config\Reciever;
use Kopernikus\MassMailer\Service\MailerFactory;
use Nette\Mail\IMailer;

class AbstractMailerCommand extends AbstractConfigAwareCommand
{
    /**
     * @var IMailer
     */
    private $mailer;

    /**
     * @param OutputInterface $output
     * @param   Reciever[]    $recievers
     */
    public function sendMails(OutputInterface $output, array $recievers)
    {
        $contentConfig = $this->getContentConfig();
        $mailer = $this->getMailer();
        $contentPreparer = new ContentPreparer();

        (new RecieverPrinter($output))->printRecievers($recievers);

        foreach ($recievers as $reciever) {
            $message = $contentPreparer->generateMessage($reciever, $contentConfig);

            try {
                $mailer->send($message);
                $status = "<info>Mail sent</info>";
            } catch (SmtpException $e) {
                $status = "<error>Mail wasn't sent</error> " . $e->getMessage();
            } finally {
                $output->writeln($status);
            }
        }
    }

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