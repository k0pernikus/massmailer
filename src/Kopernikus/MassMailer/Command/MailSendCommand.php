<?php
namespace Kopernikus\MassMailer\Command;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class MailSendCommand
 * @package Kopernikus\MassMailer\Command
 */

class MailSendCommand extends AbstractMailerCommand
{
    protected function configure()
    {
        $this
            ->setName('mail:send')
            ->setDescription('Will send mails to the configured recievers.');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $recievers = $this
            ->getLiveMailRecievers()
            ->getRecievers();
        $this->sendMails($output, $recievers);
    }

}