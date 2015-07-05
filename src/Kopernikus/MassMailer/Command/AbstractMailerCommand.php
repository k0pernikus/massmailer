<?php
/**
 * Created by PhpStorm.
 * User: wolle
 * Date: 7/5/15
 * Time: 8:59 PM
 */

namespace Kopernikus\MassMailer\Command;


use Kopernikus\MassMailer\Service\Config\Reciever;
use Kopernikus\MassMailer\Service\Mail\ContentPreparer;
use Kopernikus\MassMailer\Service\MailerFactory;
use Kopernikus\MassMailer\Service\Printer\RecieverPrinter;
use Nette\Mail\IMailer;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class AbstractMailerCommand
 * @package Kopernikus\MassMailer\Command
 */
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
        $sender = $this->getSender();
        $mailer = $this->getMailer();

        $contentPreparer = new ContentPreparer($sender);
        $progress = new ProgressBar($output, count($recievers));

        foreach ($recievers as $reciever) {
            $message = $contentPreparer->generateMessage($reciever, $contentConfig);

            try {
                $mailer->send($message);
                $progress->advance();
            } catch (SmtpException $e) {
                $mail = $reciever->getEmail();
                $status = "<error>Mail wasn't sent to: '$mail'!</error> " . $e->getMessage();
                $output->writeln($status);
            }
        }

        $output->writeln('');
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

    /**
     * @param OutputInterface $output
     * @param Reciever[]           $recievers
     */
    protected function printRecievers(OutputInterface $output, array $recievers)
    {
        (new RecieverPrinter($output))->printRecievers($recievers);
    }
}