<?php
namespace Kopernikus\MassMailer\Command;

use Kopernikus\MassMailer\Service\Mail\ContentPreparer;
use Kopernikus\MassMailer\Service\Printer\RecieverPrinter;
use Nette\Mail\Message;
use Nette\Mail\SmtpException;
use Nette\Mail\SmtpMailer;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class TestmailSendCommand
 * @package Kopernikus\MassMailer\Command
 */
class TestmailSendCommand extends AbstractMailerCommand
{
    /**
     * Test mail.yml send configuration
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName("testmail:send")
            ->setDescription("Will send a testmail using the the mail.yml config.");
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     *
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $recievers = $this
            ->getTestMailRecievers()
            ->getRecievers();

        $this->sendMails($output, $recievers);
    }
}